@extends("admin.layout.main")
@section("content")
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <a href="{{route('homeAdmin')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air">
            <span><i class="la la-plus"></i><span>Trang chủ</span></span>
        </a>
        <div class="m-grid__item m-grid__item--fluid m-grid  m-error-1" style="background-image: url({{asset('admin/assets/app/media/img//error/bg1.jpg')}});">
            <div class="m-error_container">
                <span class="m-error_number">
                    <h1>403</h1>
                </span>
                <p class="m-error_desc">User does not have the right permissions.</p>
            </div>
        </div>
    </div>
@endsection
