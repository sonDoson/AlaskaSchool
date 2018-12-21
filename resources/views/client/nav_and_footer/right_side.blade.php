<div class="right-side col-sm-0 col-md-0 col-lg-0 col-xl-3">
    <ul>
        <li class="right-side-title"><div class="inner"><h2>{{ $category[$id_cat]['name_vn'] }}</h2></div></li>
        @foreach($category_item[$id_cat] as $key => $value)
        <a href="{{ asset('/cat') . '/' . $id_cat . '/' . $value['id'] }}"><li><div class="inner">{!! $value['name_vn'] !!}</div></li></a>
        @endforeach
    </ul>    
    <br />
    <ul>
        <li class="right-side-title"><div class="inner"><h2>Bài Viết Nổi Bật</h2></div></li>
        @foreach($stress as $key => $value)
        <li>
        <a href="{{ '/cat/' . $value['id_category'] . '/' . $value['id'] }}">
        <div style="width: 100%; min-height: 80px;">
            <div style="height: 100%; width: 70%; float: left; display: inline-block; padding-right: 10px;">
                <h4>{{ $value[$lang[0]] }}</h4>
                <p>{{ $value[$lang[2]] }}</p>
            </div>
            <div style="height: 80px; width: 30%; float: left; display: inline-block; overflow: hidden;">
                    <img src="{{ $value['images'][0] }}" width="auto" height="100%" />
            </div>
        </div>
        </a>
        </li>
        @endforeach
    </ul>
</div>