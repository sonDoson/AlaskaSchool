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
        <div id="mySidenav" class="sidenav" style="background-color:rgba(51, 41, 41, 0.9); font-family: Arial;">
            <form class="lang-button" method="POST" action="/Switch_Language">
                {{ csrf_field() }}
                <input type="hidden" id="session-language" value="{{ $lang_section }}">
                <label class="switch"><input class="checkbox-language" type="checkbox" name="switch_lang" id="togBtn"><div class="slider round"><!--ADDED HTML --><span class="on">Vn</span><span class="off">En</span><!--END--></div></label>
            </form>
            <a class="nav_360-alaska" style="width: 250px;" id="nav_360"  href="{{ '/360-alaska' }}">{{ $static_text[6][6][$lang[1]] }}</a>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            @for($i = 1; $i <= 5; $i++)
                <a style="width: 250px;" class="{{ 'nav_' . $i }}" href="{{ '/cat/' . str_replace(' ', '-', $category[$i]['name_vn']) }}">{{ $category[$i][$lang[0]] }}</a>
            @endfor
            <a style="width: 250px;" class="nav_contact"  href="{{ '/contact' }}">{{ $contact[$lang[0]] }}</a>
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
                <a class="nav_360-alaska col-lg-3" style="width: 250px;" id="nav_360"  href="{{ '/360-alaska' }}"><b>{{ $static_text[6][6][$lang[1]] }}</b></a>
                @for($i = 1; $i <= 3; $i++)
                <a class="{{ 'nav_' . $i }} col-lg-3" id="{{ 'nav_' . $i }}" href="{{ '/cat/' . $i }}"><b>{{ $category[$i][$lang[0]] }}</b></a>
                @endfor
            </nav>

        </div>
    </div>
</header>
<script>
    var str = document.URL;
    str_s = str.split("cat/");
    
    if(str_s[1] == null){
        str_s = str.split("/");
        $('.nav_' + str_s[3]).css('color', '#f99d1b');
    }   else    {
        str_s_child = str_s[1].split("/");
        $('.nav_' + str_s_child[0]).css('color', '#f99d1b');
    }

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
<script>
    $().ready(function(){
        var section_language = $('#session-language').attr('value');
        if(section_language == 'vn'){
            $('.checkbox-language').prop('checked', false);
        }   else    {
            $('.checkbox-language').prop('checked', true); 
        }
        $('.checkbox-language').click(function(){
            $('.lang-button').submit();
        });
    });
</script>