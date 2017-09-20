@extends('app')

@section('htmlheader_title')
    eZK
@endsection


@section('main-content')
    @if (Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {{ Session::get('flash_notification.message') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Početna</div>

                    <div class="panel-body">

                        <div class="box-body">

                            @if(Auth::user()->isDoktor == 1)


                            @elseif(Auth::user()->isOsoblje == 1)


                            @elseif(DB::table('korisnicis')

                            ->where('email', '=', Auth::user()->email)->count() == 0)
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-ban"></i> Upozorenje!</h4>
                                    Vaš nalog za kreiranje elektronskog zdravstvenog kartona je u procesu. Molimo Vas da
                                    provjerite Vaš email. Ukoliko niste poslali potrebne podatke na
                                    info.elektronski@gmail.com,
                                    molimo Vas da to uradite kako bismo bili u mogućnosti ispuniti Vaš zahtjev.
                                </div>
                        </div>


                        @else

                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Čestitamo!</h4>
                                Vaš nalog je uspješno kreiran! Možete početi koristit Vaš elektronski zdravstveni
                                karton.
                                Ukoliko imate dodatnih pitanja kontaktirajte nas na info.elektronski@gmail.com
                            </div>

                        @endif
                    </div>

                    <img src="{{ asset('/img/logo.jpg') }}" class="img-responsive center-block">


                </div>
            </div>

        </div>

    </div>


@endsection
