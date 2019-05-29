<div class="right-side col-sm-0 col-md-0 col-lg-0 col-xl-3">
    <div sytyle="border: 1px solid black;">
        <ul>
            <li class="right-side-title"><div class="inner"><h2>{{ $section_0[$lang[3]] }}</h2></div></li>
            @foreach($shortcut as $key => $value)
                <a href="{{ $value['url'] }}"><li><div class="inner">{!! $value[$lang[0]] !!}</div></li></a>
            @endforeach
        </ul>    
        
        <br />
        <ul>
            <li class="right-side-title"><div class="inner"><h2>{{ $static_text[1][1][$lang[1]] }}</h2></div></li>
            @foreach($stress as $key => $value)
            <li>
            <a href="{{ '/cat/' . $value['id_category'] . '/' . $value['id'] }}">
            <div style="width: 100%;display: table">
                <div class="rs_bt_text" style="">
                    <h4>{{ $value[$lang[0]] }}</h4>
                    <p>{{ $value[$lang[2]] }}</p>
                </div>
                <div class="rs_bt_image" style="background-image:url({{ $value['images'][0] }})"></div>
            </div>
            </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>