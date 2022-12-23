@extends('admin.layout')
@section('main')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
                <h1 class="h3 fw-bold mb-2">
                    Edit Author
                </h1>
                <h2 class="h6 fw-medium fw-medium text-muted mb-2">
                    Made a mistake with an author detail? Edit it here.
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('admin.author') }}">Author List</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit Author
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        </div>
    </div>
@endsection
