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
                        <div class="panel-heading"><b>ZAKAZIVANJE TERMINA PREGLEDA PACIJENTA</b></div>

                        <div class="panel-body">
                            <div class="form-group">
                                <p class="lead">Izaberite doktora i Vaš željeni datum pregleda</p>
                                {!! Form::open() !!}
                                <table class="table table-hover">
                                    <tr>
                                        <td width="50%">Izaberite doktora:</td>
                                        <td>

                                            <select name="doktor" class="selectpicker">

                                                @foreach($doktori as $doktor)
                                                    <option>
                                                        {{ $doktor->ime }} {{ $doktor->prezime }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Datum:</td>
                                        <td width="50%"
                                            <div class='col-sm-6'>
                                                <div class="form-group">
                                                    <div class='input-group date' id='datetimepicker1'>
                                                        <input type='text' class="form-control" name="datum"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>


                                </table>
                                <div class="col-md-5 col-md-offset-3">
                                    <button type="submit" class="btn btn-block btn-success"><b>POŠALJI</b></button>
                                </div>
                                {!! Form::close() !!}
                            </div>
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

    @endforeach
@endsection
