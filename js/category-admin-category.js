// Initialize AG-Grid
var gridOptions19 = {
    columnDefs: [
        
      {
        headerName: 'PRODUCT CATEGORY',
        children: [
          { headerName: 'CID', field: 'cid' },
          { headerName: 'CATEGORY', field: 'category_name' }
        ],
      }
      
      // Add more header groups or columns as needed
    ],
    defaultColDef: {
      resizable: true,
      suppressSizeToFit: true,
      width: 300,
      enableRowGroup: true,
      enablePivot: true,
      enableValue: true,
    },
    rowData: [], // Initial empty data
    // Other AG-Grid configuration options
  };
  



// Fetch data from the server and populate the grid
function fetchAndPopulateDataCategory() {
    fetch('../api/get_category_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptions19.api.setRowData(data);
        console.log(data)
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }


  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivProductCategory = document.querySelector('#gridManageCategoryProduct');
    new agGrid.Grid(gridDivProductCategory, gridOptions19);
  
    // Fetch and populate data
    fetchAndPopulateDataCategory();
  });