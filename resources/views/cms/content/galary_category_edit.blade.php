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
<h2 id="title" >Sửa Danh Mục 360 - id.{!! $id !!}</h2>
<div class="wrap-inline-block">
<div class="box form">
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <input type="hidden" name="id_posts" value="{{ $db_category['id'] }}" />
        <table>
        <tr>
            <td class="post-td"><label>Tên Bài Viết: </label></td>
            <td class="post-td">
                <input class="input-style" type="text" name="name[vn]" placeholder="{{ $db_category['name_vn'] }}" />
                <input class="input-style" type="text" name="name[en]" placeholder="{{ $db_category['name_en'] }}" />
            </td>
        </tr>
        <tr>
            <td class="post-td"><label>Ảnh Bìa: </label></td>
            <td class="post-td">
                <input class="input-style" type="file" name="images[]"  multiple />
            </td>
        </tr>
        <tr>
            <td class="post-td"><label>Subtitle Tiếng Việt: </label></td>
            <td class="post-td">
                <textarea style="width: 400px" type="text" name="sub[vn]" >{{ $db_category['subtitle_vn'] }}</textarea>
            </td>
        </tr>
        <tr>
            <td class="post-td"><label>Subtitle Tiếng Anh: </label></td>
            <td class="post-td">
                <textarea style="width: 400px" type="text" name="sub[en]" >{{ $db_category['subtitle_en'] }}</textarea>
            </td>
        </tr>
        </table>
        
        <button class="btn btn-submit">Thêm <i class="fas fa-plus"></i></button>
    </form>
</div>
</div>
<!--javascript-->
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
</script>
@stop
