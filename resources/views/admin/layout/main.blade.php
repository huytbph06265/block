<!DOCTYPE html>


<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>Metronic | Headers Examples</title>
    <meta name="description" content="Headers datatables examples">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Web font -->
@include("admin.layout.style")
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- BEGIN: Header -->
    @include("admin.layout.header")

    <!-- END: Header -->

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        <!-- BEGIN: Left Aside -->
        @include("admin.layout.side-bar")
        <!-- END: Left Aside -->

        {{-- content--}}

        @yield("content")

        {{-- End content--}}
    </div>

    <!-- end:: Body -->

    <!-- begin::Footer -->
        @include("admin.layout.footer")

    <!-- end::Footer -->
</div>

<!-- end:: Page -->

@include("admin.layout.script")

<!--end::Page Resources -->
</body>

<!-- end::Body -->
</html>
