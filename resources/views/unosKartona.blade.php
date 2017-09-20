@extends('app')

@section('htmlheader_title')
    Home
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
                    <div class="panel-heading"><b>Unos novog kartona</b></div>

                    <div class="panel-body">

                        {!! Form::open(array('files' => true)) !!}
                        <table class="table table-hover">
                            <tr>
                                <td width="30%">Ime i prezime:</td>
                                <td><input type="text" class="form-control" name="imePrezime" width="100%"></td>
                            </tr>
                            <tr>
                                <td>Ime oca:</td>
                                <td><input type="text" class="form-control" name="imeOca" width="100%"></td>

                            </tr>
                            <tr>
                                <td>JMBG:</td>
                                <td><input type="text" class="form-control" name="jmbg" width="100%"></td>

                            </tr>
                            <tr>
                                <td>Opština prebivališta:</td>
                                <td><input type="text" class="form-control" name="mjestoPrebivalista" width="100%"></td>

                            </tr>
                            <tr>
                                <td>Adresa stanovanja:</td>
                                <td><input type="text" class="form-control" name="adresa" width="100%"></td>

                            </tr>

                            <tr>
                                <td>Datum rođenja:</td>
                                <td width="50%">
                                <div class='col-sm-6'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' class="form-control" name="datumRodjenja"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                        </div>
                                    </div>
                                </div>
                                </td>

                            </tr>

                            <tr>
                                <td>Email:</td>
                                <td><input type="text" class="form-control" name="email" width="100%"></td>

                            </tr>

                            <tr>
                                <td>Bračno stanje:</td>
                                <td><select name="bracnoStanje" class="selectpicker">
                                        <option>Oženjen</option>
                                        <option>Neoženjen</option>
                                        <option>Ostalo</option>

                                    </select></td>

                            </tr>

                            <tr>
                                <td>Status zaposlenja:</td>
                                <td><select name="statusZaposlenja" class="selectpicker">
                                        <option>Zaposlen</option>
                                        <option>Nezaposlen</option>
                                    </select></td>

                            </tr>

                            <tr>
                                <td>Visina (u cm):</td>

                                <td><select name="visina" class="selectpicker">
                                        @for($i = 1; $i <= 250; $i++)
                                            <option>{{ $i }}@endfor
                                            </option>
                                    </select></td>
                            </tr>

                            <tr>
                                <td>Težina (u kg):</td>
                                <td><select name="tezina" class="selectpicker">
                                        @for($i = 1; $i <= 250; $i++)
                                            <option>{{ $i }}@endfor
                                            </option>
                                    </select></td>

                            </tr>

                            <tr>
                                <td>Krvna grupa:</td>
                                <td><select name="krvnaGrupa" class="selectpicker">
                                        <option>A+</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B-</option>
                                        <option>AB+</option>
                                        <option>AB-</option>
                                        <option>0+</option>
                                        <option>0-</option>
                                    </select></td>

                            </tr>

                            <tr>
                                <td>Alergije:</td>
                                <td><input type="text" class="form-control" name="alergija" width="100%"></td>

                            </tr>

                            <tr>
                                <td>Vrsta osiguranja:</td>
                                <td>
                                    <select name="vrstaOsiguranja" class="selectpicker">
                                        <option>Obavezno osiguranje</option>
                                        <option>Dodatno osiguranje</option>
                                    </select>
                                </td>

                            </tr>




                            <tr>
                                <td>Porodični doktor:</td>
                                <td><select name="doktor" class="selectpicker">
                                        @foreach($doktor as $d)
                                            <option>{{ $d->id }} {{ $d->ime  }} {{ $d->prezime }}</option>
                                        @endforeach
                                    </select></td>

                            </tr>

                            <tr>
                                <td>Slika:</td>
                                <td>{!! Form::file('slika') !!}
                                    {!! Form::close() !!}</td>
                            </tr>


                        </table>
                        <input type="hidden" name="brojKnjizice" value="{{ substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ" ,mt_rand( 0 ,50 ) ,1 ) .substr( md5( time() ), 1)
 }}">

                        <div class="col-md-5 col-md-offset-3">
                            <button type="submit" class="btn btn-block btn-success"><b>POŠALJI</b></button>
                        </div>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>

    <script>
        $('.selectpicker').selectpicker();
    </script>
@endsection
