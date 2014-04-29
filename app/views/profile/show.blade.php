@extends('layouts.master')

@section('content')

<h1>{{ $user->name }}</h1>({{ $user->username }})


@foreach($sites as $site)
<br>
<a href="{{ url('/'.$site->title) }}">{{ $site->title }}</a>
@endforeach

{{-- put the create site form here --}}

{{ Form::open(array('url' => url('/site/add'))) }}

{{ Form::text('title', "", array('placeholder'=>'Title')); }}

{{ Form::button("New Site" ,array('type'=>'submit','class'=>'btn btn-blue')); }}
		

{{ Form::close() }}

<a href="{{ URL::to('logout') }}" style="float: left; width: 100%;">Logout</a>


@stop

@section('endscripts')
<script src="/js/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>

@stop