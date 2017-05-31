<?php

session_start();

require_once('connectdb.php');

// set time to est
date_default_timezone_set('America/New_York');

$query = "SELECT admin FROM user_inf WHERE valid_email = :email";
$statement = $db->prepare($query);
$statement->bindValue(':email', $_SESSION['valid_user']);
$statement->execute();
$data = $statement->fetch();

if ($data['admin']) {
    echo '<a href="admin.php">Admin interface</a>';
}

// user info
$query = 'SELECT *
          FROM user_inf
          ORDER BY id';
$statement2 = $db->prepare($query);
$statement2->execute();
$users = $statement2->fetchAll();
$statement2->closeCursor();

// parking spots
$query = 'SELECT *
          FROM parking_avail
          ORDER BY spot_id';
$statement3 = $db->prepare($query);
$statement3->execute();
$spots = $statement3->fetchAll();
$statement3->closeCursor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reserve A Spot</title>
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
    <a href="show_reservations.php" class="btn btn-info" role="button">View Reservations</a>
</div><br>

<div class="container table-responsive">
    <h2>Make A Reservation</h2>
    <!--    to be considered in the future...-->
    <!--    <p>ETA to Howard Community College:</p>-->
    <?php if (!empty($error)): ?>
        <p class="alert alert-danger" id="error">
            <?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <table class="table table-hover table-condensed">
        <thead>

<!--        headers-->
        <tr>
            <th>Email</th>
            <th>Parking Spot</th>
            <th>Day</th>
            <th>Time In</th>
            <th>Time Out</th>
        </tr>
        </thead>
        <tbody>

    <form name="timePick" action="add_reservation.php" method="POST">

        <tbody>
        <tr>
            <td>
                <select name="valid_email">
                    <?php foreach ($users as $user) : ?>
                        <option value="<?php echo $user['valid_email']; ?> ">
                            <?php echo $user['valid_email']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>

            <td>
                <select name="spot_id">
                    <?php foreach ($spots as $spot) : ?>
                        <option value="<?php echo $spot['spot_id']; ?> ">
                            <?php echo $spot['spot_id']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
            <select id="day" name="day">
                <option value="1">Monday</option>
                <option value="2">Tuesday</option>
                <option value="3">Wednesday</option>
                <option value="4">Thursday</option>
                <option value="5">Friday</option>
                <option value="6">Saturday</option>
                <option value="7">Sunday</option>

            </select>
            </td>

            <td>
            <select id="startTime" name="startTime"></select>
            </td>

            <td>
            <select id="endTime" name="endTime"></select>
            </td>

            <td>
            <input type="submit" name="submit" value="submit" class="btn btn-default">
            </td>
        </tr>
        </tbody>
    </form>
    </table>

    <script>
        "use strict";

        //The setTime function is used to populate a drop down
        //with a list of times.
        function setTime(timeEl) {

            //set the startTime and endTime
            //variables to determine the hour range.
            if (timeEl === "startTime") {
                var startTime = 7; //7am
                var endTime = 21.5; //10pm
            } else {
                var startTime = 7.5; //7:30am
                var endTime = 22; //11pm
            }

            //Get the select page element for populating
            var selectTime = document.getElementById(timeEl);

            //Create times for display and option's value
            for (var i = startTime; i <= endTime; i += .5) {

                //option items for start and end time drop downs
                var optionNode = document.createElement("option");
                var timeVal, dispVal;

                //Determine am or pm -- convert displayed value to 12 hour time
                //Change .5 to 30 for the half hour -- The conditional operator is used to format the times
                if (i < 12) {  //All time periods prior to 12 pm.
                    if (i < 10) {
                        timeVal = i.toString().indexOf(".") == -1 ? i + ":00" : (i - .5) + ":30";
                        dispVal = " 0" + timeVal + " am";
                    } else {
                        timeVal = i.toString().indexOf(".") == -1 ? i + ":00" : (i - .5) + ":30";
                        dispVal = timeVal + " am";
                    }
                } else if (i === 12 || i === 12.5) {  //Noon
                    timeVal = i.toString().indexOf(".") == -1 ? i + ":00" : (i - .5) + ":30";
                    dispVal = timeVal + " pm";
                } else { //All time periods after 12 pm.
                    if (i <= 21.5) {
                        timeVal = i.toString().indexOf(".") == -1 ? i + ":00" : (i - .5) + ":30";
                        dispVal = i.toString().indexOf(".") == -1 ? "\u00A0" + (i - 12) + ":00 pm" : "\u00A0" + ((i - .5) - 12) + ":30 pm";
                    } else {
                        timeVal = i.toString().indexOf(".") == -1 ? i + ":00" : (i - .5) + ":30";
                        dispVal = i.toString().indexOf(".") == -1 ? (i - 12) + ":00 pm" : ((i - .5) - 12) + ":30 pm";
                    }
                }

                //Finish creating option items and display in start and end
                //time drop downs
                var dispNode = document.createTextNode(dispVal);
                optionNode.value = timeVal;
                optionNode.appendChild(dispNode);
                selectTime.appendChild(optionNode);
            }
        }

        //Execute the setTime function to populate the
        //start and end time drop downs.
        setTime("startTime");
        setTime("endTime");


    </script>


</div>

</body>
</html>

