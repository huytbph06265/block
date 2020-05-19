@extends("client.layout.main")
@section("content")
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url({{asset($cate->image)}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>{{$cate->name}}</h2>
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

    <!-- ##### Archive Post Area Start ##### -->
    <div class="archive-post-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">

                        <!-- Single Catagory Post -->
                        @foreach($postCate as $post)
                        <div class="single-catagory-post d-flex flex-wrap">
                            <!-- Thumbnail -->
                            <div class="post-thumbnail bg-img" style="background-image: url({{asset($post->image)}});">

                            </div>

                            <!-- Post Contetnt -->
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#">{{$post->publish_date}}</a>
                                </div>
                                <a href="{{route('detail', ['id' => $post->id])}}" class="post-title">{{$post->title}}</a>
                                <!-- Post Meta -->
                                <div class="post-meta-2">
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$post->view}}</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$post->comments_count}}</a>
                                </div>
                                <p>{{$post->summary}}}}</p>
                            </div>
                        </div>
                    @endforeach

                        <!-- Pagination -->
                        <nav>
                            {{ $postCate->links() }}
                        </nav>

                    </div>
                </div>

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
                                        <a href="{{route('detail', ['id' => $post->id])}}" class="post-title">{{$post->title}}</a>
                                        <p class="emc1">{{$post->summary}}</p>
                                        <div class="post-meta d-flex justify-content-between">
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
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
    </div>
@endsection
