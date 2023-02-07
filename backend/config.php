<?php      
    $HOST = "localhost";  
    $USER = "root";  
    $PASSWORD = '';  
    $DATABASE = "pointofsale";  
      
    $conn = mysqli_connect($HOST, $USER, $PASSWORD, $DATABASE);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  