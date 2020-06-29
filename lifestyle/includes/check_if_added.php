<?php

//check if added function
function check_if_added($id)
{
    global $con;
	
	//check if logged in
    if (isset($_SESSION['email'])) {
		
		//check if the item is in Added to cart status in purchases db
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * fROM purchases WHERE user_id = '$user_id' AND item_id = '$id' AND status = 'Added to cart'";
        $cart_items = mysqli_query($con, $query) or die(mysqli_error($con));
        if (mysqli_num_rows($cart_items) != 0) {
            return true;
        } 
		
		//return false if not in db
		else {
            return false;
        }	
    } 
	
	//return false if not logged in
	else {
        return false;
    }
}

?>
