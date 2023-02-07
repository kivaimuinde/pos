<?php
if (isset($_SESSION["login"]) && !empty(isset($_SESSION["login"]))){
    header("Location:home.php");
}else{
    header("Location:login.php");
}

?>