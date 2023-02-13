<?php

session_start();
include("../config.php");
?>
<table class="table table-responsive table-striped table-light">
  <thead>
    <th>#</th>
    <th>Username</th>
    <th>Category</th>
    <th>Status</th>
  </thead>
  <tr>
    <td colspan="5">
      <div id="msg"></div>
    </td>
  </tr>

  <?php
  $me = $_SESSION["id"];
  $query = "SELECT * from USERS  where id!='$me' order by username";
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
      <td><a href="../../../../pos/app/users/user-details.php?user=<?php echo $id; ?>" class="text text-capitalize text-default" target="_blank"><?php echo $username; ?></a></td>
      <td><?php echo $status; ?></td>
      <td><?php echo $category; ?></td>
       </tr>

  <?php
  }
  ?>
</table>
