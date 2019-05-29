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
    <link href="{{ asset('css/client/header/header.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/footer/footer.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/content/introduce.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/items/items.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/function/introduce_slider.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/client/function/banner.css') }}" rel="stylesheet" />
    <!-- JaveScript -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

</head>
<body>
    <header>
        <div id="mobile-nav" style="z-index: 10;width: 100%; height: 40px; background-color: #a6196f; position: fixed;" >
            <div id="mobile-container" style="width: 90%; height: 100%; display: table; margin: 0 auto;">
                <div style="display:inline-block" >
                <form method="GET" action="/search">
                  <input id="search-box" type="text" name="search" placeholder="Search...">
                </form>
                </div>
                <div class="logo-mobile" style="width: 170px; height: 40px;position:absolute;
                top:0;left: 50%; margin-left: -85px; background-position: center;background-repeat: no-repeat;
                background-size: 165px auto; z-index: -1;
                background-image:url({{ asset('uploads/logo/logo_longtext.png') }});"></div>
                <a href="/"><div class="logo-mobile" style="width: 170px; height: 40px;position:absolute;
                top:0;left: 50%; margin-left: -85px; opacity: 0;
                background-size: 180px auto; }});"></div></a>
                <div style="display:inline-block;width: 40px; height: auto; float: right;">
                    <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i style="margin-left: 5px; margin-top: 7px; color: #fff; font-size: 0.9em" class="fas fa-bars"></i></span>
                </div>
            </div>
            <div id="mySidenav" class="sidenav">
                
                <form class="lang-button" method="POST" action="/Switch_Language">
                    {{ csrf_field() }}
                    <input type="hidden" id="session-language" value="{{ $lang_section }}">
                    <label class="switch"><input class="checkbox-language" type="checkbox" name="switch_lang" id="togBtn"><div class="slider round"><!--ADDED HTML --><span class="on">Vn</span><span class="off">En</span><!--END--></div></label>
                </form>
                <a class="nav_360" style="width: 250px;" id="nav_360"  href="{{ '/360-alaska' }}">{{ $static_text[6][6][$lang[1]] }}</a>
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                @for($i = 1; $i <= 5; $i++)
                    <a style="width: 250px;" id="{{ 'nav_' . $i }}" href="{{ '/cat/' . $i }}">{{ $category[$i][$lang[0]] }}</a>
                @endfor
                <a style="width: 250px;" id="nav_contact"  href="{{ '/contact' }}">{{ $contact[$lang[0]] }}</a>
            </div>
        </div>
        
        
        <div class="container-nav" id="cover-left">
        </div>
        <div class="container-nav menu-wrap">
            <a href="/">
                <div class="logo" style="background-image:url({{ asset('uploads/logo/logo02.png') }});">
                </div>
            </a>
            <div class="nav-wrap">
                <nav class="container" id="nav-top" style="" >
                    @for($i = 4; $i <= 5; $i++)
                        <a id="{{ 'nav_' . $i }}" class="{{ 'nav_' . $i }} col-lg-2" style="padding-left: 0 !important;"  href="{{ '/cat/' . $i }}">{{ $category[$i][$lang[0]] }}</a>
                    @endfor
                    <a id="nav_contact" class="nav_contact col-lg-3" href="{{ '/contact' }}">{{ $contact[$lang[0]] }}</a>
                        
                    <form class="col-lg-3" id="nav-search" method="GET" action="/search" style="display: inline-block;">
                        <input type="text" name="search" />
                    </form>
                </nav>
                <form class="lang-button" method="POST" action="/Switch_Language">
                    {{ csrf_field() }}
                    <input type="hidden" id="session-language" value="{{ $lang_section }}">
                    <label class="switch"><input class="checkbox-language" type="checkbox" name="switch_lang" id="togBtn"><div class="slider round"><!--ADDED HTML --><span class="on">Vn</span><span class="off">En</span><!--END--></div></label>
                </form>
                <nav class="container" id="nav-bottom">
                    <a class="nav_360 col-lg-3" style="width: 250px;" id="nav_360"  href="{{ '/360-alaska' }}"><b>{{ $static_text[6][6][$lang[1]] }}</b></a>
                    @for($i = 1; $i <= 3; $i++)
                    <a class="{{ 'nav_' . $i }} col-lg-3" id="{{ 'nav_' . $i }}" href="{{ '/cat/' . $i }}"><b>{{ $category[$i][$lang[0]] }}</b></a>
                    @endfor
                </nav>
            </div>
        </div>
    </header>
    <div style="wdith: 100%; height: 50vh; padding-top: 20vh">
    <p style="font-size: 4em; font-family: 'Satisfy', cursive;text-align: center">Thank you! We will make contact with you soon!</p>
    </div>
    <footer>
        <div class="row section">
            <div id="footer-left" class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3" style="margin-bottom: 30px;">
                <div id="footer-left-img">
                    <img src="{{ asset('uploads/logo/logo02.png') }}" alt="alaska school" width="auto" height="100%" />
                </div>
                <!-- form deleted -->
                <br>
                <br>
                <div id="footer-text" >
                    <div>
                        <h4>{{ $static_text[2][2][$lang[1]] }}:</h4>
                        <p>Ad: {!! $contact['address'] !!}</p>
                        <p>T: {!! $contact['phone'] !!} | F: {!! $contact['fax'] !!}</p>
                        <p>E: {!! $contact['email'] !!}</p>
                    </div>
                    <div id="footer-left-conect" >
                        <br>
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2';
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="fb-like" data-href="https://www.facebook.com/alaska.edu.vn/" 
                            width="280px"
                            data-layout="standard" data-action="like" data-size="small" 
                            data-show-faces="true" data-share="true"></div>
                    </div>
                </div>
            </div>
            <div id="footer-mid" class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" style="margin-bottom: 30px;">
                <iframe {!! $contact['map'] !!} width="100%" height="300px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <!--text-->
            <div id="footer-right" class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="row" style="width: 100%; height: 100%;margin: 0" >
                    {!! $contact['footer_text'][$lang[1]] !!}
                </div>
            </div>
        </div>
    </footer>
    <script>
    setTimeout(function(){window.history.back();}, 10000);
    </script>
</body>
</html>
