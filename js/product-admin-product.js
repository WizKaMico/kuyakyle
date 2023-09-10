var gridOptions4 = {
  columnDefs: [
      {
          headerName: '',
          field: 'checkbox',
          headerCheckboxSelection: true,
          checkboxSelection: true,
          width: 50,
          suppressSizeToFit: true,
          // Enable multiple row selection
          rowSelection: 'multiple',
      },
      {
          headerName: 'PRODUCT INFORMATION',
          children: [
              {
                  headerName: 'IMAGE',
                  field: 'image',
                  cellRenderer: function (params) {
                      // Customize this function to render your image
                      return `<img src="../${params.value}" alt="Product Image" style="max-width: 50px; max-height: 50px;" />`;
                  },
              },
              { headerName: 'CODE', field: 'code', cellRenderer: codeLinkRenderer },
              { headerName: 'NAME', field: 'name' },
              { headerName: 'CATEGORY', field: 'category' },
              { headerName: 'PRICE', field: 'price' },
              { headerName: 'STATUS', field: 'status' },
          ],
      }
      // Add more header groups or columns as needed
  ],
  defaultColDef: {
      resizable: true,
      suppressSizeToFit: true,
      width: 250,
      enableRowGroup: true,
      enablePivot: true,
      enableValue: true,
  },
  rowData: [], 
  rowSelection: 'multiple'
  // Initial empty data
  // Other AG-Grid configuration options
};

var selectedCodes = [];

// Custom cell renderer for the "Button" column
function buttonRenderer(params) {
  var data = params.data;
  var buttonContainer = document.createElement('div');

  var button = document.createElement('button');
  button.textContent = 'Generate Link';
  button.addEventListener('click', function () {
      var link = 'home.php?view=analytics' + selectedCodes.map(code => '&code=' + code).join('');
      console.log(link);
      // Redirect or perform any action with the generated link
  });
  buttonContainer.appendChild(button);

  return buttonContainer.innerHTML;
}

document.querySelector('#generateLinkBtn').addEventListener('click', function () {
  var link = 'home.php?view=analytics' + selectedCodes.map(code => '&code[]=' + code).join('');

  // Redirect to the generated link
  window.location.href = link;
});

document.querySelector('#gridManageProduct').addEventListener('click', function (event) {
  var target = event.target;

  if (target.type === 'checkbox') {
      setTimeout(function () {
          selectedCodes = gridOptions4.api.getSelectedNodes().map(node => node.data.code);
          var buttonContainer = document.querySelector('#buttonContainer');
         
          if (selectedCodes.length > 0) {
              buttonContainer.style.display = 'block';
          } else {
              buttonContainer.style.display = 'none';
          }

          gridOptions4.api.refreshCells({ force: true });
      }, 0);
  }
});

// Call the function to fetch and populate data when the page loads
document.addEventListener('DOMContentLoaded', function () {
  var gridDivProductManage = document.querySelector('#gridManageProduct');
  new agGrid.Grid(gridDivProductManage, gridOptions4);

  // Fetch and populate data
  fetchAndPopulateDataProductManage();
});

function codeLinkRenderer(params) {
  var code = params.value;
  var link = document.createElement('a');
  link.href = '#'; // Use "#" as the href to prevent default link behavior
  link.textContent = code;

  // Add a click event listener to open the modal
  link.addEventListener('click', function (event) {
      event.preventDefault(); // Prevent default link behavior
      openModal(code); // Open the modal with the specified UID
  });

  return link;
}

// Custom cell renderer for the "Edit" link
function openModal(code) {
  // Display the modal
  console.log(code);
  var modal = document.getElementById('productModalUpdate');
  modal.style.display = 'block';

  // Populate the modal content using the UID
  const codeInput = modal.querySelector('#codeInput');
  codeInput.value = code;
}

function fetchAndPopulateDataProductManage() {
  fetch('../api/get_product_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
          // Make sure your data includes an "image" property with the image URL
          gridOptions4.api.setRowData(data);
          console.log(data);
      })
      .catch(error => {
          console.error('Error fetching data:', error);
      });
}
