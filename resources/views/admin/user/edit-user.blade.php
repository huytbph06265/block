@extends("admin.layout.main")
@section("content")
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <form action="{{route('edit-user-save',['id' => $user->id])}}" enctype="multipart/form-data" method="post" class="m-form m-form--fit m-form--label-align-right">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <!--begin::Portlet-->
                        <div class="m-portlet m-portlet--tab">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide"><i class="la la-gear"></i></span>
                                        <h3 class="m-portlet__head-text">
                                            Thêm thành viên
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">Họ và Tên</label>
                                    <input type="text" class="form-control m-input" value="{{$user->name}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control m-input" value="{{$user->email}}" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control m-input" name="password"  id="exampleInputEmail1" aria-describedby="emailHelp" >
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">RePassword</label>
                                    <input type="password" class="form-control m-input" name="repassword" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                </div>
                                <div class="form-group m-form__group">
                                    <label class="form-control-label">* Communications:</label>
                                    <div class="m-checkbox-inline">
                                        <div class="row">
                                            @foreach($roles as $key => $value)
                                                <div class="col-md-4">
                                                    <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                                        <input type="checkbox" name="roles[]" value="{{$value->id}}"
                                                               @if(in_array($value->name, $user->roles->pluck('name')->toArray()))
                                                               checked
                                                            @endif
                                                        >
                                                        {{$value->name}}
                                                        <span></span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <span class="m-form__help">Please select user communication options</span>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                        <!--end::Portlet-->

                    </div>
                    <div class="col-md-6">
                        <div class="m-portlet m-portlet--tab">
                            <div class="m-portlet__body">
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
                        </div>
                        <!--begin::Portlet-->
                        <!--end::Portlet-->
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
