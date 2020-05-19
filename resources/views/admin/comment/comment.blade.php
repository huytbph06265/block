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
                            <th>Sản phẩm</th>
                            <th>người đánh giá</th>
                            <th>nội dung</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $key =>$value)
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$value->post->title}}</td>
                            @if(empty($value->user_id))
                                <td>{{$value->name}}</td>
                            @else
                                <td>{{$value->user->name}}</td>
                            @endif
                            <td>{{$value->content}}</td>
                            <td><span class="dropdown">
                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item"  href="{{route('list-reply', ['id' => $value->id])}}"><i class="la la-edit"></i>Trả lời</a>
                                        <a class="dropdown-item" href="{{route('detroy-comment', ['id' => $value->id])}}"><i class="flaticon-delete-2"></i>Xóa</a>
                                    </div>
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
