<?php
//check-in page
//variables

session_start();
require_once('connectdb.php');

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
$now = date('H:i:s');
$startTime = filter_input(INPUT_POST, 'startTime');
$spot_id = filter_input(INPUT_POST, 'spot_id');
$valid_email = filter_input(INPUT_POST, 'valid_email');

$query = 'SELECT * FROM reservation';
//			WHERE startTime = :startTime';
$statement = $db->prepare($query);
//$statement -> bindValue(':startTime', $startTime);
$statement -> execute();
$checkin = $statement->fetch();
$statement -> closeCursor();

//$inTime = $checkin[2];
//var_dump($checkin['startTime']);

?>
    <!doctype html>
    <html>
    <head>
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
    </div>
    <p><h4>The current day is <?php echo($day);?> at <?php echo($time);?></h4></p>
    <p><h3>Your next Check-In time is <?php
        //checks for start time and if it's not empty display start time along with spot number.
        if($day <= $checkin['day']){
            if($now <= $checkin['startTime']){
                if($checkin['startTime'] != NULL){
                    echo ($checkin['startTime']);?> and your spot number is <?php echo($checkin['spot_id']);
                }else{
                    echo 'No reservation scheduled for today.';
                }
            }else{
                echo 'No reservation scheduled for today.';
            }
        }else{
            echo 'No reservation scheduled for today.';
        }
        ?></h3></p>
    <p><h1>Would you Like to Check-In</h1></p>
    <!--Go to the database and get the user then display the schedule -->
    <form method="POST" action=''>
        <input type="submit" name="check-in" value="check-in">
    </form>
    </body>
    </html>

    <!--//-->
    <!--//-->
    <!--//-->
    <!--//////check-in page-->
    <!--//////check connection-->
    <!--////include "connectdb.php";-->
    <!--//////time variables-->
    <!--//date_default_timezone_set('America/New_York');-->
    <!--//$day = date('l ');-->
    <!--//$time = date('g:i a');-->
    <!--//$today = date('Y-n-j');-->
    <!--//$startTime = filter_input(INPUT_POST, 'startTime');-->
    <!--//$spot_id = filter_input(INPUT_POST, 'spot_id');-->
    <!--//-->
    <!--//-->
    <!--//?>-->

    <!--<!doctype html>-->
    <!--<html>-->
    <!--<head>-->
    <!--    <meta charset="utf-8">-->
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
    <!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <!--    <link rel="stylesheet" type="text/css" href="styles/main.css">-->
    <!--</head>-->
    <!--<body>-->
    <!--<div class="container">-->
    <!--    <div class="row">-->
    <!--        <div class="center-block">-->
    <!--            <h1>Reserve For Me</h1>-->
    <!--            <img src="img/carparkmd.jpeg" class="img-responsive displayed">-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<p><h4>The current day is --><?php //echo($day);?><!-- at --><?php //echo($time);?><!--</h4></p>-->
    <!--<p><h3>Your next Check-In time is --><?php
    //    //checks for start time and if it's not empty display start time along with spot number.
    //    if($startTime != Null){
    //        echo ($startTime);?><!-- and your spot number is --><?php //echo($spot_id);
    //    }else{
    //        echo 'No reservation scheduled for today.';
    //    }
    //    ?><!--</h3></p>-->
    <!--<p><h1>Would you Like to Check-In</h1></p>-->
    <!--<!--Go to the database and get the user then display the schedule -->
    <!--<form method="POST" action=''>-->
    <!--    <input type="submit" name="check-in" value="check-in">-->
    <!--</form>-->
    <!--</body>-->
    <!--</html>-->
    <!---->
<?php
/**
 * Created by PhpStorm.
 * User: vanessa
 * Date: 5/6/17
 * Time: 2:10 PM
 */