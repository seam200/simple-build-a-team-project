$(document).ready(function () {
  $(".edit-banner").click(function () {
    const bannerId = $(this).attr("data-bid");
    const bannerTitle = $(this).attr("data-btitle");
    const bannerSubTitle = $(this).attr("data-bSubTitle");
    const bannerImgSrc = $(this).attr("data-bImg");

    $("#up-banner-getId").val(bannerId);
    $("#up-banner-title").val(bannerTitle);
    $("#up-banner-subTitle").val(bannerSubTitle);
    $("#banner_imgModalSrc").attr("src", "../" + bannerImgSrc);

    $("#editBanners").modal("show");
  });

  // banner status update
  $(".banner-status").change(function () {
    const bannerId = $(this).attr("data-bId");
    const isChecked = $(this).prop("checked");

    const formData = new FormData();

    formData.append("bannerId", bannerId);
    formData.append("isChecked", isChecked);
    formData.append("updateStatus", "success");

    $.ajax({
      url: "./server/work-banner.php",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response == "Something Went wrong!") {
          swal({
            title: "Error!",
            text: response,
            type: "warning",
          });
        }
      },
    });
  });

  // delete banner
  $(".delete-banner").click(function () {
    const bannerId = $(this).attr("data-bid");
    $("#delete-banner-getId").val(bannerId);
    $("#dlt-Banner").modal("show");
  });

  $("#up-banner-image").change(function () {
    var file = this.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#banner_imgModalSrc").attr("src", e.target.result);
    };

    reader.readAsDataURL(file);
  });

  // submit the modal for updating the banner info
  $("#updateBanner1923").submit(function (e) {
    e.preventDefault();

    const bannerId = $("#up-banner-getId").val();
    const bannerTitle = $("#up-banner-title").val();
    const bannerSubTitle = $("#up-banner-subTitle").val();

    const formData = new FormData();

    formData.append("bannerId", bannerId);
    formData.append("bannerTitle", bannerTitle);
    formData.append("bannerSubTitle", bannerSubTitle);
    formData.append("updateBanner", "success");

    const bannerImg = $("#up-banner-image")[0].files[0];
    if (bannerImg) {
      formData.append("bannerImg", bannerImg);
    }

    $.ajax({
      url: "./server/work-banner.php",
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
              $("#editBanners").modal("hide");
              window.location.reload();
            }
          );
        }
      },
    });
  });

  $("#deleteBanner1923").submit(function (e) {
    e.preventDefault();
    const bannerId = $("#delete-banner-getId").val();

    const formData = new FormData();

    formData.append("bannerId", bannerId);
    formData.append("deleteBanner", "success");

    $.ajax({
      url: "./server/work-banner.php",
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
