<?php
session_start();
include("../../backend/config.php");
if (empty(isset($_SESSION["login"]))) {
  header("Location:../../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POS: SUSPEND USERS</title>


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
              <h5 class="text text-center">POS System: Suspend User</h3>
            </div>
            <div class="col-3">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary">
                <a href="add-user.php" class="text text-white"> Add User</a>
              </button>
            </div>
          </div>
          <div id="users-data">

            <table class="table table-responsive table-striped table-light">
              <thead>
                <th>#</th>
                <th>Username</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
              </thead>
              <tr>
                <td colspan="5">
                  <div id="msg"></div>
                </td>
              </tr>

              <?php
              $stat = "active";
              $query = "SELECT * from USERS where status='$stat' order by username";
              $res = mysqli_query($conn, $query);
              $count = 0;
              while ($row = mysqli_fetch_array($res)) {
                $count = $count + 1;
                $id = $row["id"];
                $username = $row["username"];
                $category = $row["category"];
                $status = $row["status"];
              ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $username; ?></td>
                  <td><?php echo $status; ?></td>
                  <td><?php echo $category; ?></td>
                  <td>


                  </td>
                </tr>

              <?php
              }
              ?>
            </table>
          </div>

        </div>
      </div>
    <?php
    }
    ?>
</body>

</html>