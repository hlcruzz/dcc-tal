import {fetchAllBuildingLocation, fetchBuildingRoutes} from "../../Controllers/BuildingsController.js";
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

const url = new URL(window.location.href);
const building_id = url.searchParams.get("building_id");
function initBuildingRouteMap(pathCoordinates) {
        // Center the map on the first point
        const map = new google.maps.Map(document.getElementById("building-route-map"), {
            zoom: 18,
            center: pathCoordinates[0],
            mapTypeId: "satellite",
        });

        // Add the polyline to the map
        const pathLine = new google.maps.Polyline({
            path: pathCoordinates,
            geodesic: true,
            strokeColor: "#FF0000",
            strokeOpacity: 1.0,
            strokeWeight: 5,
        });

        pathLine.setMap(map);

        // Add start marker
        new google.maps.Marker({
            position: pathCoordinates[0],
            map: map,
            label: "S",
        });

        // Add end marker
        new google.maps.Marker({
            position: pathCoordinates[pathCoordinates.length - 1],
            map: map,
            label: "E",
        });
    }
if (building_id) {
  fetchBuildingRoutes(building_id)
    .then((response) => {
      const data = JSON.parse(response);
      if (!data.status) {
        alert(data.message);
        return;
      }
      console.log(data);
      const locations = data.data.map((route) => ({
        lat: parseFloat(route.latitude),
        lng: parseFloat(route.longitude),
        label: route.route_name,
      }));

      initBuildingRouteMap(locations);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}