export default function adminLogin(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/adminLogin.php",
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
