@extends('frontend.layout')
@section('main')
    @include('frontend.body.title', [
    'title' => $book->title,
    'description' => ''
    ])
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row gutter-40 col-mb-80">
                    <div class="sidebar col-lg-2"></div>
                    <div class="postcontent col-lg-8">

                        <div class="single-product">
                            <div class="product">
                                <div class="row gutter-40">

                                    <div class="col-md-6">

                                        <!-- Product Single - Gallery
                                        ============================================= -->
                                        <div class="product-image">
                                            <div><img src="{{ asset($book->book_cover) }}" ></div>
                                        </div><!-- Product Single - Gallery End -->

                                    </div>

                                    <div class="col-md-6 product-desc">


                                        <!-- Product Single - Short Description
                                        ============================================= -->
                                        <div class="mb-3">
                                            {{ $book->description }}
                                        </div>
                                        @if(auth()->user())
                                            <div class="line"></div>
                                            <div class="cart mb-0 d-flex justify-content-between">
                                                <form action="{{ route('borrow_book') }}" method="post">
                                                    @csrf
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-6 form-group">
                                                                <label for="login-form-password">Name:</label>
                                                                <input type="text"name="name" class="form-control" value="{{ auth()->user()->name }}" disabled/>
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <label for="login-form-username">Email:</label>
                                                                <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control" disabled/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 form-group">
                                                                <label>Start Date:</label>
                                                                <input type="date" name="start_date" class="form-control" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                                @error('start_date')
                                                                {{ $message }}
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <label>Return Date:</label>
                                                                <input type="date" name="end_date"class="form-control" max="{{ \Carbon\Carbon::now()->addMonth(1)->format('Y-m-d') }}">
                                                                @error('end_date')
                                                                {{ $message }}
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                        <div class="row">
                                                            <button type="submit" class="add-to-cart button m-0">Borrow Now</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif

                                    </div>

                                    <div class="w-100"></div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="sidebar col-lg-2"></div>
                </div>

            </div>
        </div>
    </section>


@endsection
@section('script')
    <script>
        jQuery(document).ready( function(){

            $('.input-daterange').datepicker({
                autoclose: true,
                startDate: "today",
                todayHighlight: true
            });
        });
    </script>
@endsection
