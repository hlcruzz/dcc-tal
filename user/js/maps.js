import { fetchBuildingRoutes } from "../../Controllers/BuildingsController.js";
import { addVisitor } from "../../Controllers/VisitorController.js";
function initMap() {
  const centerLocation = {
    lat: 10.742535995429716,
    lng: 122.96895754054395,
  };

  const map = new google.maps.Map(document.getElementById("home-map"), {
    zoom: 18,
    center: centerLocation,
    mapTypeId: "satellite",
    mapTypeControl: false,
    fullscreenControl: false,
    streetViewControl: false,
  });
  new google.maps.Marker({
    position: centerLocation,
    map: map,
    title: "Center Location",
  });
}

window.onload = initMap;
function initBuildingRouteMap(pathCoordinates) {
  const map = new google.maps.Map(document.getElementById("home-map"), {
    zoom: 18,
    center: pathCoordinates[0],
    mapTypeId: "satellite",
    fullscreenControl: false,
    mapTypeControl: false,
    streetViewControl: false,
    zoomControl: false,
  });

  const pathLine = new google.maps.Polyline({
    path: pathCoordinates,
    geodesic: true,
    strokeColor: "#FF0000",
    strokeOpacity: 1.0,
    strokeWeight: 5,
  });

  pathLine.setMap(map);

  new google.maps.Marker({
    position: pathCoordinates[0],
    map: map,
    label: "S",
  });

  new google.maps.Marker({
    position: pathCoordinates[pathCoordinates.length - 1],
    map: map,
    label: "E",
  });
}

$("#routeForm").submit(function (e) {
  e.preventDefault();

  const formData = new FormData(this);
  const buildingId = $("#buildingId").val();

  fetchBuildingRoutes(buildingId)
    .then((response) => {
      const data = JSON.parse(response);

      if (!data.status) {
        alert(data.message);
        return;
      }

      if (data.data.length === 0) {
        alert("No routes found for this building.");
        return;
      }

      addVisitor(formData)
        .then((res) => {
          const addData = JSON.parse(res);
          if (!addData.status) {
            alert(addData.message);
            return;
          }

          $("#search-results").empty();

          fetchBuildingRoutes(buildingId)
            .then((newResponse) => {
              const newData = JSON.parse(newResponse);
              if (!newData.status) {
                alert(newData.message);
                return;
              }
              const jsonData = newData.data;
              const locations = jsonData.map((item) => ({
                lat: parseFloat(item.latitude),
                lng: parseFloat(item.longitude),
                label: `ID: ${item.id}`,
              }));

              initBuildingRouteMap(locations);
            })
            .catch((error) => {
              alert("Error fetching updated routes:", error);
            });
        })
        .catch((err) => {
          alert("Error adding visitor: " + err);
        });
    })
    .catch((error) => {
      alert("Error checking existing route:", error);
    });
});
