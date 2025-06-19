import { fetchBuildingSearch } from "../../Controllers/BuildingsController.js";
import { initSwiper } from "../../Controllers/SwiperController.js";
import { logoutVisitor } from "../../Controllers/VisitorController.js";
$(document).ready(function () {
  Cookies();
  ClickEvents();
  FetchEvents();
  ModalEvents();
  DataTables();
  ChartsJs();
});
function Cookies() {
  new Drawer(document.getElementById("building-drawer"));
  // Prevent backdrop click from closing drawer
  const backdrop = document.querySelector("[drawer-backdrop]");
  if (backdrop) {
    backdrop.addEventListener("click", (e) => {
      e.stopPropagation(); // Block Flowbite's default close behavior
    });
  }
}
function ClickEvents() {
  $(document).on("click", "#logout-btn", function () {
    if (!confirm("Are you sure you want to logout?")) {
      return;
    }
    logoutVisitor();
    window.location.href = "/";
  });
}
function FetchEvents() {
  let debounceTimer;

  $("#default-search").on("keyup", function () {
    const $input = $(this);
    const container = $("#search-results");
    clearTimeout(debounceTimer);

    debounceTimer = setTimeout(() => {
      const value = $input.val();

      if (value === "" || value === null) {
        container.empty();
        return;
      }
      fetchBuildingSearch(value)
        .then((res) => {
          const data = JSON.parse(res);
          if (!data.status) {
            alert(data.message);
            return;
          }
          console.log(data.data);
          container.empty();
          if (data.data.length === 0) {
            container.append(`
            <div class="flex items-center text-center gap-5 p-2 px-4">
                <h1 class="text-gray-700  w-full">No results found...</h1>
            </div>
          `);
          } else {
            data.data.forEach((element) => {
              const content = `
            <div class="building-search-btn flex items-center gap-5 p-2 px-4 hover:bg-gray-100 cursor-pointer" data-drawer-placement="left" aria-controls="building-drawer"
            data-building-id="${element.building_id}" 
            data-building-name="${element.building_name}" 
            data-building-desc="${element.building_desc}" 
            data-building-access="${element.isAccessible}" 
            data-building-structure="${element.is_structured}" 
            data-building-img="${element.img}"
            >
                <i class="fa-solid fa-location-dot text-gray-500"></i>
                <h1 class="font-medium text-gray-700">${element.building_name}</h1>
            </div>
            `;
              container.append(content);
            });
          }
        })
        .catch((err) => {
          alert(err);
        });
    }, 1000);
  });
}

function ModalEvents() {
  let swiperInstance;

  const elementName = "building-drawer";
  const drawerElement = document.getElementById(`${elementName}`);
  const drawer = new Drawer(drawerElement, {
    placement: "left",
    backdrop: true,
    bodyScrolling: false,
    escKey: false,
    trapFocus: true,
    onHide: () => {
      $(".swiper-wrapper").empty();
      if (swiperInstance) {
        swiperInstance.destroy(true, true);
      }
      $("#routeForm")[0].reset();
    },
    onShow: () => console.log("Drawer shown"),
    onToggle: () => console.log("Drawer toggled"),
  });

  $(document).on("click", ".building-search-btn", function () {
    drawer.show();
    $("#default-search").val("");
    $("#search-results").empty();
    const buildingId = $(this).data("building-id");
    const buildingName = $(this).data("building-name");
    const buildingDesc = $(this).data("building-desc");
    const buildingAccess = $(this).data("building-access");
    const buildingStructure = $(this).data("building-structure");
    const buildingImg = $(this).data("building-img");

    $("#buildingId").val(buildingId);
    $(".building-name").text(buildingName);
    $("#building-desc").text(buildingDesc);
    $("#buildingName").val(buildingName);

    const images = buildingImg.split(",");
    const imageContainer = $(".swiper-wrapper");
    imageContainer.empty();
    images.forEach((image) => {
      const imgElement = `
        <div class="swiper-slide relative">
            <img loading="lazy" src="${image}" class="w-full h-full object-cover"
                alt="Slide Image">
        </div>`;
      imageContainer.append(imgElement);
    });

    initSwiper();
  });

  $(document).on("click", `[data-modal-hide="${elementName}"]`, function () {
    drawer.hide();
    $(".swiper-wrapper").empty();
    if (swiperInstance) {
      swiperInstance.destroy(true, true);
    }
  });
}
function DataTables() {}
function ChartsJs() {}
