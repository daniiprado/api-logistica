<!-- begin:: Page -->
<div id="app" class="m-grid m-grid--hor m-grid--root m-page">

    <!--[html-partial:include:{"file":"partials\/_header-base.html"}]/-->
    @include('layouts.partials._header-base')

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        <!--[html-partial:include:{"file":"partials\/_aside-left.html"}]/-->
        @include('layouts.partials._aside-left')

        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!--[html-partial:include:{"file":"partials\/_subheader-default.html"}]/-->
            @include('layouts.partials._subheader-default')

            <div class="m-content">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- end:: Body -->

    <!--[html-partial:include:{"file":"partials\/_footer-default.html"}]/-->
    @include('layouts.partials._footer')

</div>
<!-- end:: Page -->

<!--[html-partial:include:{"file":"partials\/_layout-quick-sidebar.html"}]/-->
@include('layouts.partials._layout-quick-sidebar')

<!--[html-partial:include:{"file":"partials\/_layout-scroll-top.html"}]/-->
@include('layouts.partials._layout-scroll-top')

<!--[html-partial:include:{"file":"partials\/_layout-tooltips.html"}]/-->
@include('layouts.partials._layout-tooltips')

