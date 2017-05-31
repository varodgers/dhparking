<?php
/**
 * Created by PhpStorm.
 * User: vanessa
 * Date: 4/1/17
 * Time: 3:57 PM
 */
//require_once ('../connectdb.php');

$spot_id = filter_input(INPUT_POST, 'spot_id', FILTER_VALIDATE_INT);
$time = filter_input(INPUT_POST, 'time');
$avail = filter_input(INPUT_POST, 'avail', FILTER_VALIDATE_BOOLEAN);

echo($time);

//if ($spot_id == null || $spot_id == false || $time == null || $time == false) {
//    $error = "Invalid data.";
//    echo $error;
//    include('error.php');
//} else {
    require_once('../connectdb.php');

#avail = :avail
    $query = "UPDATE parking_avail
          SET time = :time 
          WHERE spot_id = :spot_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':spot_id', $spot_id);
    $statement->bindValue(':time', $time);
//    $statement->bindValue(':avail', $avail);
    $results = $statement->execute();
    $rows = $statement->rowCount();
    $statement->closeCursor();
//}

var_dump($spot_id);
var_dump($time);

var_dump($results);
var_dump($rows);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rezerve Your Time</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../styles/main.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="center-block">

            <?php
            // var_dump is a nice way to blast variables to the screen. Not for user consumption though.
            //        var_dump($_SESSION);
            ?>
<h1>Rezerve-4-Me</h1>
<img src="../img/carparkmd.jpeg" class="img-responsive displayed">
</div>
</div>
</div>

</body>
</html>