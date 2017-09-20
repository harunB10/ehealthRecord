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
                        @foreach($notifikacije as $n)
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                Datum:
                            </td>
                            <td>
                                {{ date('d F, Y, G:i', strtotime($n->datum)) }}h
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Status:
                            </td>
                            <td width="50%">
                                @if($n->status == 1)
                                   <img src="{{ asset('/img/tacno.png') }}" width="35" height="35"/>
                                    @else
                                   <img src="{{ asset('/img/netacno.png') }}" width="35" height="35"/>

                                @endif
                            </td>
                        </tr>
                    </table>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
