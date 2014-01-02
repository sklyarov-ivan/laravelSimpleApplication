@extends('layouts.main')

@section('main')

<div class="page-header">
    <h1>
        <span class="label label-important label-big">{{{ $offer->off }}}%</span>
        {{{ $offer->title }}} 
        <small> by
            <a href="{{{ route('home.by_company', $offer->company->name) }}}">{{{ $offer->company->name }}}</a>
        </small>
    </h1>
</div>

<div class="pull-left image-container-big">
    <img class="img-rounded" src="" alt="{{{ $offer->title }}}">
</div>

<div class="description">
    <p>{{ $offer->webDescription() }}</p>
</div>

<div class="clearfix"></div>
<hr>
<p>Location: 
    <a href="{{ route('home.by_city', $offer->city->name) }}">{{{ $offer->city->name }}}</a>
</p>
<p>Tags: 
    @foreach($offer->tags as $tag)
        <a class="no_decoration" href="{{ route('home.by_tag', $tag->name) }}">
            <span class="badge">{{{$tag->name}}}</span>
        </a>
    @endforeach
</p>

<hr>

<div class="page-header">
  <h3>User's comments <small>leave and yours one</small></h3>
</div>

{{ Form::open() }}
{{ Form::textarea('body', Input::old('body'), array('class' => 'input-block-level', 'style' => 'resize: vertical;'))}}
 <div class="input-append">
{{ Form::select('mark', array(0 => 5, 1 => 4, 2 => 3, 3 => 2, 4 => 1), Input::old('mark', 0)) }}
{{ Form::submit('Comment', array('class' => 'btn btn-success', 'style' => 'clear: both;')) }}
</div>
{{ Form::close() }}
@include('partials.errors', $errors)
@stop