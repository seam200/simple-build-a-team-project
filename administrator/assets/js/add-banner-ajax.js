$(document).ready(function () {
  $("#addBanner1923").submit(function (e) {
    e.preventDefault();

    const title = $("#add-banner-title").val();
    const subTitle = $("#add-banner-subTitle").val();

    const formData = new FormData();

    formData.append("title", title);
    formData.append("subTitle", subTitle);

    const bannerImg = $("#add-banner-img")[0].files[0];

    if (bannerImg) {
      formData.append("bannerImg", bannerImg);
    }

    formData.append("addbanner", "success");

    $.ajax({
      url: "./server/work-banner.php",
      type: "POST",
      data: formData,
      processData: false, // Important: prevent jQuery from processing the data
      contentType: false, // Important: prevent jQuery from setting the content type
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
              $("#addBanner1923").trigger("reset");
            }
          );
        }
      },
    });
  });
});
