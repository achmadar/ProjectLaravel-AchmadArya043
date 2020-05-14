<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('img/logo.png') }}" rel="ICON"/>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/now-ui-dashboard.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">

    @stack('css')


</head>
<body class="{{ $class ?? '' }}" onload="{{ $onload ?? '' }}">

    <div class="wrapper">

        @auth
            @include('layouts.page_template.auth')
        @endauth

        @guest
          @include('layouts.page_template.guest')
        @endguest

    </div>    

</body>

<script src="{{ asset('js/core/jquery.min.js') }}"></script>

<script src="{{ asset('js/core/popper.min.js') }}"></script>

<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

<script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>

<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>

<script src="{{ asset('js/now-ui-dashboard.min.js?v=1.3.0') }}" type="text/javascript"></script>

<script src="{{ asset('js/jquery-3.3.1.min.js') }}" type="text/javascript" ></script>

<script src="{{ asset('js/jquery.nice-select.min.js') }}" type="text/javascript" ></script>

@stack('js')

<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js" type="text/javascript"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js" type="text/javascript"></script> -->
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://raw.githubusercontent.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend: 'excel', className: 'btn-warning' },
            { extend: 'pdf', className: 'btn-warning' },
            { extend: 'print', className: 'btn-warning' }
        ]
        });
    } );
</script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable2').DataTable({
            "searching": false,
            "blengthChange": false,
            "bPaginate": false,
            "bInfo": false,
            "bAutoWidth": false
        });
    } );
</script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable3').DataTable({
            "searching": false,
            "blengthChange": false,
            "bPaginate": false,
            "bInfo": false,
            "bAutoWidth": false,
        dom: 'Bfrtip',
        buttons: [
            { extend: 'excel', className: 'btn-warning' },
            { extend: 'pdf', className: 'btn-warning' },
            { extend: 'print', className: 'btn-warning' }
        ]
        });
    } );
</script>

</html>