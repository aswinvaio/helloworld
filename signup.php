<?php
/**
 * Created by PhpStorm.
 * User: aswin
 * Date: 10-10-2016
 * Time: 10:52 PM
 */

require('dbconnect.php');
$errName = $errPhone = $errEmail = $errUsername = $errPassword = $errConfirm = "";
$name_in = $email_in = $phone_in = $username_in = $password_in  = $confirm_in = "";
$canForward = true;
print_r($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $errName = "Name is required";
        $canForward = false;
    } else {
        $name_in = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $errEmail = "Email is required";
        $canForward = false;
    } else {
        $email_in_temp = test_input($_POST["email"]);
        if (!filter_var($email_in_temp, FILTER_VALIDATE_EMAIL)) {
            $errEmail = "Invalid email format";
            $canForward = false;
        } else{
            $email_in = $email_in_temp;
        }
    }

    if (empty($_POST["phone"])) {
        $errPhone = "Enter your phone number";
        $canForward = false;
    } else {
        $phone_in_temp = test_input($_POST["phone"]);
        if (!preg_match('/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/',$phone_in_temp)) {
            $errPhone = "enter valid phone number";
            $canForward = false;
        } else{
            $phone_in = $phone_in_temp;
        }
    }

    if (empty($_POST["username"])) {
        $errUsername = "enter valid username";
        $canForward = false;
    } else {
        $username_in_temp = test_input($_POST["username"]);
        if (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/',$username_in_temp)) {
            $errUsername = "only alphanumeric usernames without white space allowed !";
            $canForward = false;
        } else{
            $username_in = $username_in_temp;
        }
    }
    if (empty($_POST["password"])) {
        $errPassword = "enter a password";
        $canForward = false;
    } else {
        $password_in = test_input($_POST["password"]);
    }
    if (empty($_POST["confirm"])) {
        $errConfirm = "reenter your password";
        $canForward = false;
    } else {
        if($password_in != $_POST['confirm']) {
            $errConfirm = "password mismatch!";
            $canForward = false;
        } else{
            $confirm_in = test_input($_POST["confirm"]);
        }
    }
    if($canForward){
        $sql = "INSERT INTO users( `Username`, `Password`, `EmailAddress`, `Name`, `Phone`) VALUES ('{$username_in}','{$password_in}','{$email_in}','{$name_in}','{$phone_in}')";
        if ($conn->query($sql) === TRUE) {
            $sql2 = "SELECT `UserID`,`Username`, `EmailAddress`, `Name`, `Phone` FROM `users` WHERE Username='{$username_in}' AND Password='{$password_in}'";
            $result = $conn->query($sql2);
            if ($result->num_rows > 0) {
                //login success
                $row = $result->fetch_assoc();
                $_SESSION['UserID'] = $row["UserID"];
                $_SESSION['EmailAddress'] = $row["EmailAddress"];
                $_SESSION['Username'] = $row["Username"];
                $_SESSION['Name'] = $row["Name"];
                $_SESSION['Phone'] = $row["Phone"];
                $_SESSION['LoggedIn'] = true;
                header("Location: home.php");
            }
        } else {
            // sign up fail
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<html>
<head>
    <title>Hello world</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="aswin">
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="navbar.css" rel="stylesheet">
    <style>
        .error {color: #FF0000;}
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
                    <li><a href="#"><i class="icon-home icon-white"></i> Home</a></li>
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
                    <li><a class="active" href="index.php"> <i class="icon-home icon-white"></i> Login</a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </div><!-- /.navbar-inner -->
</div><!-- /.navbar -->
<br/><br/><br/>

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


<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
