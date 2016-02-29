<?php

session_start();
$success = "";
if ($_POST) {
	$firstname = $lastname = $address = $city = $state = $postcode = $email = $phone = "";
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$postcode = $_POST['postcode'];
	$email  = $_POST['email'];
	$phone = $_POST['phone'];
	
include('connect.php');

$query = "INSERT INTO `database_tyler`.`customers` (`Customer_ID`, `First_Name`, `Last_Name`, `Address`, `City`, `State`, `Postcode`, `Email_Address`, `Phone_Number`) VALUES (NULL, '$firstname', '$lastname', '$address', '$city', '$state', '$postcode', '$email', '$phone');";

$result = mysqli_query($con, $query);

if ($result) {
	$success = "You have added " . $firstname . " " . $lastname . " to the database!";
}

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add Customers</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">

<!-- Optional theme -->
<link rel="stylesheet" href="../css/bootstrap-theme.min.css" type="text/css">

<link href="../css/mystyle.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="wrapper">
   <div class="row">
    	<a href="login.html" class="btn btn-default login-btn hidden-xs">Employee Login</a>
    </div>
    <header>
    	<div class="row">
        	<div class="col-md-4 col-sm-6">
            	<img src="../images/west_coast_auto_logo.png" alt="logo" class="logo img-responsive">
               
            </div>
            <div class="col-md-4 hidden-sm hidden-xs">
                </div>
            <div class="col-md-4 hidden-sm hidden-xs">
            	<div class="contact-info">
                	<p><span class="glyphicon glyphicon-earphone"></span> Phone: XX-XXXX-XXX</p>
                    <p><span class="glyphicon glyphicon-map-marker"></span> Address: 12 Street Dr, <br> Somewhere WA</p>
                    <p><span class="glyphicon glyphicon-envelope"></span> Email: westcoast@auto.com</p>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li><a href="../index.html">Home</a></li>
        <li><a href="../pages/about.html">About</a></li>
        <li><a href="../php/used_vehicles.php">Used Vehicles</a></li>
        <li><a href="../pages/finance.html">Finance</a></li>
        <li ><a href="../pages/testimonials.html">Testimonials</a></li>
        <li><a href="../pages/contact.html">Contact Us</a></li>
        <li class="active"><a href="../php/login.php" class="hidden-sm hidden-md hidden-lg">Employee Login<span class="sr-only">(current)</span></a></li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div class="row"> 
        <div class="col-xs-12">
        	<article class="inner-main-content">
            	<h1>Add Customers</h1>
				<h2><?php echo $success; ?></h2>
                <div class="row">
                      <div class="col-lg-4 col-md-4 col-ms-4 col-xs-4">
                          <a href="sale.php"><p class="btn btn-success">Add Sale</p></a>
                          </div>
                          <div class="col-lg-4 col-md-4 col-ms-4 col-xs-4">
                            <a href="view_customers.php"><p class="btn btn-success">View Customers</p></a>
                            </div>
                          
                          <br> <br>
                </div>
                <div class="row">
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
				  <form role="form" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Firstname</span>
                      <input type="text" class="form-control" placeholder="Firstname" aria-describedby="basic-addon1" name="firstname">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon2">Lastname</span>
                      <input type="text" class="form-control" placeholder="Lastname" aria-describedby="basic-addon2" name="lastname">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon3">Address</span>
                      <input type="text" class="form-control" placeholder="Address" aria-describedby="basic-addon3" name="address">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon4">City</span>
                      <input type="text" class="form-control" placeholder="City" aria-describedby="basic-addon4" name="city">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon5">State</span>
                      <input type="text" class="form-control" placeholder="State" aria-describedby="basic-addon5" name="state">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon6">Postcode</span>
                      <input type="text" class="form-control" placeholder="Postcode" aria-describedby="basic-addon6" name="postcode">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon7">Email</span>
                      <input type="text" class="form-control" placeholder="Email Address" aria-describedby="basic-addon7" name="email">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon8">Phone</span>
                      <input type="text" class="form-control" placeholder="Phone Number" aria-describedby="basic-addon8" name="phone">
                       
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Add Customers</button>
					<form>
                  </div>
                  <br><br>
                  </div>
                      
                
            </article>
        </div>
</div>
<div class="row">
<footer class="navbar navbar-default">
<div class="col-md-6">
	<p>Copyright Information</p>
</div>
<div class="col-md-6">
    <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.html">Home</a></li>
        <li><a href="../pages/privacy.html">Privacy Policy</a></li>
       
        </ul>
 </div>
</footer>
</div>

</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-2.2.1.min"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>