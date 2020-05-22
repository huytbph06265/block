@extends("admin.layout.main")
@section("content")
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Danh sách bài viết
                            </h3>
                        </div>
                    </div>
                    @can('post.create')
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <button id="create_post" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air">
                                    <span><i class="la la-plus"></i><span>Thêm bài viết</span></span>
                                </button>
                            </li>
                            <li class="m-portlet__nav-item"></li>
                        </ul>
                    </div>
                    @endcan
                </div>
                    <div class="alert alert-success" role="alert" id="msg">

                    </div>

                <div class="m-portlet__body">
                    <!--begin: Datatable -->

                    <table class="table table-striped- table-bordered table-hover table-checkable" id="table_post">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Danh mục</th>
                            <th>Tác giả</th>
                            <th>Ảnh</th>
                            <th>Tóm Tắt</th>
                            <th>Ngày xuất bản</th>
                            <th>View</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="formModal">
                <div class="modal-dialog modal-lg" style="width:1250px;">>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm bài viết</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;
                            </button>
                        </div>
                        <div class="modal-body">
                            <span id="success"></span>
                            <form action="" enctype="multipart/form-data" id="form_post" method="post">
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
                                                    <input type="text" name="title" class="form-control m-input" id="title" aria-describedby="emailHelp"  placeholder="nhập tiêu đề">
                                                    @if($errors->first('title'))
                                                        <span class="text-danger">{{$errors->first('title')}}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleSelect1">Danh mục</label>
                                                    <select class="form-control m-input" name="cate_id" >
                                                        @foreach($cateAll as $cate)
                                                            <option id="cate" value="{{$cate->id}}">{{$cate->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleSelect1">Tác giả</label>
                                                    <select class="form-control m-input" name="user_id" >
                                                        @foreach($userAll as $key => $value)
                                                            <option id="author" value="{{$key}}">{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group m-form__group">
                                                    <input type="date" class="form-control m-input" id="publish_date" name="publish_date"  placeholder="Ngày xuất bản">
                                                    @if($errors->first('publish_date'))
                                                        <span class="text-danger">{{$errors->first('publish_date')}}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group m-form__group">
                                                    <label for="exampleTextarea">Tóm tắt</label>
                                                    <textarea class="form-control m-input" name="summary" id="summary" rows="7"></textarea>
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
                                                    <img name="picture" id="h" class="img-responsive" src="{{asset('images/default.png')}}" width="100%" required="" aria-required="true">
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
                                                        <textarea name="content" id="content" class="form-control" data-provide="markdown" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input hidden name="action" id="action" />
                                <input hidden name="hidden_id" id="hidden_id" />
                                <div class="modal-footer">
                                    <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection
@section("script")
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection
