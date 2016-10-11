<?php
/**
 * Created by PhpStorm.
 * User: aswin
 * Date: 11-10-2016
 * Time: 10:12 PM
 */
require('includes/dbconnect.php');
$userid_in = $name_in = $email_in = $phone_in = "";
$errName = $errPhone = $errEmail  = "";
if(session_status()===PHP_SESSION_ACTIVE){
    if(empty($_SESSION)||!($_SESSION['LoggedIn']==true)) {
        header("Location: index.php");
    }else{
        $userid_in = $_SESSION['UserID'];
        $name_in =  $_SESSION['Name'];
    }
}
$sql = "SELECT `Username`, `EmailAddress`, `Name`, `Phone` FROM `users` WHERE UserID='{$userid_in}'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email_in= $row["EmailAddress"];
    $name_in= $row["Name"];
    $phone_in= $row["Phone"];
}

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
    if($canForward){
        $sql = "UPDATE users SET EmailAddress='{$email_in}', Name='{$name_in}', Phone='{$phone_in}' WHERE UserID={$userid_in}";
        if ($conn->query($sql) === TRUE) {
            $sql2 = "SELECT `UserID`,`Username`, `EmailAddress`, `Name`, `Phone` FROM `users` WHERE UserID={$userid_in}";
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
            // update fail
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
            <legend>Edit profile</legend>

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
                <label class="col-md-4 control-label" for="login"></label>
                <div class="col-md-8">
                    <button id="signup" name="signup" class="btn btn-success">Save</button>
                    <a class="btn btn-primary" href="home.php" >Cancel</a>
                </div>
            </div>

        </fieldset>
    </form>
</div>



<?php include("includes/footer.php"); ?>
