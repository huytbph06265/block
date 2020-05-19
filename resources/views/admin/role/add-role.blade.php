@extends("admin.layout.main")
@section("content")
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <form action="{{route('add-role-save')}}" method="post" class="m-form m-form--fit m-form--label-align-right" >
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
                                    <label for="exampleInputEmail1">Tên quyền</label>
                                    <input type="text" class="form-control m-input" name="role" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <input type="email" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" >
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

                        <!--begin::Portlet-->
                        <div class="m-portlet m-portlet--tab">
                            <div class="m-portlet__body">
                                <div class="col-lg-12 m-form__group-sub">
                                    <label class="form-control-label">* Communications:</label>
                                    <div class="m-checkbox-inline">
                                        <div class="row">
                                            @foreach($permissions as $key => $value)
                                                <div class="col-md-4">
                                                    <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                                        <input type="checkbox" name="permission[]" value="{{$key}}">
                                                        {{$value}}
                                                        <span></span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <span class="m-form__help">Please select user communication options</span>
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
