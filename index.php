<?php
/**
 * Created by PhpStorm.
 * User: aswin
 * Date: 10-10-2016
 * Time: 08:18 PM
 */
require('dbconnect.php');
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
<!-- Static navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
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
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
                <li><a href="../navbar-static-top/">Static top</a></li>
                <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>

<?php

if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
   // already logged in
   header("Location: home.php");
}
if(isset($_POST)){
    //print_r($_POST);
    if(!empty($_POST['username'])&&!empty($_POST['password'])){
        $username_in = $_POST['username'];
        $password_in = $_POST['password'];
        $sql = "SELECT `UserID`, `EmailAddress` FROM `users` WHERE Username='{$username_in}' AND Password='{$password_in}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //login success
            $row = $result->fetch_assoc();
            $_SESSION['UserID'] = $row["UserID"];
            $_SESSION['EmailAddress'] = $row["EmailAddress"];
            $_SESSION['Username'] = null;
            $_SESSION['LoggedIn'] = true;
        }
        else{
            // login fail

        }
    }
}
?>

<?php
//
//if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
//{
//    echo '1';
//}
//else
//{
//?>
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
                            <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
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
                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php
//}
//?>

<script src="http://code.jquery.com/jquery.js"></script>
</body>
</html>
