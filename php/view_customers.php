<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>View Customers</title>

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
    	<a href="logout.php" class="btn btn-default login-btn hidden-xs">Logout</a>
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
            	<h1>View Customers</h1>
				  <div class="row">
                      <div class="col-lg-4 col-md-4 col-ms-4 col-xs-4">
                          <a href="sale.php"><p class="btn btn-success">Add Sale</p></a>
                          </div>
                          <div class="col-lg-4 col-md-4 col-ms-4 col-xs-4">
                            <a href="view_customers.php"><p class="btn btn-success">View Customers</p></a>
                            </div>
                          <div class="col-lg-4 col-md-4 col-ms-4 col-xs-4">
                            <a href="add_customers.php"><p class="btn btn-success">Add Customers</p></a>
                          </div>
                </div>
				<br>
                <div class="row">
				<form role="form" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Customer Last Name</span>
                      <input type="text" class="form-control" placeholder="Enter Last Name" aria-describedby="basic-addon1" name= "lastname">
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                  <br><br>
                  <button class="btn btn-default">Submit</button>
				  </form>
				  <br><br>
				  <div class="row">
					<div class="col-md-12">
						<?php
						if ($_POST) {
							$lastname = "";
							$lastname = $_POST['lastname'];
							
						include('connect.php');
						$query = "SELECT * FROM `customers` WHERE `Last_Name` LIKE '%$lastname%'";
						$result = mysqli_query($con, $query);
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<div class='well'>";
							echo "<h2>Customer ID : <small>" . $row['Customer_ID'] . "</small></h2>";
							echo "<h2>First Name : <small>" . $row['First_Name'] . "</small></h2>";
							echo "<h2>Last Name : <small>" . $row['Last_Name'] . "</small></h2>";
							echo "<h2>Address : <small>" . $row['Address'] . "</small></h2>";
							echo "<h2>City : <small>" . $row['City'] . "</small></h2>";
							echo "<h2>State : <small>" . $row['State'] . "</small></h2>";
							echo "<h2>Postcode : <small>" . $row['Postcode'] . "</small></h2>";
							echo "<h2>Email : <small>" . $row['Email_Address'] . "</small></h2>";
							echo "<h2>Phone : <small>" . $row['Phone_Number'] . "</small></h2>";
							echo "</div>";
						}
						}
						?>
						
					</div>
				  </div>
                  
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