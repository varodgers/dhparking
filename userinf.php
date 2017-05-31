<?php
//this is a qr reader parking app to help ease the use of parking at HCC
// variable to get the data from the form using post
//$student_id = filter_input(INPUT_POST, 'student_id');

$f_name = filter_input(INPUT_POST, 'f_name');
//$l_name = filter_input(INPUT_POST, 'l_name');
//$address = filter_input(INPUT_POST, 'address');
//$city = filter_input(INPUT_POST, 'city');
//$state = filter_input(INPUT_POST, 'state');
//$phone = filter_input(INPUT_POST, 'phone');
//$valid_email = filter_input(INPUT_POST, 'valid_email');
//$password = filter_input(INPUT_POST, 'password');

//include'SelectTest.php';

include'connectdb.php';

//include'add.php';



?>
<!DOCTYPE html>
<html>
<head>
    <!-- this is from a jquery tutorial to ensure proper rendering for mobile devices-->
    <!--whether we decide this is the right direction to go is up to the group
    <!-- Include jQuery Mobile stylesheets -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <title>Confirmation</title>
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

<p>Thanks <?php echo $f_name ?> for taking the time to sign up.</p>
<p><a id="checkInLink" href="check-in.php">Back</a></p>

</body>
</html>