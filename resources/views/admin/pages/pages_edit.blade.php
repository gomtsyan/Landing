@extends('layouts.admin')

@section('sidebar')
    @include('admin.sidebar')
@endsection

@section('header')
    @include('admin.header')
@endsection

@section('content')
    @include('admin.pages.content_pages_edit')
@endsection
