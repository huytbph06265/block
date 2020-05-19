@extends("admin.layout.main")
@section("content")
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet__body">
                <div class="m-widget19">
                    <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                        <img src="{{asset($post->image)}}" alt="">
                        <h3 class="m-widget19__title m--font-light">
                            {{$post->title}}
                        </h3>
                        <div class="m-widget19__shadow"></div>
                    </div>
                    <div class="m-widget19__content">
                        <div class="m-widget19__header">
                            <div class="m-widget19__user-img">
                                <img class="m-widget19__img" src="assets/app/media/img//users/user1.jpg" alt="">
                            </div>
                            <div class="m-widget19__info">
                                <span class="m-widget19__username">{{$post->user->name}}</span>
                                <br>
                                <span class="m-widget19__time">{{$post->category->name}}</span>
                            </div>
                            <div class="m-widget19__stats">
                                <span class="m-widget19__number m--font-brand">{{$post->comments_count}}</span>
                                <span class="m-widget19__comment">Comments</span>
                            </div>
                        </div>
                        <div class="m-widget19__body">
                            {{$post->content}}
                        </div>
                    </div>
                    <div class="m-widget19__action">
                        <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">Read More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
