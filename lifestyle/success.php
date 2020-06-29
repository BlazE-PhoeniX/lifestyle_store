<!--preincludes-->
<?php include 'includes/connection.php'?>
<?php include 'includes/checklogin.php'?>

<!-- redirect user to index page if not logged in-->
<?php
if (!$loggedin) {
    header('location: index');
}

//selecting very thing from purchases that have status as Added to cart for specific user
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM purchases WHERE user_id = '$user_id'";
$check = mysqli_query($con, $query) or die(mysqli_error($con));
while ($purchase = mysqli_fetch_array($check)) {
    $purchase_id = $purchase['id'];
	
	//update the status of purchase as Confirmed 
    $query = "UPDATE purchases SET status = 'Confirmed' WHERE id = $purchase_id";
    if (mysqli_query($con, $query) == true) {
        $error = false;
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Lifestyle | Order Confirmation</title>
  
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <!--Roboto Font-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700;1,900&display=swap" rel="stylesheet" />

    <!--StyleSheets-->
    <link rel="stylesheet" href="style/style.css" />

    <!--fontawesome-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css" />
  </head>
  <body>
  
	<!--navigation bar -->
    <?php include 'includes/header.php'?>

    <main class="flex-grow-1 grey-back">
      <div class="container text-center">
	  
	  <!-- display success message if updation is successful -->
      <?php if (!$error) {?>
        <div class="row my-sm-5 bg-white align-items-center justify-content-around py-5 mt-0" id="success-msg">
          <div class="col-sm-4 figure">
            <img class="figure-img w-100 h-auto" src="https://i.ya-webdesign.com/images/png-file-download-2.png" alt="success">
          </div>
          <div class="col-sm-8">
            <div class="rounded">
              <div class="text-success row no-gutters justify-content-center">
                <h2 class="col-sm-auto">
                  Your order is confirmed.
                </h2>
                <h2 class="col-sm-auto">
                  &nbsp;Thank you for shopping with us.
                </h2>
              </div>
              <p class="lead"><a href="products">Click here</a> to purchase any other item</p>
          </div>
          </div>
        </div>
	  
	  <!--  redirect to cart page and shoe error if unsuccessful -->
	  <?php } else {header('location: cart?message=error');}?>
	  
      </div>
    </main>
	
	<!--footer -->
    <?php include 'includes/footer.php'?>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
