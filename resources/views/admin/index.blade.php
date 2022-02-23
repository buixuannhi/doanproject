@extends('layout.admin')
@section('title')
@section('main')
<div class="jumbotron">
    <div class="container">
        <h1>Hello: Admin</h1>
        <p>
            <a href="{{route('category.index')}}" class="btn btn-success btn-lg">learn more</a>
        </p>
    </div>
</div>
@stop()