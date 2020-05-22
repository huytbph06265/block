@extends("admin.layout.main")
@section("content")
@can('home admin')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">Dashboard</h3>
                </div>
                <div>
                    <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                        <span class="m-subheader__daterange-label">
                            <span class="m-subheader__daterange-title"></span>
                            <span class="m-subheader__daterange-date m--font-brand"></span>
                        </span>
                        <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--square">
                            <i class="la la-angle-down"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin:: Widgets/Stats-->
            <div class="m-portlet  m-portlet--unair">
                <div class="m-portlet__body  m-portlet__body--no-padding">
                    <div class="row m-row--no-padding m-row--col-separator-xl">
                        <div class="col-md-12 col-lg-6 col-xl-3">

                            <!--begin::Total Profit-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Tổng bài viết
                                    </h4>
                                    <br>
                                    <span class="m-widget24__desc">Tổng Bài viết</span>
                                    <span class="m-widget24__stats m--font-brand">{{count($post)}}</span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                        <div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="m-widget24__change">Change</span>
                                    <span class="m-widget24__number">78%</span>
                                </div>
                            </div>

                            <!--end::Total Profit-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">

                            <!--begin::New Feedbacks-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">Tổng bình luận</h4>
                                    <br>
                                    <span class="m-widget24__desc">Customer Review</span>
                                    <span class="m-widget24__stats m--font-info">
													{{count($comment)}}
												</span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                        <div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="m-widget24__change">
													Change
												</span>
                                    <span class="m-widget24__number">
													{{$range}}%
												</span>
                                </div>
                            </div>

                            <!--end::New Feedbacks-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">

                            <!--begin::New Orders-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Tổng danh mục
                                    </h4>
                                    <br>
                                    <span class="m-widget24__desc">
													Fresh Order Amount
												</span>
                                    <span class="m-widget24__stats m--font-danger">
													{{count($user)}}
												</span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                        <div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="m-widget24__change">
													Change
												</span>
                                    <span class="m-widget24__number">
													69%
												</span>
                                </div>
                            </div>

                            <!--end::New Orders-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">

                            <!--begin::New Users-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Tổng thành viên
                                    </h4>
                                    <br>
                                    <span class="m-widget24__desc">
													Joined New User
												</span>
                                    <span class="m-widget24__stats m--font-success">
													{{count($category)}}
												</span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                        <div class="progress-bar m--bg-success" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="m-widget24__change">
													Change
												</span>
                                    <span class="m-widget24__number">
													90%
												</span>
                                </div>
                            </div>

                            <!--end::New Users-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcan

@endsection
