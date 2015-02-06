<!DOCTYPE html>

<html lang="en" ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">

    <title>RentStreet.ph | Rate</title><!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/app.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/landing-page.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/jquery-latest.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/script.js'); ?>"></script><!-- Custom CSS -->
    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type=
    "text/css">
    <link href=
    "http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic"
    rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.0.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body ng-controller="myController" ng-init="getCatOnly()">