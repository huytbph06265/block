@extends("admin.layout.main")
@section("content")
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <form action="{{route('add-post-save')}}" method="post" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <!--begin::Portlet-->
                        <div class="m-portlet m-portlet--tab">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide"><i class="la la-gear"></i></span>
                                        <h3 class="m-portlet__head-text">Thêm thành viên</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" name="title" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('title')}}" placeholder="nhập tiêu đề">
                                    @if($errors->first('title'))
                                        <span class="text-danger">{{$errors->first('title')}}</span>
                                    @endif
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="exampleSelect1">Danh mục</label>
                                    <select class="form-control m-input" name="cate_id" id="exampleSelect1">
                                        @foreach($cateAll as $cate)
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="exampleSelect1">Tác giả</label>
                                    <select class="form-control m-input" name="user_id" id="exampleSelect1">
                                        @foreach($userAll as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group m-form__group">
                                    <input type="date" class="form-control m-input" id="exampleInputPassword1" name="publish_date" value="{{old('publish_date')}}" placeholder="Ngày xuất bản">
                                    @if($errors->first('publish_date'))
                                        <span class="text-danger">{{$errors->first('publish_date')}}</span>
                                    @endif
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="exampleTextarea">Tóm tắt</label>
                                    <textarea class="form-control m-input" name="summary" id="exampleTextarea" rows="7">{{old('summary')}}</textarea>
                                    @if($errors->first('summary'))
                                        <span class="text-danger">{{$errors->first('summary')}}</span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <!--end::Portlet-->

                    </div>
                    <div class="col-md-6">
                        <!--begin::Portlet-->
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

                        <!--end::Portlet-->
                    </div>
                    <div class="col-md-12">
                        <div class="m-portlet m-portlet--tab">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <textarea name="content" class="form-control" data-provide="markdown" rows="10">{{old('content')}}</textarea>
                                        @if($errors->first('content'))
                                            <span class="text-danger">{{$errors->first('content')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
