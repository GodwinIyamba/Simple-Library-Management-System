@extends('frontend.layout')
@section('main')
    @include('frontend.body.title', [
    'title' => 'Books',
    'description' => 'Start borrowing your favourite Books'
    ])
    <section id="content">
        <div class="content-wrap" style="padding-top: 40px;">
            <div class="container clearfix">
                @foreach($categories as $category)
                    <div id="shop" class="shop row grid-container grid-6" data-layout="fitRows">
                        <div class="topmargin-sm mb-4 text-center">
                                <h3 class="m-0">{{ $category->name }}</h3>
                            <a href="{{ route('category', $category) }}" class="button bg-dark text-white button-dark button-small ms-0">View All</a>
                        </div>
                        @foreach($category->books->take(6) as $book)
                            <div class="product col-lg-2 col-md-3 col-6 px-2">
                                <div class="grid-inner">
                                    <div class="product-image">
                                        <a href="{{ route('book_details', $book) }}"><img src="{{ asset($book->book_cover)}}" alt="Checked Short Dress"></a>
                                    </div>
                                    <div class="product-desc">
                                        <div class="mb-0"><h4 class="mb-2" style="font-size: 0.9rem;"><a href="{{ route('book_details', $book) }}">{{ $book->title }}</a></h4></div>
                                        <div class="product-price"><h5 class="mb-1">{{ $book->author->name }}</h5></div>
                                        <div>
                                            <a href="{{ route('book_details', $book) }}" class="button button-3d button-mini button-rounded button-black">LEARN MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div><!-- #shop end -->
                @endforeach

            </div>
        </div>
    </section>
@endsection
