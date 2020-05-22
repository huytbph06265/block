<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Quản lí</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            @can('post.view')
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-multimedia-1"></i>
                    <span class="m-menu__link-text">Quản lí bài viết</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        @can('post.view')
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{route("list-post")}}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Danh sách bài viết</span>
                            </a>
                        </li>
                        @endcan
                        @can('post.create'))
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{route('add-post')}}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Thêm bài viết</span>
                            </a>
                        </li>
                            @endcan
                    </ul>
                </div></a>
            </li>
            @endcan
            <li class="m-menu__item  m-menu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="{{route("list-comment")}}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-multimedia-1"></i>
                    <span class="m-menu__link-text">Quản lí bình luận </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            @can('user.view')
            <li class="m-menu__item  m-menu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="{{route("list-user")}}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-multimedia-1"></i>
                    <span class="m-menu__link-text">Quản lí thành viên </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            @endcan
            @can('role.view')
            <li class="m-menu__item  m-menu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="{{route("list-role")}}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-multimedia-1"></i>
                    <span class="m-menu__link-text">Quản lí quyền </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            @endcan
            @can('cate.view')
            <li class="m-menu__item  m-menu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="{{route("list-category")}}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-multimedia-1"></i>
                    <span class="m-menu__link-text">Quản lí danh mục </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            @endcan
        </ul>
    </div>

    <!-- END: Aside Menu -->
</div>
