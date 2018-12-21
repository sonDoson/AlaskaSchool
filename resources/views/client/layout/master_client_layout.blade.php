<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <title>Alaskaschool</title>
    <link rel="shortcut icon" href="{{ asset('/uploads/logo/icon/logo_icon_color_1.png')}}" />
    <!-- Fonts -->
    <link href="{{asset('css/font_awesome/fontawesome-free-5.3.1-web')}}/css/all.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('bootstrap/css/bootstrap-grid.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/resetCss.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/footer/footer.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/header/header.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/header/banner_01.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/content/left_side.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/content/introduce.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/content/layout_02_page.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/content/lv_category.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/header/banner-01-css.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/items/items.css') }}" rel="stylesheet" />
    <!-- JaveScript -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

</head>
<body>
    @include('client.nav_and_footer.nav')
    @include('client.nav_and_footer.cover_banner')
    <div class="row" id="container" style="padding:0; margin-right:0;">
        @include('client.nav_and_footer.nav_left_side')
        @yield('content')
    </div>
    <!--new elements - deleted-->
    <div style="margin-top: 30px;">
        @include('client.nav_and_footer.footer')
    </div>

    <script src="{{ asset('js/function/introduce_slider.js') }}"></script>
    <script src="{{asset('js/banner/skel.min.js')}}"></script>
    <script src="{{asset('js/banner/main.js')}}"></script>
    <script src="{{asset('js/banner/util.js')}}"></script>
</body>
</html>
