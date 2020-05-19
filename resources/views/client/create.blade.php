@extends('client.layout.main')
@section('content')

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
            <form action="{{route('create-account')}}" enctype="multipart/form-data" method="post">
            <div class="row justify-content">
                <div class="col-8 col-lg-8">
                    <div class="login-content bg-white p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Tạo tài khoản</h5>
                        </div>
                            @csrf
                            <div class="form-group">
                                <input type="name" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nhập tên!">
                                @if($errors->first('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Nhập email">
                                @if($errors->first('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Nhập mật khẩu">
                                @if($errors->first('password'))
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="repassword" id="exampleInputEmail1" placeholder="Nhập lại mật khẩu">
                                @if($errors->first('repassword'))
                                    <span class="text-danger">{{$errors->first('repassword')}}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn mag-btn mt-30">Tạo mới</button>

                    </div>
                </div>
                <div class="col-4 col-lg-4">
                    <!--begin::Portlet-->
                    <div class="login-content bg-white p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="form-group m-form__group">
                            <img name="picture" id="imageTarget" class="img-responsive" src="{{asset('images/default.png')}}" width="100%" required="" aria-required="true">
                        </div>
                        <div class="form-group m-form__group">
                            <label for="exampleInputPassword1">Ảnh</label>
                            <input type="file" id="image" name="image" class="form-control m-input m-input--square" id="exampleInputPassword1">
                            @if($errors->first('image'))
                                <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
