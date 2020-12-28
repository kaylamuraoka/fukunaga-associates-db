$(document).ready(function (e) {
  let $uploadFile = $('#register .upload-profile-image input[type="file"]');

  $uploadFile.change(function () {
    readURL(this);
  });

  $("#reg-form").submit(function (event) {
    let $password = $("#password").val();
    let $confirm = $("#confirm_pwd").val();
    if (
      $password === $confirm &&
      $password.length > 8 &&
      $password.match(/\d/) &&
      $password.match(/[A-Z]/) &&
      $password.indexOf(" ") < 0
    ) {
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

  // Validate password is strong
  $("#password").on("input", function () {
    // Validate the length
    if ($(this).val().length < 8) {
      $("#pwdLength").css("color", "red");
      passwordFail($("#lengthCheck"));
      invalidInput($("#password"));
    } else {
      $("#pwdLength").css("color", "green");
      passwordPass($("#lengthCheck"));
      validInput($("#password"));
    }

    // Check for spaces
    if ($(this).val().indexOf(" ") >= 0) {
      // contains spaces
      $("#pwdSpaces").css("color", "red");
      passwordFail($("#spacesCheck"));
      invalidInput($("#password"));
    } else {
      $("#pwdSpaces").css("color", "green");
      passwordPass($("#spacesCheck"));
      validInput($("#password"));
    }

    // Validate capital letter
    if ($(this).val().match(/[A-Z]/)) {
      // has a capital letter
      $("#pwdCapital").css("color", "green");
      passwordPass($("#capCheck"));
      validInput($("#password"));
    } else {
      $("#pwdCapital").css("color", "red");
      passwordFail($("#capCheck"));
      invalidInput($("#password"));
    }

    // Validate number
    if ($(this).val().match(/\d/)) {
      // has at least one number
      $("#pwdNum").css("color", "green");
      passwordPass($("#numCheck"));
      validInput($("#password"));
    } else {
      $("#pwdNum").css("color", "red");
      passwordFail($("#numCheck"));
      invalidInput($("#password"));
    }
  });

  $("#password, #confirm_pwd").on("keyup", function () {
    if ($("#password").val() == $("#confirm_pwd").val()) {
      // Input is valid
      $("#pwd-validation").html("Passwords Match.").css("color", "green");
      validInput($("#confirm_pwd"));
    } else {
      // Input is invalid
      $("#pwd-validation").html("Passwords don't match.").css("color", "red");
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

function passwordPass(element) {
  element
    .removeClass("fas fa-times-circle")
    .addClass("fas fa-check-circle")
    .css("color", "green");
}

function passwordFail(element) {
  element
    .removeClass("fas fa-check-circle")
    .addClass("fas fa-times-circle")
    .css("color", "red");
}
