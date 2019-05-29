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
<h2 id="title" >Chỉnh Sửa Liên Kết Nhanh</h2>
<div class="wrap-inline-block">
<div class="box form">
    <form method="POST" action="" enctype="multipart/form-data">

        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <table style="margin: 0 auto;">
            <tr>
                <th></th>
                <th>Tên Tiếng Việt</th>
                <th>Tên Tiếng Anh</th>
                <th>URL</th>
            </tr>
            
            <tr>
                <td class="post-td"><p style="text-align: center;">Ghi chú</p></td>
                <td class="post-td"><p style="text-align: center;">(Xóa nội dung để xóa liên kết)</p></td>
                <td class="post-td"></td>
                <td class="post-td"><p style="text-align: center;">(dán đường dẫn)</p></td>
            </tr>
            @foreach($db_list as $key => $value)
            <tr>
                <td class="post-td">
                <td class="post-td">
                    <input style="width: 250px;" name="shortcut[{{ $value->id }}][name_vn]" class="input-style" type="text" value="{{ $value->name_vn }}" />
                </td>
                <td class="post-td">
                    <input style="width: 250px;" name="shortcut[{{ $value->id }}][name_en]" class="input-style" type="text" value="{{ $value->name_en }}" />
                </td>
                <td class="post-td">
                    <input style="width: 450px;" name="shortcut[{{ $value->id }}][url]" class="input-style" type="text" value="{{ $value->url }}" />
                </td>
            </tr>
            @endforeach
        </table>
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
