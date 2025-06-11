export default function fetchAllBuildingLocation(type) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/fetchAllBuildingLocation.php",
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
