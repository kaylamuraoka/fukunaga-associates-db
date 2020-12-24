$(document).ready(function (e) {
  let $uploadFile = $('#register .upload-profile-image input[type="file"]');

  $uploadFile.change(function () {
    readURL(this);
  });

  $("#reg-form").submit(function (event) {
    let $password = $("#password");
    let $confirm = $("#confirm_pwd");
    let $error = $("#confirm_error");
    if ($password.val() === $confirm.val()) {
      return true;
    } else {
      $password.addClass("is-invalid");
      $password.css("border-bottom", "1px solid red");
      $confirm.addClass("is-invalid");
      $confirm.css("border-bottom", "1px solid red");
      $error.text("Those passwords didn't match. Try again.");
      // empty input values
      $password.val("");
      $confirm.val("");
      event.preventDefault();
    }
  });

  $('#reg-form input[type="text"]').blur(function () {
    if (!$(this).val()) {
      $(this).removeClass("is-valid");
      $(this).addClass("is-invalid");
    } else {
      $(this).removeClass("is-invalid");
      $(this).addClass("is-valid");
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
