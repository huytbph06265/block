@extends("admin.layout.main")
@section("content")
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <form action="{{route('edit-category-save', ['id'=>$category->id])}}" method="post" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
                @csrf
                <div class="row">
                    <div class="col-md-7">
                        <!--begin::Portlet-->
                        <div class="m-portlet m-portlet--tab">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide"><i class="la la-gear"></i></span>
                                        <h3 class="m-portlet__head-text">Thêm danh mục</h3>
                                    </div>
                                </div>
                            </div>
                            <input value="1" name="user_id" hidden>
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" name="name" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" value="{!! old('name', $category->name)!!}" placeholder="nhập tiêu đề">
                                    @if($errors->first('name'))
                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="exampleTextarea">Tóm tắt</label>
                                    <textarea class="form-control m-input" name="description" id="exampleTextarea" rows="10">{!! old('description', $category->description)!!}}</textarea>
                                    @if($errors->first('description'))
                                        <span class="text-danger">{{$errors->first('description')}}</span>
                                    @endif
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
                    <div class="col-md-5">
                        <!--begin::Portlet-->
                        <div class="m-portlet m-portlet--tab">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <img name="image" id="imageTarget" class="img-responsive" src="{{asset($category->image)}}" width="100%" required="" aria-required="true">
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
                </div>
            </form>
        </div>
    </div>
@endsection
