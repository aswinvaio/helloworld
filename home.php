<?php
/**
 * Created by PhpStorm.
 * User: aswin
 * Date: 10-10-2016
 * Time: 10:50 PM
 */
require('dbconnect.php');


$name = "aswin";
?>
<html>
<head>
    <title>Hello world</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="aswin">
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="navbar.css" rel="stylesheet">

</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Project Name</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="#"><i class="icon-home icon-white"></i> Home</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <li class="dropdown" id="menuLogin">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin"><?php echo $name;?></a>
                        <div class="dropdown-menu" style="padding:17px;">
                                <a href="#">Edit Profile</a>
                        </div>
                    </li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </div><!-- /.navbar-inner -->
</div><!-- /.navbar -->
<br/><br/><br/>




<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
