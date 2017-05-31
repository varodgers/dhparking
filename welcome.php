<?php
/**
 * Created by PhpStorm.
 * User: vanessa
 * Date: 2/20/17
 * Time: 4:15 PM
 */
    session_start();
//    echo 'hooray!' .' '. $_SESSION['valid_user'];
require_once('connectdb.php');

$spot_id = filter_input(INPUT_POST, 'spot_id', FILTER_VALIDATE_INT);
$avail = filter_input(INPUT_POST, 'avail', FILTER_VALIDATE_BOOLEAN);
$time = filter_input(INPUT_POST, 'time');


$query = 'SELECT *
          FROM parking_avail
          ORDER BY spot_id;';
$statement = $db->prepare($query);
$statement->bindValue(':spot_id', $spot_id);
$statement->bindValue(':avail', $avail);
$statement->bindValue(':time', $time);
$statement->execute();
$spots = $statement->fetchAll();
$statement->closeCursor();

//var_dump($spots);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Find A Spot</title>
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
            <h1>Reserve For Me</h1>
            <img src="img/carparkmd.jpeg" class="img-responsive displayed">
        </div>
    </div>
</div>
<div class="container table-responsive">
    <h2>Reserve Your Spot</h2>
    <!--    to be considered in the future...-->
    <!--    <p>ETA to Howard Community College:</p>-->
    <table class="table table-hover table-condensed">
        <thead>
        <tr>
            <th>Parking Spot</th>
            <th>Availability</th>
            <th>Next Availability</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($spots as $spot): ?>
            <tr>
                <td>
                    <form method="post" action="parking_spots/update_avail_form.php">
                        <input type="hidden" name="spot_id" value="<?php echo $spot['spot_id']; ?>">
                        <input type="submit" value="<?php echo $spot['spot_id']; ?>
                ">
                    </form>
                </td>
                <td class="red"><?php echo $spot['avail']; ?>
                </td>
                <td>
                    <?php
                    //                    echo $spot['time'];

                    // set time to est
                    date_default_timezone_set('America/New_York');

                    $now = date('h:i a', strtotime('now'));
                    $db_time = date('h:i a', strtotime($spot['time']));
//                    echo $now;
//                    echo $db_time;

                    // if departure time is in the future spot is unavailable until displayed time
                    if ($spot['time'] > $now) {
                        echo $spot['time'];

                        // if departure time is in the past, display available
                    } else {
                        echo 'Available';
                    }
                    ?>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>

