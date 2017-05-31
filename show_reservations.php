<?php
/**
 * Created by PhpStorm.
 * User: vanessa
 * Date: 5/3/17
 * Time: 10:26 AM
 */
require_once('connectdb.php');

$query = "SELECT * FROM reservation";
$statement = $db->prepare($query);
//$statement->bindValue(':valid_email', $valid_email);
//$statement->bindValue(':spot_id', $spot_id);
//$statement->bindValue(':day', $day);
//$statement->bindValue(':startTime', $startTime);
//$statement->bindValue(':endTime', $endTime);
$statement->execute();
$reservations = $statement->fetchAll();
//    $err = $statement->errorInfo();
$statement->closeCursor();

//var_dump($reservations);

?>

<!doctype html>
<html lang="en">
<title>Booked Reservations</title>
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

            <?php
            // var_dump is a nice way to blast variables to the screen. Not for user consumption though.
            //        var_dump($_SESSION);
            ?>
            <h1>Reserve For Me Admin</h1>
            <img src="img/carparkmd.jpeg" class="img-responsive displayed">
        </div>
    </div>
</div>
<div class="container">
    <a href="sign-up.php" class="btn btn-info" role="button">Sign Up</a>
    <a href="reservation.php" class="btn btn-info" role="button">Reserve</a>
</div><br>




<?php
//$reservation_str = '';
foreach ($reservations as $reservation): ?>
<!--   $reservation_str .= $reservation . ' ';-->
    <p>Email: <?php
        echo $reservation['valid_email']; ?></p>
    <p>Spot: <?php
        echo $reservation['spot_id']; ?></p>
    <p>Day: <?php
        echo $reservation['day']; ?></p>
    <p>Start Time: <?php
        echo $reservation['startTime']; ?></p>
    <p>End Time: <?php
        echo $reservation['endTime']; ?></p><br><br>

<?php endforeach; ?>



</body>
</html>
