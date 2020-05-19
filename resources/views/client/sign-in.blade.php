@extends("client.layout.main")
@section("content")
    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Login</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <div class="mag-login-area py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="login-content bg-white p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Great to have you back!</h5>
                        </div>
                        @if(session('msg'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{session('msg')}}</strong>
                            </div>
                        @endif
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <input value="0" hidden name="is_delete">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email or User Name">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            <button type="submit" class="btn mag-btn mt-30">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
