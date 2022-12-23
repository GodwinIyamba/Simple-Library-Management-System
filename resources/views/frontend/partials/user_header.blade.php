@php
    $current_user = auth()->user();
@endphp

<div class="row">
    <div class="col-12 d-flex">
        <div class="col-7">
            <img src="{{ asset($current_user->profile_photo_path)}}" class="alignleft img-circle img-thumbnail my-0" alt="Avatar" style="max-width: 84px;">

            <div class="heading-block border-0">
                <h3>{{ $current_user->name }}</h3>
                <span>{{ $current_user->email }}</span>
            </div>
        </div>
        <div class="col-1"></div>
        <div class="col-4 d-flex align-center justify-content-center">
            <div class="col-6">
                <a href="{{ route('user_settings') }}" class="button button-3d button-rounded button-black"><i class="fa fa-cogs"></i>Settings</a>
            </div>
            <div class="col-6">
                <form action="{{ route('logout') }}" method="POST" class="col-6 ml-5">
                    @csrf
                    <button class="button button-3d button-rounded button-red"><i class="fa fa-door-open"></i>Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
