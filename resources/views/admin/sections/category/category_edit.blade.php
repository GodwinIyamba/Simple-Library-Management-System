@extends('admin.layout')
@section('main')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
                <h1 class="h3 fw-bold mb-2">
                    Edit Category
                </h1>
                <h2 class="h6 fw-medium fw-medium text-muted mb-2">
                    The right place to edit your categories
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('admin.category') }}">Category List</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit Category
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
                <form action="{{ route('admin.update_category', $category) }}" method="POST">
                    @csrf
                    <div class="col-lg-8 col-xl-5">
                        <div class="mb-2">
                            <label class="form-label" for="example-text-input">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="example-text-input" name="name" placeholder="Sci-fi..." value="{{ $category->name }}">
                            @error('name')
                            <span class="mt-2" style="color: #dc2626;">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="example-text-input">Description</label>
                            <textarea class="form-control" id="example-textarea-input" name="description" rows="4" placeholder="Science meets fictions...">{{ $category->description }}</textarea>
                            @error('description')
                            <span class="mt-2" style="color: #dc2626;">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-dark">Update Category</button>
                </form>
            </div>
        </div>
        <!-- END Basic -->
    </div>
@endsection
