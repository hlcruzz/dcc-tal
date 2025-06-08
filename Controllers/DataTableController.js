export default function SimpleDataTable(tableSelector, options = {}) {
  const defaultOptions = {
    hiddenColumns: [],
    modalTarget: "crud-modal",
    onAdd: null,
    filename: "table-export",
    showAddButton: true, // New parameter to control add button visibility
  };

  const config = { ...defaultOptions, ...options };

  if (
    !$(tableSelector).length ||
    typeof simpleDatatables.DataTable === "undefined"
  ) {
    return null;
  }

  const exportHandlers = {
    pdf: {
      label: "Export as PDF",
      icon: `<i class="fa-solid fa-file-export me-1"></i>`,
      handler: (table) => {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        doc.autoTable({
          html: tableSelector,
          didParseCell: function (data) {
            if (config.hiddenColumns.includes(data.column.index)) {
              data.cell.text = "";
              data.cell.styles.fillColor = false;
              data.cell.styles.lineWidth = 0;
              data.cell.styles.cellPadding = 0;
            }
          },
        });

        doc.save(`${config.filename}.pdf`);
      },
    },
    xls: {
      label: "Export as Excel",
      icon: `<i class="fa-solid fa-file-export me-1"></i>`,
      handler: (table) => {
        const originalTable = $(tableSelector)[0];
        const clonedTable = originalTable.cloneNode(true);

        $(clonedTable)
          .find("tr")
          .each(function () {
            config.hiddenColumns.forEach((colIndex) => {
              if (this.cells[colIndex]) this.deleteCell(colIndex);
            });
          });

        const workbook = XLSX.utils.table_to_book(clonedTable, {
          sheet: "Sheet1",
        });

        XLSX.writeFile(workbook, `${config.filename}.xlsx`);
      },
    },
  };

  const table = new simpleDatatables.DataTable(tableSelector, {
    template: (options, dom) => `
      <div class="${options.classes.top}">
        <div class="flex flex-col sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-3 rtl:space-x-reverse w-full sm:w-auto">
          ${
            options.paging && options.perPageSelect
              ? `
              <div class="${options.classes.dropdown}">
                <label>
                  <select class="${options.classes.selector}"></select> 
                  ${options.labels.perPage}
                </label>
              </div>
            `
              : ""
          }

          <div class="relative inline-block">
            <button type="button" 
              class="export-dropdown-btn inline-flex items-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100
                    dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:hover:bg-gray-700 dark:hover:text-primary-400 dark:focus:ring-gray-700">
              Export as
              <svg class="-me-0.5 ms-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
              </svg>
            </button>

            <div class="export-dropdown absolute top-10 sm:right-0 z-50 mt-1 w-44 divide-y divide-gray-100 rounded-lg bg-white shadow-lg
                        dark:divide-gray-700 dark:bg-gray-800" style="display: none;">
              <ul class="py-1 text-sm text-gray-700 dark:text-gray-100">
                <li>
                  <button type="button" class="export-btn w-full px-4 py-2 text-left hover:bg-gray-100 dark:hover:bg-gray-700" data-export-type="pdf">
                    ${exportHandlers.pdf.icon}<span>${
      exportHandlers.pdf.label
    }</span>
                  </button>
                </li>
                <li>
                  <button type="button" class="export-btn w-full px-4 py-2 text-left hover:bg-gray-100 dark:hover:bg-gray-700" data-export-type="xls">
                    ${exportHandlers.xls.icon}<span>${
      exportHandlers.xls.label
    }</span>
                  </button>
                </li>
              </ul>
            </div>
          </div>
        
        </div>

        ${
          options.searchable
            ? `
            <div class="${options.classes.search}">
              <input class="${options.classes.input}" placeholder="${
                options.labels.placeholder
              }" type="search" title="${options.labels.searchTitle}" ${
                dom.id ? `aria-controls="${dom.id}"` : ""
              }>
            </div>
          `
            : ""
        }
      </div>

      <div class="${options.classes.container}" ${
      options.scrollY.length
        ? `style="height: ${options.scrollY}; overflow-Y: auto;"`
        : ""
    }></div>

      <div class="${options.classes.bottom}">
        ${options.paging ? `<div class="${options.classes.info}"></div>` : ""}
        <nav class="${options.classes.pagination}"></nav>
      </div>
    `,
  });

  // Setup dropdown toggle (JS-only)
  setTimeout(() => {
    $(document).on("click", ".export-dropdown-btn", function (e) {
      e.preventDefault();
      e.stopPropagation();

      // Close other dropdowns
      document.querySelectorAll(".export-dropdown").forEach((el) => {
        el.style.display = "none";
      });

      const dropdown = this.nextElementSibling;
      dropdown.style.display =
        dropdown.style.display === "block" ? "none" : "block";
    });

    $(document).on("click", function (e) {
      if (
        !e.target.closest(".export-dropdown") &&
        !e.target.closest(".export-dropdown-btn")
      ) {
        document.querySelectorAll(".export-dropdown").forEach((el) => {
          el.style.display = "none";
        });
      }
    });

    $(document).on("click", ".export-btn", function (e) {
      e.preventDefault();
      e.stopPropagation();

      const exportType = $(this).data("export-type");
      if (exportHandlers[exportType]) {
        exportHandlers[exportType].handler(table);
      }

      document.querySelectorAll(".export-dropdown").forEach((el) => {
        el.style.display = "none";
      });
    });
  }, 100);

  return table;
}
