<?php
session_start();

include("../config.php");


$data = [];

if (!empty($_POST['activate'])) {
    $id=mysqli_real_escape_string($conn, $_POST['id']);
    $status = "suspended";

    $sql = "UPDATE USERS SET status='$status' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        $data["success"] = true;
        $data["message"]="User account suspended";
	} 
	else {
        $data["success"] = false;
        $data["message"]="Could not suspend account, try again later";
	}
	mysqli_close($conn);
}
echo json_encode($data);

?>