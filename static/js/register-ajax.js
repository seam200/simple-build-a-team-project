$("#register1923").click(function () {
  var name = $("#reg-name").val();
  var fathersName = $("#reg-fathersName").val();
  var mothersName = $("#reg-mothersName").val();
  var gender = $("input[name='reg-gender']:checked").val();
  var dob = $("#reg-dob").val();
  var location = $("#reg-location").val();
  var completeGradution = $("#reg-complete-gradution").val();
  var graduatedAt = $("#reg-graduated-at").val();
  var mobileNumber = $("#reg-mobileNumber").val();
  var email = $("#reg-email").val();
  var pass = $("#reg-pass").val();
  var confPass = $("#reg-confirm_pass").val();
  var refToken = $("#reg-ref-token").val();
  $.ajax({
    url: "./server/val-register.php",
    type: "POST",
    data: {
      name: name,
      fathersName: fathersName,
      mothersName: mothersName,
      gender: gender,
      dob: dob,
      location: location,
      completeGradution: completeGradution,
      graduatedAt: graduatedAt,
      mobileNumber: mobileNumber,
      email: email,
      pass: pass,
      confPass: confPass,
      refToken: refToken,
      submit: "success",
    },
    success: function (response) {
      const res = JSON.parse(response);
      const error = res.error;
      const msg = res.msg;

      if (error === true) {
        swal({
          title: "Error!",
          text: msg,
          type: "warning",
        });
      } else if (error === false) {
        swal(
          {
            title: "Congratulations!",
            text: msg,
            type: "success",
          },
          function () {
            window.location.href = "./login.php";
          }
        );
      }
    },
  });
});
