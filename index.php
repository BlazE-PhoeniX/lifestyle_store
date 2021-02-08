<!-- Preincludes -->
<?php include 'includes/connection.php'?>
<?php include 'includes/checklogin.php'?>

<!-- Redirect user to products page if logged in already -->
<?php
if ($loggedin) {
    header('location: products');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Lifestyle</title>
	
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
	
	<!-- navigation bar -->
    <?php include 'includes/header.php'?>
	
	<!-- index page -->
    <main id="banner-image" class="d-flex align-items-center flex-grow-1">
      <div class="container">
        <div id="banner-content" class="text-center text-white">
          <h1>We sell lifestyle</h1>
          <p>Flat 40% OFF on premium brands</p>
          <a href="products" class="px-4 mt-3 btn btn-danger btn-lg active">Shop Now</a>
        </div>
      </div>
    </main>
	
	<!-- footer -->
    <?php include 'includes/footer.php'?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
