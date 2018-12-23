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

<h2 id="title" >Vai trò người dùng</h2>

<div class="box list" >
    @if($user_validator_all->add == 1)
        <a href="/cms/User/Role/Add"><button class="btn btn-add btn-submit" style="float: right;">Thêm <i class="fas fa-plus"></i></button></a>
    @endif
    <table class="table">
        <tbody class="header">
            <tr>
                <th style="width: 80px;"></th>
                <th>Vai trò</th>
                <th class="th-btn" ></th>
            </tr>
        </tbody>
        <tbody id="tr_wrap">
        @foreach($user_role_name as $key => $value)
            <tr class="something"  id="{{ 'hidden_e_' . $value->id }}">
                <td class="table-id">&nbsp;{{ $key + 1 }}</td>
                <td>&nbsp;{{ $value->name }}</td>
                <td class="table-btn">
                    <div class="btn-list-wrap">
                    <button class="btn-list edit" style="background-color: lightgrey!important;"><i class="fas fa-pen" style="color: grey"></i></button>
                    @if($user_validator_all->delete == 1) 
                        <button class="btn-list delete" value="{{ $value->id }}"><i class="fas fa-trash-alt"></i></button>
                    @else
                        <button class="btn-list delete" style="background-color: lightgrey!important;"><i class="fas fa-trash-alt" style="color: grey"></i></button>
                    @endif
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="popup_wrap">
</div>

<script src="{{ asset('js/userjs/delete_conf_3.js') }}" ></script>
<script>
    $().ready(function(){
        $('#hidden_e_2').css( "display", "none" );
    });
</script>
@stop
