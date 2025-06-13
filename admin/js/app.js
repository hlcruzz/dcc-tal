import SimpleDataTable from "../../Controllers/DataTableController.js";
import getCoordinates from "../../Controllers/CoordinatesController.js";
import sliceText from "../../Controllers/InputController.js";
import {
  addBuilding,
  fetchAllBuilding,
  deleteBuildingImg,
  updateBuilding,
  deleteBuilding,
  updateBuildingAccess,
  addBuildingRoute,
  fetchBuildingRoutes
} from "../../Controllers/BuildingsController.js";
import initModal from "../../Controllers/ModalController.js";
import {
  addFacility,
  fetchAllFacility,
  updateFacility,
  deleteFacilityImg,
  deleteFacility,
} from "../../Controllers/FacilitiesController.js";
// import { Modal } from "flowbite";

$(document).ready(function () {
  Theme();
  ClickEvents();
  FetchEvents();
  ModalEvents();
  DataTables();
  ChartsJs();
  ModalInit();
});
const url = new URL(window.location.href);
const building_id = url.searchParams.get("building_id");
const buildingName = url.searchParams.get("building_name");
function Theme() {
  $("#switch").on("click", function () {
    const icon = $("#iconTheme");
    if ($(this).is(":checked")) {
      icon.removeClass("fa-moon").addClass("fa-sun");
      $("html").removeClass("light").addClass("dark");
      localStorage.setItem("theme", "dark");
    } else {
      icon.removeClass("fa-sun").addClass("fa-moon");
      $("html").removeClass("dark").addClass("light");
      localStorage.setItem("theme", "light");
    }
  });

  $(document).ready(function () {
    const theme = localStorage.getItem("theme");
    if (theme === "dark") {
      $("#switch").prop("checked", true);
      $("#iconTheme").removeClass("fa-moon").addClass("fa-sun");
      $("html").removeClass("light").addClass("dark");
    } else {
      $("#switch").prop("checked", false);
      $("#iconTheme").removeClass("fa-sun").addClass("fa-moon");
      $("html").removeClass("dark").addClass("light");
    }
  });
}
function ModalInit() {
  new Modal(document.getElementById("add-building-modal"));
  new Modal(document.getElementById("edit-building-modal"));
  new Modal(document.getElementById("add-facility-modal"));
  new Modal(document.getElementById("edit-facility-modal"));

}
function FetchEvents() {}
function DataTables() {
  fetchAllBuilding().then((res) => {
    const obj = JSON.parse(res);
    if (!obj.status) {
      alert(obj.message);
      return;
    }

    const tableSelector = "#buildings-table";
    const tbody = $(`${tableSelector} tbody`);
    tbody.empty();
    obj.data.forEach((element) => {
      const content = `
      <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
        <td data-label="#">${element.building_id}</td>
        <td data-label="Building">${element.building_name}</td>
        <td data-label="Date">${element.created_at}</td>
        <td data-label="Structure">
          <span class="${
            element.is_structured === 1
              ? "bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300"
              : "bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300"
          } text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">
            ${element.is_structured === 1 ? "Yes" : "No"}
          </span>
        </td>
        <td data-label="Accessibility">
          <span>
            <label class="inline-flex items-center cursor-pointer relative">
              <input type="checkbox" data-id="${element.building_id}" value="${
        element.isAccessable
      }" class="isAccessable-btn sr-only peer" ${
        element.isAccessable === 1 ? "checked" : ""
      }>
              <div
                class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full
                      peer peer-checked:after:translate-x-4  peer-checked:after:border-white
                      after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300
                      after:border after:rounded-full after:w-4 after:h-4 after:transition-all peer-checked:bg-blue-600
                      
                      dark:bg-gray-700 dark:peer-focus:ring-blue-500 dark:after:bg-gray-800 dark:after:border-gray-600
                      dark:peer-checked:bg-blue-500">
              </div>
            </label>
          </span>
        </td>
        <td data-label="Action">
          <div class="flex flex-wrap gap-2">
              <button 
              data-modal-target="edit-building-modal" data-modal-toggle="edit-building-modal"
              data-building-id = "${element.building_id}"
               data-building-name = "${element.building_name}"
               data-building-accessable = "${element.isAccessable}"
               data-building-structured = "${element.is_structured}"
               data-building-lat = "${element.latitude}"
               data-building-long = "${element.longitude}"
               data-building-img-id = "${element.img_id}"
               data-building-img = "${element.img}"
              class="edit-building-btn
              text-md text-white p-2 rounded-lg bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 active:bg-indigo-700 transition-colors duration-200 cursor-pointer">
                <i class="fa-solid fa-pen"></i>
              </button>

              <a href="/building-route?building_id=${element.building_id}&building_name=${element.building_name}" class="text-md text-white p-2 rounded-lg bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2 active:bg-green-700 transition-colors duration-200 cursor-pointer">
                  <i class="fa-solid fa-map-location-dot"></i>
              </a>
              
              ${
                element.is_structured === 1
                  ? ` 
                <a href="/facilities?building_id=${element.building_id}&building_name=${element.building_name}" class="text-md text-white p-2 rounded-lg bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 active:bg-blue-700 transition-colors duration-200 cursor-pointer">
                  <i class="fa-solid fa-eye"></i>
                </a>`
                  : ""
              }
             
              <button 
              data-building-id="${element.building_id}"
              class="delete-building-btn text-md text-white p-2 rounded-lg bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 active:bg-red-700 transition-colors duration-200 cursor-pointer">
                <i class="fa-solid fa-trash"></i>
              </button>
            </div>
        </td>
      </tr>
    `;
      tbody.append(content);
    });

    SimpleDataTable(tableSelector, {
      hiddenColumns: [5, 6],
      filename: "Academics Building - list",
    });
  });

  if (building_id) {
    fetchAllFacility(building_id).then((res) => {
      const obj = JSON.parse(res);
      if (!obj.status) {
        alert(obj.message);
        return;
      }

      const tableSelector = `#table-facility-${building_id}`;
      const tbody = $(`${tableSelector} tbody`);
      tbody.empty();
      obj.data.forEach((element) => {
        const content = `
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
          <td data-label="#" class="font-medium text-gray-900 dark:text-gray-100 whitespace-nowrap">
          ${element.facility_id}
          </td>
          <td data-label="Facility Name">${element.facilityName}</td>
          <td data-label="Floor #">${element.floorNumber}</td>
  
          <td data-label="Room #">${element.roomNumber}</td>
          <td data-label="Description">${sliceText(
            element.description,
            50
          )}</td>
          <td data-label="Date">${element.facility_date}</td>
          <td data-label="Action">
            <div class="flex flex-wrap gap-2">
                <button data-modal-target="edit-facility-modal" data-modal-toggle="edit-facility-modal" class="
                edit-facility-btn text-md text-white p-2 rounded-lg bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 active:bg-indigo-700 transition-colors duration-200 cursor-pointer"
                  
                  data-facility-id="${element.facility_id}"
                  data-facility-name="${element.facilityName}"
                  data-floor-number="${element.floorNumber}"
                  data-room-number="${element.roomNumber}"
                  data-description="${element.description}"
                  data-latitude="${element.latitude}"
                  data-longitude="${element.longitude}"
                  data-img-id="${element.img_id}"
                  data-img="${element.img}"
                >
                  <i class="fa-solid fa-pen"></i>
                </button>
  
                <button class="delete-facility-btn text-md text-white p-2 rounded-lg bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 active:bg-red-700 transition-colors duration-200 cursor-pointer"
                data-facility-id="${element.facility_id}"
                data-facility-name="${element.facilityName}"
                >
                  <i class="fa-solid fa-trash"></i>
                </button>
              </div>
          </td>
        </tr>
      `;
        tbody.append(content);
      });

      SimpleDataTable(tableSelector, {
        hiddenColumns: [6],
        filename: `${buildingName} - Facilities List`,
      });
    });
  }
  if(building_id){
    fetchBuildingRoutes(building_id).then((res) => {
      const obj = JSON.parse(res);
      if (!obj.status) {
        alert(obj.message);
        return;
      }
      console.log(obj);
      const tableSelector = "#building-route-table";
      const tbody = $(`${tableSelector} tbody`);
      tbody.empty();
      obj.data.forEach((element) => {
        const content = `
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
          <td data-label="#">${element.id}</td>
          <td data-label="Building ID">${element.building_id}</td>
          <td data-label="Latitude">${element.latitude}</td>
          <td data-label="Longitude">${element.longitude}</td>
          <td data-label="Date">${element.created_at}</td>
          <td data-label="Action">
            <div class="flex flex-wrap gap-2">
                <button 
                data-modal-target="edit-building-route-modal" data-modal-toggle="edit-building-route-modal"
                data-route-id = "${element.id}"
                 data-route-lat = "${element.latitude}"
                 data-route-lng = "${element.longitude}"
                class="edit-building-route-btn
                text-md text-white p-2 rounded-lg bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 active:bg-indigo-700 transition-colors duration-200 cursor-pointer">
                  <i class="fa-solid fa-pen"></i>
                </button>
                <button 
                data-building-id="${element.building_id}"
                class="delete-building-route-btn text-md text-white p-2 rounded-lg bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 active:bg-red-700 transition-colors duration-200 cursor-pointer">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </div>
          </td>
        </tr>
      `;
        tbody.append(content);
      });

      SimpleDataTable(tableSelector, {
        hiddenColumns: [5],
        filename: `${buildingName} - Routes`,
      });
    });
  }
}
function ChartsJs() {}

