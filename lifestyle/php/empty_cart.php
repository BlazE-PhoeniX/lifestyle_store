<?php

include '../includes/connection.php';
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM purchases WHERE user_id = '$user_id' and status = 'Added to cart'";
$purchases = mysqli_query($con, $query) or die(mysqli_error($con));

while($purchase = mysqli_fetch_array($purchases)) {
  $purchase_id=$purchase['id'];
  $query = "DELETE FROM purchases WHERE id = '$purchase_id'";
  mysqli_query($con,$query);
}

unset($_SESSION['coupon']);

header('location: ../cart');

?>


