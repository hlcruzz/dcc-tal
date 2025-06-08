export default function getCoordinates() {
  return new Promise((resolve, reject) => {
    if (!("geolocation" in navigator)) {
      reject({
        status: false,
        message: "Geolocation is not supported by this browser",
      });
      return;
    }

    navigator.geolocation.getCurrentPosition(
      (position) => {
        resolve({
          status: true,
          lat: parseFloat(position.coords.latitude),
          long: parseFloat(position.coords.longitude),
        });
      },
      (error) => {
        let message;
        if (error.code === error.PERMISSION_DENIED) {
          message = "Please enable location access to proceed.";
        } else {
          message = `Geolocation error: ${error.message}`;
        }
        reject({
          status: false,
          message: message,
        });
      }
    );
  });
}
