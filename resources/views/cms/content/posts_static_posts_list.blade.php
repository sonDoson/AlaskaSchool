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

<h2 id="title" >Danh sách - Nội Dung Tĩnh</h2>
<div class="box list" >
    <table class="table">
        <tbody class="header">
            <tr>
                <th style="width: 80px;"></th>
                <th class="th-size" style="width: 500px;"><div class="btn-table" >Tên bài viết<div style="display: inline-block;" id="th_name_en_arrow"></div></div></th>
                <th class="th-size" style="width: 200px;"><div class="btn-table">Danh Mục<div style="display: inline-block;" id="th_name_vn_arrow"></div></div></th>
                <th id="th_created_at"><div class="btn-table">Thời gian<div style="display: inline-block;" id="th_created_at_arrow"></div></div></th>
                <th class="th-btn" ></th>
            </tr>
        </tbody>
        <tbody id="tr_wrap">
            <tr class="something">
                <td class="table-id">&nbsp;1</td>
                <td class="table-name">&nbsp;Liên hệ</td>
                <td class="table-name">&nbsp;Nội dung tĩnh</td>
                <td class="table-time"></td>
                <td class="table-btn">
                    <div class="btn-list-wrap">
                        @if($user_validator_all->edit == 1)
                            <a href="{{ asset('cms/Posts') . '/' . $route . '-Edit-Contact' }}"><button class="btn-list edit"><i class="fas fa-pen"></i></button></a>
                        @else
                            <button class="btn-list edit" style="background-color: lightgrey!important;"><i class="fas fa-pen" style="color: grey"></i></button>
                        @endif
                        <button class="btn-list" style="background-color: lightgrey!important;"><i class="fas fa-trash-alt"  style="color: grey"></i></button>
                    </div>
                </td>
            </tr>
            <tr class="something">
                <td class="table-id">&nbsp;2</td>
                <td class="table-name">&nbsp;Chân trang phụ</td>
                <td class="table-name">&nbsp;Nội dung tĩnh</td>
                <td class="table-time"></td>
                <td class="table-btn">
                    <div class="btn-list-wrap">
                        @if($user_validator_all->edit == 1)
                            <a href="{{ asset('cms/Posts') . '/' . $route . '-Edit-Footer-Text' }}"><button class="btn-list edit"><i class="fas fa-pen"></i></button></a>
                        @else
                            <button class="btn-list edit" style="background-color: lightgrey!important;"><i class="fas fa-pen" style="color: grey"></i></button>
                        @endif
                        <button class="btn-list" style="background-color: lightgrey!important;"><i class="fas fa-trash-alt" style="color: grey"></i></button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="popup_wrap"></div>
<!--javascript-->
<script src="{{ asset('js/userjs/delete_conf.js') }}" ></script>
<script src="{{ asset('js/function/getMethodUrl.js') }}" ></script>
@stop
