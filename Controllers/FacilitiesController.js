export function addFacility(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/addFacility.php",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchAllFacility(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/fetchAllFacility.php",
      method: "GET",
      data: {
        id: id,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}
