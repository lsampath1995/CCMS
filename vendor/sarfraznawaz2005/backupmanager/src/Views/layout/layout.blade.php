<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Sarfraz Ahmed (sarfraznawaz2005@gmail.com)">

    <title>Backup Manager</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
          crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap4.min.css">

    <style>
        body {
            padding-top: 4rem;
            font-size: 0.8rem;
            font-family: sans-serif;
            line-height: 1.0;
            margin-bottom: 50px;
            background-image: url("public/upload/backgrounds/background1.jpg");

        }

        .table td, .table th {
            padding: .50rem;
            vertical-align: middle;
        }

        .table thead {
            background-image: linear-gradient(#eee, #ddd);
        }

        .card-header {
            padding: .40rem 1.25rem;
            line-height: 250%;
        }

        .warning {
            background: #FAF2CC;
        }

        legend {
            border: 0 none;
            font-size: 14px;
            line-height: 20px;
            margin-bottom: 0;
            width: auto;
            padding: 0 10px;
            font-weight: bold;
        }

        fieldset {
            border: 1px solid #e0e0e0;
            padding: 10px;
        }

        /*==================================================
        * Effect 2
        * ===============================================*/
        .shadow {
            position: relative;
        }

        .shadow:before, .shadow:after {
            z-index: -1;
            position: absolute;
            content: "";
            bottom: 15px;
            left: 10px;
            width: 50%;
            top: 80%;
            max-width: 300px;
            background: #222222;
            -webkit-box-shadow: 0 15px 10px #222222;
            -moz-box-shadow: 0 15px 10px #222222;
            box-shadow: 0 15px 10px #222222;
            -webkit-transform: rotate(-3deg);
            -moz-transform: rotate(-3deg);
            -o-transform: rotate(-3deg);
            -ms-transform: rotate(-3deg);
            transform: rotate(-3deg);
        }

        .shadow:after {
            -webkit-transform: rotate(3deg);
            -moz-transform: rotate(3deg);
            -o-transform: rotate(3deg);
            -ms-transform: rotate(3deg);
            transform: rotate(3deg);
            right: 10px;
            left: auto;
        }

        .stripe {
            color: white;
            background: repeating-linear-gradient(45deg, #007BFF, #007BFF 20%, #3898ff 10px, #3898ff);
            background-size: 100% 20px;
        }
        nav {
            background-image: radial-gradient(#37ba37, #34a334);
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

    @stack('styles')
</head>

<a href="{{ url('http://localhost/') }}" ><img alt="logo" class="center" src="{{ asset('public/upload/logo/logo.png') }}"></a><br><br><br><br>
<main role="main" class="container">

    <div class="card shadow">
        <div class="card-header bg-primary text-white stripe">
            <strong>@yield('title')</strong>

            <div class="float-right">
                @yield('header')
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="card-body">
            @if(Session::has('messages'))
                @foreach (Session::get('messages') as $message)
                    <p class="alert alert-{{ $message['type'] }}">
                        <strong>{{ $message['message'] }}</strong>
                    </p>
                @endforeach
            @endif

            @yield('content')
        </div>

    </div>
</main>
<br><br><br>
<p align="center" style="margin-top: 90px;">cms | ?? 2021 All Rights Reserved.</p>

<!-- Bootstrap core JavaScript
================================================== -->
<script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
</script>
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous">
</script>
<script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous">
</script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>

@stack('scripts')

</body>
</html>
