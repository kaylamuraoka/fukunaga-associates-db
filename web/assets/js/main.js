$(document).ready(function (e) {
  let $uploadFile = $('#register .upload-profile-image input[type="file"]');
  let $password = $("#password");
  let $confirm = $("#confirm_pwd");
  let $error = $("#confirm_error");

  $uploadFile.change(function () {
    readURL(this);
  });

  $("#reg-form").submit(function (event) {
    if ($password.val().trim() === $confirm.val().trim()) {
      return true;
    } else {
      event.preventDefault();
    }
  });

  $('#reg-form input[type="text"]').blur(function () {
    if (!$(this).val().trim()) {
      // Input field is empty
      $(this).removeClass("is-valid");
      $(this).addClass("is-invalid");
      $(this).css("border-bottom", "1px solid red");
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
    } else {
      // Input is valid
      $(this).removeClass("is-invalid");
      $(this).addClass("is-valid");
      $(this).css("border-bottom", "1px solid green");
    }
  });

  $password.blur(function () {
    if (
      !$password.val().trim() ||
      $password.val().trim() != $confirm.val().trim()
    ) {
      // Input field is empty
      $password.removeClass("is-valid");
      $password.addClass("is-invalid");
      $password.css("border-bottom", "1px solid red");
    } else {
      // Input is valid
      $password.removeClass("is-invalid");
      $password.addClass("is-valid");
      $password.css("border-bottom", "1px solid green");
    }
  });

  $confirm.blur(function () {
    if (
      !$confirm.val().trim() ||
      $password.val().trim() != $confirm.val().trim()
    ) {
      // Input field is empty
      $(this).removeClass("is-valid");
      $(this).addClass("is-invalid");
      $(this).css("border-bottom", "1px solid red");
      $error.text("Passwords don't match.");
    } else {
      // Input is valid
      $password.removeClass("is-invalid");
      $password.addClass("is-valid");
      $password.css("border-bottom", "1px solid green");
      $error.text("");
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
