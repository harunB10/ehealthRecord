@extends('app')

@section('htmlheader_title')
    eZK
@endsection


@section('main-content')

    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-info"></i> Uputstvo!</h4>
        Ukoliko želite izvršiti izmjene Vaših korisničkih podataka, možete to uraditi u sljedećim poljima.
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Profil</b></div>

                    <div class="panel-body">
                        <div class="form-group">
                            <p class="lead">Osnovni podaci o korisniku</p>
                            @foreach($korisnici as $korisnik)

                            {!! Form::model($korisnik, array('route' => array('profil.update', $korisnik->id), 'method' => 'PUT')) !!}
                            <table class="table table-hover">

                                    <tr>
                                        <td><p>Ime i prezime:</p></td>
                                        <td>

                                                <strong>{{ $korisnik->imePrezime }}</strong>

                                        </td>
                                    </tr>

                                    </tr>

                                    <tr>
                                        <td><p>Email:</p></td>
                                        <td>

                                                <input type="text" name="email" class="form-control" type="password"
                                                       value= {{ $korisnik->email }}>


                                        </td>
                                    </tr>

                                    <tr>
                                        <td><p>Lozinka:</p></td>
                                        <td>
                                            <input type="password" class="form-control" name="lozinka">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><p>Ponovite lozinku:</p></td>
                                        <td>
                                            <input type="password" class="form-control" name="lozinka2">

                                        </td>
                                    </tr>


                                </table>
                                <div class="col-md-5 col-md-offset-3">
                                    <button type="submit" class="btn btn-block btn-success"><b>SPREMI IZMJENE</b></button>
                                    </div>

                            {!! Form::close() !!}
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>




@endsection
