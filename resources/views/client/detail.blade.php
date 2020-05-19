@extends("client.layout.main")
@section("content")
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url({{asset($postDetail->image)}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Single Post</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-details-area">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-xl-8">
                    <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                        <div class="blog-content">
                            <div class="post-meta">
                                <a href="#">{{$postDetail->publish_date}}</a>
                                <a href="archive.html">{{$postDetail->category->name}}</a>
                            </div>
                            <h4 class="post-title">{{$postDetail->title}}</h4>
                            <!-- Post Meta -->
                            <div class="post-meta-2">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$postDetail->view}}</a>

                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$postDetail->comments_count}}</a>
                            </div>

                            <p>{{$postDetail->content}}.</p>

                            <!-- Like Dislike Share -->

                            <!-- Post Author -->
                            <div class="post-author d-flex align-items-center">
                                <div class="post-author-thumb">
                                    <img src="img/bg-img/52.jpg" alt="">
                                </div>
                                <div class="post-author-desc pl-4">
                                    <a href="#" class="author-name">{{$postDetail->user->name}}r</a>
                                    <p>Duis tincidunt turpis sodales, tincidunt nisi et, auctor nisi. Curabitur vulputate sapien eu metus ultricies fermentum nec vel augue. Maecenas eget lacinia est.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix bg-white mb-30 p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>COMMENTS</h5>
                        </div>

                        <ol>
                            <!-- Single Comment Area -->
                            @foreach($postDetail->comments->where('parent',0)->where('is_delete',0)->take(4)  as $comment)
                                <li class="single_comment_area">
                                <!-- Comment Content -->
                                    <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                        <div class="comment-author">
                                            @if(empty($comment->user_id))
                                                <img src="{{asset('images/default.png')}}" alt="author">
                                            @else
                                                <img src="{{asset('client/img/bg-img/53.jpg')}}" alt="author">
                                            @endif
                                        </div>
                                        <!-- Comment Meta -->
                                        <div class="comment-meta">
                                            <a href="#" class="comment-date">{{$comment->created_at}}</a>
                                            @if(empty($comment->user_id))
                                                <h6>{{$comment->name}}</h6>
                                            @else
                                                <h6>{{$comment->user->name}}</h6>
                                            @endif
                                            <p>{{$comment->content}}</p>
                                            <div class="d-flex align-items-center">
                                                <a href="#"  data-toggle="collapse" data-target="#demo{{$comment->id}}" class="reply">Reply</a>
                                                @if(Auth::user()->id == $comment->user_id)
                                                <a href="{{route('detroy-comment',['id' => $comment->id])}}"  class="reply">Xóa</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <ol class="children collapse" id="demo{{$comment->id}}" >
                                        @foreach($postDetail->comments->where('parent', $comment->id)->where('is_delete',0)->take(4) as $co)
                                            <li class="single_comment_area">
                                                    <!-- Comment Content -->
                                                    <div class="comment-content d-flex">
                                                        <!-- Comment Author -->
                                                        <div class="comment-author">
                                                            @if(empty($co->user_id))
                                                                <img src="{{asset('images/default.png')}}" alt="author">
                                                            @else
                                                                <img src="{{asset('client/img/bg-img/54.jpg')}}" alt="author">
                                                            @endif
                                                        </div>
                                                        <!-- Comment Meta -->
                                                        <div class="comment-meta">
                                                            <a href="#" class="comment-date">{{$co->created_at}}</a>
                                                            @if(empty($co->user_id))
                                                            <h6>{{$co->name}}</h6>
                                                            @else
                                                                <h6>{{$co->user->name}}</h6>
                                                            @endif
                                                            <p>{{$co->content}}</p>
                                                            <div class="d-flex align-items-center">
                                                                @if(Auth::user()->id == $co->user_id)
                                                                    <a href="{{route('detroy-reply',['id' => $co->id])}}"  class="reply">Xóa</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                        @endforeach
                                        <div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix">
                                            <!-- Section Title -->
                                            <div class="section-heading">
                                                <h5>Trả lời bình luận</h5>
                                            </div>
                                            <!-- Reply Form -->
                                            <div class="contact-form-area" >
                                                <form action="{{route('replycomment')}}" method="post">
                                                    @csrf
                                                    <input value="{{$postDetail->id}}" hidden name="post_id">
                                                    <input value="{{$comment->id}}"  name="parent" hidden>
                                                    <div class="row">
                                                        @if(Auth::user())
                                                            <input value="{{Auth::user()->id}}" hidden name="user_id">
                                                        @else
                                                            <div class="col-12 col-lg-6">
                                                                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nhập tên *" >
                                                                        @if($errors->first('name'))
                                                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                                                        @endif
                                                                    </div>
                                                            <div class="col-12 col-lg-6">
                                                                        <input type="email" class="form-control" value="{{old('email')}}" name="email" placeholder="Nhập email*" >
                                                                        @if($errors->first('email'))
                                                                            <span class="text-danger">{{$errors->first('email')}}</span>
                                                                        @endif
                                                                    </div>
                                                        @endif
                                                        <div class="col-12">
                                                            <textarea  class="form-control" name="content" cols="30" rows="10" placeholder="Message*" ></textarea>
                                                            @if($errors->first('content'))
                                                                <span class="text-danger">{{$errors->first('content')}}</span>
                                                            @endif
                                                        </div>
                                                            <div class="col-12">
                                                                <button class="btn mag-btn mt-30" type="submit">Gủi</button>
                                                            </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </ol>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                    <!-- Post A Comment Area -->
                    <div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Bình luận</h5>
                        </div>

                        <!-- Reply Form -->
                        <div class="contact-form-area">
                            <form action="{{route('comment')}}" method="post">
                                @csrf
                                <input value="{{$postDetail->id}}" hidden name="post_id">
                                <input value="0" hidden name="parent">

                                <div class="row">
                                    @if(Auth::user())
                                        <input value="{{Auth::user()->id}}" hidden name="user_id">
                                    @else
                                        <div class="col-12 col-lg-6">
                                            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nhập tên *" >
                                            @if($errors->first('name'))
                                                <span class="text-danger">{{$errors->first('name')}}</span>
                                            @endif
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <input type="email" class="form-control" value="{{old('email')}}" name="email" placeholder="Nhập email*" >
                                            @if($errors->first('email'))
                                                <span class="text-danger">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="col-12">
                                        <textarea  class="form-control" name="content" cols="30" rows="10" placeholder="Nhập nội dung bình luận*" >{{old('message')}}</textarea>
                                        @if($errors->first('content'))
                                            <span class="text-danger">{{$errors->first('content')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <button class="btn mag-btn mt-30" type="submit">Gủi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="sidebar-area bg-white mb-30 box-shadow">

                        <!-- Sidebar Widget -->
                        <div class="single-sidebar-widget p-30">
                            <!-- Section Title -->
                            <div class="section-heading">
                                <h5>Danh mục</h5>
                            </div>

                            <!-- Catagory Widget -->
                            <ul class="catagory-widgets">
                                @foreach($category as $cate)
                                    <li><a href="{{route('cate', ['id' => $cate->id])}}"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i>{{$cate->name}}</span> <span>{{$cate->posts_count}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="single-sidebar-widget p-30">
                            <!-- Section Title -->
                            <div class="section-heading">
                                <h5>Tin mới</h5>
                            </div>
                        @foreach($postView as $post)
                            <!-- Single Blog Post -->
                                <div class="single-blog-post d-flex">
                                    <div class="post-thumbnail">
                                        <img src="{{asset($post->image)}}" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="{{route('detail', ['id'=>$post->id])}}}" class="post-title">{{$post->title}}</a>
                                        <p class="emc1">{{$post->summary}}</p>
                                        <div class="post-meta d-flex justify-content-between">
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$post->view}}</a>
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$post->comments_count}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->
@endsection
