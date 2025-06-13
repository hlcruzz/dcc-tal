import {fetchBuildingSearch} from "../../Controllers/BuildingsController.js";
import {initSwiper} from "../../Controllers/SwiperController.js";
$(document).ready(function () {
  Cookies();
  ClickEvents();
  FetchEvents();
  ModalEvents();
  DataTables();
  ChartsJs();
});
function Cookies() {
  new Drawer(document.getElementById('drawer-left-example'));
  // Prevent backdrop click from closing drawer
  const backdrop = document.querySelector('[drawer-backdrop]');
  if (backdrop) {
    backdrop.addEventListener('click', (e) => {
      e.stopPropagation(); // Block Flowbite's default close behavior
    });
  }
}
function ClickEvents() {}
function FetchEvents() {
  initSwiper();
  let debounceTimer;

  $("#default-search").on("keyup", function () {
    const $input = $(this);
    const container = $("#search-results");
    clearTimeout(debounceTimer);

    debounceTimer = setTimeout(() => {
      const value = $input.val();

      if(value === "" || value === null) {
        container.empty()
        return;
      }
      fetchBuildingSearch(value).then(res=>{
        const data = JSON.parse(res);
        console.log(data);
        
        container.empty();
        if(data.length === 0){
          container.append(`
            <div class="flex items-center text-center gap-5 p-2 px-4">
                <h1 class="text-gray-700  w-full">No results found...</h1>
            </div>
          `);
        }else{
          data.forEach(element => {
          const content = `
            <div class="building-search-btn flex items-center gap-5 p-2 px-4 hover:bg-gray-100 cursor-pointer" data-drawer-placement="left" aria-controls="drawer-left-example">
                <i class="fa-solid fa-location-dot text-gray-500"></i>
                <h1 class="font-medium text-gray-700">${element.building_name}</h1>
            </div>
            `;
            container.append(content);
          });
        }
        
      }).catch(err =>{
        alert(err)
      })
    }, 1000);
  });
}
function ModalEvents() {
  const elementName = "drawer-left-example";
  const drawerElement = document.getElementById(`${elementName}`);
  const drawer = new Drawer(drawerElement, {
    placement: 'left',
    backdrop: true,     
    bodyScrolling: false,
    escKey: false,       
    trapFocus: true,
    onHide: () => console.log('Drawer hidden'),
    onShow: () => console.log('Drawer shown'),
    onToggle: () => console.log('Drawer toggled'),
  });
  $(document).on("click", ".building-search-btn", function(){
    drawer.show();
  })
  $(document).on("click", `[data-modal-hide="${elementName}"]`, function(){
    drawer.hide();
  })
}
function DataTables() {}
function ChartsJs() {}
