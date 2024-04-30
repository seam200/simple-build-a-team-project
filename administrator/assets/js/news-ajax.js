$(document).ready(function () {
  $("#addBreakingNews1923").click(function () {
    const newsDetails = $("#add-news-details").val();
    const newsLink = $("#add-news-link").val();

    const formData = new FormData();

    formData.append("newsDetails", newsDetails);
    formData.append("newsLink", newsLink);
    formData.append("addBreakingNews", "success");

    $.ajax({
      url: "./server/work-news.php",
      type: "POST",
      data: formData,
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
          swal({
            title: "Congratulations!",
            text: msg,
            type: "success",
          });
        }
      },
    });
  });
  $("#updateBreakingNews1923").click(function () {
    const newsDetails = $("#add-news-details").val();
    const newsLink = $("#add-news-link").val();

    const formData = new FormData();

    formData.append("newsDetails", newsDetails);
    formData.append("newsLink", newsLink);
    formData.append("updateBreakingNews", "success");

    $.ajax({
      url: "./server/work-news.php",
      type: "POST",
      data: formData,
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
          swal({
            title: "Congratulations!",
            text: msg,
            type: "success",
          });
        }
      },
    });
  });
});
