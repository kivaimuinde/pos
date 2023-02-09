<?php
session_start ();
if(empty(isset($_SESSION["login"]))){
    header("Location:../../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS: INACTIVE USERS</title>
   

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link  rel="stylesheet" href="include/css/bootstrap.min.css"/>   
    <link href="../../include/css/bootstrap-icons.min.css" rel="stylesheet"/>
    <link href="../../include/css/all.min.css" rel="stylesheet"/>
    <script src="../../include/js/jquery.min.js"></script>   
    <!-- 
    <script src="include/js/bootstrap.bundle.min.js"></script>
-->

</head>
<body>

<div class="container-fluid">

<?php
if(!isset($_SESSION["category"])=="admin"){
    echo '<div class="alert alert-warning"> You are not allowed to visit this page. Please contact the system admin for assistabce</div>';
} else {
    ?>
    <div class="row flex-nowrap">
        <?php
            include("../pos-sidebar.php");
        ?>
        <div class="col py-3">
            <div class="row">
                <div class="col-9">
                    <h5 class="text text-center">POS Inactive System Users</h3>
                </div>
                <div class="col-3">
                    <button class="btn-primary"><i class="fas fa-plus"></i> Add User</p>
                </div>
            </div>
            <div id="inactive-users-data"></div>
    
        </div>
    </div>
<?php
}
?>
</body>
<script>
function LoadInactiveUsersData() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("inactive-users-data").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "../../backend/users/inactive.php", true);
  xhttp.send();
}
setInterval(function(){
    LoadInactiveUsersData();
}, 1000);

window.onload =LoadInactiveUsersData;
</script>
</html>