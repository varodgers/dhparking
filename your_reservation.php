<?php
/**
 * Created by PhpStorm.
 * User: vanessa
 * Date: 4/22/17
 * Time: 2:57 PM
 */
session_start();

require_once('connectdb.php');

$query = "SELECT admin FROM user_inf WHERE valid_email = :email";
$statement = $db->prepare($query);
$statement->bindValue(':email', $_SESSION['valid_user']);
$statement->execute();
$data = $statement->fetch();

if ($data['admin']) {
    echo '<a href="/parking_app/admin.php">Admin interface</a>';
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

    <title>Your Reservation</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="center-block">

            <?php
            // var_dump is a nice way to blast variables to the screen. Not for user consumption though.
            //        var_dump($_SESSION);
            ?>
            <h1>Your Reservation</h1>
            <img src="img/carparkmd.jpeg" class="img-responsive displayed">
        </div>
    </div>
</div>
<?php
//if ($data['admin']) {
//    echo '<a href="/parking_app/admin.php">Admin interface</a>';
//}
?>
</body>
</html>
