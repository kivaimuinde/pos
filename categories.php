<?php
session_start();
if (empty(isset($_SESSION["login"]))) {
  header("Location:login.php");
}
include("backend/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POS: ALL CATEGORIES</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="include/css/bootstrap.min.css" />
  <link href="include/css/bootstrap-icons.min.css" rel="stylesheet" />
  <link href="include/css/all.min.css" rel="stylesheet" />
  <script src="include/js/jquery.min.js"></script>
  <!-- 
<script src="include/js/bootstrap.bundle.min.js"></script>
-->

</head>

<body>

  <div class="container-fluid">

    <?php
    if (!isset($_SESSION["category"]) == "admin") {
      echo '<div class="alert alert-warning"> You are not allowed to visit this page. Please contact the system admin for assistabce</div>';
    } else {
    ?>
      <div class="row flex-nowrap">
        <?php
        include("sidebar.php");
        ?>
        <div class="col py-3">
          <div class="row fixed-top bg-dark">
            <div class="col-9">
              <h3 class="text text-center text-white">POS System: All Categories</h3>
              <br>
            </div>
            <div class="col-3">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary">
                <a href="#" class="text text-white"> Add New Category</a>
              </button>
            </div>
          </div>
          <div id="categories-data" style="padding-top: 1cm">
           
            <table class="table table-responsive table-striped table-light">
              <thead>
                <th>#</th>
                <th>Category name</th>
                <th># Products</th>
                <th>Last Update</th>
                <th>Action</th>
              </thead>
              <tr>
                <td colspan="5">
                  <div id="msg"></div>
                </td>
              </tr>
            </table>

          </div>
        </div>
      <?php
    }
      ?>
</body>
</html>