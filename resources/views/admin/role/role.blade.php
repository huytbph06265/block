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
                    @can('role.view')
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('add-role')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air">
                                    <span><i class="la la-plus"></i><span>Danh sách quyền</span></span>
                                </a>
                            </li>
                            <li class="m-portlet__nav-item"></li>
                        </ul>
                    </div>
                    @endcan
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Moo</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $key => $value)
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$value->name}}</td>
                            <td>
                                @foreach($value->permissions as $per)
                                    {{$per->code}} ||
                                @endforeach</td>
                             <td>@can('role.update')
                                 <span class="dropdown">
                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                        @can('role.update')<a class="dropdown-item "  href="{{route('edit-role', ['id' => $value->id])}}"><i class="la la-edit"></i>Sửa bài viết</a>@endcan
                                        @can('role.delete')<a class="dropdown-item btn-remove" href="javascript:;"linkurl="{{route('detroy-role', ['id' => $key])}}" ><i class="flaticon-delete-2"></i>Xóa</a>@endcan
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
