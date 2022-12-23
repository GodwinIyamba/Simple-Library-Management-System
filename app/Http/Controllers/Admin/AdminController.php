<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AuthorStoreRequest;
use App\Http\Requests\BookCopyStoreRequest;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Copy;
use App\Models\Lend;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminLoginView()
    {
        return view('admin.auth.login');
    }

    public function adminLogin(AdminLoginRequest $request)
    {
        if(Auth::guard('admin')->attempt($request->validated())){
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login');
    }

    public function adminDashboard()
    {
        $books_count = Book::total();
        $authors_count = Author::total();
        $books_copy_count = Copy::total();
        $categories_count = Category::total();
        $pending_books_count = Lend::where('status', 1)->count();
        $returned_books_count = Log::where('status', 3)->count();
        $borrowed_books_count = Lend::where('status', 0)->count();
        $rejected_books_count = Log::where('status', 4)->count();
        return view('admin.sections.dashboard', compact('books_count', 'authors_count', 'books_copy_count', 'categories_count', 'pending_books_count', 'returned_books_count', 'borrowed_books_count', 'rejected_books_count'));
    }

    //CATEGORY METHOD

    public function adminCategory()
    {
        $categories = Category::with(['books'])->paginate(15);
        return view('admin.sections.category.category_list', compact('categories'));
    }

    public function adminAddCategory()
    {
        return view('admin.sections.category.category_add');
    }

    public function adminStoreCategory(CategoryStoreRequest $request)
    {
        Category::create($request->validated());

        return back();
    }

    //AUTHOR METHODS
    public function adminAuthor()
    {
        $authors = Author::with(['books'])->paginate(20);
        return view('admin.sections.author.author_list', compact('authors'));
    }

    public function adminAddAuthor()
    {
        return view('admin.sections.author.author_add');
    }

    public function adminStoreAuthor(AuthorStoreRequest $request)
    {
        Author::create($request->validated());

        return back();
    }

    //BOOK METHODS
    public function adminBook()
    {
        $books = Book::with(['category', 'author'])->paginate(50);
        return view('admin.sections.book.book_list', compact('books'));
    }

    public function adminAddBook()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.sections.book.book_add', compact('authors', 'categories'));
    }

    public function adminStoreBook(BookStoreRequest $request)
    {
        $validated = $request->validated();

        $book = Book::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'isbn' => $request['isbn'],
            'edition' => $request['edition'],
            'author_id' => $request['author_id'],
            'category_id' => $request['category_id'],
        ]);

        if($request->hasFile('book_cover')) {
            $book_cover = $request->file('book_cover');
            $cover_name = $book_cover->getClientOriginalName();
            $file_path = 'storage/book_covers/' . $book->id . '/' . $cover_name;
            $book_cover->storeAs('book_covers/' . $book->id, $cover_name,'public');
            $book->update([
                'book_cover' => $file_path,
            ]);
        }

        return back();
    }

    //BOOK COPIES
    public function adminBookCopies()
    {
        $copies = Copy::paginate(20);
        return view('admin.sections.book.book_copy_list', compact('copies'));
    }

    public function adminAddBookCopy()
    {
        $books = Book::all();
        return view('admin.sections.book.book_copy_add', compact('books'));
    }

    public function adminStoreBookCopy(BookCopyStoreRequest $request)
    {
        Copy::create($request->validated());
        return back();
    }

    //BORROWED BOOKS
    public function adminBorrowedBooks()
    {
        $books = Lend::where('status', 0)->paginate(10);
        return view('admin.sections.book.borrowed_books', compact('books'));
    }

    //PENDING BOOKS
    public function adminPendingBooks()
    {
        $books = Lend::where('status', 1)->paginate(20);
        return view('admin.sections.book.pending_books', compact('books'));
    }

    //RETURED BOOKS
    public function adminReturnedBooks()
    {
        $books = Log::where('status', 3)->paginate(20);
        return view('admin.sections.book.returned_books', compact('books'));
    }

    //LOG BOOKS
    public function adminLogBooks(Book $book)
    {
        $books = Log::paginate(20);
        return view('admin.sections.book.log_books', compact('books'));
    }


    public function adminAcceptBook(Lend $book)
    {
        $book->update([
            'status' => 2
        ]);

        Copy::findOrFail($book->copy_id)->update([
            'status' => 0,
        ]);

        Log::create([
            'user_id' => $book->user_id,
            'copy_id' => $book->copy_id,
            'date' => Carbon::now()->toDateString(),
            'status' => 3,
        ]);

        return back();
    }

    public function adminRejectBook(Lend $book)
    {
        $book->update([
            'status' => 0
        ]);

        Copy::findOrFail($book->copy_id)->update([
            'status' => 1,
        ]);

        Log::create([
            'user_id' => $book->user_id,
            'copy_id' => $book->copy_id,
            'date' => Carbon::now()->toDateString(),
            'status' => 4,
        ]);

        return back();
    }

    //LOGOUT

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
