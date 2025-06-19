export function registerVisitor(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/registerVisitor.php",
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
export function addVisitor(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/addVisitor.php",
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

export function logoutVisitor() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/logout.php",
      method: "POST",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}
export function fetchAllVisitors() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/fetchAllVisitors.php",
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
