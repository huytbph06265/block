@extends("admin.layout.main")
@section("content")
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Danh sách bình luận
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="#" data-toggle="collapse" data-target="#demo"  class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air reply">
                                    <span><i class="la la-plus"></i><span>Trả lời bình luận</span></span>
                                </a>
                            </li>
                            <li class="m-portlet__nav-item">
                                <a href="{{route('list-comment')}}"   class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air">
                                    <span><span>trở về</span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr style="font-weight: bold;font-size: 120%;">
                            <th>STT</th>
                            <th>Sản phẩm</th>
                            <th>người đánh giá</th>
                            <th>nội dung</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr style="background: #4bb1b1">
                                <td></td>
                                <td>{{$comment->post->title}}</td>
                                @if(empty($comment->user_id))
                                    <td>{{$comment->name}}</td>
                                @else
                                    <td>{{$comment->user->name}}</td>
                                @endif
                                <td>{{$comment->content}}</td>
                            </tr>
                        @foreach($replyComment as $key =>$value)
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
                                        <a class="dropdown-item" href="{{route('detroy-reply', ['id' => $value->id])}}"><i class="flaticon-delete-2"></i>Xóa</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix collapse" id="demo">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Trả lời bình luận</h5>
                        </div>

                        <!-- Reply Form -->
                        <div class="contact-form-area" >
                            <form action="{{route('reply-comment', ['id' => $comment->id])}}" method="post">
                                @csrf
                                <input value="{{$comment->post_id}}" hidden name="post_id">
                                <input value="{{$comment->id}}" hidden name="parent">
                                <input value="1" hidden name="user_id">
                                <div class="col-12">
                                    <textarea  class="form-control" name="message" cols="30" rows="10" placeholder="Message*" >{{old('message')}}</textarea>
                                    @if($errors->first('message'))
                                        <span class="text-danger">{{$errors->first('message')}}</span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <button class="btn mag-btn mt-30" type="submit">Gủi</button>
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
