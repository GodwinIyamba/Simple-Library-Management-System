@extends('frontend.layout')
@section('main')
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row clearfix">
                    @include('frontend.partials.user_header')
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card shadow-sm">
                                <div class="card-header">
                                    <h4 class="mb-0">Profile Information Update</h4>
                                </div>
                                <div class="card-body">
                                    <form class="mb-0" action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <div class="row">
                                                <div class="col-12 bottommargin-sm">
                                                    <label>Name<small class="text-danger">*</small></label>
                                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control required" placeholder="Enter your Full Name" />
                                                </div>

                                                <div class="col-12 bottommargin-sm">
                                                    <label>Email Address<small class="text-danger">*</small></label>
                                                    <input type="email" name="email" class="form-control required" value="{{ $user->email }}" placeholder="user@email.com">
                                                </div>

                                                <div class="col-12 bottommargin-sm" >
                                                    <label>Profile Photo:</label><br>
                                                    <input type="file" name="profile_photo" style="width: 100%; padding: 0.275rem 0.65rem; border: 1px solid #ced4da; border-radius: 3px;">
                                                </div>

                                                <div class="col-12 bottommargin-sm">
                                                    <label for="template-contactform-message">Textarea:<small class="text-danger">*</small></label>
                                                    <textarea class="required form-control textarea-message" name="about_me" rows="6" cols="30">{{ $user->about_me }}</textarea>
                                                </div>
                                                    <button type="submit" class="button button-rounded button-black" style="width: 95%; margin: auto;">SUBMIT</button>

                                            </div>

                                        </form>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-2"></div>
            </div>
        </div>
    </section>
@endsection
