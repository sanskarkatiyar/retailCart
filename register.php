<?php 
  session_start();
  if (!isset($_SESSION['userSession'])) {
    header("Location: profile.php");
} 

include('config.php');

$msg ="";

function filterInput($data) {
  $data = trim($data);
  //$data = stripslashes($data);
  //$data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['registerBtn'])) {
 
  $fname = filterInput($_POST['firstname']);
  $lname = filterInput($_POST['lastname']);
  $email = filterInput($_POST['email']);
  $pass = filterInput($_POST['pwd1']);
  $house = filterInput($_POST['address_house']);
  $street = filterInput($_POST['address_street']);
  $city = filterInput($_POST['address_city']);
  $state = filterInput($_POST['address_state']);
  $zip = filterInput($_POST['address_zip']);
  $country = filterInput($_POST['address_country']);

 
  $hashed_password = md5($pass);
 
  $email_exists = mysqli_query($db, "SELECT email FROM users WHERE email='".$email."'");
  $count=mysqli_num_rows($email_exists);
 
if ($count==0) {
  $query = "INSERT INTO users(fname,lname,email,password,addr_house,addr_street,addr_city,addr_state,addr_zip,addr_country) VALUES('".$fname."','".$lname."','".$email."','".$hashed_password."','".$house."','".$street."','".$city."','".$state."','".$zip."','".$country."')";

  if (mysqli_query($db, $query)) {
   $msg = "<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Account Successfully Created!</div>";
  }else {
   $msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; ERROR! Please try again later, or Contact Support if the problem persists.</div>";
  }
  
 } else {
  
  $msg = "<div class='alert alert-danger'>
          <span class='glyphicon glyphicon-info-sign'></span> &nbsp; This e-mail is already registered. </div>";   
}
 
mysqli_close($db);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>bookMart</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Loading Bootstrap -->
  <link href="css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Loading Flat UI -->
  <link href="css/flat-ui.min.css" rel="stylesheet">
  <link href="css/myCSS.css" rel="stylesheet">

  <link rel="shortcut icon" href="img/favicon.ico">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
  <!--[if lt IE 9]>
    <script src="js/vendor/html5shiv.js"></script>
    <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
      <nav class="navbar navbar-inverse" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-5">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a class="navbar-brand" href="index.php">bookMart</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-5">
          <ul class="nav navbar-nav navbar-right">
          <li><a href="#" data-toggle="modal" data-target=".modalLogin" data-backdrop="true">Already Have an Account?</a></li>
          </ul>

          <ul class="nav navbar-nav">
            <li><a href="#">Events<span class="navbar-unread">1</span></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Books <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Fiction</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Non-Fiction</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Self Help</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Autobiography</a></li>
                  </ul>
            </li>
            </li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Support</a></li>
          </ul>
 
    </div><!-- /.navbar-collapse -->
  </nav>



</div>
<!-- /.container -->


<!-- LOGIN MODAL -->
<?php include('components/login_modal.php');?>
<!-- /.LOGIN MODAL -->


<!-- DISPLAY PAGE -->
<div class = "container">
  <div class="row">
    <div class="col-xs-1 col-md-2">
    <!-- /.DUMMY -->
    </div>

    <div class="col-xs-10 col-md-8">
    <h3 class="text-center">Welcome to bookMart</h3>
    <h4 class="text-center">REGISTER</h4>
    <hr>
    </div>

    <div class="col-xs-1 col-md-2">
    <!-- /.DUMMY -->
    </div>

  </div>

  <div class="row">
    <?php echo $msg; ?>
  </div>

  <div class="row">
    <div class="col-xs-1 col-md-2">
    <!-- /.DUMMY -->
    </div>

    <div class="col-xs-10 col-md-8">
    
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onload="buttonActive()" id="bookmartRegistration">
          <div class = "row">
              <div class="col-xs-12 col-md-6">
                <div class="form-group">
                  <label for="firstname">First Name (*)</label>
                  <input type="text" class="form-control register" id="firstname" name="firstname" placeholder="Your First Name" maxlength="64" required onchange="validateString(this)" value="<?php if(isset($_POST['firstname'])){echo $_POST['firstname'];} ?>">
                </div>
              </div>

              <div class="col-xs-12 col-md-6">
                <div class="form-group">
                  <label for="firstname">Last Name (*)</label>
                  <input type="text" class="form-control register" id="lastname" name="lastname" placeholder="Your Last Name" maxlength="64" required onchange="validateString(this)" value="<?php if(isset($_POST['lastname'])){echo $_POST['lastname'];} ?>">
                </div>


              </div>
          </div>


            <div class="form-group">
              <label for="email">Email address (*)</label>
              <input type="email" class="form-control register" id="email" name="email" placeholder="Email" required maxlength="64" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
            </div>


            <div class = "row">
              <div class="col-xs-12 col-md-6">
                <div class="form-group">
              <label for="pwd">Password (*)</label>
              <input type="password" class="form-control register" id="pwd1" name="pwd1" placeholder="Password" required minlength="6" maxlength="32" onchange="validatePasswords(this)">
            </div>
              </div>

              <div class="col-xs-12 col-md-6">
                <div class="form-group">
                  <label for="pwd"> Confirm Password (*)</label>
                  <input type="password" class="form-control register" id="pwd2" name="pwd2" placeholder="Confirm Password" required maxlength="32" minlength="6" onchange="validatePasswords(this)">
                </div>

              </div>
          </div>

            
              <label for="address">Address (*)</label>
              <div class="row">
                <div class="col-xs-12 col-md-5">
                  <div class="form-group">
                  <input type="text" class="form-control register" id="address_house" name="address_house" placeholder="House No. (ex. L-575)" required onchange="validateString(this)" maxlength="32" value="<?php if(isset($_POST['address_house'])){echo $_POST['address_house'];} ?>">
                  </div>
                </div>

                <div class="col-xs-12 col-md-7">
                  <div class="form-group">
                  <input type="text" class="form-control register" id="address_street" name="address_street" placeholder="Street Address (ex. MH, VIT University)" required maxlength="128" onchange="validateString(this)" value="<?php if(isset($_POST['address_street'])){echo $_POST['address_street'];} ?>">
                </div>
              </div>
              </div>

               <div class="row">
                <div class="col-xs-12 col-md-4">
                <div class="form-group">
                  <input type="text" class="form-control register" id="address_city" name="address_city" placeholder="City" required onchange="validateString(this)" maxlength="32" value="<?php if(isset($_POST['address_city'])){echo $_POST['address_city'];} ?>">
                </div>
                </div>

                <div class="col-xs-12 col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control register" id="address_state" name="address_state" placeholder="State" required onchange="validateString(this)" maxlength="32" value="<?php if(isset($_POST['address_state'])){echo $_POST['address_state'];} ?>">
                </div>
                </div>

                <div class="col-xs-12 col-md-2">
                <div class="form-group">
                  <input type="text" class="form-control register" id="address_zip" name="address_zip" placeholder="ZIP" maxlength="6" size="6" pattern="[0-9]{6}" required onchange="validateZIP(this)" value="<?php if(isset($_POST['address_zip'])){echo $_POST['address_zip'];} ?>">
                </div>
                </div>

                <div class="col-xs-12 col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control register" id="address_country" name="address_country" placeholder="Country" required  onchange="validateString(this)" maxlength="64" value="<?php if(isset($_POST['address_country'])){echo $_POST['address_country'];} ?>">
                </div>
                </div>
              </div>
                               
            
            <button type="submit" class="btn btn-primary btn-wide center-block" name="registerBtn" id="registerBtn">Create My Account</button>
            <p class="help-block text-right"><strong>(*) Required Fields</strong></p>
          </form>



    </div>


    <div class="col-xs-1 col-md-2">
    <!-- /.DUMMY -->
    </div>

  </div>
  
</div>
<!-- /.DISPLAY PAGE -->

<!-- FOOTER -->
<?php include('components/footer.php'); ?>
<!-- /.FOOTER -->

<!-- INCLUDE JS -->
<script src="js/vendor/jquery.min.js"></script>

<script src="js/vendor/video.js"></script>
<script src="js/flat-ui.min.js"></script>
<script src="js/myJS.js"></script>

</body>
</html>