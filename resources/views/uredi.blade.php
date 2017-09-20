@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>NOVI UNOS EVIDENCIJE PACIJENTA</b></div>

                    <div class="panel-body">

                        <div class="box-body">
                            @foreach($pacijenti as $pacijent)
                                {!! Form::model($pacijent, array('method' => 'PATCH')) !!}

                                <table class="table">
                                    <tr>
                                        <td>Naziv Ustanove: </td>
                                        <td><b>{{ $evidencija->nazivUstanove }}</b></td>

                                    </tr>
                                    <tr>
                                        <td>Kompletan nalaz: </td>
                                        <td><b><a href="/pdf/{{$evidencija->data}}" download="{{$evidencija->data}}">KLIKNI ZA PREUZIMANJE</a></b></td>
                                    </tr>
                                    <tr>
                                        <td>Ime i prezime pacijenta: </td>
                                        <td><b>{{ $pacijent->imePrezime }}</b> </td>
                                    </tr>
                                    <tr>
                                        <td>Dijagnoza: </td>
                                        <td><textarea name="dijagnoza" class="form-control" rows="5" placeholder="Unesite dijagnozu..."></textarea> </td>
                                    </tr>
                                    <tr>
                                        <td>Preporučena terapija: </td>
                                        <td><textarea name="lijek" class="form-control" rows="3" placeholder="Unesite terapiju..."></textarea> </td>
                                    </tr>
                                    <tr>
                                        <td>Napomena: </td>
                                        <td><textarea name="napomena" class="form-control" rows="3" placeholder="Unesite napomenu..."></textarea> </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"><button class="btn btn-block btn-danger"><b>UNESI EVIDENCIJU</b></button></td>

                                    </tr>
                                </table>
                            @endforeach
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
