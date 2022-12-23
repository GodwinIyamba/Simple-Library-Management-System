@extends('admin.layout')
@section('main')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
                <h1 class="h3 fw-bold mb-2">
                    Edit Book
                </h1>
                <h2 class="h6 fw-medium fw-medium text-muted mb-2">
                    Made a mistake in the book details? Edit it here
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('admin.book') }}">Book List</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit Book
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        </div>
    </div>
    <div class="content">
        <!-- Basic -->
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <form action="{{ route('admin.update_book', $book) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row push">
                        <div class="col-6 col-xl-6">
                            <div class="mb-2">
                                <label class="form-label" for="example-text-input">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="example-text-input" name="title" placeholder="A Song of Ice and Fire" value="{{ $book->title }}">
                                @error('title')
                                <span class="mt-2" style="color: #dc2626;">
                                {{ $message }}
                            </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="example-text-input">Description</label>
                                <textarea class="form-control" id="example-textarea-input" name="description" rows="5" placeholder="When the days had grown dark and Ivar seeked a new challenge he looked across the...">{{ $book->description }}</textarea>
                                @error('description')
                                <span class="mt-2" style="color: #dc2626;">
                                {{ $message }}
                            </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="example-text-input">Edition</label>
                                <input type="text" class="form-control @error('edition') is-invalid @enderror" id="example-text-input" name="edition" placeholder="Original" value="{{ $book->edition }}">
                                @error('edition')
                                <span class="mt-2" style="color: #dc2626;">
                                {{ $message }}
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 col-xl-6">
                            <div class="mb-2">
                                <label class="form-label" for="example-text-input">ISBN</label>
                                <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="example-text-input" name="isbn" placeholder=" 978-1-4357-0132-8" value="{{ $book->isbn }}">
                                @error('isbn')
                                <span class="mt-2" style="color: #dc2626;">
                                {{ $message }}
                            </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="example-select">Select Author</label>
                                <select class="form-select" id="example-select" name="author_id">
                                    <option disabled>Open to select author</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}" @if($book->author->name == $author->name) selected @endif>{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                <span class="mt-2" style="color: #dc2626;">
                                {{ $message }}
                            </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="example-select">Select Category</label>
                                <select class="form-select" id="example-select" name="category_id">
                                    <option disabled>Open to select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($book->category->name == $category->name) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="mt-2" style="color: #dc2626;">
                                {{ $message }}
                            </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="example-file-input">Book Cover</label>
                                <input class="form-control" type="file" name="book_cover" id="example-file-input">
                                @error('book_cover')
                                <span class="mt-2" style="color: #dc2626;">
                                {{ $message }}
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-dark">Update Book</button>
                </form>
            </div>
        </div>
        <!-- END Basic -->
    </div>

@endsection
