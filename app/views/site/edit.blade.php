@extends('layouts.master')

@section('head')
{{-- obj attached to window with files --}}
<script>
	window.jolt = {
		site: {{$site}},
		siteFiles: {{ $siteFiles }}
	}

</script>
@stop

@section('content')


{{ $site->title }}

@foreach($siteFiles as $file)

<a href="/file/edit/{{$file->id}}" class="file-link">{{$file->title}}</a>

@endforeach


<a href="{{ URL::to('logout') }}" style="float: left; width: 100%;">Logout</a>

<div id="editor" style="width: 400px; height: 500px; float: left;">
	
</div>
<iframe class="viewer" src="/file/{{--$siteFile->id--}}" style="width: 500px; height: 500px; float: left;"></iframe>

{{ Form::open(array('url' => url('/site/update'))) }}

{{ Form::text('title', $site->title, array('placeholder'=>'Title')); }}

{{ Form::hidden('site_id', $site->id); }}

{{ Form::button("update Site" ,array('type'=>'submit','class'=>'btn btn-blue')); }}


{{ Form::close() }}

@stop

@section('endscripts')
<script src="/js/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>

@stop