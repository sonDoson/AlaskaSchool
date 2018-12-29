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
<h2 id="title" >Thêm Danh Mục 360</h2>
<div class="wrap-inline-block">
<div class="box form">
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <table>
        <tr>
            <td class="post-td"><label>Tên Bài Viết: </label></td>
            <td class="post-td">
                <input class="input-style" type="text" name="name[vn]" placeholder="Tên tiếng Việt" required />
                <input class="input-style" type="text" name="name[en]" placeholder="Tên tiếng Anh"/>
            </td>
        </tr>
        <tr>
            <td class="post-td"><label>Ảnh Bìa: </label></td>
            <td class="post-td">
                <input class="input-style" type="file" name="images[]"  multiple required />
            </td>
        </tr>
        <tr>
            <td class="post-td"><label>Subtitle Tiếng Việt: </label></td>
            <td class="post-td">
                <textarea style="width: 400px" type="text" name="sub[vn]" required ></textarea>
            </td>
        </tr>
        <tr>
            <td class="post-td"><label>Subtitle Tiếng Anh: </label></td>
            <td class="post-td">
                <textarea style="width: 400px" type="text" name="sub[en]" ></textarea>
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
