<?php
session_start();
require_once('connectdb.php');

$checkin = filter_input(INPUT_POST, 'check-in');

//redirects admin user to admin interface
$query = "SELECT admin FROM user_inf WHERE valid_email = :email";
$statement = $db->prepare($query);
$statement->bindValue(':email', $_SESSION['valid_user']);
$statement->execute();
$data = $statement->fetch();

if ($data['admin']) {
    header('location: admin.php');
    echo '<a href="/parking_app/admin.php">Admin interface</a>';
}

date_default_timezone_set('America/New_York');
$day = date('l ');
$time = date('g:i a');
$today = date('Y-n-j');

$query = 'SELECT * FROM reservation';
$statement = $db->prepare($query);
$statement -> execute();
$checkout = $statement->fetch();
$statement -> closeCursor();

?>
<!doctype html>
<html>
<head>
    <title>Check Out</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="center-block">
            <h1>Reserve For Me</h1>
            <img src="img/carparkmd.jpeg" class="img-responsive displayed">
        </div>
    </div>

<p><h4>The current day is: <?php echo($day);?> at <?php echo($time);?></h4></p>
<p><h3>Your check-out time is: <?php
    //checks for start time and if it's not empty display start time along with spot number.
    if($today <= $checkout['day']){
        if($time < $checkout['endTime']){
            if($checkin != False){
                echo ($checkout['endTime']);
            }else{
                echo 'Not Checked-In.';
            }
        }else{
            echo 'Not Checked-In.';
        }
    }else{
        echo 'Not Checked-In.';
    }
    ?></h3></p>
<!--<p><h1>Would you Like to Check-Out</h1></p>-->
<!--Go to the database and get the user then display the schedule -->
<form method="POST" action=''>
    <input type="submit" name="check-out" value="check-out">
    <meta http-equiv="refresh" content="5;url=https://phpmysql.howardcc.edu/womenintech/dhparkingsolution/check-in.php">
</form>
</div>
</body>
</html>



