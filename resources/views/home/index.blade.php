@extends('layout.home')
@section('main')
     


<x-Home.product title='Sản phẩm nổi bật' order='DESC' limit="4" />

<x-Home.product title='Sản phẩm đang được giảm giá' order='ASC' limit="4"/>
@stop()