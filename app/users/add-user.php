<?php
session_start();
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
    <title>POS: ADD USERS</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css"
        rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="include/css/bootstrap.min.css" />
    <link href="../../include/css/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="../../include/css/all.min.css" rel="stylesheet" />
    <script src="../../include/js/jquery.min.js"></script>
    <!-- 
    <script src="include/js/bootstrap.bundle.min.js"></script>
-->
<script>
    $(document).ready(function () {
      $("form").submit(function (event) {
        $(".form-group").removeClass("has-error");
        $(".help-block").remove();
        $("#msg").html("");
        var formData = {
          username: $("#username").val(),
          password: $("#password").val(),          
          confirm_password: $("#confirm_password").val(),
        };
        $.ajax({
          type: "POST",
          url: "../../backend/account/add-user.php",
          data: formData,
          dataType: "json",
          encode: true,
        }).done(function (data) {
          console.log(data);
          if (!data.success) {
            if (data.errors.username) {
              $("#username-group").addClass("has-error");
              $("#username-group").append(
                '<div class="help-block text text-danger">' + data.errors.username + "</div>"
              );
            }
            if (data.errors.username_taken) {
              $("#username-group").addClass("has-error");
              $("#username-group").append(
                '<div class="help-block text text-danger">' + data.errors.username_taken + "</div>"
              );
            }
            if (data.errors.password) {
              $("#password-group").addClass("has-error");
              $("#password-group").append(
                '<div class="help-block text text-danger">' + data.errors.password + "</div>"
              );
            }
            if (data.errors.confirm_password) {
              $("#confirm-password-group").addClass("has-error");
              $("#confirm-password-group").append(
                '<div class="help-block text text-danger">' + data.errors.confirm_password + "</div>"
              );
            }
            if (data.errors.match_password) {
              $("#password-group").addClass("has-error");
              $("#password-group").append(
                '<div class="help-block text text-danger">' + data.errors.match_password + "</div>"
              );
              $("#confirm-password-group").addClass("has-error");
              $("#confirm-password-group").append(
                '<div class="help-block text text-danger">' + data.errors.match_password + "</div>"
              );
            }
            if (data.errors.register) {
              $("#msg").html('<p class="alert alert-danger">' + data.errors.register + "</p>");
            }
          } else {
            $("#msg").html('<p class="alert alert-success">' + data.message + "</p>");
            $("#msg").delay(1000).fadeOut(5000);
            $("#add-user-form").trigger("reset");
          }
        });
        event.preventDefault();
      });
    });
  </script>

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
                            <h5 class="text text-center">POS System: Add Users</h3>
                        </div>
                        <div class="col-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success">
                                <a href="../../users.php" class="text text-white"> View All User</a>
                            </button>
                        </div>                        
                        <div id="msg" class="col-12"></div>
                    </div>
                    <div id="add-users">
                        <div class="container-fluid h-100 ">
                            <div class="row min-vh-100">
                                <div class="col col-sm-12 col-md-10 col-lg-6 col-xl-6 alert">
                                    <div id="msg"></div>
                                    <form id="add-user-form" action="../../backend/account/add-user.php" method="POST">
                                        <div id="username-group" class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Username" />
                                        </div>

                                        <div id="password-group" class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="********" />
                                        </div>
                                        <div id="confirm-password-group" class="form-group">
                                            <label for="confirm_password">Password</label>
                                            <input type="password" class="form-control" id="confirm_password"
                                                name="confirm_password" placeholder="********" />
                                        </div>

                                        <button id="add_user" value="Add user" type="submit"
                                            class="btn btn-success btn-group-vertical">
                                            Add user
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <?php
        }
        ?>
</body>

</html>