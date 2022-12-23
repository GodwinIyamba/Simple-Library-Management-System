@extends('admin.layout')
@section('main')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
                <h1 class="h3 fw-bold mb-2">
                    Book Copy List
                </h1>
                <h2 class="h6 fw-medium fw-medium text-muted mb-2">
                    Here's a comprehensive list of all available book copies
                </h2>
            </div>
            <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
                <a href="{{ route('admin.add_book_copy') }}" class="btn btn-lg btn-dark">
                    <span class="me-2">Add Book Copy</span>
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
                            <th>Title</th>
                            <th>QRCODE</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($copies as $copy)
                            <tr>
                                <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                <td class="fw-semibold fs-sm">
                                    {{ $copy->book->title }}
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $copy->qrcode }}
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
                            {{ $copies->links() }}
                        </div>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Hover Table -->
        </div>
    </div>
@endsection
