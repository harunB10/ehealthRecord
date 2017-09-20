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
                            @foreach($korisnici as $korisnik)
                            <table class="table">
                                <tr>

                                    <td colspan="2"> <img style="width: 200px; height: 200px" src="/img/{{ $korisnik->slika }}"/>  </td>
                                </tr>
                                <tr>
                                    <td>Ime i prezime:</td>
                                    <td><strong> {{ $korisnik->imePrezime }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Ime oca:</td>
                                    <td><strong>{{ $korisnik->imeOca }}  </strong></td>
                                </tr>
                                <tr>
                                    <td>JMBG:</td>
                                    <td><strong>{{ $korisnik->jmbg }} </strong></td>
                                </tr>
                                <tr>
                                    <td>Adresa trenutnog prebivališta:</td>
                                    <td><strong>{{ $korisnik->adresa }}  </strong></td>
                                </tr>
                                <tr>
                                    <td>Opština trenutnog prebivališta:</td>
                                    <td><strong> {{ $korisnik->mjestoPrebivalista }} </strong></td>
                                </tr>
                                <tr>
                                    <td>Email: </td>
                                    <td><strong>{{ $korisnik->email }}</strong></td>
                                </tr>

                                <tr>
                                    <td>Datum rođenja:</td>
                                    <td><strong>{{ date('d F, Y', strtotime($korisnik->datumRodjenja)) }}  </strong></td>
                                </tr>
                                <tr>
                                    <td>Status zaposlenja:</td>
                                    <td><strong>{{ $korisnik->statusZaposlenja }}  </strong></td>
                                </tr>
                                <tr>
                                    <td>Bračno stanje:</td>
                                    <td><strong>{{ $korisnik->bracnoStanje }} </strong></td>
                                </tr>
                                <tr>
                                    <td>Vrsta osiguranja:</td>
                                    <td><strong>{{ $korisnik->vrstaOsiguranja }}  </strong></td>
                                </tr>
                                <tr>
                                    <td>Broj zdravstvene knjižice:</td>
                                    <td><strong>{{ $korisnik->brojZdravstveneKnjizice }}  </strong></td>
                                </tr>
                                <tr>
                                    <td>Težina: </td>
                                    <td><strong>{{ $korisnik->tezina }} kg  </strong></td>
                                </tr>
                                <tr>
                                    <td>Visina: </td>
                                    <td><strong>{{ $korisnik->visina }} cm  </strong></td>
                                </tr>
                                <tr>
                                    <td>Alergije: </td>
                                    <td><strong>{{ $korisnik->alergija }}   </strong></td>
                                </tr>
                                <tr>
                                    <td>Krvna grupa: </td>
                                    <td><strong> {{ $korisnik->krvnaGrupa }}   </strong></td>
                                </tr>

                                <tr>
                                    <td>Porodični ljekar:</td>
                                    <td><strong>@foreach($doktori as $doktor) dr. {{ $doktor->ime }} {{ $doktor->prezime }} @endforeach </strong></td>
                                </tr>

                            </table>
                        @endforeach


                        </div>


                    </div>


                </div>
            </div>

        </div>

    </div>

@endsection
