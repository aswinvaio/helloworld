<?php
/**
 * Created by PhpStorm.
 * User: aswin
 * Date: 10-10-2016
 * Time: 10:50 PM
 */
require('includes/dbconnect.php');

$userid = $name = $email = $phone = $username = "";
if(session_status()===PHP_SESSION_ACTIVE){
    if(empty($_SESSION)||!($_SESSION['LoggedIn']==true)) {
        header("Location: index.php");
    }else{
        $userid = $_SESSION['UserID'];
        $name = $_SESSION['Name'];
        $email = $_SESSION['EmailAddress'];
        $phone = $_SESSION['Phone'];
        $username = $_SESSION['Username'];
    }
}
include("includes/header.php");
?>
<div class="container">
        <h2>Your recent post </h2>
        <br/>
    <form>
        <div class="form-group">
            <label style="font-size: 150%" for="title">Title</label>
            <input type="text" class="form-control" id="title" style="width: 70%" name="title" placeholder="">
        </div>
        <div class="form-group">
            <label style="font-size: 150%" for="content">Content:</label>
            <textarea class="form-control" rows="5" style="width: 70%" id="content"></textarea>
        </div>
    </form>
</div>
<?php include("includes/footer.php");?>