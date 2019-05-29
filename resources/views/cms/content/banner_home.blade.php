@extends('cms.layout.cms_layout')
@section('content')
@if ($errors->any())
    <div id="errors">
        <ul>
            @foreach($errors->all(':message') as $value)
                <li>{{ $value }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(isset($return))
{!! $return !!}
@endif
<h2 id="title" >Ảnh Banner Trang Chủ</h2>
<div class="wrap-inline-block">
<div class="box form">
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <table>
        <tr>
            <td class="post-td"><label>Tải Thêm Ảnh: </label></td>
            <td class="post-td">
                <input class="input-style" type="file" name="images[]"  multiple />
            </td>
        </tr>
        </table>
		<h4 style="text-align:center;">( Chọn để xóa ảnh )</h4>
		<!--jmages uploaded-->
		<ul class="uploaded">
        @if(!empty($images))
            @foreach($images as $key => $value)
            <li><input type="checkbox" id="{{ 'cb' . $value->id }}" name="checkbox[]" value="{{ $value->id . '&' . $value->image_path }}" />
                <label class="checkbox" for="{{ 'cb' . $value->id }}"><img src="{{ asset($value->image_path) }}" /></label>
            </li>
            @endforeach
        @endif
        </ul>
        <br />
        <button class="btn btn-submit">Cập nhật <i class="fas fa-plus"></i></button>
    </form>
</div>
</div>
<script>
    $().ready(function(){
        setTimeout(function() 
        {
            if($('#errors:hover') === true){
            //if($('#errors').is(':hover') === true){
                $('#errors').mouseleave(function(){
                    $('#errors').fadeOut(300);
                });
            }   else    {
                $('#errors').fadeOut(300);
            }
        }, 3000);
    });

    $('#text_editor_en').css('display', 'none');
    $().ready(function(){
        $('#btn_switch_language_wrap').on('click', '.btn_switch_language', function(){
            $(this).siblings().removeAttr('id');
            $(this).attr('id', 'btn_single_active');
            var id_name = '#' + $(this).attr('value');
            $(id_name).css('display', 'block');
            $(id_name).siblings().css('display', 'none');
        });
    });
</script>
@stop
