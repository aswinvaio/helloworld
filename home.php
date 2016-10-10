<?php
/**
 * Created by PhpStorm.
 * User: aswin
 * Date: 10-10-2016
 * Time: 10:50 PM
 */
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helloworlddb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username_in =
$sql = "SELECT `UserID`, `Username`, `Password`, `EmailAddress` FROM `users` WHERE 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["UserID"]. " - Name: " . $row["Username"]. " " . $row["Password"]. "<br>";
    }
}

//remove
session_destroy();
?>


