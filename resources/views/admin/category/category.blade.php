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
                    @can('cate.create')
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('add-category')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air">
                                    <span><i class="la la-plus"></i><span>Thêm danh mục</span></span>
                                </a>
                            </li>
                            <li class="m-portlet__nav-item"></li>
                        </ul>
                    </div>
                    @endcan
                </div>
                @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                        <strong>Well done!</strong> You successfully read this important alert message.
                    </div>
                @endif
                <div class="m-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Số lượng bài viết</th>
                            <th>Ảnh</th>
                            <th>Mô tả</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $key => $value)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->posts_count}}</td>
                                <td><img src="{{asset($value->image)}}" class="img-thumbnail" width="70px" ></td>
                                <td>{{$value->description}}</td>
                                <td>@can('post.update')
                                    <span class="dropdown">
                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @can('cate.update')<a class="dropdown-item"  href="{{route('edit-category', ['id' => $value->id])}}"><i class="la la-edit"></i>Sửa bài viết</a>@endcan
                                        @can('cate.delete')<a class="dropdown-item" href="{{route('detroy-category', ['id' => $value->id])}}"><i class="flaticon-delete-2"></i>Xóa</a>@endcan
                                    </div>
                                    </span>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection
