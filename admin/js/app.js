import SimpleDataTable from "../../Controllers/DataTableController.js";
import getCoordinates from "../../Controllers/CoordinatesController.js";
import sliceText from "../../Controllers/InputController.js";
import {
  addBuilding,
  fetchAllBuilding,
} from "../../Controllers/BuildingsController.js";
import {
  addFacility,
  fetchAllFacility,
} from "../../Controllers/FacilitiesController.js";
// import { Modal } from "flowbite";

$(document).ready(function () {
  Theme();
  ClickEvents();
  FetchEvents();
  AddModalEvents();
  UpdateModalEvents();
  DataTables();
  ChartsJs();
  ModalInit();
});
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
  new Modal(document.getElementById("add-academics-modal"));
  new Modal(document.getElementById("edit-academics-modal"));
  new Modal(document.getElementById("add-facility-modal"));
}
function FetchEvents() {}
function DataTables() {
  fetchAllBuilding("Academics").then((res) => {
    const obj = JSON.parse(res);
    if (!obj.status) {
      alert(obj.message);
      return;
    }
    const tableSelector = "#academics-table";
    const tbody = $(`${tableSelector} tbody`);
    tbody.empty();

    obj.data.forEach((element) => {
      const content = `
      <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
        <td data-label="#" class="font-medium text-gray-900 dark:text-gray-100 whitespace-nowrap">
        ${element.building_id}
        </td>
        <td data-label="Building">${element.building_name}</td>
        <td data-label="Type">${element.building_type}</td>

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
            <label class="inline-flex items-center cursor-pointer">
              <input type="checkbox" value="${
                element.isAccessable
              }" class="sr-only peer" ${
        element.isAccessable === 1 ? "checked" : ""
      }>
              <div
                class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full
                      peer peer-checked:after:translate-x-4 rtl:peer-checked:after:-translate-x-4 peer-checked:after:border-white
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
              data-modal-target="edit-academics-modal" data-modal-toggle="edit-academics-modal"
              data-building-id = ${element.building_id}
               data-building-name = ${element.building_name}
               data-building-type = ${element.building_type}
               data-building-accessable = ${element.isAccessable}
               data-building-structured = ${element.is_structured}
               data-building-lat = ${element.latitude}
               data-building-long = ${element.longitude}
               data-building-img-id = ${element.img_id}
               data-building-img = ${element.img}
              class="edit-academics-btn
              text-md text-white p-2 rounded-lg bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 active:bg-indigo-700 transition-colors duration-200 cursor-pointer">
                <i class="fa-solid fa-pen"></i>
              </button>
              
              ${
                element.is_structured === 1
                  ? ` 
                <a href="/academic-facilities?id=${element.building_id}&building=${element.building_name}" class="text-md text-white p-2 rounded-lg bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 active:bg-blue-700 transition-colors duration-200 cursor-pointer">
                  <i class="fa-solid fa-eye"></i>
                </a>`
                  : ""
              }
             
              
              <button class="text-md text-white p-2 rounded-lg bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 active:bg-red-700 transition-colors duration-200 cursor-pointer">
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

  const url = new URL(window.location.href);
  const id = url.searchParams.get("id");
  const buildingName = url.searchParams.get("building");
  if (id) {
    fetchAllFacility(id).then((res) => {
      const obj = JSON.parse(res);
      if (!obj.status) {
        alert(obj.message);
        return;
      }

      const tableSelector = `#table-facility-${id}`;
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
                <button class="edit text-md text-white p-2 rounded-lg bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 active:bg-indigo-700 transition-colors duration-200 cursor-pointer">
                  <i class="fa-solid fa-pen"></i>
                </button>
  
                <button class="text-md text-white p-2 rounded-lg bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 active:bg-red-700 transition-colors duration-200 cursor-pointer">
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
}
function ChartsJs() {}

function ClickEvents() {
  $("#get-location").on("click", async function () {
    const data = await getCoordinates();

    if (!data.status) {
      alert(data.message);
      return;
    }
    $("#latitude").val(data.lat);
    $("#longitude").val(data.long);
  });

  $("#get-facility").on("click", async function () {
    const data = await getCoordinates();

    if (!data.status) {
      alert(data.message);
      return;
    }
    $("#latitude_facility").val(data.lat);
    $("#longitude_facility").val(data.long);
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
}

function AddModalEvents() {
  $("#add-academics-form").submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append("building_type", "Academics");

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
}
function UpdateModalEvents() {
  $(document).on("click", ".edit-academics-btn", function () {
    const modal = new Modal(document.getElementById("edit-academics-modal"));
    modal.show();
    // data-building-id = ${element.building_id}
    // data-building-name = ${element.buildingName}
    // data-building-type = ${element.building_type}
    // data-building-accessable = ${element.isAccessable}
    // data-building-structured = ${element.is_structured}
    // data-building-lat = ${element.latitude}
    // data-building-long = ${element.longitude}
    // data-building-img-id = ${element.img_id}
    // data-building-img = ${element.img}

    const building_id = $(this).attr("data-building-id");
    const building_name = $(this).attr("data-building-name");
    const building_type = $(this).attr("data-building-type");
    const building_accessable = $(this).attr("data-building-accessable");
    const building_structured = $(this).attr("data-building-structured");
    const building_lat = $(this).attr("data-building-lat");
    const building_long = $(this).attr("data-building-long");
    const building_img_id = $(this).attr("data-building-img-id");
    const building_img = $(this).attr("data-building-img");
    // alert(building_id);
  });
}
