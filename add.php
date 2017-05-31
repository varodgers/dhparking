<?php
$f_name = filter_input(INPUT_POST, 'f_name');
$l_name = filter_input(INPUT_POST, 'l_name');
$parking_id = filter_input(INPUT_POST, 'parking_id');
//$address = filter_input(INPUT_POST, 'address');
//$city = filter_input(INPUT_POST, 'city');
//$state = filter_input(INPUT_POST, 'state');
//$phone = filter_input(INPUT_POST, 'phone');
$valid_email = filter_input(INPUT_POST, 'valid_email');

//password needs to be saved in variable other than password so that it doesn't conflict with other password variable in connectdb
$pass = filter_input(INPUT_POST, 'password');

//if ($f_name == null || $l_name == false || $address == null || $city == null
//    || $state == null || $phone == false || $valid_email == null || $pass == null)
if ($f_name == null || $l_name == null || $valid_email == null || $pass == null)
{
    $error = "Check all fields and try again.";
} else {
    $error = '';
    require_once('connectdb.php');

// hash and salt password
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    $query = "INSERT INTO user_inf (f_name, l_name, parking_id, valid_email, password) 
VALUES ( :f_name, :l_name, :parking_id, :valid_email, :hashed_password)";
    $statement = $db->prepare($query);
    $statement->bindValue(':f_name', $f_name);
    $statement->bindValue(':l_name', $l_name);
    $statement->bindValue(':parking_id', $parking_id);
//    $statement->bindValue(':address', $address);
//    $statement->bindValue(':city', $city);
//    $statement->bindValue(':state', $state);
//    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':valid_email', $valid_email);
    $statement->bindValue(':hashed_password', $hashed_password);
    $statement->execute();
//    $err = $statement->errorInfo();
    $statement->closeCursor();

    include('userinf.php');

}

if($error != ''){
    include('sign-up.php');
    exit();
}


?>