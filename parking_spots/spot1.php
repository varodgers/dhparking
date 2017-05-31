<?php
/**
 * Created by PhpStorm.
 * User: vanessa
 * Date: 3/15/17
 * Time: 7:52 AM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rezerve Spot 1</title>
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
<h1>Parking Spot 1</h1>
<div class="row">
    <div class="dropdown text-center">
        <div class="dropdown btn-group">
            <h3>Departure Time</h3>
            <select>
                <option value="700">7:00am</option>
                <option value="730">7:30am</option>
                <option value="800">8:00am</option>
                <option value="830">8:30am</option>
                <option value="900">9:00am</option>
                <option value="930">9:30am</option>
                <option value="1000">10:00am</option>
                <option value="1030">10:30am</option>
                <option value="1100">11:00am</option>
                <option value="1130">11:30am</option>
                <option value="1200">12:00pm</option>
                <option value="1230">12:30pm</option>
                <option value="100">1:00pm</option>
                <option value="130">1:30pm</option>
                <option value="200">2:00pm</option>
                <option value="230">2:30pm</option>
                <option value="300">3:00pm</option>
                <option value="330">3:30pm</option>
                <option value="400">4:00pm</option>
                <option value="430">4:30pm</option>
                <option value="500">5:00pm</option>
                <option value="530">5:30pm</option>
                <option value="600">6:00pm</option>
                <option value="630">6:30pm</option>
            </select>
        </div>
    </div>
</div>
</body>
</html>
