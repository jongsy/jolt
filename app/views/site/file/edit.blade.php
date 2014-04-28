@extends('layouts.master')

@section('content')

{{ $site->title }}

@foreach($siteFiles as $fileI)

<a href="/file/edit/{{$fileI->id}}" class="file-link">{{$fileI->title}}</a>

@endforeach


<a href="{{ URL::to('logout') }}" style="float: left; width: 100%;">Logout</a>

<div id="editor" style="width: 400px; height: 500px; float: left;">
	
</div>
<iframe class="viewer" src="/file/{{$siteFile->id}}" style="width: 500px; height: 500px; float: left;"></iframe>

@stop

@section('endscripts')
<script src="/js/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>

@stop