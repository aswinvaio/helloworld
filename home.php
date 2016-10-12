<?php
/**
 * Created by PhpStorm.
 * User: aswin
 * Date: 10-10-2016
 * Time: 10:50 PM
 */
require('includes/dbconnect.php');

$userid = $name = $email = $phone = $username = $message = "";
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
$title_in = $content_in = "";
$errTitle = $errContent = "";
$canForward = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
        $errTitle = "Title is required";
        $canForward = false;
    } else {
        $title_in = test_input($_POST["title"]);
    }
    if (empty($_POST["content"])) {
        $errContent = "Enter post content";
        $canForward = false;
    } else {
        $content_in = test_input($_POST["content"]);
    }
    if($canForward){
        $sqlinsert = "INSERT INTO posts(`UserID`, `Title`, `Content`) VALUES ({$userid},'{$title_in}','{$content_in}');";
        if ($conn->query($sqlinsert) === TRUE) {
            $message = 'success';
        } else {
            $message = 'failed';        }
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
        <div class="jumbotron" id="newpost">
            <h2>Write new post </h2>
            <form method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" style="width: 80%; font-weight: bold" name="title" placeholder="">
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" rows="5" style="width: 80%" id="content" name="content"></textarea>
                </div>
                <div class="form-group">
                    <button id="submit" name="submit" class="btn btn-success">Post</button>
                    <a class="btn btn-primary" href="#" >Cancel</a>
                </div>
            </form>
            <?php
            if($message == 'success') {
                echo('<div class="alert alert-success"> <strong>Success!</strong> Your post successfully submitted.</div>');
            } elseif($message=='failed'){
                echo('<div class="alert alert-danger"> <strong>Failed!</strong> Your post failed to submit.</div>');
            }

            ?>
        </div>
        <br/>

    </div>
    <div class="container">
        <?php
        $posts = "";

        $sqlread = "SELECT `PostID`, `UserID`, `Time`, `Title`, `Content` FROM `posts` WHERE UserID=".$userid.";";
        $result = $conn->query($sqlread);
        if ($result->num_rows > 0) {
            //has posts
            echo ('<h2>Your recent posts </h2>');
            $post_title = $post_time = $post_content="";
            while($row = $result->fetch_assoc()) {
                $post_title = $row["Title"];
                $post_time = $row["Time"];
                $post_content = $row["Content"];
                echo ('<div class="jumbotron" id="newpost">
                    <h3 ><b>'.strtoupper($post_title).'</b></h3>
                    <h6>'.$post_time.'</h6>
                    <p>'.$post_content.'</p>
                    </div>');
            }
        }
        else{
            echo ('<h2>Your recent posts will list here</h2>');
        }
        ?>
    </div>
<?php include("includes/footer.php");?>