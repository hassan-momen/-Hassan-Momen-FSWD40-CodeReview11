<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}
$res=mysqli_query($conn, "SELECT * FROM `user` WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Welcome -
            <?php echo $userRow['userEmail']; ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" role="navigation">
            <div class="container">
                <a class="navbar-brand" href="#">Hi' <?php echo $userRow['userEmail']; ?></a>
                <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                    &#9776;
                </button>
                <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
               <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="office_list.php" class="nav-link">Offices</a></li>
                <li class="nav-item"><a href="cars_list.php" class="nav-link">Cars</a></li>
                <li class="nav-item"><a href="cars_location.php" class="nav-link">Report Location</a></li>
            </ul>
            </ul>
                <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                    <a href="logout.php?logout">
                        <button type="button" id="dropdownMenu1" class="btn btn-outline-secondary">Sign Out</button>
                    </a>
                </ul>
                </li>
                </ul>
            </div>
            </div>
        </div>
        </nav>
       

       <div class="container mt-5">
  	<div class="row">
  		<div class="col_lg_4 mr-5 mb-5">
    <div class="card" style="width: 20rem;">
    	
			<img class="card-img-top" src="http://www.rti-world.com/wp-content/uploads/2017/04/Elegant-Grey-2017-bmw-i8.jpg" alt="Card image cap">
			<div class="card-body">
		    <h5 class="card-title">BMW 2017 sport</h5>
			<p class="card-text">.....</p>
			<p>....</p>
		   <a href="#" class="btn btn-primary">Reservation</a>
		 </div>
	</div>
	</div>
		<div class="col_lg_4 mr-5 mb-5" >
	<div class="card" style="width: 20rem;">	
			<img class="card-img-top" src="https://ocdn.eu/pulscms-transforms/1/4VSktkqTURBXy9kMWE1OTcwNTA1NGI4YTE5MDJhY2Y4OTk4NjY0OTE1OC5qcGVnkpUDzJnMnM0Gas0DnJMFzQMCzQGx">
			<div class="card-body">
		    <h5 class="card-title">ferrari 2018 sport</h5>
			<p class="card-text">.....</p>
			<p>....</p>
		   <a href="#" class="btn btn-primary">Reservation</a>
		 </div>
		</div>
	</div>
	<div class="col_lg_4 mr-5 mb-5">
		<div class="card" style="width: 20rem;">
			<img class="card-img-top" src="https://i.pinimg.com/originals/76/fb/6d/76fb6df0b8b39dd2525e06c02a762d72.jpg" alt="Card image cap">
			<div class="card-body">
		    <h5 class="card-title">tesla 2015 family</h5>
			<p class="card-text">.....</p>
			<p>....</p>
		   <a href="#" class="btn btn-primary">Reservation</a>
		 </div>
	</div>
		</div>
	</div>
	  </div> 

	  <div class="jumbotron">
	  	<center><h1>#1 PLACE FOR ALL YOUR AUTOMOTIVE NEEDS.</h1></center>
	  	<center><h5>Autozone is a leading digital automotive marketplace designed to connect vehicle buyers and sellers.<br> Our website lets you research and compare new, certified and used cars by searching for<br> body type, mileage, price and numerous other criteria.</h5></center>
	  </div>
    </body>

    </html>
    <?php ob_end_flush(); ?>