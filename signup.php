<?php
/**
 * Created by PhpStorm.
 * User: aswin
 * Date: 10-10-2016
 * Time: 10:52 PM
 */

require('includes/dbconnect.php');
$errName = $errPhone = $errEmail = $errUsername = $errPassword = $errConfirm = "";
$name_in = $email_in = $phone_in = $username_in = $password_in  = $confirm_in = "";
$canForward = true;
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

include("includes/header.php");
?>
<div class="container">
    <form class="form-horizontal" style="width: 100%" method="POST">
        <fieldset>
            <legend>Sign up</legend>

            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Name</label>
                <div class="col-md-4">
                    <input id="name" name="name" type="text" placeholder="" class="form-control input-md" value="<?php echo $name_in;?>">
                    <span class="error"><?php echo $errName;?></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">Email</label>
                <div class="col-md-4">
                    <input id="email" name="email" type="text" placeholder="" class="form-control input-md" value="<?php echo $email_in;?>">
                    <span class="error"><?php echo $errEmail;?></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="phone">Phone</label>
                <div class="col-md-4">
                    <input id="phone" name="phone" type="text" placeholder="" class="form-control input-md" value="<?php echo $phone_in;?>">
                    <span class="error"><?php echo $errPhone;?></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="username">Username</label>
                <div class="col-md-4">
                    <input id="username" name="username" type="text" placeholder="" class="form-control input-md" value="<?php echo $username_in;?>">
                    <span class="error"><?php echo $errUsername;?></span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="password">Password</label>
                <div class="col-md-4">
                    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" value="<?php echo $password_in;?>">
                    <span class="error"><?php echo $errPassword;?></span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="confirm">Confirm Password</label>
                <div class="col-md-4">
                    <input id="confirm" name="confirm" type="password" placeholder="" class="form-control input-md" value="<?php echo $confirm_in;?>">
                    <span class="error"><?php echo $errConfirm;?></span>
                </div>
            </div>



            <div class="form-group">
                <label class="col-md-4 control-label" for="login"></label>
                <div class="col-md-8">
                    <button id="signup" name="signup" class="btn btn-success">Sign up</button>
                    <a class="btn btn-primary" href="index.php" >Already Signed up</a>
                </div>
            </div>

        </fieldset>
    </form>
</div>

<?php
include("includes/footer.php");
?>
