   
import fetchAllBuildingLocation from "../../Controllers/MapController.js";
const url = new URL(window.location.href);
const buildingName = url.searchParams.get("page");
function initMap(locations) {
    const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 18,
    center: {
        lat: 10.742584602029964,
        lng: 122.96915502083053
    },
    mapTypeId: 'satellite',
    styles: [
        { featureType: "all", elementType: "labels", stylers: [{ visibility: "off" }] },
        { featureType: "poi", elementType: "all", stylers: [{ visibility: "off" }] },
        { featureType: "transit", elementType: "all", stylers: [{ visibility: "off" }] },
        { featureType: "road", elementType: "labels", stylers: [{ visibility: "off" }] },
        { featureType: "administrative", elementType: "labels", stylers: [{ visibility: "off" }] },
        { featureType: "landscape.man_made", elementType: "all", stylers: [{ visibility: "off" }] }
    ]
    });

    locations.forEach(location => {
    // Place the pin
    new google.maps.Marker({
        position: location,
        map: map
    });

    // Add styled label using OverlayView
    const labelOverlay = new google.maps.OverlayView();
    labelOverlay.onAdd = function () {
        const div = document.createElement('div');
        div.className = 'custom-label';
        div.textContent = location.label;

        this.div = div;

        const panes = this.getPanes();
        panes.overlayMouseTarget.appendChild(div);
    };

    labelOverlay.draw = function () {
        const projection = this.getProjection();
        const pos = projection.fromLatLngToDivPixel(new google.maps.LatLng(location.lat, location.lng));

        const div = this.div;
        if (div && pos) {
        div.style.left = pos.x + 'px';
        div.style.top = pos.y + 'px';
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
if(buildingName){
fetchAllBuildingLocation(buildingName)
    .then(response => {
        const data = JSON.parse(response);
        console.log(data);
        if (!data.status) {
           alert(data.message);
            return;
        }
         const locations = data.data.map(building => ({
                lat: parseFloat(building.latitude),
                lng: parseFloat(building.longitude),
                label: building.building_name
            }));
        
        initMap(locations);
    }
    )
    .catch(error => {
        console.error("Error:", error);
    }
);
}
