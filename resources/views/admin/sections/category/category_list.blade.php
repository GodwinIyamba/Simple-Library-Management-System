@extends('admin.layout')
@section('main')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
                <h1 class="h3 fw-bold mb-2">
                    Category List
                </h1>
                <h2 class="h6 fw-medium fw-medium text-muted mb-0">
                    Here's a comprehensive list of all available categories.
                </h2>
            </div>
            <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
                <a href="{{ route('admin.add_category') }}" class="btn btn-lg btn-dark">
                    <span class="me-2">Add Category</span>
                    <i class="nav-main-link-icon fa fa-plus"></i>
                </a>
            </div>
        </div>
        </div>
    </div>
    <div class="content">
        <div class="col-xl-12">
            <!-- Hover Table -->
            <div class="block block-rounded">
                <div class="block-content">
                    <table class="table table-hover table-vcenter">
                        <thead class="">
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Total Books</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                <td class="fw-semibold fs-sm">
                                    {{ $category->name }}
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $category->description }}
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $category->books->count() }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit Client">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Remove Client">
                                            <i class="fa fa-fw fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <div>
                            {{ $categories->links() }}
                        </div>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Hover Table -->
        </div>
    </div>
@endsection
