<?php

session_start();
include("../config.php");

$errors = [];
$data = [];
$success = "";

if (empty($_POST['username'])) {
    $errors['username'] = 'username is required.';
}

if (empty($_POST['password'])) {
    $errors['password'] = 'password is required.';
}

if (empty($_POST['confirm_password'])) {
    $errors['confirm_password'] = 'Confirm password is required.';
}
if ($_POST['confirm_password'] != $_POST['password']) {
    $errors['match_password'] = 'Passwords do not match.';

}

//check whether username is taken
if (!empty($_POST['username']) && !(empty($_POST['password']))) {

    // login process

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = sha1(md5(mysqli_real_escape_string($conn, $_POST['password'])));

    $sql_username = "SELECT * FROM users WHERE username = '$username'";
    $result_username = mysqli_query($conn, $sql_username);

    $count_username = mysqli_num_rows($result_username);
    if($count_username<1){
        $errors["username_not_found"] = "Unrecognised username.";
    }else{
        //create user account
        $sql_update = "UPDATE users SET password='$password' where username='$username'";
        if ($conn->query($sql_update) === TRUE) {
            $success= "Password successfully changed";
          } else {
            $errors["register"] = "Error resetting password";
          }
    }

}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = $success;
}

echo json_encode($data);

?>