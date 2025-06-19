import { registerVisitor } from "/controllers/VisitorController.js";
$(document).on("click", "#seePass", function () {
  const pwordInput = $("#password");
  if ($(this).hasClass("fa-eye")) {
    $(this).removeClass("fa-eye").addClass("fa-eye-slash");
    pwordInput.attr("type", "text");
  } else {
    $(this).removeClass("fa-eye-slash").addClass("fa-eye");
    pwordInput.attr("type", "password");
  }
});
$(document).ready(function () {
  const $provinceSelect = $("#province");
  const $citySelect = $("#city");
  const $brgySelect = $("#brgy");

  let data = {};

  $.getJSON("./assets/datasets/ph-location.json", function (jsonData) {
    data = jsonData;

    // Populate provinces from all regions
    $.each(data, function (regionCode, regionData) {
      const provinces = regionData.province_list;

      $.each(provinces, function (provinceName) {
        $provinceSelect.append(
          $("<option>").val(provinceName).text(provinceName)
        );
      });
    });
  });

  $provinceSelect.on("change", function () {
    $citySelect.html("<option selected>Select City/Municipality</option>");
    $brgySelect.html("<option selected>Select Barangay</option>");

    const selectedProvince = $provinceSelect.val();
    let cities = {};

    // Find the selected province inside any region
    $.each(data, function (regionCode, regionData) {
      if (regionData.province_list[selectedProvince]) {
        cities = regionData.province_list[selectedProvince].municipality_list;
        return false; // stop the loop once found
      }
    });

    $.each(cities, function (cityName) {
      $citySelect.append($("<option>").val(cityName).text(cityName));
    });
  });

  $citySelect.on("change", function () {
    $brgySelect.html("<option selected>Select Barangay</option>");

    const selectedProvince = $provinceSelect.val();
    const selectedCity = $citySelect.val();
    let barangays = [];

    // Find the selected city in the selected province
    $.each(data, function (regionCode, regionData) {
      const province = regionData.province_list[selectedProvince];
      if (province && province.municipality_list[selectedCity]) {
        barangays = province.municipality_list[selectedCity].barangay_list;
        return false; // stop the loop once found
      }
    });

    $.each(barangays, function (i, brgy) {
      $brgySelect.append($("<option>").val(brgy).text(brgy));
    });
  });
});
$(document).ready(function () {
  $("#registerForm :input").prop("disabled", true);

  if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        $("#registerForm :input").prop("disabled", false);

        $("#registerForm").submit(function (event) {
          event.preventDefault();
          const formData = new FormData(this);

          registerVisitor(formData).then((res) => {
            try {
              const data = JSON.parse(res);
              if (!data.status) {
                alert(data.message);
                return;
              }
              window.location.href = "/home";
            } catch (err) {
              alert(err.message);
            }
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
