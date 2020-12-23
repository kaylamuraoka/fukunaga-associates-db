$(document).ready(function (e) {
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
