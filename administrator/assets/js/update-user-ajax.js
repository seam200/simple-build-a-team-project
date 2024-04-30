$(document).ready(function () {
  $(".edit-user-post").click(function () {
    const userId = $(this).attr("data-uId");
    const userPost = $(this).attr("data-uPost");

    $("#up-user-getId").val(userId);
    $("#up-user-post").val(userPost);

    $("#editUserPost").modal("show");
  });

  $("#updateUserPost1923").submit(function (e) {
    e.preventDefault();

    const userId = $("#up-user-getId").val();
    const userPost = $("#up-user-post").val();

    const formData = new FormData();

    formData.append("userId", userId);
    formData.append("userPost", userPost);
    formData.append("updateUserPost", "success");

    $.ajax({
      url: "./server/work-user.php",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
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
              $("#dlt-Banner").modal("hide");
              window.location.reload();
            }
          );
        }
      },
    });
  });
});
