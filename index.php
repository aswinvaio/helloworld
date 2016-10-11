<?php
/**
 * Created by PhpStorm.
 * User: aswin
 * Date: 10-10-2016
 * Time: 08:18 PM
 */
require('dbconnect.php');
$username_in = $password_in = $errLogin= "";
if(session_status()===PHP_SESSION_ACTIVE){
    if(!empty($_SESSION)) {
        header("Location: home.php");
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST)){
        //print_r($_POST);
        if(!empty($_POST['username'])&&!empty($_POST['password'])){
            $username_in = $_POST['username'];
            $password_in = $_POST['password'];
            $sql = "SELECT `UserID`,`Username`, `EmailAddress`, `Name`, `Phone` FROM `users` WHERE Username='{$username_in}' AND Password='{$password_in}'";
            $result = $conn->query($sql);
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
            else{
                $errLogin = "username & password doesnot match !";
            }
        } else {
            $errLogin = "invalid input !";
        }
    }
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
                    <li><a class="active" href="#"> <i class="icon-home icon-white"></i> Login</a></li>

                </ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </div><!-- /.navbar-inner -->
</div><!-- /.navbar -->
<br/><br/><br/>

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
<?php
print_r($_SESSION)
//}
//?>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
