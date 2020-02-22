<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GPMC Sabdaguru</title>
    <!-- form detail -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/lightslider.min.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/all.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/themify-icons.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/magnific-popup.css') }}">
    <!-- style CSS -->

    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/style.css') }}">
    <!-- /from detail -->
    <link rel="icon" href="{{ base_url('assets/client_template/img/favicon.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet"> <!-- for live demo page -->

    @if(!empty($css))
        @foreach ($css as $url_css)
        <link href="{{ base_url($url_css) }}" rel="stylesheet">
        @endforeach
    @endif

    <style>
        .select2-container .select2-selection--single {
            height: 40px !important;
        }
    </style>

</head>

<body class="bg-white">