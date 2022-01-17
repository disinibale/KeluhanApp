@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h3 class="h3">
        @yield('page_header')
    </h3>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@stop

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#pilih-teknisi').select2({
                width: 'resolve',
                theme: 'classic'
            });
        });

        $(function() {
            $('#tanggal-perbaikan').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2022,
                maxYear: parseInt(moment().format('YYYY', 10))
            });

            $('#tanggal-selesai').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2022,
                maxYear: parseInt(moment().format('YYYY', 10))
            });
        });

    </script>
@stop
