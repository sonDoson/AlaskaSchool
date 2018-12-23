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
                <form id="lang-button" method="POST" action="/Switch_Language">
                    {{ csrf_field() }}
                    <input type="hidden" id="session-language" value="{{ $lang_section }}">
                    <label class="switch"><input class="checkbox-language" type="checkbox" name="switch_lang" id="togBtn"><div class="slider round"><!--ADDED HTML --><span class="on">Vn</span><span class="off">En</span><!--END--></div></label>
                </form>
                <nav class="container" id="nav-bottom">
                    @for($i = 1; $i <= 3; $i++)
                    <a class="{{ 'nav_' . $i }} col-lg-4" id="{{ 'nav_' . $i }}" href="{{ '/cat/' . $i }}"><b>{{ $category[$i][$lang[0]] }}</b></a>
                    @endfor
                </nav>
            </div>
        </div>
    </header>
    <section class="banner full">
            @if(!empty($section_1[key($section_1)]))
            @if(sizeof($section_1[key($section_1)]) <= 4)
            @for($i=0; $i < sizeof($section_1[key($section_1)]); $i++)
            <article>
            <a href="{!! '/cat/' . $section_1[key($section_1)][$i]['id_category']. '/' . $section_1[key($section_1)][$i]['id'] !!}">
                <img src="{{ $section_1[key($section_1)][$i]['images'][0] }}" alt="" width="100%" height="auto" />
            </a>
            </article>
            @endfor
            @else
            @for($i=0; $i < 4; $i++)
            <article>
            <a href="{!! '/cat/' . $section_1[key($section_1)][$i]['id_category']. '/' . $section_1[key($section_1)][$i]['id'] !!}">
                <img src="{{ $section_1[key($section_1)][$i]['images'][0] }}" alt="" width="100%" height="auto" />
            </a>
            </article>
            @endfor
            @endif
            @endif
    </section>
    <!--div id="header-cover" style="background-image:url({{ asset('uploads/cover/cover_introduce.png') }})">
    </div-->
    <div class="content">
        <!--SECTION 0--> <!--deleted-->
        <!--SECTION 1--> <!--short-item deleted-->
        
        <div class="section" id="section-1">
            <div class="title">
                <h2 style="display: inline-block;">{{ $category[4][$lang[0]] }}</h2>
                <p style="display: inline-block"><a href="/cat/4">| xem tất cả</a></p>
            </div>
            <div class="big-news row" style="width: auto;padding: 0px!important;margin-left:0;">
            @if(!empty($section_1[key($section_1)]))
            @if(sizeof($section_1[key($section_1)]) <= 4)
            @for($i=0; $i < sizeof($section_1[key($section_1)]); $i++)
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 ml-0" style="padding-left: 0; margin-bottom: 20px;">
                <a style="color: #000" href="{!! '/cat/' . $section_1[key($section_1)][$i]['id_category']. '/' . $section_1[key($section_1)][$i]['id'] !!}">
                <div class="big-news-item">
                    <div class="big-news-item-image" style="background-image:url({{ $section_1[key($section_1)][$i]['images'][0] }})"></div>
                    <div class="big-news-item-content font-resize">
                        <h4>{!! $section_1[key($section_1)][$i][$lang[0]] !!}</h4>
                        <div class="big-news-item-content-text">
                            <p>{!! $section_1[key($section_1)][$i][$lang[2]] !!}</p>
                        </div>
                        <p>{!! $section_1[key($section_1)][$i]['created_at']['string'] !!}</p>
                    </div>
                </div>
                </a>
                </div>
            @endfor
            @else
            @for($i=0; $i < 4; $i++)
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 ml-0" style="padding-left: 0; margin-bottom: 20px;">
                <a style="color: #000" href="{!! '/cat/' . $section_1[key($section_1)][$i]['id_category']. '/' . $section_1[key($section_1)][$i]['id'] !!}">
                <div class="big-news-item">
                    <div class="big-news-item-image" style="background-image:url({{ $section_1[key($section_1)][$i]['images'][0] }})"></div>
                    <div class="big-news-item-content font-resize">
                        <h4>{!! $section_1[key($section_1)][$i][$lang[0]] !!}</h4>
                        <div class="big-news-item-content-text">
                            <p>{!! $section_1[key($section_1)][$i][$lang[2]] !!}</p>
                        </div>
                        <p style="margin-top: 10px;">{!! $section_1[key($section_1)][$i]['created_at']['string'] !!}</p>
                    </div>
                </div>
                </a>
                </div>
            @endfor
            @endif
            @endif
            </div>
        </div>
        
        <!--SECTION 2-->
        
        <div id="back-section-2">
            <div class="smoke-slider smoke-slider-left">
            </div>
            <div class="smoke-slider smoke-slider-right">
            </div>
            <div class="btn-slider btn-slider-left">
            </div>
            <div class="btn-slider btn-slider-right">
            </div>
            <div class="wrap-section-2">
                <div class="title">
                    <h2 style="display: inline-block;">{{ $static_text[1][1][$lang[1]] }}</h2>
                </div>
            </div>
            @if(!empty($section_2))
            <div class="wrap-section-2-slider">
            <div class="section-2-slider" style="width: {{ sizeof($section_2) * 240 + 10}}px !important;" value="{{ sizeof($section_2) }}">
                
                @foreach($section_2 as $key => $value)
                <a href="{{ '/cat/' . $value['id_category'] . '/' . $value['id'] }}">
                <div class="section-2-slider-item" style="color: #000;">
                    <div class="section-2-slider-image" style="overflow: hidden;">
                        <img src="{{ $value['images'][0] }}" width="auto" height="100%" />
                    </div>
                    <div class="section-2-slider-text font-resize">
                        <div class="section-2-slider-text-top">
                            <h4>{{ $value[$lang[0]] }}</h4>
                                {!! $value[$lang[2]] !!}
                        </div>
                        <div class="section-2-slider-text-extend">
                            <p>{!! $value['created_at']['string'] !!}</p>
                        </div>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
            </div>
            @endif
        </div>
        <!--SECTION 3--> <!--short-item deleted-->
        
        <div class="section" id="section-3">
            <div class="section-3 row" style="width: auto;padding: 0px!important;margin-left:0;">
            @foreach($section_3[0] as $key => $value)
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 ml-0" style="padding-left: 0; margin-bottom: 20px;">
                <a style="color: #000" href="{{ asset('/static-posts?id=') . $key }}">
                <div class="section-3-item">
                    <h4>&nbsp;&nbsp;{!! $value[$lang[0]] !!}</h4>
                    <div class="section-3-item-image" style="background-image:url({{ $value['image'] }})"></div>
                    <div class="section-3-item-content font-resize">
                        <div class="section-3-item-content-text">
                            <p>{!! $value['subtitle_vn'] !!}</p>
                        </div>
                    </div>
                </div>
                </a>
                </div>
            @endforeach
            @foreach($section_3[1] as $key => $value)
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 ml-0" style="padding-left: 0; margin-bottom: 20px;">
                <a style="color: #000" href="{{ asset('/form?id=') . $key }}">
                <div class="section-3-item">
                    <h4>&nbsp;&nbsp;{!! $value[$lang[0]] !!}</h4>
                    <div class="section-3-item-image" style="background-image:url({{ $value['image'] }})"></div>
                    <div class="section-3-item-content font-resize">
                        <div class="section-3-item-content-text">
                            <p>{!! $value['subtitle_vn'] !!}</p>
                        </div>
                    </div>
                </div>
                </a>
                </div>
            @endforeach
            </div>
        </div>
    </div>

    <footer>
        <div class="row section">
            <div id="footer-left" class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div id="footer-left-img">
                    <img src="{{ asset('uploads/logo/logo02.png') }}" alt="alaska school" width="auto" height="100%" />
                </div>
                <!-- form deleted -->
                <br>
                <br>
                <div id="footer-text">
                    <div>
                        <h4>{{ $static_text[2][2][$lang[1]] }}:</h4>
                        <p>Ad: {!! $contact['address'] !!}</p>
                        <p>T: {!! $contact['phone'] !!} | F: {!! $contact['fax'] !!}</p>
                        <p>E: {!! $contact['email'] !!}</p>
                    </div>
                    <div id="footer-left-conect">
                        <br>
                        <div>
                            @foreach($contact['link'] as $key => $value)
                                @if($value['link'] !== '')
                                <a href="{{ $value['link'] }}" style="color: #ffffff"><i style="font-size: 45px; margin-right: 10px" class="{{ $value['icon'] }}"></i></a>
                                @endif
                            @endforeach
                        </div>
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
    <script src="{{ asset('js/function/introduce_slider.js') }}"></script>
    <script>
        $().ready(function(){
            var section_language = $('#session-language').attr('value');
            if(section_language == 'vn'){
                $('.checkbox-language').prop('checked', false);
            }   else    {
                $('.checkbox-language').prop('checked', true); 
            }
            $('.checkbox-language').click(function(){
                $('#lang-button').submit();
            });
        });
    </script>
    <script>
        var str = document.URL;
        str_s = str.split("cat/");
        if(str_s[1] == null){
            str_s = str.split("/");
            $('#nav_' + str_s[3]).css('color', '#f99d1b');
        }   else    {
            $('#nav_' + str_s[1]).css('color', '#f99d1b');
        }
        //str = str[1].split("/");
        //$("#li_" + str[0]).css('background-color', 'grey');
        //$("#li_1_" + str[1]).css('background-color', 'grey');
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <script src="{{asset('js/banner/skel.min.js')}}"></script>
    <script src="{{asset('js/banner/main.js')}}"></script>
    <script src="{{asset('js/banner/util.js')}}"></script>
      <!-- Load Facebook SDK for JavaScript -->
    @include('client.content.facebook_video_function')
</body>
</html>
