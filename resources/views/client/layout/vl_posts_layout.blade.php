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
    <link href="{{ asset('css/client/content/right_side.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/content/layout_02_page.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/content/introduce.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/content/lv_posts.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/function/images_slider.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/header/banner-01-css.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/items/items.css') }}" rel="stylesheet" />
    <!-- JaveScript -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <!-- You can use open graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    <meta property="og:url"           content="https://www.wootware.co.za/samsung-sl-m2675f-xpress-laser-multifunction-print-scan-copy-fax-mono-printer.html" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Your Website Title" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="https://www.wootware.co.za/media/catalog/product/cache/1/image/1024x768/9df78eab33525d08d6e5fb8d27136e95/2/6/2675fnfinal0.jpg" />

</head>
<body>
    @include('client.nav_and_footer.nav')
    @include('client.nav_and_footer.cover_banner')
    <div class="row" id="container" style="min-height: 500px;padding:0; margin-right:0;">
        @include('client.nav_and_footer.nav_left_side')
        @yield('content')
        @include('client.nav_and_footer.right_side')
    </div>
    <div style="margin-top: 30px;">
        @include('client.nav_and_footer.footer')
    </div>
    @include('client.content.facebook_video_function')
    <script src="{{ asset('js/function/image_slider.js') }}"></script>
    <script src="{{asset('js/banner/skel.min.js')}}"></script>
    <script src="{{asset('js/banner/main.js')}}"></script>
    <script src="{{asset('js/banner/util.js')}}"></script>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
