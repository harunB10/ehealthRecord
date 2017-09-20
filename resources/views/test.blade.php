@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
    @foreach($korisnici as $korisnik)
        {!!QrCode::encoding('UTF-8')->size(250)->generate($korisnik->imePrezime); !!}

    @endforeach


@endsection
