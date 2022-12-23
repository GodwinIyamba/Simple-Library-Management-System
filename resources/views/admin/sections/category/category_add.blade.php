@extends('admin.layout')
@section('main')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
                <div class="flex-grow-1 mb-1 mb-md-0">
                    <h1 class="h3 fw-bold mb-2">
                        Add Category
                    </h1>
                    <h2 class="h6 fw-medium fw-medium text-muted mb-2">
                       Need more categories? Add them here.
                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('admin.category') }}">Category List</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Add Category
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
    <div class="content">
        <!-- Basic -->
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <form action="{{ route('admin.store_category') }}" method="POST">
                    @csrf
                    <div class="col-lg-8 col-xl-5">
                        <div class="mb-2">
                            <label class="form-label" for="example-text-input">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="example-text-input" name="name" placeholder="Sci-fi...">
                            @error('name')
                            <span class="mt-2" style="color: #dc2626;">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="example-text-input">Description</label>
                            <textarea class="form-control" id="example-textarea-input" name="description" rows="4" placeholder="Science meets fictions..."></textarea>
                            @error('description')
                            <span class="mt-2" style="color: #dc2626;">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-dark">Add Category</button>
                </form>
            </div>
        </div>
        <!-- END Basic -->
    </div>
@endsection
