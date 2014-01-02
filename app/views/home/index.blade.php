@extends('layouts.main')

@section('main')

<h1></h1>

@if ($offers->count())
    @foreach ($offers as $key => $offer)
        @if($key % 3 == 0)
            <div class="row-fluid">
                <ul class="thumbnails">
        @endif

        <li class="span4">
            <div class="thumbnail">
                @include('offers._preview', $offer)
            </div>
        </li>
            
        @if($key % 3 == 2 || $key == count($offers) - 1)
                </ul>
            </div>
        @endif
    @endforeach
@else
    There are no offers
@endif

@stop