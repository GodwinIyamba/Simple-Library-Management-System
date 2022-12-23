@extends('admin.layout')
@section('main')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
                <h1 class="h3 fw-bold mb-2">
                    Book List
                </h1>
                <h2 class="h6 fw-medium fw-medium text-muted mb-2">
                    Here's a comprehensive list of all available books
                </h2>
            </div>
            <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
                <a href="{{ route('admin.add_book') }}" class="btn btn-lg btn-dark">
                    <span class="me-2">Add Book</span>
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
                            <th>Description</th>
                            <th>Author</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Category</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                <td class="fw-semibold fs-sm">
                                    {{ $book->title }}
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ Str::limit($book->description, 150) }}
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $book->author->name }}
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $book->category->name }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.edit_book', $book) }}" class="btn btn-sm btn-alt-secondary">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{route('admin.delete_book', $book)}}" class="btn btn-sm btn-alt-secondary">
                                            <i class="fa fa-fw fa-times"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <div>
                            {{ $books->links() }}
                        </div>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Hover Table -->
        </div>
    </div>
@endsection
