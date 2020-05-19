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
                    @can('add post')
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a href="{{route('add-post')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air">
                                        <span><i class="la la-plus"></i><span>Thêm bài viết</span></span>
                                    </a>
                                </li>
                                <li class="m-portlet__nav-item"></li>
                            </ul>
                        </div>
                    @endcan
                </div>
                @if (session('add'))
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
                            <th>Danh mục</th>
                            <th>Tác giả</th>
                            <th>Ảnh</th>
                            <th>Tóm Tắt</th>
                            <th>Ngày xuất bản</th>
                            <th>Người tạo</th>
                            <th>View</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($postAll as $key => $value)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$value->title}}</td>
                                <td>{{$value->category->name}}</td>
                                <td>{{$value->user->name}}</td>
                                <td><img src="{{asset($value->image)}}" class="img-thumbnail" width="70px" ></td>
                                <td>{{$value->summary}}</td>
                                <td>{{$value->publish_date}}</td>
                                <td>{{$value->user->name}}</td>
                                <td>{{$value->view}}</td>
                                <td> @can('edit post')
                                        <span class="dropdown">
                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                       <a class="dropdown-item "  href="{{route('edit-post', ['id' => $value->id])}}"><i class="la la-edit"></i>Sửa bài viết</a>@endcan
                                        @can('detroy post') <a class="dropdown-item btn-remove" href="javascript:;"linkurl="{{route('detroy-post', ['id' => $value->id])}}" ><i class="flaticon-delete-2"></i>Xóa</a>@endcan
                                    </div>
                                        @can('detail post')<a href="{{route('detail-post', ['id' => $value->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View"><i class="la la-edit"></i></a>@endcan
                                    </span>
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
