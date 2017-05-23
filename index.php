<?php
/**
 * User: vanessa
 * Date: 2/15/17
 * Time: 11:53 AM
 */

require_once('connectdb.php');
require_once('log-in.php');

if (!isset($email)) {
    $email = '';
}
if (!isset($password)) {
    $password = '';
}


?>

    <!--This site was designed to look best on mobile phones-->

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

        <link rel="stylesheet" type="text/css" href="styles/main.css">
        <title>Reserve For Me - Log In</title>
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

    <main>

        <!--login/signup page
         signup page redirects to sign-up.php-->
        <!--display error message if login fails-->
        <?php if (!empty($error_message)): ?>
            <p class="alert alert-danger" id="error">
                <?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>

        <div class="container">
            <form class="form-inline" action="log-in.php" method="post">
                <div class="row">
                    <div class="form-group col-xs-11 col-sm-11 col-md-11 col-lg-12">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" id="email"
                               placeholder="firstname.lastname@howardcc.edu">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-11 col-sm-11 col-md-11 col-lg-11">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="password"><br>
                    </div>
                </div>
                <input type="submit" name="login" value="Log In" class="btn btn-default"><br>

                <!--            comment out for testing purposes-->
                <!--            &nbsp;&nbsp;<a href="sign-up.php">Sign Up</a><br>-->

        </form>

    </main>
    </body>
    <footer><p>&nbsp;</p></footer>
    </html>

<?php

?>