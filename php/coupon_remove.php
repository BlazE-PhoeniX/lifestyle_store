<?php 

//preincludes
include '../includes/connection.php';

//remove coupon
unset($_SESSION['coupon']);

//redirect to cart page
header('location: ../cart');

?>