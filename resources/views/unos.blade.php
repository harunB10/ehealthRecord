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
                    <div class="panel-heading"><b>NOVI UNOS EVIDENCIJE PACIJENTA</b></div>

                    <div class="panel-body">

                        <div class="box-body">
                            @foreach($pacijenti as $pacijent)
                                {!! Form::model($pacijent, array('route' => array('unos.update', $pacijent->id), 'method' => 'PUT', 'files'=>true)) !!}

                                <table class="table">
                                    <tr>
                                        <td>Naziv Ustanove:</td>
                                        <td><select name="ustanova" class="form-control">
                                                <option>JU Dom Zdravlja Bihać</option>
                                                <option>JU Dom Zdravlja Cazin</option>
                                                <option>JU Dom Zdravlja Bužim</option>
                                                <option>JU Dom Zdravlja Bosanski Petrovac</option>
                                                <option>JU Dom Zdravlja Ključ</option>
                                                <option>JU Dom Zdravlja Sanski Most</option>
                                                <option>JU Dom Zdravlja Velika Kladuša</option>
                                                <option>JU Dom Zdravlja Bosanska Krupa</option>
                                            </select></td>

                                    </tr>
                                    <tr>
                                        <td>Ime i prezime pacijenta:</td>
                                        <td><b>{{ $pacijent->imePrezime }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Kompletan nalaz i mišljenje:</td>
                                        <td><input name="nalaz" type="file"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button class="btn btn-block btn-danger"><b>UNESI EVIDENCIJU</b></button>
                                        </td>

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
