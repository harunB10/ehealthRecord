@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
    <div class="container">
        <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <img src="{{ asset('/img/history.jpg') }}" /> <b class="lead">Historija bolesti za pacijenta: <strong>{{ Auth::user()->name }}</strong></b>
    <p class="lead"></p>
            @foreach($evidencija as $e)
            <div class="panel panel-default">
                <div class="panel-heading">Datum: <b>{{ date('d F, Y', strtotime($e->created_at)) }}</b></div>

                <div class="panel-body">

                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>Naziv ustanove:</td>
                                <td><b>{{ $e->nazivUstanove }}</b></td>
                            </tr>
                            <tr>
                                <td>Dijagnoza:</td>
                                <td><b>{{ $e->dijagnoza }}</b></td>
                            </tr>
                            <tr>
                                <td>Propisana terapija:</td>
                                <td><b>{{ $e->lijek }}</b></td>
                            </tr>
                            <tr>
                                <td>Napomena:</td>
                                <td><b>{{ $e->napomena }}</b></td>
                            </tr>
                            <tr>
                                <td>Nalaz i mišljenje: </td>
                                <td><b><a href="/pdf/{{$e->data}}" download="{{$e->data}}">KLIKNI ZA DOWNLOAD</a></b></td>
                            </tr>
                        </table>

                        </div>
                </div>
            </div>
        @endforeach




     </div>
    </div>
    </div>

@endsection
