@extends('admin.layout')
@section('main')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
                <h1 class="h3 fw-bold mb-2">
                    Pending Book List
                </h1>
                <h2 class="h6 fw-medium fw-medium text-muted mb-2">
                    Here's a comprehensive list of all books pending acceptance
                </h2>
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
                            <th>Author</th>
                            <th>Reader</th>
                            <th>Return Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                <td class="fs-sm">
                                    {{ $book->copy->book->title }}
                                </td>
                                <td class="fs-sm">
                                    {{ $book->copy->book->author->name }}
                                </td>
                                <td class="fs-sm">
                                    {{ $book->user->name }}
                                </td>
                                <td class="fs-sm">
                                    {{ \Carbon\Carbon::parse($book->end_date)->diffForHumans() }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.accept_book', $book) }}" class="btn btn-sm btn-alt-secondary" >
                                            Accept
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
