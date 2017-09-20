@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>ZDRAVSTVENI KARTON PORODIČNE/OBITELJSKE MEDICINE</b></div>

                    <div class="panel-body">

                        <div class="box-body">
                            @foreach($pretraga as $p)
                                <table class="table">
                                    <tr>

                                        <td colspan="2"><img style="width: 200px; height: 200px" src="/img/{{ $p->slika }}"/></td>
                                    </tr>
                                    <tr>
                                        <td>Ime i prezime:</td>
                                        <td><strong>{{ $p->imePrezime }} </strong></td>
                                    </tr>
                                    <tr>
                                        <td>Ime oca:</td>
                                        <td><strong>{{ $p->imeOca }} </strong></td>
                                    </tr>
                                    <tr>
                                        <td>JMBG:</td>
                                        <td><strong>{{ $p->jmbg }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Adresa trenutnog prebivališta:</td>
                                        <td><strong>{{ $p->adresa }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Opština trenutnog prebivališta:</td>
                                        <td><strong>{{ $p->mjestoPrebivalista }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><strong>{{ $p->email }}</strong></td>
                                    </tr>

                                    <tr>
                                        <td>Datum rođenja:</td>
                                        <td><strong>{{ date('d F, Y', strtotime($p->datumRodjenja)) }} </strong></td>
                                    </tr>
                                    <tr>
                                        <td>Status zaposlenja:</td>
                                        <td><strong>{{ $p->statusZaposlenja }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Bračno stanje:</td>
                                        <td><strong>{{ $p->bracnoStanje }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Vrsta osiguranja:</td>
                                        <td><strong>{{ $p->vrstaOsiguranja }} </strong></td>
                                    </tr>
                                    <tr>
                                        <td>Broj zdravstvene knjižice:</td>
                                        <td><strong>{{ $p->brojZdravstveneKnjizice }} </strong></td>
                                    </tr>
                                    <tr>
                                        <td>Težina:</td>
                                        <td><strong>{{ $p->tezina }} kg </strong></td>
                                    </tr>
                                    <tr>
                                        <td>Visina:</td>
                                        <td><strong>{{ $p->visina }} cm </strong></td>
                                    </tr>
                                    <tr>
                                        <td>Alergije:</td>
                                        <td><strong>{{ $p->alergija }} </strong></td>
                                    </tr>
                                    <tr>
                                        <td>Krvna grupa:</td>
                                        <td><strong>{{ $p->krvnaGrupa }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Porodični ljekar:</td>
                                        <td><strong>@foreach($doktori as $doktor)
                                                    dr. {{ $doktor->ime }} {{ $doktor->prezime }} @endforeach </strong>
                                        </td>
                                    </tr>


                                </table>

                                <div class="col-md-5 col-md-offset-3">
                                <a href="/nalaz/{{ $p->id}}/{{ $p->idDoktor}}"
                                <button class="btn btn-block btn-info"><strong>KREIRAJ UPUTNICU ZA VAĐENJE NALAZA</strong>
                                </button>
                                </a>
                                    </div>
                            @endforeach
                        </div>


                    </div>


                </div>
                <hr>
                @foreach($pretraga as $p)
                    <img src="{{ asset('/img/history.jpg') }}"/> <b class="lead">Historija bolesti za pacijenta:
                        <strong>{{ $p->imePrezime }}</strong></b>@endforeach
                <hr>
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
                                        <td>Nalaz i mišljenje:</td>
                                        <td><b><a href="/pdf/{{$e->data}}" download="{{$e->data}}">{{$e->data}}</a></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="col-md-3 col-md-offset-4">
                                                <a href="uredi/{{ $p->id}}/{{ $e->id}}"
                                                <button class="btn btn-block btn-warning"><strong>IZMJENA</strong>
                                                </button>
                                                </a>
                                            </div>
                                        </td>
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
