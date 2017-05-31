<?php
/**
 * Created by PhpStorm.
 * User: vanessa
 * Date: 4/23/17
 * Time: 12:22 PM
 */
session_start();

require_once('connectdb.php');

$query = "SELECT admin FROM user_inf WHERE valid_email = :email";
$statement = $db->prepare($query);
$statement->bindValue(':email', $_SESSION['valid_user']);
$statement->execute();
$data = $statement->fetch();

if (!$data || !$data['admin']) {
    header('location:check-in.php');
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <title>Reserve For Me Admin</title>
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
    <a href="show_reservations.php" class="btn btn-info" role="button">View Reservations</a>

</div>
</body>
</html>
