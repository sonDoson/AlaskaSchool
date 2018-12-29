@extends('client.layout.master_client_layout')
@section('content')
    <div class="bn-section-0-container col-lg-12 col-xl-9" style="1px solid black;">
    <div class="big-news bn-section-0 row" style="margin-top: -20px;">
        @if(!empty($section_0))
        @foreach($section_0 as $key => $value)
        <div class="big-news-item col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4" style="margin-top: 20px;">
            <a style="color: #000" href="{!! '/cat/' . $value['id_category']. '/' . $value['id'] !!}">
                <div class="big-news-item-image" style="background-image:url({{ $value['images'][0] }})"></div>
                <div class="big-news-item-content font-resize">
                    <h4>{!! $value[$lang[0]] !!}</h4>
                    <div  class="big-news-item-content-text" style="">
                        <p>{!! $value[$lang[2]] !!}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @endif
    </div>
    </div>
@stop