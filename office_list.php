<?php
ob_start();
session_start();
require_once 'dbconnect.php';

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
        </nav>
        <?php
            $sql = "SELECT `php_car_rental_agency`.`agency_id`,`php_car_rental_agency`.`office_name`,`address`.`street`,`address`.`zip_code`,`address`.`country`,`address`.`city` FROM `php_car_rental_agency` inner join `address` on `php_car_rental_agency`.`fk_address_id` = `address`.`address_id`
";
			$result = mysqli_query($conn,$sql);
           if ($result->num_rows > 0) {
           	
            


		    //table book
	 echo"	<div class ='container'>
	 <h2 class='text-info text-center'>Offices</h2>
		    <table class='table table-light'>
			  <thead>
			    <tr>
			      <th scope='col'>ID</th>
			      <th scope='col'>Office Name</th>
			      <th scope='col'>Street</th>
			      <th scope='col'>PLZ</th>
                  <th scope='col'>country</th>
                  <th scope='col'>city</th>
			    </tr>
			  </thead>";
		    while($row = mysqli_fetch_array($result)) {  
echo"<tr><td>{$row['agency_id']}</td><td>{$row['office_name']}</td><td>{$row['street']}</td><td>{$row['zip_code']}</td><td>{$row['country']}</td><td>{$row['city']}</td></tr>";
		    
		}
		echo "</table></div><hr>";
		} else {
		    echo "0 results";
		}
		#table dvd
           	
		    // output data of each row
?>
    </body>

    </html>