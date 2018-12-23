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

<h2 id="title" >Danh sách người dùng</h2>
<div class="box list" >
    @if($user_validator_all->add == 1)
        <a href="/cms/User/Add"><button class="btn btn-add btn-submit" style="float: right;">Thêm <i class="fas fa-plus"></i></button></a>
    @endif
    <table class="table">
        <tbody class="header">
            <tr>
                <th style="width: 80px;"></th>
                <th class="th-size" id="th_name_en" ><div class="btn-table" >Tên<div style="display: inline-block;" id="th_name_en_arrow"></div></div></th>
                <th class="th-size" id="th_name_vn" ><div class="btn-table">Email<div style="display: inline-block;" id="th_name_vn_arrow"></div></div></th>
                <th class="th-size" ><div class="btn-table">Vai trò<div style="display: inline-block;" id="th_category_arrow"></div></div></th>
                <th id="th_created_at"><div class="btn-table">Ngày đăng ký<div style="display: inline-block;" id="th_created_at_arrow"></div></div></th>
                <th class="th-btn" ></th>
            </tr>
        </tbody>
        <tbody id="tr_wrap">
        @foreach($user_list as $key => $value)
            <tr class="something" id="{{ 'hidden_e_' . $key }}">
                <td class="table-id">&nbsp;{{ $key }}</td>
                <td class="table-name">&nbsp;{{ $value['name'] }}</td>
                <td class="table-name">&nbsp;{{ $value['email'] }}</td>
                <td class="table-name">&nbsp;{{ $value['role'] }}</td>
                <td class="table-time"></td>
                <td class="table-btn">
                    <div class="btn-list-wrap">
                    @if($user_validator_all->edit == 1)
                        <a href="{{ asset('cms/User/Edit?id=') . $key }}"><button class="btn-list edit"><i class="fas fa-pen"></i></button></a>
                    @else
                        <button class="btn-list edit" style="background-color: lightgrey!important;"><i class="fas fa-pen" style="color: grey"></i></button>
                    @endif
                    @if($user_validator_all->delete == 1)                    
                        <button class="btn-list delete" value="{{ $key }}"><i class="fas fa-trash-alt"></i></button>
                    @else
                        <button class="btn-list delete" style="background-color: lightgrey!important;"><i class="fas fa-trash-alt" style="color: grey"></i></button>
                    @endif
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if($page_mode->item_total > $page_mode->item_lines)
    <div class="page-mode" value="{{ '#page-mode-' . $page_mode->page_present }}">
        <div class="page-mode-btn-wrap" style="text-align: center;">
        @if($page_round[0] > 2)
            <button style="display:inline-block;" class="btn-flash" id="btn-backward" value="1"><i class="fas fa-backward"></i></button>
        @endif
        @for($page = $page_round[0]; $page <= $page_round[1]; $page++)
            <button class="page-number" id="{{ 'page-mode-' . $page }}" value="{{ $page }}">{{ $page }}</button>
        @endfor
        @if($page_round[1] < $page_mode->page_total)
            <button class="btn-flash" style="display:inline-block;" id="btn-forward" value="{{ $page_mode->page_total }}"><i class="fas fa-forward"></i></button>
        @endif
        </div>
    </div>
    @endif
</div>
<div class="popup_wrap"></div>
<!--javascript-->
<script src="{{ asset('js/userjs/delete_conf_2.js') }}" ></script>
<script src="{{ asset('js/function/getMethodUrl.js') }}" ></script>
<script src="{{ asset('js/userjs/table_button.js') }}" ></script>
<script>
    $().ready(function(){
        $('#hidden_e_1').css( "display", "none" );
    });
</script>
@stop
