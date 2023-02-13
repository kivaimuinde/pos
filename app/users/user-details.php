<?php
session_start();
if (empty(isset($_SESSION["login"]))) {
  header("Location:../../login.php");
}

include("../../backend/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POS: User Details</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="include/css/bootstrap.min.css" />
  <link href="../../include/css/bootstrap-icons.min.css" rel="stylesheet" />
  <link href="../../include/css/all.min.css" rel="stylesheet" />
  <script src="../../include/js/jquery.min.js"></script>
  <!-- 
    <script src="include/js/bootstrap.bundle.min.js"></script>
-->

</head>

<body>

  <div class="container-fluid">

    <?php
    if (!isset($_SESSION["category"]) == "admin") {
      echo '<div class="alert alert-warning">'
        . 'You are not allowed to visit this page.'
        . ' Please contact the system admin for assistabce</div>';
    } else {
    ?>
      <div class="row flex-nowrap">
        <?php
        include("../pos-sidebar.php");
        ?>
        <div class="col py-3">
          <div class="row">
            <div class="col-9">
              <h3 class="text text-center">POS System: User Details</h3>
            </div>
            <div class="col-3">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary">
                <a href="../../users.php" class="text text-white"> Users List</a>
              </button>
            </div>
          </div>
          <div id="main-content">
            <?php
            $id = mysqli_real_escape_string($conn, $_GET['user']);
            $sql = "SELECT * FROM users WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $count = mysqli_num_rows($result);

            if ($count == 1) {
              $userID = $row["id"];
              $username = $row["username"];
              $category = $row["category"];
              $status = $row["status"];

            ?>
              <div class="row">
                <div class="col offset-2 col-sm-12 col-md-10 col-lg-6 col-xl-6">
                  <table class="table table-striped table-responsive-md table-responsive-sm table-responsive-xm">
                    <tr>
                      <td>
                        <form id="delete-form">
                          <input type="hidden" name="user" id="user" value="<?php echo $userID; ?>" />
                          <input type="submit" class="btn btn-danger" value="Delete this user" />
                        </form>
                      </td>
                      <td>
                        <button class="btn btn-primary">Update this User </button>
                      </td
                    </tr>
                    <tr>
                      <td>User Name</td>
                      <td><?php echo $username; ?></td>
                    </tr>
                    <tr>
                      <td>User category</td>
                      <td><?php echo $category; ?></td>
                    </tr>
                    <tr>
                      <td>User Status</td>
                      <td><?php echo $status; ?></td>
                    </tr>
                </div>
              </div>
            <?php

            } else {
              echo '<div class="alert alert-danger">We could not find the resource your are looking for.</div>';
            }
            ?>

          </div>

        </div>
      </div>
    <?php
    }
    ?>
</body>

</html>