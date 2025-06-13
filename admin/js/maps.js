import fetchAllBuildingLocation from "../../Controllers/BuildingsController.js";
function initMap(locations) {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 18,
    center: {
      lat: 10.742813278082929,
      lng: 122.97005997620899,
    },
    mapTypeId: "satellite",
    styles: [
      {
        featureType: "all",
        elementType: "labels",
        stylers: [{ visibility: "off" }],
      },
      {
        featureType: "poi",
        elementType: "all",
        stylers: [{ visibility: "off" }],
      },
      {
        featureType: "transit",
        elementType: "all",
        stylers: [{ visibility: "off" }],
      },
      {
        featureType: "road",
        elementType: "labels",
        stylers: [{ visibility: "off" }],
      },
      {
        featureType: "administrative",
        elementType: "labels",
        stylers: [{ visibility: "off" }],
      },
      {
        featureType: "landscape.man_made",
        elementType: "all",
        stylers: [{ visibility: "off" }],
      },
    ],
  });

  locations.forEach((location) => {
    // Place the pin
    new google.maps.Marker({
      position: location,
      map: map,
    });

    // Add styled label using OverlayView
    const labelOverlay = new google.maps.OverlayView();
    labelOverlay.onAdd = function () {
      const div = document.createElement("div");
      div.className = "custom-label";
      div.textContent = location.label;

      this.div = div;

      const panes = this.getPanes();
      panes.overlayMouseTarget.appendChild(div);
    };

    labelOverlay.draw = function () {
      const projection = this.getProjection();
      const pos = projection.fromLatLngToDivPixel(
        new google.maps.LatLng(location.lat, location.lng)
      );

      const div = this.div;
      if (div && pos) {
        div.style.left = pos.x + "px";
        div.style.top = pos.y + "px";
      }
    };

    labelOverlay.onRemove = function () {
      if (this.div) {
        this.div.parentNode.removeChild(this.div);
        this.div = null;
      }
    };

    labelOverlay.setMap(map);
  });
}
fetchAllBuildingLocation()
  .then((response) => {
    const data = JSON.parse(response);
    if (!data.status) {
      alert(data.message);
      return;
    }
    const locations = data.data.map((building) => ({
      lat: parseFloat(building.latitude),
      lng: parseFloat(building.longitude),
      label: building.building_name,
    }));

    initMap(locations);
  })
  .catch((error) => {
    console.error("Error:", error);
  });

let customPath = []; // Define globally to store all clicked points

function drawRoute(map) {
  const routeLine = new google.maps.Polyline({
    path: customPath,
    geodesic: true,
    strokeColor: "#FF0000",
    strokeOpacity: 1.0,
    strokeWeight: 4,
  });

  routeLine.setMap(map);
}

$(document).on("click", ".pin-building-route", function () {
  const index = $(this).index(".pin-building-route");
  const latitude = parseFloat($(`.building_route_latitude`).eq(index).val());
  const longitude = parseFloat($(`.building_route_longitude`).eq(index).val());

  if (isNaN(latitude) || isNaN(longitude)) {
    alert("Please enter valid latitude and longitude.");
    return;
  }
  $(this).hide();
  $(".building-route-cont").eq(index).hide();
  $(`.building_route_latitude`).eq(index).prop("disabled", true);
  $(`.building_route_longitude`).eq(index).prop("disabled", true);
  const location = { lat: latitude, lng: longitude };
  customPath.push(location); // Add to the path

  const map = new google.maps.Map(document.getElementById("building-map"), {
    zoom: 18,
    center: location,
    mapTypeId: "satellite",
    mapTypeControl: false,
    fullscreenControl: false,
  });

  // Draw the polyline with the updated path
  drawRoute(map);

  // Add a marker for the newly added location
  new google.maps.Marker({
    position: location,
    map: map,
  });

  // Optional: Start and End labels
  if (customPath.length === 1) {
    const startInfo = new google.maps.InfoWindow({
      content: "<strong>Start</strong>",
    });
    const startMarker = new google.maps.Marker({
      position: {
        lat: $("#building_route_start_lat").val(),
        lng: $("#building_route_start_long").val(),
      },
      map: map,
      label: "S",
      title: "Start",
    });
    startMarker.addListener("click", () => startInfo.open(map, startMarker));
  } else if (customPath.length >= 2) {
    const endInfo = new google.maps.InfoWindow({
      content: "<strong>End</strong>",
    });
    const endMarker = new google.maps.Marker({
      position: customPath[customPath.length - 1],
      map: map,
      label: "E",
      title: "End",
    });
    endMarker.addListener("click", () => endInfo.open(map, endMarker));
  }
});

function buildingMap() {
  const latitude = parseFloat($("#building_route_start_lat").val());
  const longitude = parseFloat($("#building_route_start_long").val());

  if (!isNaN(latitude) && !isNaN(longitude)) {
    const location = { lat: latitude, lng: longitude };
    customPath = [location]; // Initialize with starting location

    const map = new google.maps.Map(document.getElementById("building-map"), {
      zoom: 18,
      center: location,
      mapTypeId: "satellite",
      mapTypeControl: false,
      fullscreenControl: false,
    });

    drawRoute(map);

    // Start marker
    const startInfo = new google.maps.InfoWindow({
      content: "<strong>Start</strong>",
    });
    const startMarker = new google.maps.Marker({
      position: location,
      map: map,
      label: "S",
      title: "Start",
    });
    startMarker.addListener("click", () => startInfo.open(map, startMarker));
  }
}
buildingMap();
