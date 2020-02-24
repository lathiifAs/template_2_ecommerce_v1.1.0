<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ base_url('assets/images/favicon.png') }}">
    <title>Adminmart Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="{{ base_url('assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ base_url('assets/plugin/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ base_url('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ base_url('assets/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/plugin/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/plugin/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- import css -->
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