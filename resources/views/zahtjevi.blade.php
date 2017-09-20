@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
    @foreach($korisnici as $korisnik)
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>ZAHTJEVI PACIJENATA ZA PREGLED KOD DOKTORA --- {{ Auth::user()->name }}</b></div>

                        <div class="panel-body">

                            <div class="box-body">
                                @foreach($zahtjevi as $zahtjev)
                                <table class="table table-hover">

                                <tr>

                                    <td>{{ $zahtjev->id }}</td>
                                    <td width="30%">{{ $zahtjev->imePacijenta }}</td>
                                    <td width="25%"><b>{{ date('d F, Y, G:i', strtotime($zahtjev->startDate)) }}</b></td>
                                    <td width="20%"><a href="zahtjevi/{{ $zahtjev->id }}/prihvati"><button class="btn btn-block btn-success">Prihvati</button></a></td>
                                    <td width="20%"><a href="zahtjevi/{{ $zahtjev->id}}/odbij"><button class="btn btn-block btn-danger">Odbij</button></a></td>
                                </tr>

                                </table>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach


@endsection
