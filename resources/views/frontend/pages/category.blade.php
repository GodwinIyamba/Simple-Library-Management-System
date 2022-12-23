@extends('frontend.layout')
@section('main')
    @include('frontend.body.title', [
    'title' => $category->name,
    'description' => $category->description ?  : '',
    ])
    <section id="content">
        <div class="content-wrap" style="padding-top: 40px;">
            <div class="container d-flex">
                @foreach($category->books as $book)
                    <div class="product col-lg-2 col-md-3 col-6 px-2">
                        <div class="grid-inner">
                            <div class="product-image">
                                <a href="#"><img src="{{ asset($book->book_cover)}}" alt="Checked Short Dress"></a>
                            </div>
                            <div class="product-desc">
                                <div class="mb-0"><h4 class="mb-2" style="font-size: 0.9rem;"><a href="#">{{ $book->title }}</a></h4></div>
                                <div class="product-price"><h5 class="mb-1">{{ $book->author->name }}</h5></div>
                                <div>
                                    <a href="{{ route('book_details', $book) }}" class="button button-3d button-mini button-rounded button-black">LEARN MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
