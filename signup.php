<!-- preincludes -->
<?php include 'includes/connection.php'?>
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
	
	//any of the fields empty
    if ($_GET['message'] == "fieldempty") {
        $error_msg = "Please fill in all the details!";
    }
	
	//name contains digits or special characters
	else if ($_GET['message'] == "nameinvalid") {
        $error_msg = "Name can contain only letters!";
    }

	//email is of wrong format 
	else if ($_GET['message'] == "emailwrongformat") {
        $error_msg = "Email is of wrong format!, Please check your email";
    }

	//password if of wrong pattern
	else if ($_GET['message'] == "passwordwrongformat") {
        $error_msg = "Password must contain an uppercase, a lowercase, a digit and a special character!";
    }

	//password is less than 8 characters
	else if ($_GET['message'] == "shortpassword") {
        $error_msg = "Password must be atleast 8 characters long!";
    }

	//City name contains digits
	else if ($_GET['message'] == "cityinvalid") {
        $error_msg = "City name can only contain letters!";
    }

	//Contact no contains letters or special characters
	else if ($_GET['message'] == "contactinvalid") {
        $error_msg = "Contact number must contain only digits";
    }

	//Contact is less than 10 digits
	else if ($_GET['message'] == "shortcontact") {
        $error_msg = "Contact number must be atleast 10 digits long!";
    }

	//redirection form login page if user doesn't own an account 
	else if ($_GET['message'] == "newuser") {
        $error_msg = "Seems You don't own an account!, Please register your account";
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
    <title>Lifestyle | Sign up</title>
    
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
        box-shadow: 0 0 20px grey;
        border: none !important;
      }
      /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Firefox */
      input[type=number] {
        -moz-appearance: textfield;
      }
    </style>
	
  </head>
  <body>
  
	<!-- navigation bar -->
    <?php include 'includes/header.php'?>

    <main class="flex-grow-1 grey-back">
      <div class="container">
	  
		<!-- Show server side validation errors and messages -->
        <?php if (isset($_GET['message'])) {if ($_GET['message'] != "newuser") {?>
          <div class="m-0 mt-3 alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <?php echo $error_msg ?>
          </div>
        <?php } else {?>
          <div class="m-0 mt-3 alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <?php echo $error_msg ?>
          </div>
        <?php }}?>
		
		<!-- form for signing up -->
        <div class="card my-5 mx-auto" id="form">
          <div class="card-body p-0">
            <div class="pt-2 px-3">
              <h2 class="mb-0 text-uppercase">Sign Up</h2>
            </div>
          </div>
          <div class="card-body">
            <form id="signup" action="php/signup_validate.php" method="POST" class="mb-4" autocomplete="off">
              <div class="form-group">
                <input spellcheck="false" type="text" name="name" class="form-control" placeholder="Name" required/>
              </div>
              <div class="form-group">
                <input spellcheck="false" type="email" name="email" class="form-control" placeholder="Email" required/>
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required/>
              </div>
              <div class="form-group">
                <input type="number" min="10" name="contact" class="form-control" placeholder="Contact" required/>
              </div>
              <div class="form-group">
                <input spellcheck="false" type="text" name="city" class="form-control" placeholder="City" required/>
              </div>
              <div class="form-group">
                <input spellcheck="false" type="text" name="address" class="form-control" placeholder="Address" required/>
              </div>
              <div class="d-flex justify-content-center justify-content-md-start">
                <input type="submit" class="btn px-4 btn-primary" value="Submit" />
              </div>
            </form>
          </div>
        </div>
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
