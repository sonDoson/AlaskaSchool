@extends('client.layout.master_client_layout')
@section('content')
    <div class="bn-section-0-container col-lg-12 col-xl-9">
        <div class="big-news bn-section-0 row" id="item-wrap" style="margin-top: -20px;">
            @if($section_3 !== null)
                @foreach($section_3 as $key => $value)
                <div class="big-news-item col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4" style="margin-top: 20px;">
                    <a style="color: #000" href="{{ asset('/form?id=') . $key }}">
                    <div class="section-3-item">
                        <h4>&nbsp;&nbsp;{!! $value[$lang[0]] !!}</h4>
                        <div class="section-3-item-image" style="background-image:url({{ $value['image'] }})"></div>
                        <div class="section-3-item-content font-resize">
                            <div class="section-3-item-content-text">
                                <p>{!! $value[$lang[2]] !!}</p>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            @endif
            <!---->
            @if(!empty($section_0[key($section_0)]))
            @foreach($section_0[key($section_0)] as $key => $value)
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
    @if(sizeof($section_0[key($section_0)]) > 1)
        <div class="btn-loadmore" style="margin-top: 30px;">
            <button id="load_more" value="{{ $id }}">Load More</button>
        </div>
    @endif
<!--SCRIPT-->
	<script>
		$().ready(function(){
			var p_global = 0;
			$('#load_more').click(function(){
				p_global = p_global + 1;
				var id_cate = {{ $id }};
				$.get('/ajaxLoadMoreItem', {p:p_global,id_cate:id_cate}, function(data){
                    alert(data);
					$(data).hide().appendTo('.big-news').slideDown('slow');
				});
			});
		});
	</script>
    </div>
@stop