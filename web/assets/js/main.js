$(document).ready(function (e) {
  let $uploadFile = $('#register .upload-profile-image input[type="file"]');

  $uploadFile.change(function () {
    readURL(this);
  });

  $("#reg-form").submit(function (event) {
    let $password = $("#password");
    let $confirm = $("#confirm_pwd");
    let $error = $("#confirm_error");
    if (
      $password.val().trim() === $confirm.val().trim() &&
      !$password.val().trim() &&
      $confirm.val().trim()
    ) {
      // Input is valid
      $password.removeClass("is-invalid");
      $password.addClass("is-valid");
      $password.css("border-bottom", "1px solid green");
      $confirm.removeClass("is-invalid");
      $confirm.addClass("is-valid");
      $confirm.css("border-bottom", "1px solid green");
      $error.addClass("text-success");
      $error.text("Passwords Match!");
      return true;
    } else {
      $password.addClass("is-invalid");
      $password.css("border-bottom", "1px solid red");
      $confirm.addClass("is-invalid");
      $confirm.css("border-bottom", "1px solid red");
      $error.addClass("text-success");
      $error.text("Passwords don't match.");
      // empty input values
      $password.val("");
      $confirm.val("");
      event.preventDefault();
    }
  });

  $('#reg-form input[type="text"]').blur(function () {
    if (!$(this).val().trim()) {
      // Input field is empty
      $(this).removeClass("is-valid");
      $(this).addClass("is-invalid");
      $(this).css("border-bottom", "1px solid red");
      $(this).val("");
    } else {
      // Input is valid
      $(this).removeClass("is-invalid");
      $(this).addClass("is-valid");
      $(this).css("border-bottom", "1px solid green");
    }
  });

  $('#reg-form input[type="email"]').blur(function () {
    if (!$(this).val().trim() || $(this).val().indexOf("@") < 0) {
      // Input field is empty
      $(this).removeClass("is-valid");
      $(this).addClass("is-invalid");
      $(this).css("border-bottom", "1px solid red");
      $(this).val("");
    } else {
      // Input is valid
      $(this).removeClass("is-invalid");
      $(this).addClass("is-valid");
      $(this).css("border-bottom", "1px solid green");
    }
  });
});

function readURL(input) {
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = function (e) {
      $("#register .upload-profile-image .img").attr("src", e.target.result);
      $("#register .upload-profile-image .camera-icon").css("display", "none");
    };

    reader.readAsDataURL(input.files[0]);
  }
}
