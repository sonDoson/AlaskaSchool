@extends('client.layout.posts_static')
@section('content')
    <div class="content-wrap col-md-12 col-lg-12 col-xl-7" style="padding-right:0;">
    <div class="content-text font-resize">
        <h2 style="display: inline-block">{!! $section_0[$lang[0]] !!}</h2>
        @if($file !== null)
            @if($file->file_path !== "empty")
                <div style="display: inline-block; margin-top: -5px">
                <a href="{{ $file->file_path }}" download>
                <button class="btn" 
                    style="background-color: DodgerBlue;
                      border: none;
                      color: white;
                      padding: 5px 5px;
                      cursor: pointer;
                      font-size: 10px;">
                <i class="fa fa-download"></i> Download Form</button></a>
                </div>
            @endif
        @endif
        <br />
        <div class="fb-like" 
            data-href="" 
            data-layout="button" 
            data-action="like" 
            data-size="small" 
            data-show-faces="true" 
            data-share="true"></div><br />

        <br />
        {!! $section_0[$lang[1]] !!}
    </div>
    </div>
    <script>
        $().ready(function(){
            var url = window.location.href; 
            $('.fb-like').attr('data-href', url);
        });
    </script>
@stop