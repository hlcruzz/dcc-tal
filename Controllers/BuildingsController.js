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

export function fetchAllBuilding() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/fetchAllBuilding.php",
      method: "GET",
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

export function updateBuildingAccess(id, inputVal) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/updateBuildingAccess.php",
      method: "POST",
      data: {
        id: id,
        inputVal: inputVal,
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
export default function fetchAllBuildingLocation() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/fetchAllBuildingLocation.php",
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}
export function addBuildingRoute(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/addBuildingRoute.php",
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
