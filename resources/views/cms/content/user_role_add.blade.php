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

<h2 id="title" >Thêm vai trò người dùng</h2>

<div class="wrap-inline-block">
    <div class="box form">
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <table>
            <tr>
                <td class="post-td"><label>Tên vai trò: </label></td>
                <td class="post-td">
                    <input class="input-style" type="text" name="name" placeholder="..." required />
                </td>
            </tr>
            </table>
            <br />
            <table class="table">
                <tbody class="header">
                    <tr>
                        <th>Danh mục</th>
                        <th>Xem</th>
                        <th>Thêm</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </tbody>
                <tbody class="tr_wrap">
                    @foreach($menu_category as $key => $value)
                    <tr>
                        <td style="text-align: center;">{{ $value->value_vn }}</td>
                        <td>
                            <input type="hidden" name="role[{{ $value->id }}][view][df]" value="0">
                            <label class="container" style="position:relative;height: 18px">
                                <input type="checkbox" name="role[{{ $value->id }}][view][checked]">
                                <span class="checkmark" style="position:absolute;left:50%;margin-left:-14px"></span>
                            </label>
                        </td>
                        <td>
                            <input type="hidden" name="role[{{ $value->id }}][add][df]" value="0">
                            <label class="container" style="position:relative;height: 18px">
                                <input type="checkbox" name="role[{{ $value->id }}][add][checked]">
                                <span class="checkmark" style="position:absolute;left:50%;margin-left:-14px"></span>
                            </label>
                        </td>
                        <td>
                            <input type="hidden" name="role[{{ $value->id }}][edit][df]" value="0">
                            <label class="container" style="position:relative;height: 18px">
                                <input type="checkbox" name="role[{{ $value->id }}][edit][checked]">
                                <span class="checkmark" style="position:absolute;left:50%;margin-left:-14px"></span>
                            </label>
                        </td>
                        <td>
                            <input type="hidden" name="role[{{ $value->id }}][delete][df]" value="0">
                            <label class="container" style="position:relative;height: 18px">
                                <input type="checkbox" name="role[{{ $value->id }}][delete][checked]">
                                <span class="checkmark" style="position:absolute;left:50%;margin-left:-14px"></span>
                            </label>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <button class="btn btn-submit">Thêm <i class="fas fa-plus"></i></button>
        </form>
    </div>
</div>
<script>

</script>
@stop
