<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Used Vehicles</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">

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
    	<a href="../php/login.php" class="btn btn-default login-btn hidden-xs">Employee Login</a>
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
        <li class="active"><a href="../php/used_vehicles.php">Used Vehicles<span class="sr-only">(current)</span></a></li>
        <li><a href="../pages/finance.html">Finance</a></li>
        <li><a href="../pages/testimonials.html">Testimonials</a></li>
        <li><a href="../pages/contact.html">Contact Us</a></li>
        <li><a href="../php/login.php" class="hidden-sm hidden-md hidden-lg">Employee Login</a></li>
        
      </ul>
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div class="row"> 
        <div class="col-xs-12">
        	<article class="inner-main-content">
            	<h1>West Coast Autos - Used Vehicles</h1>
				<?php
				session_start();
				
				include('connect.php');
				$query = "SELECT * FROM `vehicles` ORDER BY `Stock_No` ASC";
				
				$result = mysqli_query($con, $query);
				
				while ($row = mysqli_fetch_assoc($result)) {
					$query2 = "SELECT * FROM `manufacturer` WHERE `Manufacturer_ID` = " . $row['Manufacturer_ID'];
				
					$result2 = mysqli_query($con, $query2);
				
					while ($row2 = mysqli_fetch_assoc($result2)) {
						$query3 = "SELECT * FROM `category` WHERE `Category_ID` = " . $row['Category_ID'];
					
						$result3 = mysqli_query($con, $query3);
					
						while ($row3 = mysqli_fetch_assoc($result3)) {
					
					echo "<div class='well'>";
						echo "<div class ='row'>";
							echo "<div class='col-md-7'>";
								echo "<h2>VIN: <small>" . $row['VIN'] . "</small></h2>";
								echo "<h2>Stock_No: <small>" . $row['Stock_No'] . "</small></h2>";
								echo "<h2>Manufacturer: <small>" . $row2['Name'] . "</small></h2>";
								echo "<h2>Model: <small>" . $row['Model'] . "</small></h2>";
								echo "<h2>Category: <small>" . $row3['Description'] . "</small></h2>";
								echo "<h2>Year: <small>" . $row['Year'] . "</small></h2>";
								echo "<h2>Price: <small>" . $row['Price'] . "</small></h2>";
								echo "<h2>Kilometers: <small>" . $row['Kilometers'] . "</small></h2>";
								echo "<h2>Cylinders: <small>" . $row['Cylinders'] . "</small></h2>";
								echo "<h2>Fuel: <small>" . $row['Fuel'] . "</small></h2>";
								echo "<h2>Transmission: <small>" . $row['Transmission'] . "</small></h2>";
								echo "<h2>Registration: <small>" . $row['Registration'] . "</small></h2>";
								echo "<h2>Colour: <small>" . $row['Colour'] . "</small></h2>";
							echo "</div>";
												
						echo "<div class='col-md-4'>";
							echo "<img class='img-responsive vehicle-img' src='../images/car_" . $row['Stock_No'] . ".jpg'>";
						echo "</div>";
						echo "<div class='col-md-1'></div>";
						echo "</div>";
					echo "</div>";
						}
					}
				}
				?>
				
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
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>