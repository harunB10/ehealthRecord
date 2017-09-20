@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
    <style>
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>

{!! Form::open() !!}
    <table id="example" class="table table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Ime i prezime:</th>
            <th>Broj zdravstvene knjižice:</th>
            <th>Doktor:</th>
            <th>Za datum:</th>
            <th></th>
        </tr>
        </thead>
        <tfoot>
        <tr class="hidden">
            <th>Ime i prezime:</th>
            <th>Broj zdravstvene knjižice:</th>
            <th>Doktor:</th>
            <th>Za datum:</th>
            <th></th>
        </tr>
        </tfoot>
        <tbody>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>

    </table>

{!! Form::close() !!}


    <script>$(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text"  placeholder="Pretraži '+title+'" />' );
            } );

            // DataTable
            var table = $('#example').DataTable();

            // Apply the search
            table.columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                                .search( this.value )
                                .draw();
                    }
                } );
            } );
        } );</script>


@endsection
