<?php
session_start();  // Move session up so we can share state within the application across user actions
require_once('connectdb.php');

if (isset($_SESSION['valid_user'])) {
    header("location: check-in.php");
}

// validate input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $pass = filter_input(INPUT_POST, 'password');
//        $admin = filter_input(INPUT_POST, 'admin');

        if (empty($email) || $email == false) {
            $error_message = 'Valid school email must be entered';
        } else if (empty($pass) || $pass == false) {
            $error_message = 'Password is required';
        } else {
            $error_message = '';
        }

        if ($error_message != '') {
            include('index.php');
            exit();
        }
    }

    $query = "SELECT * FROM user_inf WHERE valid_email = :email";
    $statement = $db->prepare($query);
    $statement->bindParam(':email', $email);
    $statement->execute();

    $result = $statement->fetch();
    $statement->closeCursor();

//        var_dump($result);

    // if query returns results check that passwords match
    // use password_verify to compare input password and hashed password
    if ($result != FALSE) {
        if (password_verify($pass, $result['password'])) {

            // if user is in database initialize valid user session with value in email
            $_SESSION['valid_user'] = $email;

            // Set cookie
            $_COOKIE['valid_user_cookie'] = setcookie('valid_user_cookie', $email, time() + (10 * 365 * 24 * 60 * 60));

            header("location: check-in.php");
            exit();

        } else {

            // if email or password does not match display error
            $error_message = 'Incorrect email or password';
            include("index.php");
            exit();
        }

    }
}


?>