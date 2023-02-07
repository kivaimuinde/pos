<?php

session_start ();
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
if (!empty($_POST['username']) && !(empty($_POST['password']))) {

    // login process

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = sha1(md5(mysqli_real_escape_string($conn, $_POST['password'])));

    $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);


    if ($count == 1) {
        $success = "success";
        $_SESSION['login'] = "login";
        $_SESSION['id'] = $row["id"];
        $_SESSION['username'] = $username;
        $_SESSION['category'] = $row["category"];
        $_SESSION['status'] = $row["status"];
    } else {
        $errors['login'] = 'Incorrect username and/or password.';

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