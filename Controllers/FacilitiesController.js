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

export function updateFacility(fromData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/updateFacility.php",
      method: "POST",
      data: fromData,
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
export function deleteFacilityImg(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/deleteFacilityImg.php",
      method: "POST",
      data: {
        id: id
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
export function deleteFacility(id,name) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/deleteFacility.php",
      method: "POST",
      data: {
        id: id,
        name: name
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
