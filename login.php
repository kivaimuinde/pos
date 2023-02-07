<?php
session_start();

if (!empty(isset($_SESSION['login']))) {
  header("Location:home.php");
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Welcome : User Account Login</title>
  <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
-->
  <link rel="stylesheet" href="include/css/bootstrap.min.css" />
  <script src="include/js/jquery.min.js"></script>
  <script src="include/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function () {
      $("form").submit(function (event) {
        $(".form-group").removeClass("has-error");
        $(".help-block").remove();
        $("#msg").html("");
        var formData = {
          username: $("#username").val(),
          password: $("#password").val(),
        };
        $.ajax({
          type: "POST",
          url: "backend/account/login.php",
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
            if (data.errors.password) {
              $("#password-group").addClass("has-error");
              $("#password-group").append(
                '<div class="help-block text text-danger">' + data.errors.password + "</div>"
              );
            }
            if (data.errors.login) {
              $("#msg").html('<p class="alert alert-danger">' + data.errors.login + "</p>");
            }
          } else {
            //$("#msg").html('<p class="alert alert-success">' + data.message + "</p>");
            location.reload();
          }
        });
        event.preventDefault();
      });
    });
  </script>
</head>

<body>
  <div class="container-fluid h-100 ">
    <div class="row  d-flex justify-content-center align-items-center min-vh-100">
      <div class="col col-sm-12 col-md-10 col-lg-6 col-xl-6 alert">
        <p class="h1 text-center">Welcome to POS</p>
        <p class="h5 text-center">User Account Login</p>


        <div id="msg"></div>
        <form action="backend/account/login.php" method="POST">
          <div id="username-group" class="form-group">
            <label for="username">Name</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
          </div>

          <div id="password-group" class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="********" />
          </div>
          <div>
            <button id="login" value="login" type="submit" class="btn btn-success btn-group-vertical">
              Account Login
            </button>
          </div>
          <div>
            <p>Forgot passwor? Click <a href="pos/users/reset-password.php" class="text text-link">here </a> to reset
            </p>
          </div>

        </form>
      </div>
    </div>
  </div>
</body>

</html>