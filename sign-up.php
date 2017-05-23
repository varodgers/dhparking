<?php
/*if (!isset($f_name)) {$f_name = "";}
if (!isset($l_name)) {$l_name = "";}
if (!isset($phone)) {$phone = "";}
if (!isset($student_id)) {$student_id = "";}
if (!isset($valid_email)) {$valid_email = "";}
if (!isset($password)) {$password = "";}*/


require_once('connectdb.php');
?>
<!DOCTYPE html>
<html>
<head>
    <!-- this is from a jquery tutorial to ensure proper rendering for mobile devices-->
    <!--whether we decide this is the right direction to go is up to the group
    <!-- Include jQuery Mobile stylesheets -->
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<div>
    <div class="container">
        <div class="row">
            <div class="center-block">

                <?php
                // var_dump is a nice way to blast variables to the screen. Not for user consumption though.
                //        var_dump($_SESSION);
                ?>
                <h1>Sign up for <br> Reserve For Me</h1>
                <img src="img/carparkmd.jpeg" class="img-responsive displayed">
            </div>
        </div>
    </div>
    <!--<h2><u>Welcome to ReZerve-4-Me</u></h2>-->
    <?php /*if(!empty($error_message)) { ?>
            <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
            <?php } */ ?>
    <!--create the sign-up form with first name, last name, and email text boxes for submit-->
    <!--<form action="userinf.php" method="post">-->
    <div class="container">
        <div class="row">
        <p>Sign up for free with your HCC email.</p>
        </div>
        <form class="form-inline" action="add.php" method="post">
            <!--display error message if login fails-->
            <?php if (!empty($error)): ?>
                <p class="alert alert-danger" id="error">
                    <?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <div class="row">
                <div class="form-group col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <div class="form-input">
                        <label>First Name:</label>
                        <input type="text" name="f_name" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <div class="form-input">
                        <label>Last Name:</label>
                        <input type="text" name="l_name" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <div class="form-input">
                        <label>Parking ID:</label>
                        <input type="text" name="parking_id" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <div class="form-input">
                        <label>Address:</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <div class="form-input">
                        <label>City:</label>
                        <input type="text" name="city" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <div class="form-input">
                        <label>State:</label>
                        <input type="text" name="state" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <div class="form-input">
                        <label>Phone:</label>
                        <input type="tel" name="phone" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <div class="form-input">
                        <label>E-mail:</label>
                        <input type="email" name="valid_email" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <div class="form-input">
                        <label>Password:</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" value="submit" class="btn btn-default">
            <a href="admin.php">Back</a>
            <!--        &nbsp-->
            <!--        <div id="buttons">-->
            <!--            <input type="submit" value="submit"><br>-->
            <!--        </div>-->

    </div>
    </form>
</div>
</body>
<footer><p>&nbsp;</p></footer>
</html>