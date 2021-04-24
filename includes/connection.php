<?php

//make an connection with the data base
$con = mysqli_connect($_ENV["HOST"], $_ENV["USER"], $_ENV["PASS"], $_ENV["DBNAME"])
or die(mysqli_error($con));

//start the session
session_start();

?>
