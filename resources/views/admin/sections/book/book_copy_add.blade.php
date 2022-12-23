@extends('admin.layout')
@section('main')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
                <h1 class="h3 fw-bold mb-2">
                    Add Book
                </h1>
                <h2 class="h6 fw-medium fw-medium text-muted mb-2">
                    Have more books? Add them here
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('admin.book') }}">Book List</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Add Book
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
                <form action="{{ route('admin.store_book_copy') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row push">
                        <div class="col-6 col-xl-6">
                            <div class="mb-2">
                                <label class="form-label" for="example-text-input">QRCODE</label>
                                <input type="text" class="form-control @error('qrcode') is-invalid @enderror" id="example-text-input" name="qrcode" placeholder=" 978-1-4357-0132-8">
                                @error('qrcode')
                                <span class="mt-2" style="color: #dc2626;">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="example-select">Select Book</label>
                                <select class="form-select" id="example-select" name="book_id">
                                    <option selected disabled>Open to select book</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                                    @endforeach
                                </select>
                                @error('book_id')
                                <span class="mt-2" style="color: #dc2626;">
                                {{ $message }}
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-dark">Add Book</button>
                </form>
            </div>
        </div>
        <!-- END Basic -->
    </div>
@endsection