function ClickEvents() {
  $(document).on("click", ".get-location", async function () {
    const data = await getCoordinates();

    if (!data.status) {
      alert(data.message);
      return;
    }

    $("#latitude").val(data.lat);
    $("#longitude").val(data.long);

    $("#latitude_facility").val(data.lat);
    $("#longitude_facility").val(data.long);

    $("#edit_academics_latitude").val(data.lat);
    $("#edit_academics_longitude").val(data.long);

    $("#building_route_lat").val(data.lat);
    $("#building_route_lng").val(data.long);
  });

  $("#get-facility").on("click", async function () {
    const data = await getCoordinates();

    if (!data.status) {
      alert(data.message);
      return;
    }
  });

  $("#hasRoomNum").on("click", function () {
    const isClicked = $(this).is(":checked");
    const inputField = $("#roomNumber");
    const inputCont = $("#hasRoomNumCont");
    if (isClicked) {
      inputCont.removeClass("hidden");
      inputField.prop("required", true);
    } else {
      inputCont.addClass("hidden");
      inputField.prop("required", false);
    }
  });

  $("#hasFloorNum").on("click", function () {
    const isClicked = $(this).is(":checked");
    const inputField = $("#floorNumber");
    const inputCont = $("#hasFloorNumCont");
    if (isClicked) {
      inputCont.removeClass("hidden");
      inputField.prop("required", true);
    } else {
      inputCont.addClass("hidden");
      inputField.prop("required", false);
    }
  });

  $("#edit_hasRoomNum").on("click", function () {
    const isClicked = $(this).is(":checked");
    const inputField = $("#edit_roomNumber");
    const inputCont = $("#edit_hasRoomNumCont");
    if (isClicked) {
      inputCont.removeClass("hidden");
      inputField.prop("required", true);
    } else {
      inputCont.addClass("hidden");
      inputField.prop("required", false).val("");
    }
  });

  $("#edit_hasFloorNum").on("click", function () {
    const isClicked = $(this).is(":checked");
    const inputField = $("#edit_floorNumber");
    const inputCont = $("#edit_hasFloorNumCont");
    if (isClicked) {
      inputCont.removeClass("hidden");
      inputField.prop("required", true);
    } else {
      inputCont.addClass("hidden");
      inputField.prop("required", false).val("");
    }
  });

  $("#edit_is_structured").on("click", function () {
    const isClicked = $(this).is(":checked");

    $(this).val(isClicked ? "1" : "0");
  });

  $(document).on("click", ".edit-building-btn", function () {
    const building_id = $(this).attr("data-building-id");
    const building_name = $(this).attr("data-building-name");
    const building_accessable = $(this).attr("data-building-accessable");
    const building_structured = $(this).attr("data-building-structured");
    const building_lat = $(this).attr("data-building-lat");
    const building_long = $(this).attr("data-building-long");
    const building_img_id = $(this).attr("data-building-img-id");
    const building_img = $(this).attr("data-building-img");

    $("#edit_building_id").val(building_id);
    $("#edit_building_name").val(building_name);
    $("#edit_building_accessable").val(building_accessable);
    $("#edit_is_structured")
      .prop("checked", building_structured === "1")
      .val(building_structured);
    $("#edit_academics_latitude").val(building_lat);
    $("#edit_academics_longitude").val(building_long);
    $("#edit_building_img_id").val(building_img_id);

    const images = building_img.split(",");
    const imgIDs = building_img_id.split(",");
    const $swiperWrapper = $("#edit-academics-swiper");
    $swiperWrapper.empty();
    images.forEach((src, index) => {
      const imgID = imgIDs[index];
      const slide = `
        <div class="swiper-slide relative">
          <img src="${src}" class="w-full h-full object-cover" alt="Slide Image">
          ${
            imgIDs.length !== 1
              ? `<i class="delete-building-img cursor-pointer fa-solid fa-trash absolute bottom-3 right-3 text-md p-2 px-2.5 rounded-full text-red-500 dark:text-red-700 bg-white dark:bg-gray-800" data-img-id="${imgID}" title="${index}"></i>`
              : ""
          }
        </div>
      `;
      $swiperWrapper.append(slide);
    });
    const modal = initModal("edit-building-modal");
    if (modal) modal.show();
  });
  $(document).on(
    "click",
    `[data-modal-hide='edit-building-modal']`,
    function () {
      const modal = initModal("edit-building-modal");
      if (modal) modal.hide();
      $(".swiper-wrapper").empty();
    }
  );

  $(document).on("click", ".delete-building-img", function () {
    const id = $(this).attr("data-img-id");
    if (!confirm("Are you sure you want to delete this image?")) {
      return;
    }
    deleteBuildingImg(id)
      .then((res) => {
        const obj = JSON.parse(res);
        if (!obj.status) {
          alert(obj.message);
          return;
        }
        alert("Image Deleted");
        location.reload();
      })
      .catch((error) => {
        alert("Error: " + error.message, false);
      });
  });

  $(document).on("click", ".delete-building-btn", function () {
    const id = $(this).attr("data-building-id");
    if (!confirm("Are you sure you want to delete this building?")) {
      return;
    }
    deleteBuilding(id)
      .then((res) => {
        const obj = JSON.parse(res);
        if (!obj.status) {
          alert(obj.message);
          return;
        }
        alert("Building Deleted");
        location.reload();
      })
      .catch((error) => {
        alert("Error: " + error.message, false);
      });
  });

  $(document).on("click", ".isAccessable-btn", function () {
    const id = $(this).attr("data-id");
    const isChecked = $(this).is(":checked");
    const inputVal = $(this).val(isChecked ? "1" : "0");

    updateBuildingAccess(id, inputVal.val())
      .then((res) => {
        const obj = JSON.parse(res);
        if (!obj.status) {
          alert(obj.message);
          return;
        }
      })
      .catch((error) => {
        alert("Error: " + error.message, false);
      });
  });

  $(document).on("click", ".edit-facility-btn", function () {
    const facility_id = $(this).attr("data-facility-id");
    const facilityName = $(this).attr("data-facility-name");
    const floorNumber = $(this).attr("data-floor-number");
    const roomNumber = $(this).attr("data-room-number");
    const description = $(this).attr("data-description");
    const latitude = $(this).attr("data-latitude");
    const longitude = $(this).attr("data-longitude");
    const img_id = $(this).attr("data-img-id");
    const img = $(this).attr("data-img");

    $("#edit_facility_id").val(facility_id);
    $("#edit_facilityName").val(facilityName);
    $("#edit_floorNumber").val(floorNumber);
    $("#edit_roomNumber").val(roomNumber);
    $("#edit_facility_desc").val(description);
    $("#edit_latitude_facility").val(latitude);
    $("#edit_longitude_facility").val(longitude);

    if (roomNumber == "") {
      $("#edit_hasRoomNumCont").addClass("hidden");
      $("#edit_hasRoomNum").prop("checked", false);
      $("#edit_roomNumber").prop("required", false);
    } else {
      $("#edit_hasRoomNum").prop("checked", true);
      $("#edit_hasRoomNumCont").removeClass("hidden");
      $("#edit_roomNumber").prop("required", true);
    }

    if (floorNumber == "") {
      $("#edit_hasFloorNumCont").addClass("hidden");
      $("#edit_hasFloorNum").prop("checked", false);
      $("#edit_floorNumber").prop("required", false);
    } else {
      $("#edit_hasFloorNum").prop("checked", true);
      $("#edit_hasFloorNumCont").removeClass("hidden");
      $("#edit_floorNumber").prop("required", true);
    }
    const images = img.split(",");
    const imgIDs = img_id.split(",");
    const $swiperWrapper = $(".swiper-wrapper");
    $swiperWrapper.empty();
    images.forEach((src, index) => {
      const imgID = imgIDs[index];
      const slide = `
        <div class="swiper-slide relative">
          <img src="${src}" class="w-full h-full object-cover" alt="Slide Image">
          ${
            imgIDs.length !== 1
              ? `<i class="delete-facility-img cursor-pointer fa-solid fa-trash absolute bottom-3 right-3 text-md p-2 px-2.5 rounded-full text-red-500 dark:text-red-700 bg-white dark:bg-gray-800" data-img-id="${imgID}" title="${index}"></i>`
              : ""
          }
        </div>
      `;
      $swiperWrapper.append(slide);
    });
    const modal = initModal("edit-facility-modal");
    if (modal) modal.show();
  });

  $(document).on(
    "click",
    `[data-modal-hide="edit-facility-modal"]`,
    function () {
      const modal = initModal("edit-facility-modal");
      if (modal) modal.hide();
      $(".swiper-wrapper").empty();
    }
  );

  $(document).on("click", ".delete-facility-img", function () {
    const id = $(this).attr("data-img-id");
    if (!confirm("Are you sure you want to delete this image?")) {
      return;
    }
    deleteFacilityImg(id)
      .then((res) => {
        const obj = JSON.parse(res);
        if (!obj.status) {
          alert(obj.message);
          return;
        }
        alert("Image Deleted");
        location.reload();
      })
      .catch((error) => {
        alert("Error: " + error.message, false);
      });
  });

  $(document).on("click", ".delete-facility-btn", function () {
    const id = $(this).attr("data-facility-id");
    const name = $(this).attr("data-facility-name");
    if (!confirm("Are you sure you want to delete this building?")) {
      return;
    }
    deleteFacility(id, name)
      .then((res) => {
        const obj = JSON.parse(res);
        if (!obj.status) {
          alert(obj.message);
          return;
        }
        alert("Facility Deleted");
        location.reload();
      })
      .catch((error) => {
        alert("Error: " + error.message, false);
      });
  });

  $(document).on("click", ".add-building-route", function () {
    const index = $(this).index(".add-building-route");
    const latitude = $(".building_route_latitude");
    const longitude = $(".building_route_longitude");

    // Check if ANY latitude or longitude input is not disabled
    const anyLatitudeEnabled = latitude.filter(":not(:disabled)").length > 0;
    const anyLongitudeEnabled = longitude.filter(":not(:disabled)").length > 0;

    if (anyLatitudeEnabled || anyLongitudeEnabled) {
      alert("Please pin the route before adding a new one.");
      return;
    }
    const inputCont = $("#building-route-input-cont");
    const content = `
    <div class="flex gap-3 building-route-cont">
        <input type="number" name="building_route_latitude[]"
            class="building_route_latitude bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
            placeholder="Enter Latitude" step="any" required>
        <input type="number" name="building_route_longitude[]"
            class="building_route_longitude bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
            placeholder="Enter Longitude" step="any" required>
        <button type="button"
            class="get-building-route text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium col-span-2 rounded-lg text-lg w-max h-full p-3 px-4">
            <i class="fa-solid fa-location-crosshairs"></i>
        </button>
        <button type="button"
            class="pin-building-route text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium col-span-2 rounded-lg text-lg w-max h-full p-3 px-4">
            <i class="fa-solid fa-location-dot"></i>
        </button>
    </div>
    `;
    inputCont.append(content);
  });

  $(document).on("click", ".get-building-route", async function () {
    const index = $(this).index(".get-building-route");
    const data = await getCoordinates();
    if (!data.status) {
      alert(data.message);
      return;
    }

    const latitude = data.lat;
    const longitude = data.long;

    $(`.building_route_latitude`).eq(index).val(latitude);
    $(`.building_route_longitude`).eq(index).val(longitude);
  });

  $(document).on("click", ".open-building-route", function () {
    const id = $(this).attr("data-building-id");
    $("#building_route_id").val(id);
  });
}

