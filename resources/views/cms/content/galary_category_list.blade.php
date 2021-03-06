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

<h2 id="title" >Danh Mục 360</h2>
<div class="box list" >
    <form class="form" method="GET" action="" style="display: inline-block; float: left;">
        <input class="input-style" name="search" type="text" placeholder="search.." />
    </form>
    @if($user_validator_all->add == 1)
        <a href="{{ '/cms/360-Alaska/Category' . '-Add'  }}"><button class="btn btn-add btn-submit" style="display: inline-block; float: right;">Thêm <i class="fas fa-plus"></i></button></a>
    @endif
    <table class="table">
        <tbody class="header">
            <tr>
                <th style="width: 80px;"></th>
                <th class="th-size" style="width: 500px;"><div class="btn-table" id="name_vn" value="name_vn" >Tên danh mục<div style="display: inline-block;" id="th_name_en_arrow"></div></div></th>
                <th class="th-size" style="width: 100px;" >Làm Mới<div style="display: inline-block;" id="th_name_vn_arrow"></div></th>
                <th class="th-size" style="width: 200px;"><div>Số bài viết<div style="display: inline-block;" id="th_name_vn_arrow"></div></div></th>
                <th id="th_created_at"><div class="btn-table" id="created_at" value="created_at">Thời gian<div style="display: inline-block;" id="th_created_at_arrow"></div></div></th>
                <th class="th-btn" ></th>
            </tr>
        </tbody>
        <tbody id="tr_wrap">
            @foreach($db_list as $key => $value)
                <tr class="something">
                    <td class="table-id">&nbsp;{!! $value['id'] !!}</td>
                    <td class="table-name">&nbsp;{!! $value['name_vn'] !!}</td>
                    <td class="table-name"><button class="btn push-to-top" value="{{ $value['id'] . '-' . 'galary_category' }}" style="float:right">Lên đầu</button></td>
                    <td class="table-name">&nbsp;{!! $value['num_posts'] !!}</td>
                    <td class="table-time">&nbsp;{!! $value['created_at'] !!}</td>
                    <td class="table-btn">
                        <div class="btn-list-wrap">
                        @if($user_validator_all->edit == 1)
                            <a href="{{ asset('cms/360-Alaska/Category-Edit') . '?id=' . $value['id'] }}"><button class="btn-list edit"><i class="fas fa-pen"></i></button></a>
                        @else
                            <button class="btn-list edit" style="background-color: lightgrey!important;"><i class="fas fa-pen" style="color: grey"></i></button>
                        @endif
                        @if($user_validator_all->delete == 1) 
                            <button class="btn-list delete" value="{!! $value['id'] !!}"><i class="fas fa-trash-alt"></i></button>
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
<script src="{{ asset('js/userjs/table_button.js') }}" ></script>
<script src="{{ asset('js/function/getMethodUrl.js') }}" ></script>
<script src="{{ asset('js/userjs/pushUpToTop.js') }}" ></script>
<!--Popup-->
<script>
    //popup
    $().ready(function(){
        //openPop
        $('.delete').on('click', function(){
            var string = "Xác nhận xóa danh mục và tất cả bài thuộc danh mục";
            var val = $(this).attr('value');
            var url = '/cms/360-Alaska/Category-Delete';
            var token = $('meta[name="csrf-token"]').attr('content');
            openPop(token,string, val, url);
        });
    });
</script>
<script src="{{ asset('js/userjs/delete_confirm.js') }}" ></script>
@stop
