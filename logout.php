<?php
/**
 * Created by PhpStorm.
 * User: aswin
 * Date: 11-10-2016
 * Time: 02:50 AM
 */

require('includes/dbconnect.php');
$_SESSION['LoggedIn'] = false;
session_destroy();
header("Location: index.php");
