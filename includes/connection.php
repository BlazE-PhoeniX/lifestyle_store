<?php

//make an connection with the data base
$con = mysqli_connect("/*your db host*/", "/*your db username*/", "/*your db password*/", "/*your db name*/")
or die(mysqli_error($con));

//start the session
session_start();

?>
