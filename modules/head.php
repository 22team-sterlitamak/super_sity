<?php
/**
 * Created by PhpStorm.
 * User: Aleksandr
 * Date: 24.03.2019
 * Time: 4:07
 */
include_once './loader.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link href="assets/css/demo.css" rel="stylesheet"/>

    <link rel="icon" type="image/png" href="assets/img/favicon2.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Stata </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <link href="assets/css/demo.css" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet"/>
    <script src="assets/js/load.js" type="text/javascript"></script>
</head>
<body>
<div class="wrapper">
    <!-- Выдвигающая кнопка слева-->
    <input type="checkbox" id="nav-toggle" hidden>
    <nav class="nav">
        <?php
            include 'left_nav.php';
        ?>
        <div class="main-panel">