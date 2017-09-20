@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>Status zahtjeva za termine pregleda</b></div>

                        <div class="panel-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            Datum:
                                        </td>
                                        <td>
                                            {{ date('d F, Y, G:i', strtotime($not->datum)) }}h
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Status:
                                        </td>
                                        <td width="50%">
                                            @if($not->status == 1)
                                                <img src="{{ asset('/img/tacno.png') }}" width="50" height="50"/>
                                            @else
                                                <img src="{{ asset('/img/netacno.png') }}" width="50" height="50"/>

                                            @endif
                                        </td>
                                    </tr>
                                </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection
