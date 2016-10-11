<?php
/**
 * Created by PhpStorm.
 * User: aswin
 * Date: 10-10-2016
 * Time: 08:18 PM
 */
require('includes/dbconnect.php');
$username_in = $password_in = $errLogin= "";
$errLogin = '';
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
//
//if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
//{
//    echo '1';
//}
//else
//{
//
include("includes/header.php");
?>
    <div class="container">
    <form class="form-horizontal" style="width: 100%" method="POST">
        <fieldset>
            <legend>Login</legend>

            <div class="form-group">
                <label class="col-md-4 control-label" for="username">User Name</label>
                <div class="col-md-4">
                    <input id="username" name="username" type="text" placeholder="Enter username" class="form-control input-md" value="<?php echo $username_in;?>" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="password">Password</label>
                <div class="col-md-4">
                    <input id="password" name="password" type="password" placeholder="Enter password" class="form-control input-md" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="login"></label>
                <div class="col-md-8">
                    <button id="login" name="login" class="btn btn-success">Login</button>
                    <a class="btn btn-primary" href="signup.php" >Sign up</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="error"></label>
                <div class="col-md-8">
                    <span class="error"><?php echo $errLogin;?></span>
                </div>
            </div>


        </fieldset>
    </form>
</div>
<?php include("includes/footer.php");
