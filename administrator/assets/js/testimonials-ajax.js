$(document).ready(function(){
    $("#addTestimonials1923").submit(function(e){
        e.preventDefault();

        const name = $("#add-client-name").val();
        const location = $("#add-client-location").val();
        const details = $("#add-client-review").val();
        
        const formData = new FormData();
        
        formData.append("name", name);
        formData.append("location", location);
        formData.append("details", details);
        
        const clientImg = $("#add-client-img")[0].files[0];

        if(clientImg){
            formData.append("clientImg", clientImg);
        }

        formData.append("addClientReview", "success");

        $.ajax({
            url: "./server/work-testimonials.php",
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
                        $('#addTestimonials1923').trigger("reset");
                    }
                  );
                }
              },
        })
    })
})