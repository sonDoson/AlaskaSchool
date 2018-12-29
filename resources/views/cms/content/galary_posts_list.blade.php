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

<h2 id="title" >Bài Viết 360</h2>
<div class="box list" >
    <form class="form" method="GET" action="" style="display: inline-block; float: left;">
        <input class="input-style" name="search" type="text" placeholder="search.." />
    </form>
    @if($user_validator_all->add == 1)
        <a href="{{ '/cms/360-Alaska/Posts' . '-Add'  }}"><button class="btn btn-add btn-submit" style="display: inline-block; float: right;">Thêm <i class="fas fa-plus"></i></button></a>
    @endif
    <table class="table">
        <tbody class="header">
            <tr>
                <th style="width: 80px;"></th>
                <th class="th-size" style="width: 500px;"><div class="btn-table" id="name_vn" value="name_vn" >Tên bài<div style="display: inline-block;" id="th_name_en_arrow"></div></div></th>
                <th class="th-size" style="width: 200px;"><div>Danh mục<div style="display: inline-block;" id="th_name_vn_arrow"></div></div></th>
                <th id="th_created_at"><div class="btn-table" id="created_at" value="created_at">Thời gian<div style="display: inline-block;" id="th_created_at_arrow"></div></div></th>
                <th class="th-btn" ></th>
            </tr>
        </tbody>
        <tbody id="tr_wrap">
                <tr class="something">
                    <td class="table-id">&nbsp;</td>
                    <td class="table-name">&nbsp;</td>
                    <td class="table-name">&nbsp;</td>
                    <td class="table-time">&nbsp;</td>
                    <td class="table-btn">
                        <div class="btn-list-wrap">
                        @if($user_validator_all->edit == 1)
                            <a href=""><button class="btn-list edit"><i class="fas fa-pen"></i></button></a>
                        @else
                            <button class="btn-list edit" style="background-color: lightgrey!important;"><i class="fas fa-pen" style="color: grey"></i></button>
                        @endif
                        @if($user_validator_all->delete == 1) 
                            <button class="btn-list delete" value="21"><i class="fas fa-trash-alt"></i></button>
                        @else
                            <button class="btn-list delete" style="background-color: lightgrey!important;"><i class="fas fa-trash-alt" style="color: grey"></i></button>
                        @endif
                        </div>
                    </td>
                </tr>
        </tbody>
    </table>
</div>
<div class="popup_wrap"></div>
<!--javascript-->
<script src="{{ asset('js/userjs/table_button.js') }}" ></script>
<script src="{{ asset('js/userjs/delete_conf_1.js') }}" ></script>
<script src="{{ asset('js/function/getMethodUrl.js') }}" ></script>
@stop
