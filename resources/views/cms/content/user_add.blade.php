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

<h2 id="title" >Thêm người dùng</h2>
<div class="wrap-inline-block">
<div class="box form" style="width: auto !important">
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <table>
        <tr>
            <td class="post-td"><label>Vai trò: </label></td>
            <td class="post-td">
                <select name="role" style="min-width: 200px;">
                @foreach($user_role_name as $key => $value)
                    <option id="{{ 'cat_' . $value->id }}" value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td class="post-td"><label>Tên người dùng: </label></td>
            <td class="post-td">
                <input class="input-style" type="text" name="name" placeholder="" />
            </td>
        </tr>
        <tr>
            <td class="post-td"><label>Email: </label></td>
            <td class="post-td">
                <input class="input-style" type="text" name="email" placeholder="" />
            </td>
        </tr>
        <tr>
            <td class="post-td"><label>Số điện thoại: </label></td>
            <td class="post-td">
                <input class="input-style" type="text" name="phone" placeholder="" />
            </td>
        </tr>
        <tr>
            <td class="post-td"><label>Mật khẩu: </label></td>
            <td class="post-td">
                <input class="input-style" type="text" name="password" placeholder="" />
            </td>
        </tr>

        </table>
        
        <button class="btn btn-submit">Thêm <i class="fas fa-plus"></i></button>
    </form>
</div>
</div>
<!--javascript-->

<script>

</script>
@stop
