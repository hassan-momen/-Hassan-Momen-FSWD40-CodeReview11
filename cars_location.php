<?php
ob_start();
session_start();
require_once 'dbconnect.php';

$res=mysqli_query($conn, "SELECT * FROM `user` WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
 
    if(isset ($_GET['select']) ){
        $filter = "WHERE cars.location = '$_GET[select]'";
    }

    if( $_GET['select']==""){
        $filter = ""; 
    }

    $cars = "SELECT cars.car_id, cars.name ,cars.location FROM cars $filter";

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
        
<form method="get" name="filter" action='<?php echo $_SERVER['PHP_SELF']; ?>'>
    <select id="demo" name="select" onchange="this.form.submit()">
         <option value="">ALL</option>
         <option value="linzer strasse 63">linzer strasse 63</option>
         <option value="gebler gasse 22-24">gebler gasse 22-24</option>
         <option value="hauptbahnhof">hauptbahnhof</option>
         <option value="wien mitte">wien mitte</option>
    </select>
</form>
<script type="text/javascript">
    document.getElementById('demo').value = "<?php $_GET['select'] ?>"
</script>

        <?php
			$result = mysqli_query($conn,$cars);
           if ($result->num_rows > 0) {
           	
		    //table book
	 echo"	<div class ='container'>
	 <h2 class='text-info text-center'>Cars Location</h2>
		    <table class='table table-light'>
			  <thead>
			    <tr>
			      <th scope='col'>CAR ID</th>
			      <th scope='col'>CAR NAME</th>
			      <th scope='col'>LOCATION</th>
			    </tr>
			  </thead>";
		    while($row = mysqli_fetch_array($result)) {
		    		      
echo"<tr><td>{$row['car_id']}</td><td>{$row['name']}</td><td>{$row['location']}</td></tr>";
		    
		}
		echo "</table></div><hr>";
		} else {
		    echo "0 results";
		}

       $query = "SELECT customer.location, count(customer.location) as 'num' FROM customer GROUP BY customer.location";
       $result = mysqli_query($conn,$query); 

       if ($result->num_rows > 0) {
            
            //table book
     echo"  <div class ='container'>
     <h2 class='text-info text-center'>Report cars location</h2>
            <table class='table table-light'>
              <thead>
                <tr>
                  <th scope='col'>CAR NAME</th>
                  <th scope='col'>LOCATION</th>
                </tr>
              </thead>";
            while($row = mysqli_fetch_array($result)) {
                          
echo"<tr><td>{$row['location']}</td><td>{$row['num']}</td></tr>";
            
        }
        echo "</table></div><hr>";
        } else {
            echo "0 results";
        }
        
?>
     

    </body>

    </html>