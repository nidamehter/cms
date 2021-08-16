<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/cms/views/blog/" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,  maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= settings("blogTitle") ?></title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="styles.css" rel="stylesheet" media="screen" />

    <!-- Extensions -->
    <link rel="stylesheet" media="screen" href="js/particles/style.css" />
    <link rel="stylesheet" href="js/space/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            position: relative;
        }

        .offcanvasRenk {
            background-image: url("assets/img/home-bg.jpg");
        }

        .floating-menu {
            border-radius: 100px;
            z-index: 999;
            padding-top: 10px;
            padding-bottom: 10px;
            left:0px;
            display: inline-block;
            top: 200px;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            margin-top: 136px;
            position: sticky;
        }

        .top{
        margin-top: -380px;

        }
        .main-menu {
            margin: 0;
            padding-left: 0;
            list-style: none
        }

        .main-menu li a {
            display: block;
            padding: 20px;
            color: #fff;
            border-radius: 50px;
           
            -webkit-transition: none;
            -o-transition: none;
            transition: none
        }

        .main-menu li a:hover {
            background: rgba(244, 244, 244, .3)
        }

        .menu-bg {
            background-image: -webkit-linear-gradient(top, #1C5E91 0, #167699 100%);
            background-image: -o-linear-gradient(top, #1C5E91 0, #167699 100%);
            background-image: -webkit-gradient(linear, left top, left bottom, from(#1C5E91), to(#167699));
            background-image: linear-gradient(to bottom, #1C5E91 0, #167699 100%);
            background-repeat: repeat-x;
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50px;
            z-index: -1;
            top: 0;
            left: 0;
            -webkit-transition: .1s;
            -o-transition: .1s;
            transition: .1s
        }

        .ripple {
            position: relative;
            overflow: hidden;
            transform: translate3d(0, 0, 0)
        }

        .ripple:after {
            content: "";
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            background-image: radial-gradient(circle, #000 10%, transparent 10.01%);
            background-repeat: no-repeat;
            background-position: 50%;
            transform: scale(10, 10);
            opacity: 0;
            transition: transform .5s, opacity 1s
        }

        .ripple:active:after {
            transform: scale(0, 0);
            opacity: .2;
            transition: 0s
        }
    </style>

</head>