<!-- Content Wrapper. Contains page content -->
@if(Auth::user()->is_admin != 1)
    {{abort(403)}}
@endif
@extends('admin.master')
@section('title')
    {{trans('page_title.category_page_title')}}
@endsection
@section('page_title')
    {{trans('page_title.category_page_title')}}
@endsection
@section('css')
@stop
@section('content')
    <!-- Content Header (Page header) -->
Dashboard Page

    <!-- /.content -->
@endsection

@section('js')
@stop
<!-- /.content-wrapper -->
