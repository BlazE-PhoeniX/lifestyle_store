<!-- preincludes -->
<?php include 'includes/connection.php'?>
<?php include 'includes/checklogin.php'?>

<!-- redirect to index page if not loggedin-->
<?php
if (!$loggedin) {
    header('location: index');
}

//select all the items from the purchases database with status 'Added to cart' only the items of a particular user by their id
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM purchases WHERE user_id = '$user_id' and status = 'Added to cart'";
$check = mysqli_query($con, $query) or die(mysqli_error($con));
$total = 0;

//server errors while confirminig the orders
if (isset($_GET['message'])) {
    if ($_GET['message'] == "error") {
        $error = "There was some error with the server!, Please try again later";
    }
    else if($_GET['message'] == "invalidcoupon"){
        $error = "The coupon you entered is not a valid coupon";
    }
}

//check is coupon is applied
if (isset($_GET['coupon'])){
  $_SESSION['coupon'] = $_GET['coupon'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Lifestyle | Shopping Cart</title>
    
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

    <!--override styles-->
    <style>
      #form {
        box-shadow: none;
      }
      #form:hover {
        box-shadow: none;
      }
    </style>
	
  </head>
  <body>
  
	<!-- navigation bar -->
    <?php include 'includes/header.php'?>

	
    <div class="flex-grow-1">
      <main id="cart" class="bg-white container flex-grow-1 py-5 px-md-5">
	  
		<!--show server messages -->
        <?php if (isset($_GET['message'])) {?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <?php echo $error ?>
          </div>
        <?php }?>
		
		<!-- cart page -->
		<!-- check if user has any item in cart -->
        <?php if (mysqli_num_rows($check) > 0) {?>
        <div class="jumbotron mb-0 text-center text-white py-3 mb-5 px-2 mx-md-5">
          <p><strong>Address :</strong><br><?php echo $_SESSION['address'] ?></p>
          <p><strong>Phone no: </strong><?php echo $_SESSION['phoneno'] ?></p>
        </div>

        <div class="mt-0">
          <table class="table border text-center mx-auto table table-responsive-md border-bottom">
            <thead>
              <tr>
                <th scope="col">Item&nbsp;Number</th>
                <th scope="col">Item&nbsp;Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th class="font-weight-normal"><a class="text-danger" href="php/empty_cart.php">remove&nbsp;all</a></th>
              </tr>
            </thead>
            <tbody>
			
			<!--retrieve the data of the items from items data base--> 
            <?php
				$no = 1;
				while ($purchase = mysqli_fetch_array($check)) {
				$item_id = $purchase['item_id'];
				$query = "SELECT * FROM items WHERE id = '$item_id'";
				$items = mysqli_query($con, $query);
				while ($item = mysqli_fetch_array($items)) {
					$item_name = $item['name'];
					$quantity = $purchase['quantity'];
          $price = intval($quantity) * intval($item['price']);
          $dprice = $price;
          $category = $item['category'];
          if (isset($_SESSION['coupon'])) {
            if (stristr($_SESSION['coupon'], "CAPTUREIT")) {
              if($category == "camera"){
                $dprice = $price * (45 / 100);
              }
              $valid="success";
            }
            else if (stristr($_SESSION['coupon'], "TIMEWAITSFORNONE")) {
              if($category == "watch"){
                $dprice = $price * (30 / 100);
              }
              $valid="success";
            }
            else if (stristr($_SESSION['coupon'], "CLOTHSMAKEHALFMAN")) {
              if($category == "shirt"){
                $dprice = $price * (50 / 100);
              }
              $valid="success";
            }
            else {
              unset($_SESSION['coupon']);
              header('location: cart?message=invalidcoupon');
            }
          }
        }
				$total += $dprice;
				$purchase_id = $purchase['id'];
        $remove = "php/cart_remove.php?id=$purchase_id";
			?>
			
			<!-- display the data in the table -->
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $item_name ?></td>
                <td><?php echo $quantity ?></td>
                <td class="position-relative">
                  <?php echo $dprice ?><?php if(isset($_SESSION['coupon'])) { if($dprice < $price) { ?>&nbsp;<span class="d-lg-none h5 text-danger">*</span>
                  <span class="position-absolute fa-stack ">
                    <i class="fa fa-certificate fa-stack-2x"></i>
                    <i class="fa fa-tag fa-stack-1x fa-inverse"></i>
                  </span>
                  <?php } } ?>
                </td>
                <td><a class="text-danger" href="<?php echo $remove ?>"><i class="fa fa-trash position-relative fa-stack-2x"></i></a></td>
              </tr>
			  
			  <!-- increment the no of items -->
            <?php $no++;}?>
			
            </tbody>
          </table>
		  
		  <!--Display the total price -->
          <div class="text-center my-4 h5">Total : <span>Rs. <?php echo $total ?> /-</span></div>

      <!-- Input coupon code if no coupon applied -->
          <?php if(!isset($_SESSION['coupon'])){ ?>
            <div class="col-md-6 mx-auto">
              <form action="cart" class="row" method="GET" autocomplete="off">
                <input spellcheck="false" type="text" name="coupon" class="text-uppercase form-control border-info border-top-0 border-left-0 border-right-0 text-center" placeholder="Coupon code">
                <input type="submit" class=" px-3 col-4 offset-4 mt-2 btn btn-outline-info" value="APPLY">
              </form>
            </div>

      <!--display the applied coupon -->
          <?php } else { ?>
            <div class="alert-info rounded-lg border border-info col-md-10 col-lg-8 mx-auto">
              <p class="text-center m-0 py-2 lead text-uppercase">
                Coupon applied : <?php echo $_SESSION['coupon']; ?> 
                <a class="float-right text-decoration-none px-2 text-info" href="php/coupon_remove.php">&times;</a>
              </p>
            </div>
            <p class="text-danger h6 text-center text-uppercase col-md-10 col-lg-8 mx-auto py-2">Note: You can only use one coupon on each purchase!</p>
          <?php } ?>
		  
          <div class="mt-5 d-flex justify-content-around">
            <a href="products" class="arrow-left d-inline-block pl-4 w-25 btn btn-primary btn mr-5 text-center">Shop more</a>
            <a href="success" class="arrow-right d-inline-block pr-4 w-25 btn btn-success btn ml-5 text-center">Confirm Order</a>
          </div>
		  
		  <!--display a message for mobile users to slide across the table sice the table is scrolls --> 
          <div class="d-sm-none mt-5 px-2">
            <hr class="border-dark" />
            <table cellspacing="2px">
              <tr>
                <td class="pl-2">Note:-</td>
                <td><p class="mb-0 pl-3 font-weight-light text-secondary">Swipe right on the table to check all the details, before placing order.</p></td>
              </tr>
            </table>
            <hr class="border-dark" />
			
		<!-- To Display Cart is empty if no items found -->	
        <?php } else {?>
          <div class="mb-0 border-primary bg-primary text-white border rounded text-center py-3 mb-5 px-2 px-md-5 mx-md-5">
            <p class="h2">Your cart is empty!</p>
            <p class="lead">To purchase any other item<p>
            <p class="lead"><a class="px-5 btn btn-light" href="products">Click here</a></p>
          </div>
        <?php }?>

          </div>
        </div>
      </main>
    </div>
	
	<!--footer-->
    <?php include 'includes/footer.php'?>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
