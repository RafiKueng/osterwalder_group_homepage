<?php

global $title;
global $h1title;
global $h1subtitle;

echo <<<END
<html lang="en">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>$title</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google" content="notranslate" />
        <meta http-equiv="Content-Language" content="en_US" />

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="container">
        <div id="topborder"></div>
        <header>
          <img id="uzhlogo" src="img/uzh_logo_d_pos_web_main_zone.jpg"/>
          <h1>
            <span id="h1main">$h1title</span>
            <br>
            <span id="h1sub">$h1subtitle</span>
          </h1>
          <img id="banner" src="img/demo.png" alt="" />
        </header>
END;
?>