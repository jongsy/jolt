@extends('layouts.master')

@section('content')


{{ $site->title }}

@foreach($pages as $page)

<a href="/page/edit/{{$page->id}}" class="page-link">{{$page->title}}</a>

@endforeach


<a href="{{ URL::to('logout') }}" style="float: left; width: 100%;">Logout</a>


@stop

@section('endscripts')
<script src="/js/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>

@stop