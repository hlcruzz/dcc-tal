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

export function deleteBuildingImg(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/deleteBuildingImg.php",
      method: "POST",
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

export function updateBuilding(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/updateBuilding.php",
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

export function deleteBuilding(id, type) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/deleteBuilding.php",
      method: "POST",
      data: {
        id: id,
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

export function updateBuildingAccess(id, type) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/updateBuildingAccess.php",
      method: "POST",
      data: {
        id: id,
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