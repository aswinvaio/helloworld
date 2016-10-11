<?php
/**
 * Created by PhpStorm.
 * User: aswin
 * Date: 11-10-2016
 * Time: 01:18 AM
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
