<!-- preincludes -->
<?php include 'includes/connection.php';?>
<?php include 'includes/checklogin.php'?>

<!-- redirect to products oage if already logged in -->
<?php
if ($loggedin) {
    header('location: products');
}
?>

<!-- server side validation messages -->
<?php
$error_msg = "";
if (isset($_GET['message'])) {
	
	//Email is unfilled
    if ($_GET['message'] == "noemail") {
        $error_msg = "Email is required!";
    }

	//Password is unfilled
	else if ($_GET['message'] == "nopassword") {
        $error_msg = "Password is required!";
    }
	
	//Email is of wrong format
	else if ($_GET['message'] == "emailwrongformat") {
        $error_msg = "Email is of wrong format!, Please check your email";
    }

	//Wrong password
	else if ($_GET['message'] == "wrongpassword") {
        $error_msg = "Wrong password! Please try again";
    }

	//Redirection from sign up page if the user already owns an account
	else if ($_GET['message'] == "existinguser") {
        $error_msg = "Seems like you already own an account!, Login to access your account";
    } 
	
	//server errors
	else {
        $error_msg = "Something wrong with the server!, Please try again";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Lifestyle | Login</title>
  
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
  
	<!-- Navigation Bar -->
    <?php include 'includes/header.php'?>
	
    <main class="flex-grow-1 grey-back">
      <div class="container">
	  
		<!-- Show server side validation messages and errors -->
        <?php if (isset($_GET['message'])) {if ($_GET['message'] != "registered" and $_GET['message'] != "existinguser") {?>
          <div class="m-0 mt-3 alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <?php echo $error_msg ?>
          </div>
          <?php } else {?>
          <div class="m-0 mt-3 alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <?php echo $error_msg ?>
          </div>
        <?php }}?>
		
		<!-- Login form -->
        <div class="card my-5 mx-auto" id="form">
          <div class="card-body p-0">
            <div class="py-2 px-3 bg-primary">
              <h2 class="h4 mb-0 text-uppercase text-white">Login</h2>
            </div>
          </div>
          <div class="card-body">
            <p class="lead card-title">Login to make a purchase</p>
            <form id="login" action="php/login_validate.php" method="POST" class="mb-4" autocomplete="off">
              <div class="form-group">
                <input type="text" spellcheck="false" name="email" class="form-control" placeholder="Email" required/>
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required/>
              </div>
              <div class="d-flex justify-content-center justify-content-md-start">
                <input type="submit" class="btn px-4 btn-primary" value="Login" />
              </div>

            </form>
          </div>
          <div class="card-body p-0">
            <div class="p-3 card-footer">
              <p class="lead mb-0">Don't have an account? <a class="text-decoration-none" href="signup.php">Register</a></p>
            </div>
          </div>
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
