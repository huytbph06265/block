@extends("client.layout.main")
@section("content")
    <section class="mag-posts-area d-flex flex-wrap">

        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Left Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">
            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Tiêu điểm</h5>
                </div>

                <!-- Single Blog Post -->
                @foreach($postView as $post)
                    <div class="single-blog-post d-flex">
                        <div class="post-thumbnail">
                            <img src="{{asset($post->image)}}" alt="">
                        </div>
                        <div class="post-content">
                            <a href="{{route('detail', ['id' => $post->id])}}" class="post-title">{{$post->title}}</a>
                            <div class="post-meta d-flex justify-content-between">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$post->view}}</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$post->comments_count}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Single Blog Post -->
            </div>

            <!-- Sidebar Widget -->

        </div>
        <!-- >>>>>>>>>>>>>>>>>>>>
             Main Posts Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">
            <!-- Trending Now Posts Area -->
            <div class="trending-now-posts mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>TRENDING NOW</h5>
                </div>

                <div class="trending-post-slides owl-carousel">
                    <!-- Single Trending Post -->
                    @foreach($category as $cate)
                        <div class="single-trending-post">
                            <img src="{{asset($cate->image)}}" alt="">
                            <div class="post-content">
                                <a href="{{route('cate', ['id' => $cate->id])}}" class="post-cata">{{$cate->name}}</a>
                                <a href="#" class="post-title">{{$cate->description}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Sports Videos -->
            @foreach($postMain as $post)
            @if(count($post->posts) >= 1)
            <div class="sports-videos-area">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>{{$post->name}}</h5>
                </div>

                <div class="sports-videos-slides owl-carousel mb-30">
                    <!-- Single Featured Post -->
                    @foreach($post->posts as $post1)
                        <div class="single-featured-post">
                        <!-- Thumbnail -->
                        <div class="post-thumbnail mb-50">
                            <img src="{{asset($post1->image)}}" alt="">
                        </div>
                        <!-- Post Contetnt -->
                        <div class="post-content">
                            <div class="post-meta">
                                <span>{{$post1->publish_date}}</span>
                                <a href="{{route('cate', ['id' => $post1->category->id])}}">{{$post1->category->name}}</a>
                            </div>
                            <a href="{{route('detail', ['id' => $post1->id])}}" class="post-title">{{$post1->title}}</a>
                            <p>{{$post1->summary}}</p>
                        </div>
                        <!-- Post Share Area -->
                        <div class="post-share-area d-flex align-items-center justify-content-between">
                            <!-- Post Meta -->
                            <div class="post-meta pl-3">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$post1->view}}</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{count($post1->comments)}}</a>
                            </div>
                            <!-- Share Info -->
                        </div>
                    </div>
                    @endforeach
                    <!-- Single Featured Post -->

                </div>
                <div class="row">
                    @foreach($post->posts as $post1)
                        <!-- Single Blog Post -->
                        <div class="col-12 col-lg-6">
                            <div class="single-blog-post d-flex style-3 mb-30">
                                <div class="post-thumbnail">
                                    <img src="{{asset($post1->image)}}" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="{{route('detail', ['id' => $post1->id])}}" class="post-title">{{$post1->title}}</a>
                                    <p class="emc">{{$post1->summary}}</p>
                                    <div class="post-meta d-flex">

                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>{{$post1->view}}</a>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($post1->comments)}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
                @endif
            @endforeach
        </div>
        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Right Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="post-sidebar-area right-sidebar mt-30 mb-30 box-shadow">

            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Danh mục</h5>
                </div>

                <!-- Catagory Widget -->
                <ul class="catagory-widgets">
                    @foreach($category as $cate)
                        @if($cate->posts_count >= 1)
                            <li><a href="{{route('cate', ['id' => $cate->id])}}"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i>{{$cate->name}}</span> <span>{{$cate->posts_count}}</span></a></li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Tin mới</h5>
                </div>

                @foreach($postNew as $post)
                <!-- Single Blog Post -->
                    <div class="single-blog-post d-flex">
                        <div class="post-thumbnail">
                            <img src="{{asset($post->image)}}" alt="">
                        </div>
                        <div class="post-content">

                            <a href="{{route('detail', ['id' => $post->id])}}" class="post-title">{{$post->title}}</a>
                            <p class="emc1">{{$post->summary}}</p>
                            <div class="post-meta d-flex justify-content-between">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>{{$post->view}}</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$post->comments_count}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>

            <!-- Sidebar Widget -->
        </div>
    </section>
@endsection
