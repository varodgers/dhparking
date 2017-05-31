<?php
/**
 * Created by PhpStorm.
 * User: vanessa
 * Date: 5/1/17
 * Time: 11:32 AM
 */

$day = filter_input(INPUT_POST, 'day');
$startTime = filter_input(INPUT_POST, 'startTime');
$endTime = filter_input(INPUT_POST, 'endTime');
$valid_email = filter_input(INPUT_POST, 'valid_email');
$spot_id = filter_input(INPUT_POST, 'spot_id');

if ($day == null || $startTime == null || $endTime == null || $valid_email == null || $spot_id == null)
{
    $error = "Check all fields and try again.";
} else {
    $error = '';
    require_once('connectdb.php');


    $query = "INSERT INTO reservation (day, startTime, endTime, valid_email, spot_id) VALUES ( :day, :startTime, :endTime, :valid_email, :spot_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':day', $day);
    $statement->bindValue(':startTime', $startTime);
    $statement->bindValue(':endTime', $endTime);
    $statement->bindValue(':valid_email', $valid_email);
    $statement->bindValue(':spot_id', $spot_id);
    $statement->execute();
//    $err = $statement->errorInfo();
    $statement->closeCursor();

    include('confirmation.php');
}
if($error != ''){
    include('reservation.php');
    exit();
}

