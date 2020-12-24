$(document).ready(function (e) {
  let $uploadFile = $('#register .upload-profile-image input[type="file"]');

  $uploadFile.change(function () {
    readURL(this);
  });

  $("#reg-form").submit(function (event) {
    let $password = $("#password");
    let $confirm = $("#confirm_pwd");
    if ($password.val().trim() === $confirm.val().trim()) {
      return true;
    } else {
      event.preventDefault();
    }
  });

  // To add a validity test to all text input elements:
  $('#reg-form input[type="text"]').on("input", function () {
    if (!$(this).val().trim()) {
      // Input field is empty
      invalidInput($(this));
    } else {
      // Input is valid
      validInput($(this));
    }
  });

  $('#reg-form input[type="email"]').on("input", function () {
    if (!$(this).val().trim() || $(this).val().indexOf("@") < 0) {
      // Input field is empty
      invalidInput($(this));
    } else {
      // Input is valid
      validInput($(this));
    }
  });

  $('#reg-form input[type="password"]').on("input", function () {
    let $password = $("#password").val().trim();
    let $confirm = $("#confirm_pwd").val().trim();
    let $message = $("#pwd-validation");

    if ($password === $confirm && !$password && !$confirm) {
      // Input is valid
      validInput($(this));

      $message.text("Passwords Match.");
      $message.removeClass("text-danger");
      $message.addClass("text-success");
    } else if (!$(this).val().trim()) {
      // No input yet
      $message.text(
        "Please enter a password with 8 or more characters (no spaces)."
      );
      $message.addClass("text-black-50");
    } else {
      invalidInput($(this));
      // Input field is empty
      $message.text("Passwords don't match.");
      $message.removeClass("text-success");
      $message.addClass("text-danger");
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

function invalidInput(element) {
  element.removeClass("is-valid");
  element.addClass("is-invalid");
  element.css("border-bottom", "1px solid red");
}

function validInput(element) {
  element.removeClass("is-invalid");
  element.addClass("is-valid");
  element.css("border-bottom", "1px solid green");
}
