$(document).ready(function(){
    $("#addManager1923").submit(function(e){
        e.preventDefault();

        const name = $("#add-manager-name").val();
        const title = $("#add-manager-title").val();
        const facebook = $("#add-manager-facebook").val();
        const twitter = $("#add-manager-twitter").val();
        const linkedin = $("#add-manager-linkedin").val();
        const skype = $("#add-manager-skype").val();
        
        const formData = new FormData();
        
        formData.append("name", name);
        formData.append("title", title);
        
        const managerImg = $("#add-manager-img")[0].files[0];

        if(managerImg){
            formData.append("managerImg", managerImg);
        }else if(facebook){
            formData.append("facebook", facebook);
        }else if(twitter){
            formData.append("twitter", twitter);
        }else if(linkedin){
            formData.append("linkedin", linkedin);
        }else if(skype){
            formData.append("skype", skype);
        }

        formData.append("addManager", "success");

        $.ajax({
            url: "./server/work-management.php",
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
                        $('#addManager1923').trigger("reset");
                    }
                  );
                }
              },
        })
    });
    $("#addSponsor1923").submit(function(e){
        e.preventDefault();

        const name = $("#add-sponsor-Cname").val();
        const link = $("#add-sponsor-Clink").val();
        
        const formData = new FormData();
        
        formData.append("name", name);
        formData.append("link", link);
        
        const companyImg = $("#add-sponsor-Cimg")[0].files[0];

        if(companyImg){
            formData.append("companyImg", companyImg);
        }

        formData.append("addSponsor", "success");

        $.ajax({
            url: "./server/work-management.php",
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
                  swal(
                    {
                      title: "Congratulations!",
                      text: msg,
                      type: "success",
                    },
                    function () {
                        $('#addSponsor1923').trigger("reset");
                    }
                  );
                }
              },
        })
    });
})