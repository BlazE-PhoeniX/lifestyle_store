<!-- pre includes -->
<?php include 'includes/connection.php'?>
<?php include 'includes/checklogin.php'?>

<!-- Function to check whether an item as been added to the cart --> 
<?php include 'includes/check_if_added.php'?>

<!-- server side messages -->
<?php
if (isset($_GET['message'])) {
	
	//server errors while adding an item to cart
    if ($_GET['message'] == "error") {
        $error = "There was some error with the server!, Please try again later";
    }
	
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Lifestyle | Products</title>
    
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

    <!--override-styles-->
    <style>
      div.d-flex.flex-column {
        background-color: white;
      }
      input[type="number"]{
        text-align: center;
      }
      i.fa-location-arrow{
        transform: rotate(45deg);
        /* position: relative; */
        /* top: 4px; */
        color: red;
      }
    </style>
	
  </head>
  <body>
  
	<!-- navigation bar -->
    <?php include 'includes/header.php'?>
	
    <div class="flex-grow-1 grey-back">
      <main class="container px-5 bg-white py-5">
	  
		<!-- show server side messages -->
        <?php if (isset($_GET['message'])) {?>
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <?php echo $error ?>
          </div>
        <?php }?>
		
		<!-- products page-->
        <div class="jumbotron mb-0 text-center text-white">
          <h1>Welcome to our Lifestyle Store</h1>
          <p class="font-italic">We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>
        </div>
		
        <hr class="mt-5" />
		
		<!-- Cameras -->
        <div id="cameras" class="mb-5 row justify-content-center text-center">
          <div class="col-lg-8 align-self-center">
            <h2 class="display-2 font-weight-bold">Camera</h2>
            <p class="h1 lead font-italic">"&nbsp;Shoot the sweetest moments&nbsp;"</p>
            <div class="offer mx-auto text-uppercase mt-3 alert alert-dark rounded-lg py-2 px-3">
              <p class="m-0 ml-3 ">Use&nbsp;coupon "&nbsp;<strong>CAPTUREIT</strong>&nbsp;" to get <strong>45%</strong> offer on Cameras</p>
            </div>
          </div>
		  
          <div id="product-1" class="product px-2 mt-5 col-md-6 col-lg-4">
            <div class="p-1 border rounded d-flex flex-column justify-content-between">
              <img src="images/2.jpg" alt="one of the products" class="w-100 h-auto figure-img" />
              <div class="figure-caption">
                <h3>Canon EOS</h3>
                <p>Price: Rs. 36,000</p>
				
				<!-- show add to cart button if not added and show added to cart text if already added -->
                <?php if (check_if_added(1)) {?>
					<p class="h5 font-italic text-success text-center">Added to cart!</p>
                <?php } else {?>
					<form action="php/addtocart.php" method="POST">
					  <label>Quantity: <input  type="number" max="10" min="1" name="quantity" value="1"></label>
					  <input type="hidden" name="id" value="1">
					  <input type="submit" class="btn-block btn btn-info" value="Add to cart">
					</form>
                <?php }?>
				
              </div>
            </div>
          </div>
		  
          <div id="product-2" class="product px-2 mt-5 col-md-6 col-lg-4">
            <div class="p-1 border rounded h-100 d-flex flex-column justify-content-between">
              <img src="images/3.jpg" alt="one of the products" class="w-100 h-auto figure-img" />
              <div class="figure-caption">
                <h3>Nikon DSLR</h3>
                <p>Price: Rs. 40,000</p>
				
				<!-- show add to cart button if not added and show added to cart text if already added -->
                <?php if (check_if_added(2)) {?>
					<p class="h5 font-italic text-success text-center">Added to cart!</p>
                <?php } else {?>
					<form action="php/addtocart.php" method="POST">
					  <label>Quantity: <input  type="number" max="10" min="1" name="quantity" value="1"></label>
					  <input type="hidden" name="id" value="2">
					  <input type="submit" class="btn-block btn btn-info" value="Add to cart">
					</form>
                <?php }?>
				
              </div>
            </div>
          </div>
		  
          <div id="product-3" class="product px-2 mt-5 col-md-6 col-lg-4">
            <div class="p-1 border rounded h-100 d-flex flex-column justify-content-between">
              <img src="images/4.jpg" alt="one of the products" class="w-100 h-auto figure-img" />
              <div class="figure-caption">
                <h3>Sony DSLR</h3>
                <p>Price: Rs. 45,000</p>
				
				<!-- show add to cart button if not added and show added to cart text if already added -->
                <?php if (check_if_added(3)) {?>
					<p class="h5 font-italic text-success text-center">Added to cart!</p>
                <?php } else {?>
					<form action="php/addtocart.php" method="POST">
					  <label>Quantity: <input  type="number" max="10" min="1" name="quantity" value="1"></label>
					  <input type="hidden" name="id" value="3">
					  <input type="submit" class="btn-block btn btn-info" value="Add to cart">
					</form>
                <?php }?>
				
              </div>
            </div>
          </div>
		  
          <div id="product-4" class="product px-2 mt-5 col-md-6 col-lg-4">
            <div class="p-1 border rounded h-100 d-flex flex-column justify-content-between">
              <img src="images/5.jpg" alt="one of the products" class="w-100 h-auto figure-img" />
              <div class="figure-caption">
                <h3>OLYMPUS DSLR</h3>
                <p>Price: Rs. 50,000</p>
				
				<!-- show add to cart button if not added and show added to cart text if already added -->
                <?php if (check_if_added(4)) {?>
					<p class="h5 font-italic text-success text-center">Added to cart!</p>
                <?php } else {?>
					<form action="php/addtocart.php" method="POST">
					  <label>Quantity: <input  type="number" max="10" min="1" name="quantity" value="1"></label>
					  <input type="hidden" name="id" value="4">
					  <input type="submit" class="btn-block btn btn-info" value="Add to cart">
					</form>
                <?php }?>
				
              </div>
            </div>
          </div>
        </div>
		
        <hr class="mt-5" />
		
		<!-- watches-->
        <div id="watches" class="mb-5 row justify-content-center text-center">
          <div class="col-lg-8 align-self-center">
            <h2 class="display-2 font-weight-bold">Watch</h2>
            <p class="h1 lead font-italic">"&nbsp;Keep up with your life like no other&nbsp;"</p>
            <div class="offer mx-auto text-uppercase mt-3 alert alert-dark rounded-lg py-2 px-3">
              <p class="m-0">Use&nbsp;coupon "&nbsp;<strong>TIMEWAITSFORNONE</strong>&nbsp;" to get <strong>30%</strong> offer on Watches</p>
            </div>
          </div>
		  
          <div id="product-5" class="product px-2 mt-5 col-md-6 col-lg-4">
            <div class="p-1 border rounded h-100 d-flex flex-column justify-content-between">
              <img src="images/9.jpg" alt="one of the products" class="w-100 h-auto figure-img" />
              <div class="figure-caption">
                <h3>Titan Model #301</h3>
                <p>Price: Rs. 13,000</p>
				
				<!-- show add to cart button if not added and show added to cart text if already added -->
                <?php if (check_if_added(5)) {?>
					<p class="h5 font-italic text-success text-center">Added to cart!</p>
                <?php } else {?>
					<form action="php/addtocart.php" method="POST">
					  <label>Quantity: <input  type="number" max="10" min="1" name="quantity" value="1"></label>
					  <input type="hidden" name="id" value="5">
					  <input type="submit" class="btn-block btn btn-info" value="Add to cart">
					</form>
                <?php }?>
				
              </div>
            </div>
          </div>
		  
          <div id="product-6" class="product px-2 mt-5 col-md-6 col-lg-4">
            <div class="p-1 border rounded h-100 d-flex flex-column justify-content-between">
              <img src="images/10.jpg" alt="one of the products" class="w-100 h-auto figure-img" />
              <div class="figure-caption">
                <h3>Ttan Model #201</h3>
                <p>Price: Rs. 3,000</p>
				
				<!-- show add to cart button if not added and show added to cart text if already added -->
                <?php if (check_if_added(6)) {?>
					<p class="h5 font-italic text-success text-center">Added to cart!</p>
                <?php } else {?>
					<form action="php/addtocart.php" method="POST">
					  <label>Quantity: <input  type="number" max="10" min="1" name="quantity" value="1"></label>
					  <input type="hidden" name="id" value="6">
					  <input type="submit" class="btn-block btn btn-info" value="Add to cart">
                </form>
                <?php }?>
				
              </div>
            </div>
          </div>
		  
          <div id="product-7" class="product px-2 mt-5 col-md-6 col-lg-4">
            <div class="p-1 border rounded h-100 d-flex flex-column justify-content-between">
              <img src="images/11.jpg" alt="one of the products" class="w-100 h-auto figure-img" />
              <div class="figure-caption">
                <h3>HMT Milan</h3>
                <p>Price: Rs. 8,000</p>
				
				<!-- show add to cart button if not added and show added to cart text if already added -->
                <?php if (check_if_added(7)) {?>
					<p class="h5 font-italic text-success text-center">Added to cart!</p>
                <?php } else {?>
					<form action="php/addtocart.php" method="POST">
					  <label>Quantity: <input  type="number" max="10" min="1" name="quantity" value="1"></label>
					  <input type="hidden" name="id" value="7">
					  <input type="submit" class="btn-block btn btn-info" value="Add to cart">
					</form>
                <?php }?>
				
              </div>
            </div>
          </div>
		  
          <div id="product-8" class="product px-2 mt-5 col-md-6 col-lg-4">
            <div class="p-1 border rounded h-100 d-flex flex-column justify-content-between">
              <img src="images/15.jpg" alt="one of the products" class="w-100 h-auto figure-img" />
              <div class="figure-caption">
                <h3>Faber Luba #111</h3>
                <p>Price: Rs. 18,000</p>
				
				<!-- show add to cart button if not added and show added to cart text if already added -->
                <?php if (check_if_added(8)) {?>
					<p class="h5 font-italic text-success text-center">Added to cart!</p>
                <?php } else {?>
					<form action="php/addtocart.php" method="POST">
					  <label>Quantity: <input  type="number" max="10" min="1" name="quantity" value="1"></label>
					  <input type="hidden" name="id" value="8">
					  <input type="submit" class="btn-block btn btn-info" value="Add to cart">
					</form>
                <?php }?>
				
              </div>
            </div>
          </div>
        </div>
		
        <hr class="mt-5" />
		
		<!-- Shirts -->
        <div id="shirts" class="mb-5 row justify-content-center text-center">
          <div class="col-lg-8 align-self-center">
            <h2 class="display-2 font-weight-bold">Shirts</h2>
            <p class="h1 lead font-italic">"&nbsp;Choose from a wide range of collections&nbsp;"</p>
            <div class="offer mx-auto text-uppercase mt-3 alert alert-dark rounded-lg py-2 px-3">
              <p class="m-0">Use&nbsp;coupon "<strong>&nbsp;CLOTHSMAKEHALFMAN&nbsp;</strong>" to get <strong>50%</strong> offer on Watches</p>
            </div>
          </div>
		  
          <div id="product-9" class="product px-2 mt-5 col-md-6 col-lg-4">
            <div class="p-1 border rounded h-100 d-flex flex-column justify-content-between">
              <img src="images/6.jpg" alt="one of the products" class="w-100 h-auto figure-img" />
              <div class="figure-caption">
                <h3>H & W</h3>
                <p>Price: Rs. 800</p>
				
				<!-- show add to cart button if not added and show added to cart text if already added -->
                <?php if (check_if_added(9)) {?>
					<p class="h5 font-italic text-success text-center">Added to cart!</p>
                <?php } else {?>
					<form action="php/addtocart.php" method="POST">
					  <label>Quantity: <input  type="number" max="10" min="1" name="quantity" value="1"></label>
					  <input type="hidden" name="id" value="9">
					  <input type="submit" class="btn-block btn btn-info" value="Add to cart">
					</form>
                <?php }?>
				
              </div>
            </div>
          </div>
		  
          <div id="product-10" class="product px-2 mt-5 col-md-6 col-lg-4">
            <div class="p-1 border rounded h-100 d-flex flex-column justify-content-between">
              <img src="images/8.jpg" alt="one of the products" class="w-100 h-auto figure-img" />
              <div class="figure-caption">
                <h3>Luis Phil</h3>
                <p>Price: Rs. 1,000</p>
				
				<!-- show add to cart button if not added and show added to cart text if already added -->
                <?php if (check_if_added(10)) {?>
					<p class="h5 font-italic text-success text-center">Added to cart!</p>
                <?php } else {?>
					<form action="php/addtocart.php" method="POST">
					  <label>Quantity: <input  type="number" max="10" min="1" name="quantity" value="1"></label>
					  <input type="hidden" name="id" value="10">
					  <input type="submit" class="btn-block btn btn-info" value="Add to cart">
					</form>
                <?php }?>
				
              </div>
            </div>
          </div>
		  
          <div id="product-11" class="product px-2 mt-5 col-md-6 col-lg-4">
            <div class="p-1 border rounded h-100 d-flex flex-column justify-content-between">
              <img src="images/13.jpg" alt="one of the products" class="w-100 h-auto figure-img" />
              <div class="figure-caption">
                <h3>John Zok</h3>
                <p>Price: Rs. 1,500</p>
				
				<!-- show add to cart button if not added and show added to cart text if already added -->
                <?php if (check_if_added(11)) {?>
					<p class="h5 font-italic text-success text-center">Added to cart!</p>
                <?php } else {?>
					<form action="php/addtocart.php" method="POST">
					  <label>Quantity: <input  type="number" max="10" min="1" name="quantity" value="1"></label>
					  <input type="hidden" name="id" value="11">
					  <input type="submit" class="btn-block btn btn-info" value="Add to cart">
					</form>
                <?php }?>
				
              </div>
            </div>
          </div>
		  
          <div id="product-12" class="product px-2 mt-5 col-md-6 col-lg-4">
            <div class="p-1 border rounded h-100 d-flex flex-column justify-content-between">
              <img src="images/14.jpg" alt="one of the products" class="w-100 h-auto figure-img" />
              <div class="figure-caption">
                <h3>Jhalsani</h3>
                <p>Price: Rs. 1,300</p>
				
				<!-- show add to cart button if not added and show added to cart text if already added -->
                <?php if (check_if_added(12)) {?>
					<p class="h5 font-italic text-success text-center">Added to cart!</p>
                <?php } else {?>
					<form action="php/addtocart.php" method="POST">
					  <label>Quantity: <input  type="number" max="10" min="1" name="quantity" value="1"></label>
					  <input type="hidden" name="id" value="12">
					  <input type="submit" class="btn-block btn btn-info" value="Add to cart">
					</form>
                <?php }?>
				
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
	
	<!-- footer -->
    <?php include 'includes/footer.php'?>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
