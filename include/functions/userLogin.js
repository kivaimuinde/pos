$(document).ready(function () {
    $("form").submit(function (event) {
        $(".form-group").removeClass("has-error");
        $(".help-block").remove();
        
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
                '<div class="help-block">' + data.errors.username + "</div>"
              );
            }
    
            if (data.errors.password) {
              $("#password-group").addClass("has-error");
              $("#password-group").append(
                '<div class="help-block">' + data.errors.password + "</div>"
              );
            }
          } else {
            $("form").html(
              '<div class="alert alert-success">' + data.message + "</div>"
            );
          }
      });
  
      event.preventDefault();
    });
  });