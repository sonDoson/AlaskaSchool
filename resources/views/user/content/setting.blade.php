@extends('user.layout.master_user_layout')
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

<h2 id="title" >Setting</h2>
<div class="wrap-inline-block">
<div class="box form">
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <table>
        <tr>
            <td class="post-td"><label>Tên đăng nhập: </label></td>
            <td class="post-td">
                <input class="input-style" type="text" name="name" placeholder="" />
            </td>
        </tr>
        <tr>
            <td class="post-td"><label>Địa chỉ email: </label></td>
            <td class="post-td">
                <input class="input-style" type="text" name="email" placeholder="...@email.com" />
            </td>
        </tr>
        <tr>
            <td class="post-td"><label>Mật khẩu: </label></td>
            <td class="post-td">
                <input class="input-style" type="text" name="pw_old" placeholder="Mật khẩu cũ" />
            </td>
        </tr>
        <tr>
            <td class="post-td"><label></label></td>
            <td class="post-td">
                <input class="input-style" type="text" name="pw_new[]" placeholder="Mật khẩu mới" />
                <input class="input-style" type="text" name="pw_new[]" placeholder="Nhập lại mật khẩu mới" />
            </td>
        </tr>
        <tr>
            <td class="post-td"><label>Video từ facebook: </label></td>
            <td class="post-td">
                <input class="input-style" type="text" name="link_video" placeholder="link videos từ facebook" />
            </td>
        </tr>

        </table>     
        <button class="btn btn-submit">Cập nhật</i></button>
    </form>
</div>
</div>
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>

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
