<?php
//conn db        
$servername = "localhost";
$username = "root";
$password = "";
$database = "wpplugin";

//create conncetion
$con = mysqli_connect($servername, $username, $password, $database);

if (!$con) {
    die("Sorry Connection unsuccessful" . mysqli_connect_error());
} else {
    // echo'Connection was successful<br>';
}