function ModalEvents() {
  $("#add-building-form").submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    addBuilding(formData)
      .then((res) => {
        const obj = JSON.parse(res);

        if (!obj.status) {
          alert(obj.message);
          return;
        }

        alert("New Building Added");
        location.reload();
      })
      .catch((error) => {
        alert("Error: " + error.message, false);
      });
  });

  $("#edit-academics-form").submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    updateBuilding(formData)
      .then((res) => {
        const obj = JSON.parse(res);

        if (!obj.status) {
          alert(obj.message);
          return;
        }

        alert("Building Updated");
        location.reload();
      })
      .catch((error) => {
        alert("Error: " + error.message, false);
      });
  });

  $("#add-facility-form").submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    addFacility(formData)
      .then((res) => {
        const obj = JSON.parse(res);

        if (!obj.status) {
          alert(obj.message);
          return;
        }

        alert("New Facility Added");
        location.reload();
      })
      .catch((error) => {
        alert("Error: " + error.message, false);
      });
  });

  $("#edit-facility-form").submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    updateFacility(formData)
      .then((res) => {
        const obj = JSON.parse(res);

        if (!obj.status) {
          alert(obj.message);
          return;
        }

        alert("Facility Updated");
        location.reload();
      })
      .catch((error) => {
        alert("Error: " + error.message, false);
      });
  });

  $("#add-building-route-form").submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    addBuildingRoute(formData)
      .then((res) => {
        const obj = JSON.parse(res);

        if (!obj.status) {
          alert(obj.message);
          return;
        }

        alert("Building Route Added");
        location.reload();
      })
      .catch((error) => {
        alert("Error: " + error.message, false);
      });
  });
}
