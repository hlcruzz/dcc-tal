export function addBuilding(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/addBuilding.php",
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

export function fetchAllBuilding(type) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/fetchAllBuilding.php",
      method: "GET",
      data: {
        type: type,
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
