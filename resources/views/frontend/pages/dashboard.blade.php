@extends('frontend.layout')
@section('main')

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="row clearfix">
                @include('frontend.partials.user_header')
                <div class="col-lg-7">

                            <div class="tabs tabs-alt clearfix" id="tabs-profile">

                                <ul class="tab-nav clearfix">
                                    <li><a href="#tab-feeds">Borrowed Books</a></li>
                                    <li><a href="#tab-posts">Pending Books</a></li>
                                    <li><a href="#tab-replies">Returned Books</a></li>
                                </ul>

                                <div class="tab-container">

                                    <div class="tab-content clearfix" id="tab-feeds">


                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($borrowed_books as $book)
                                            <tr>
                                                <td>
                                                    <code>{{ \Carbon\Carbon::parse($book->start_date)->format('d/m/y') }}</code>
                                                </td>
                                                <td>
                                                    <code>{{ \Carbon\Carbon::parse($book->end_date)->format('d/m/y') }}</code>
                                                </td>
                                                <td>
                                                    {{ $book->copy->book->title }}
                                                </td>
                                                <td>
                                                    {{ $book->copy->book->author->name }}
                                                </td>
                                                <td>
                                                    <a class="button button-3d button-small button-rounded button-green" href="{{ route('return_book', $book) }}">RETURN</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="tab-content clearfix" id="tab-posts">

                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Author</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($pending_books as $book)
                                                <tr>
                                                    <td>
                                                        {{ $book->copy->book->title }}
                                                    </td>
                                                    <td>
                                                        {{ $book->copy->book->author->name }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="tab-content clearfix" id="tab-replies">

                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Return Date</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($returned_books as $book)
                                                <tr>
                                                    <td>
                                                        <code>{{ \Carbon\Carbon::parse($book->date)->format('d/m/y') }}</code>
                                                    </td>
                                                    <td>
                                                        {{ $book->copy->book->title }}
                                                    </td>
                                                    <td>
                                                        {{ $book->copy->book->author->name }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>


                                    </div>

                                </div>

                            </div>

                        </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <div class="fancy-title topmargin title-border">
                        <h4>About Me</h4>
                    </div>

                    <p>{{ $current_user->about_me }}</p>
                </div>

            </div>

        </div>
    </div>
</section><!-- #content end -->

@endsection
