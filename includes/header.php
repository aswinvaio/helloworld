<?php
/**
 * Created by PhpStorm.
 * User: aswin
 * Date: 12-10-2016
 * Time: 01:20 AM
 */
$name="";
$loginlogout = "Login";
?>
<html>
<head>
    <title>Hello world</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="aswin">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" >

    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown" id="menuLogin">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin"><?php echo $name;?></a>
                <div class="dropdown-menu" style="padding:17px;">
                    <a href="profile.php">Edit Profile</a>
                </div>
                </li>
                <li><a href="logout.php"><?php echo $loginlogout;?></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<br/><br/><br/>

