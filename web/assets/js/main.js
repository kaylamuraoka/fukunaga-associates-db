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
      $(this).removeClass("is-invalid");
      $(this).addClass("is-valid");
      $(this).css("border-bottom", "1px solid green");
    }
  });

  $('#reg-form input[type="email"]').on("input", function () {
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

  $("#password, #confirm_pwd").on("keyup", function () {
    if ($("#password").val().trim() === $("#confirm_pwd").val().trim()) {
      $("#pwd-validation").text("Passwords Match.").css("color", "green");
    } else $("#pwd-validation").text("Passwords don't match.").css("color", "red");
  });

  // $("#confirm_pwd").focusout(function () {
  //   let $password = $("#password").val().trim();
  //   let $confirm = $("#confirm_pwd").val().trim();
  //   if ($password != $confirm) {
  //     // Input field is empty
  //     $('#reg-form input[type="password"]').removeClass("is-valid");
  //     $('#reg-form input[type="password"]').addClass("is-invalid");
  //     $('#reg-form input[type="password"]').css(
  //       "border-bottom",
  //       "1px solid red"
  //     );
  //     $error.text("Passwords don't match.");
  //     $error.removeClass("text-success");
  //     $error.addClass("text-danger");
  //   } else {
  //     // Input is valid
  //     $('#reg-form input[type="password"]').removeClass("is-invalid");
  //     $('#reg-form input[type="password"]').addClass("is-valid");
  //     $('#reg-form input[type="password"]').css(
  //       "border-bottom",
  //       "1px solid green"
  //     );
  //     $error.text("Passwords Match.");
  //     $error.removeClass("text-danger");
  //     $error.addClass("text-success");
  //   }
  // });
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
