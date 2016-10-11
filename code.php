<?php
/**
 * Created by PhpStorm.
 * User: aswin
 * Date: 11-10-2016
 * Time: 03:41 PM
 */
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
                            <li class="divider"></li>
                            <li class="nav-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <li class="dropdown" id="menuLogin">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
                        <div class="dropdown-menu" style="padding:17px;">
                            <form class="form" id="formLogin">
                                <input name="username" id="username" type="text" placeholder="Username">
                                <input name="password" id="password" type="password" placeholder="Password"><br>
                                <button type="button" id="btnLogin" class="btn">Login</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </div><!-- /.navbar-inner -->
</div><!-- /.navbar -->
<br/><br/><br/>




<script src="http://code.jquery.com/jquery.js"></script>
</body>
</html>


<html>
<head>
    <title>Hello world</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="aswin">
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <style>
        .divider {
            height: 1px;
            width:100%;
            display:block; /* for use on default inline elements like span */
            margin: 9px 0;
            overflow: hidden;
            background-color: #e5e5e5;
        }
    </style>
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
                            <a href="profile.php">Edit Profile</a>
                        </div>
                    </li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </div><!-- /.navbar-inner -->
</div><!-- /.navbar -->
<br/><br/><br/>


index
<div class="container">
    <div class="row">
        <div class="span12">
            <form class="form-horizontal" action='' method="POST">
                <fieldset>
                    <div id="legend">
                        <legend class="">Login</legend>
                    </div>
                    <div class="control-group">
                        <!-- Username -->
                        <label class="control-label"  for="username">Username</label>
                        <div class="controls">
                            <input type="text" id="username" name="username" placeholder="" class="input-xlarge" value="<?php echo $username_in;?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Password-->
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn btn-success" type="submit">Login</button>
                            <a class="btn btn-success" href="signup.php" >Sign up</a>
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                            <span class="error"><?php echo $errLogin;?></span>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<!-- sign up form starts-->
<div class="container">
    <div class="row">
        <div class="span12">
            <form class="form-horizontal" action='' method="POST">
                <fieldset>
                    <div id="legend">
                        <legend class="">Sign up</legend>
                    </div>
                    <div class="control-group">
                        <!-- Name -->
                        <label class="control-label"  for="name">Name</label>
                        <div class="controls">
                            <input type="text" id="name" name="name" placeholder="" class="input-xlarge" value="<?php echo $name_in;?>">
                            <span class="error"><?php echo $errName;?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Email-->
                        <label class="control-label" for="email" >Email</label>
                        <div class="controls">
                            <input type="text" id="email" name="email" placeholder="" class="input-xlarge" value="<?php echo $email_in;?>">
                            <span class="error"><?php echo $errEmail;?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Phone-->
                        <label class="control-label" for="phone">Phone</label>
                        <div class="controls">
                            <input type="text" id="phone" name="phone" placeholder="" class="input-xlarge" value="<?php echo $phone_in;?>">
                            <span class="error"><?php echo $errPhone;?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Username-->
                        <label class="control-label" for="username">Username</label>
                        <div class="controls">
                            <input type="text" id="username" name="username" placeholder="" class="input-xlarge" value="<?php echo $username_in;?>">
                            <span class="error"><?php echo $errUsername;?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Password-->
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder="" class="input-xlarge" value="<?php echo $password_in;?>">
                            <span class="error"><?php echo $errPassword;?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Confirm Password-->
                        <label class="control-label" for="confirm">Confirm Password</label>
                        <div class="controls">
                            <input type="password" id="confirm" name="confirm" placeholder="" class="input-xlarge" value="<?php echo $confirm_in;?>">
                            <span class="error"><?php echo $errConfirm;?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn btn-success" type="submit">Sign up</button>
                            <a class="btn btn-success" href="index.php" >Already Signed up</a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="span12">
            <form class="form-horizontal" action='' method="POST">
                <fieldset>
                    <div id="legend">
                        <legend class="">Edit Profile</legend>
                    </div>
                    <div class="control-group">
                        <!-- Name -->
                        <label class="control-label"  for="name">Name</label>
                        <div class="controls">
                            <input type="text" id="name" name="name" placeholder="" class="input-xlarge" value="<?php echo $name_in;?>">
                            <span class="error"><?php echo $errName;?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Email-->
                        <label class="control-label" for="email" >Email</label>
                        <div class="controls">
                            <input type="text" id="email" name="email" placeholder="" class="input-xlarge" value="<?php echo $email_in;?>">
                            <span class="error"><?php echo $errEmail;?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Phone-->
                        <label class="control-label" for="phone">Phone</label>
                        <div class="controls">
                            <input type="text" id="phone" name="phone" placeholder="" class="input-xlarge" value="<?php echo $phone_in;?>">
                            <span class="error"><?php echo $errPhone;?></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn btn-success" type="submit">Save</button>
                            <a class="btn btn-success" href="home.php" >Cancel</a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
