@php
 $categories = \App\Models\Category::all();
@endphp
<header id="header" class="full-header">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <h1 class="mt-1 mb-0">Book4Rent</h1>
                </div><!-- #logo end -->

                <div class="header-misc">

                    <!-- Top Search
                    ============================================= -->
                    <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger"><i class="fa fa-search"></i></a>
                    </div><!-- #top-search end -->

                    <!-- Top Profile
                    ============================================= -->
                    @if(auth()->check())
                        <div class="header-misc-icon d-none d-sm-block">
                            <a href="{{ route('dashboard') }}"><i class="fa fa-user"></i></a>
                        </div><!-- #top-cart end -->
                    @else
                        <ul class="menu-container">
                            <li class="menu-item">
                                <a class="menu-link" href="{{ route('login') }}"><div>SIGN IN</div></a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ route('register') }}"><div>SIGN UP</div></a>
                            </li>
                        </ul>
                    @endif

                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                <nav class="primary-menu">

                    <ul class="menu-container">
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('home') }}"><div>Home</div></a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('about') }}"><div>About</div></a>
                        </li>
                        <li class="menu-item mega-menu">
                            <a class="menu-link" href="#"><div>Categories</div></a>
                            <div class="mega-menu-content">
                                <div class="container">
                                    <div class="row">
                                        @foreach($categories->chunk(7) as $chunk)
                                            <ul class="sub-menu-container mega-menu-column col">
                                                @foreach($chunk as $category)
                                                    <li class="menu-item">
                                                        <a class="menu-link" href="animations.html"><div>{{ $category->name }}</div></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </nav><!-- #primary-menu end -->

                <form class="top-search-form" action="search.html" method="get">
                    <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>
