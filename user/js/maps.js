import fetchAllBuildingLocation from "../../Controllers/BuildingsController.js";
function initMap() {
  const location = { lat: 10.742533745423202, lng: 122.96895244321148 };

  const map = new google.maps.Map(document.getElementById("home-map"), {
    zoom: 18,
    center: location,
    mapTypeId: "satellite", // Set default to satellite
    mapTypeControl: false, // Disable the Map/Satellite button
    fullscreenControl: false,
  });

  // Add a marker (pin) at the location
  new google.maps.Marker({
    position: location,
    map: map,
  });
}
initMap();
