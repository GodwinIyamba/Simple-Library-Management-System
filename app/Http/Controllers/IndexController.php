<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentBookRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Copy;
use App\Models\Lend;
use App\Models\Log;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function homeView()
    {
        $categories = Category::with('books.author')->whereHas('books', function(Builder $query) {
            $query->has('copies');
        })->get();

//        dd($categories);

        return view('frontend.home', compact('categories'));
    }
    public function aboutView()
    {
        return view('frontend.pages.about');
    }

    public function userProfile()
    {
        $current_user = Auth::user();
        $borrowed_books = Lend::where('user_id', Auth::id())->where('status', 0)->get();
        $pending_books = Lend::where('user_id', Auth::id())->where('status', 1)->get();
        $returned_books = Log::where('user_id', Auth::id())->where('status', 3)->get();
        return view('frontend.pages.dashboard', compact('current_user', 'borrowed_books', 'returned_books', 'pending_books'));
    }

    public function bookDetails(Book $book)
    {
        return view('frontend.pages.book_details', compact('book'));
    }

    public function rentBooks(RentBookRequest $request)
    {
        $copy = Copy::where('book_id', $request->book_id)->where('status', 0)->first();

        Lend::create([
            'user_id' => $request->user_id,
            'copy_id' => $copy->id,
            'start_date' => date('Y-m-d', strtotime($request->start_date)),
            'end_date' => date('Y-m-d', strtotime($request->end_date)),
            'status' => 0,
        ]);

        $copy->update([
            'status' => 1,
        ]);

        Log::create([
            'user_id' => $request->user_id,
            'copy_id' => $copy->id,
            'date'=> Carbon::now()->toDateString(),
            'status' => 1
        ]);

        return back();

    }

    //RETURN BOOKS
    public function returnBook(Lend $book)
    {
        $book->update([
            'status' => 1
        ]);

        Log::create([
            'user_id' => $book->user_id,
            'copy_id' => $book->copy_id,
            'date' => Carbon::now()->toDateString(),
            'status' => 2,
        ]);

        return back();
    }

    public function userSettings()
    {
        $user = Auth::user();
        return view('frontend.pages.settings', compact('user'));
    }

    public function userUpdate(UserUpdateRequest $request)
    {
        $user = User::findOrFail($request->user_id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'about_me' => $request->about_me
        ]);

        if ($user->profile_path) {
            unlink($user->profile_path);
        }

        if($request->hasFile('profile_photo')) {
            $profile_photo = $request->file('profile_photo');
            $photo_name = $profile_photo->getClientOriginalName();
            $file_path = 'storage/profile_photo/' . $user->id . '/' . $photo_name;
            $profile_photo->storeAs('profile_photo/' . $user->id, $photo_name,'public');
            $result = $user->update([
                'profile_photo_path' => $file_path,
            ]);
        }

        return redirect()->route('dashboard');
    }
}
