@extends('layouts.master')

@section('content')


{{ $site->title }}

@foreach($siteFiles as $file)

<a href="/file/edit/{{$file->id}}" class="file-link">{{$file->title}}</a>

@endforeach


<a href="{{ URL::to('logout') }}" style="float: left; width: 100%;">Logout</a>


@stop

@section('endscripts')
<script src="/js/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>

@stop