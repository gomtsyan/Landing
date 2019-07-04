@extends('layouts.admin')

@section('sidebar')
    @include('admin.sidebar')
@endsection

@section('header')
    @include('admin.header')
@endsection

@section('content')
    @include('admin.workers.content_workers_add')
@endsection
