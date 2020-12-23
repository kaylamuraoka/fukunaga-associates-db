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
      $confirm.addClass("is-invalid");
      $error.text("Those passwords didn't match. Try again.");
      event.preventDefault();
    }
  });
});

function readURL(input) {
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = function (e) {
      $("#register .upload-profile-image .img").attr("src", e.target.result);
      $("#register .upload-profile-image .camera-icon").css((display, "none"));
    };

    reader.readAsDataURL(input.files[0]);
  }
}
