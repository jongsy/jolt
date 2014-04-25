@extends('layouts.master')

@section('content')

{{ $site->title }}

@foreach($pages as $pageI)

<a href="/page/edit/{{$pageI->id}}" class="page-link">{{$pageI->title}}</a>

@endforeach


<a href="{{ URL::to('logout') }}" style="float: left; width: 100%;">Logout</a>

<div id="editor" style="width: 400px; height: 500px; float: left;">
	
</div>
<iframe class="viewer" src="/page/{{$page->id}}" style="width: 500px; height: 500px; float: left;"></iframe>

@stop

@section('endscripts')
<script src="/js/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>

@stop