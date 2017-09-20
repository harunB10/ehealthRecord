@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')

    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}

@endsection
