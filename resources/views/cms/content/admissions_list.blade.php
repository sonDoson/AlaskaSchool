@extends('cms.layout.cms_layout')
@section('content')

<h2 id="title" >Danh sách {{ $category->name_vn }}</h2>
<div class="box list" >
    <table class="table" style="border: 2px solid red;">
        <tbody class="header">
            <tr>
                <th style="width: 80px;"></th>
                <th id="th_name" ><div class="btn-table" >Form đăng ký {{ $category->name_vn }}<div style="display: inline-block;" id="th_name_en_arrow"></div></div></th>
                <th class="th-btn" ></th>
            </tr>
        </tbody>
        <tbody id="tr_wrap">
        @foreach($list as $value)
            <tr class="something">
                <td class="table-id">&nbsp;&nbsp;{!! $value->id !!}</td>
                <td class="table-name">&nbsp;&nbsp;{!! $value->name_vn !!}</td>
                <td class="table-btn">
                    <div class="btn-list-wrap">
                        @if($user_validator_all->edit == 1)
                            <a href="{{ asset('cms/Admissions/EditForm?id=') . $value->id }}"><button class="btn-list edit"><i class="fas fa-pen"></i></button></a>
                        @else
                            <button class="btn-list edit" style="background-color: lightgrey!important;"><i class="fas fa-pen" style="color: grey"></i></button>
                        @endif
                        <button class="btn-list delete" style="background-color: lightgrey!important;"><i class="fas fa-trash-alt" style="color: grey"></i></button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!--section 1-->
</div>
<!--javascript-->

<script>

</script>
@stop
