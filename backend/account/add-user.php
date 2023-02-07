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
    $password = sha1(md5(mysqli_real_escape_string($conn, $_POST['username'].'2001')));

    $sql_username = "SELECT * FROM users WHERE username = '$username'";
    $result_username = mysqli_query($conn, $sql_username);

    $count_username = mysqli_num_rows($result_username);
    if($count_username>0){
        $errors["username_taken"] = "username is already taken";
    }else{
        //create user account
        $sql_save = "Insert into users (username, password) values ('$username','$password')";
        if ($conn->query($sql_save) === TRUE) {
            $success= "Account successfully created";
          } else {
            $errors["register"] = "Error creating user account";
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