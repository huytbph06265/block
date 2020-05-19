<header class="header-area">
    <!-- Navbar Area -->
    <div class="mag-main-menu" id="sticker">
        <div class="classy-nav-container breakpoint-off">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="magNav">

                <!-- Nav brand -->
                <a href="index.html" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Nav Content -->
                <div class="nav-content d-flex align-items-center">
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li class="active"><a href="{{route('home')}}">Trang Chủ</a></li>
                                <li><a href="#">Danh Mục</a>
                                    <ul class="dropdown">
                                        @foreach($category as $cate)
                                            <li><a href="{{route('cate',['id'=>$cate->id])}}">{{$cate->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>

                    <div class="top-meta-data d-flex align-items-center">
                        <!-- Top Search Area -->
                        <div class="top-search-area">
                            <form action="index.html" method="post">
                                <input type="search" name="top-search" id="topSearch" placeholder="Search and hit enter...">
                                <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <!-- Login -->
                        @if(Auth::user())
                            <a href="{{route('logout')}}" class="login-btn"><img width="70px" src="{{asset(Auth::user()->image)}}"></a>
                        @else
                        <a href="{{route('sign-in')}}" class="login-btn"><i class="fa fa-user" aria-hidden="true"></i></a>
                            <a href="{{route('create')}}" class="submit-video"><span><i class="fa fa-cloud-upload"></i></span> <span class="video-text">Đăng kí</span></a>
                    @endif
                            <!-- Submit Video -->

                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
