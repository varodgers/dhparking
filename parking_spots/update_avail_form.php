<?php
/**
 * Created by PhpStorm.
 * User: vanessa
 * Date: 3/30/17
 * Time: 2:35 PM
 */

//// Get the product data
//$spot_id = filter_input(INPUT_POST, 'spot_id', FILTER_VALIDATE_INT);
//$avail = filter_input(INPUT_POST, 'avail', FILTER_VALIDATE_BOOLEAN);
//$time = filter_input(INPUT_POST, 'time', FILTER_VALIDATE_INT);
//
//// Validate inputs
//if ($spot_id == null || $spot_id == false) {
//    $error = 'ERROR';
//    echo $error;
//    var_dump($spot_id, $time, $avail);
////    include('error.php');
//} else {
//    require_once('../connectdb.php');
//
//    // Update product based on product id and values passed in
//    $query = "UPDATE parking_avail
//          SET avail = :avail, time = :time
//          WHERE spot_id = :spot_id";
//    $statement = $db->prepare($query);
//    $statement->bindValue(':spot_id', $spot_id);
//    $statement->bindValue(':avail', $avail);
//    $statement->bindValue(':time', $time);
//    $results = $statement->execute();
//    $statement->closeCursor();
//
//
//    // Display the Product List page
////    include('index.php');
//    include('../welcome.php');
//}
//?>


<?php
require_once('../connectdb.php');

// Get IDs
$spot_id = filter_input(INPUT_POST, 'spot_id', FILTER_VALIDATE_INT);

if ($spot_id != false) {
    $query = 'SELECT *
          FROM parking_avail
          WHERE spot_id = :spot_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':spot_id', $spot_id);
    $statement->execute();
    $spot = $statement->fetch();
    $statement->closeCursor();
} else {
    include('../welcome.php');
    exit();

    // Set timezone
    date_default_timezone_set('America/New_York');
    $today = date("h:i");
    echo $today;

    $start_time = new DateTime('07:00');
    $end_time = new DateTime('18:00');
    $interval = DateInterval::createFromDateString('30 min');
    $times = new DatePeriod($start_time, $interval, $end_time);

    foreach ($times as $time) {
        echo $time->format('h:i:A'),
        $time->add($interval)->format('h:i:A'), "\n";
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width" initial-scale=1>
    <!--Adds Bootstrap-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../styles/main.css">
    <title>ReZerve-4-Me - Rezerve Your Spot</title>
</head>

<!-- the body section -->
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
<main>
    <h1>Spot <?php echo $spot_id; ?></h1>

    <form action="update_avail.php" method="post"
          id="update_avail_form">

        <!--Need ID to know which spot to update-->
        <input type="hidden" name="spot_id" value="<?php echo $spot_id; ?>">


        <div class="row">
            <div class="dropdown text-center">
                <div class="dropdown btn-group">
                    <label>Departure Time:</label>

                    <?php
                    // set time zone to est
                    date_default_timezone_set('America/New_York');

                    // dynamic dropdown list displays departure times
                    // display 30 minute intervals in the future, no times will be displayed after 10:00pm
                    $end = '10:00PM';
                    $interval = '+30 minutes';

                    $start_str = strtotime('now');
                    $start_str = ceil($start_str/1800) * 1800;
                    $end_str = strtotime($end);
                    $now_str = $start_str;


                                      echo '<select name="time">';
                                      while($now_str <= $end_str){
                                          echo '<option value="' . date('his', $now_str) . '">' . date('h:i A', $now_str) . '</option>';
                                          $now_str = strtotime($interval, $now_str);
                                      }
                                      echo '</select>';

                    ?>

                    <label>&nbsp;</label>
                    <input type="submit" value="Submit"><br>
                </div>
            </div>
        </div>
    </form>
    <br>
    <p><a href="../welcome.php">Choose A Different Spot</a></p>
</main>

</body>
</html>
