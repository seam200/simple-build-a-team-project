$("#update1923").click(function () {
  const name = $("#up-name").val();
  const fathersName = $("#up-fname").val();
  const mothersName = $("#up-mname").val();
  const gender = $("input[name='up-gender']:checked").val();
  const dob = $("#up-dob").val();
  const location = $("#up-location").val();
  const completeGradution = $("#up-complete-gradution").val();
  const graduatedAt = $("#up-graduated-at").val();
  const mobileNumber = $("#up-phone").val();

  // Create a new FormData object
  const formData = new FormData();

  // Append the form data to the FormData object
  formData.append("name", name);
  formData.append("fathersName", fathersName);
  formData.append("mothersName", mothersName);
  formData.append("gender", gender);
  formData.append("dob", dob);
  formData.append("location", location);
  formData.append("completeGradution", completeGradution);
  formData.append("graduatedAt", graduatedAt);
  formData.append("mobileNumber", mobileNumber);

  // Get the file input element
  const uploadImg = $("#upload-img")[0].files[0];

  // Check if a file is selected
  if (uploadImg) {
    formData.append("uploadImg", uploadImg);
  }

  // Add an additional field to indicate the update action
  formData.append("upSubmit", "updateSuccess");

  $.ajax({
    url: "./server/val-upProfile.php",
    type: "POST",
    data: formData, // Use the FormData object
    processData: false, // Important: prevent jQuery from processing the data
    contentType: false, // Important: prevent jQuery from setting the content type
    success: function (response) {
      console.log(response);
      var res = JSON.parse(response);
      var error = res.error;
      var msg = res.msg;

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
            window.location.reload();
          }
        );
      }
    },
  });
});
