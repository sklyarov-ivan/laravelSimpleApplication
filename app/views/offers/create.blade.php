@extends('layouts.scaffold')

@section('main')

<h1>Create Offer</h1>

{{ Form::open(array('route' => 'offers.store')) }}
	<ul>
        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>

        <?php $cities = array(0 => 'Choose city');
        foreach (City::get(array('id', 'name')) as $city) {
            $cities[$city->id] = $city->name;
        } ?>

        <li>
            {{ Form::label('city_id', 'City_id:') }}
            {{ Form::select('city_id', $cities) }}
        </li>

        <?php $companies = array(0 => 'Choose company');
        foreach (Company::get(array('id', 'title')) as $company) {
            $companies[$company->id] = $company->title;
        } ?>

        <li>
            {{ Form::label('company_id', 'Company_id:') }}
            {{ Form::select('company_id', $companies) }}
        </li>

        <li>
            {{ Form::label('off', 'Off:') }}
            {{ Form::input('number', 'off') }}
        </li>

        <li>
            {{ Form::label('file', 'Image:') }}
            {{ Form::file('file')}}
            <img src="" id="thumb" style="max-width:300px; max-height: 200px; display: block;">
            {{ Form::hidden('image') }}
            <div class="error"></div>
        </li>

        <li>
            {{ Form::label('expires', 'Expires:') }}
            {{ Form::text('expires') }}
        </li>

        <li>
            {{ Form::label('tags', 'Tags:') }}
            {{ Form::input('text','tags') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop

@section('scripts')
@include('offers.scripts')
@stop