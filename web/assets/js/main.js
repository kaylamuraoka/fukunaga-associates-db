$(document).ready(function (e) {
  let $uploadFile = $('#register .upload-profile-image input[type="file"]');

  $uploadFile.change(function () {
    readURL(this);
  });

  $("#reg-form").submit(function (event) {
    if ($("#password").val() === $("#confirm_pwd").val()) {
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

  $("#password, #confirm_pwd").on("keyup", function () {
    if ($("#password").val() == $("#confirm_pwd").val()) {
      // Input is valid
      $("#pwd-validation").html("Passwords Match.").css("color", "green");
      validInput($("#password"));
      validInput($("#confirm_pwd"));
    } else {
      // Input is invalid
      $("#pwd-validation").html("Passwords don't match.").css("color", "red");
      invalidInput($("#password"));
      invalidInput($("#confirm_pwd"));
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
  element.removeClass("is-valid").addClass("is-invalid");
  element.css("border-bottom", "1px solid red");
}

function validInput(element) {
  element.removeClass("is-invalid").addClass("is-valid");
  element.css("border-bottom", "1px solid green");
}
