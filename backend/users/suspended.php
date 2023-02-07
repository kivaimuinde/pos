<?php

session_start ();
include("../config.php"); 
?>
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
$stat = "suspended";
$query = "SELECT * from USERS where status='$stat' order by username";
$res = mysqli_query($conn, $query);
$count = 0;
while($row=mysqli_fetch_array($res)){
    $count=$count+1;
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
    
    <?php
    if($status=="inactive"){
        ?>
        <script>
         $(document).ready(function () {
    $("form").submit(function (event) {
        var formData = {
        id: <?php echo $id; ?>,   
      };
        $.ajax({
        type: "POST",
        url: "backend/user/activate-user.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
        console.log(data);
        if (!data.success) {
            $("#msg").html('<p class="alert alert-danger">' + data.message + "</p>");            
            $( "#msg" ).delay( 5000 ).fadeOut( 400 );
          } else {
            //$("#msg").html('<p class="alert alert-success">' + data.message + "</p>");
            $("#msg").html('<p class="alert alert-success">' + data.message + "</p>");
            $( "#msg" ).delay( 5000 ).fadeOut( 400 );
        }
      });
        event.preventDefault();
    });
  });
    </script>
        </script>
        <form onsubmit="" method="POST">
        <input type="hidden" name="id" value="<?php echo $id?>"/>
        <input type="submit" name="activate" value="Activate" class="btn btn-success"/>
        </form>
        
        <?php
    }
    if($status=="suspended"){
        ?>
        <form onsubmit="" method="POST" onsubmit="return RestoreUser();">
        <input type="hidden" name="id" value="<?php echo $id?>"/>
        <input type="submit" name="restore" value="Restore" class="btn btn-primary"/>
        </form>
        
        <?php
    }
    if($status=="active"){
        ?>
        <form onsubmit="" method="POST" onsubmit="return SuspendUser();">
        <input type="hidden" name="id" value="<?php echo $id?>"/>
        <input type="submit" name="suspend" value="Suspend" class="btn btn-danger"/>
        </form>
        
        <?php
    }
    
    ?>
    </td>
    </tr>
    
    <?php
}
?>
</table>