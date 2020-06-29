<!--preincludes-->
<?php include 'includes/connection.php'?>
<?php include 'includes/checklogin.php'?>

<!-- Redirect to index page if not logged in -->
<?php
if (!$loggedin) {
    header('location: index');
}

//server validation errors and messages
$error_msg = "";
if (isset($_GET['message'])) {
	
	//some fields are unfilled
    if ($_GET['message'] == "fieldempty") {
        $error_msg = "Please fill in all the details!";
    } 
	
	//password is of wrong pattern
	else if ($_GET['message'] == "passwordwrongformat") {
        $error_msg = "Password must contain an uppercase, a lowercase, a digit and a special character!";
    } 
	
	//password is less than 8 characters
	else if ($_GET['message'] == "shortpassword") {
        $error_msg = "Password must be atleast 8 characters long!";
    } 
	
	//password changed successfully
	else if ($_GET['message'] == "success") {
        $error_msg = "Password Changed Successfully!, <a href='products.php'>Click Here</a> to shop more";
    } 
	
	//new and confirm passwords doesn't match 
	else if ($_GET['message'] == "passwordmismatch") {
        $error_msg = "New password and Confirm password must be same!";
    } 
	
	//old password doesn't match with database
	else if ($_GET['message'] == "currentpasswordmismatch") {
        $error_msg = "Wrong password!, Please try again";
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
    <title>Lifestyle | Password Reset</title>
    <!-- Required meta tags -->
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
      @media(max-width: 768px){
        input[type="submit"]{
          width: 100%;
        }
      }
    </style>
	
  </head>
  <body>
  
	<!-- navigation bar -->
    <?php include 'includes/header.php'?>
	
    <main class="flex-grow-1 grey-back">
      <div class="container">
	  
		<!-- show server errors and messages -->
        <?php if (isset($_GET['message'])) {if ($_GET['message'] != "success") {?>
                <div class="m-0 mt-3 alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <?php echo $error_msg; ?>
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
		
		<!-- password reset form --> 
        <div class="card my-5 mx-auto" id="form">
          <div class="card-body p-0">
            <div class="pt-2 px-3">
              <h2 class="h4 mb-0">Change Password</h2>
            </div>
          </div>
          <div class="card-body">
            <form id="password-reset" action="php/settings_validate.php" method="POST" class="mb-4" autocomplete="off">
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Current Password" required />
              </div>
              <div class="form-group">
                <input type="password" name="new-password" class="form-control" placeholder="New Password" required />
              </div>
              <div class="form-group">
                <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password" required />
              </div>
              <div class="d-flex flex-column flex-md-row justify-content-start">
                <input type="submit" class="btn px-4 btn-primary" value="Change" required />
                <a class="btn px-4 btn-outline-primary ml-md-2 mt-3 mt-md-0" href="products">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
	
	<!--footer.php -->
    <?php include 'includes/footer.php'?>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
