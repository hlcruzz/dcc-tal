import adminLogin from "/controllers/AdminAuthController.js";

$(document).ready(function () {
  $(document).on("click", "#seePass", function () {
    const inputPword = $("#password");

    if ($(this).hasClass("fa-eye")) {
      inputPword.prop("type", "text");
      $(this).removeClass("fa-eye").addClass("fa-eye-slash");
    } else {
      inputPword.prop("type", "password");
      $(this).removeClass("fa-eye-slash").addClass("fa-eye");
    }
  });

  $(document).ready(function () {
    $("#adminForm :input").prop("disabled", true);

    if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          $("#adminForm :input").prop("disabled", false);

          $("#adminForm").submit(function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            adminLogin(formData).then((res) => {
              const data = JSON.parse(res);

              if (!data.status) {
                $("#authAlert").html(data.message);
                setTimeout(() => {
                  $("#authAlert").html("");
                }, 3000);
                return;
              }
              window.location.href = "/dashboard";
            });
          });
        },
        (error) => {
          if (error.code === error.PERMISSION_DENIED) {
            alert("Please enable location access to proceed.");
          } else {
            alert(`Geolocation error:  ${error.message}`);
          }
        }
      );
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  });
});
