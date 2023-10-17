// Initialize AG-Grid
var gridOptions17 = {
    columnDefs: [
        
      {
        headerName: 'PRODUCT RAW MATERIALS',
        children: [
          { headerName: 'PRODUCT', field: 'name',  rowGroup: true },
          { headerName: 'MATERIAL', field: 'material' },
          { headerName: 'UNIT', field: 'unit' },
          { headerName: 'QTY PREPARE', field: 'quantitytoprepare' },
          { headerName: 'PRODUCT ORDER', field: 'UnitOrder' },
          { headerName: 'ACTUAL QUANTITY', field: 'actualquantityinstock' }
        ],
      }
      
      // Add more header groups or columns as needed
    ],
    defaultColDef: {
      resizable: true,
      suppressSizeToFit: true,
      width: 150,
      enableRowGroup: true,
      enablePivot: true,
      enableValue: true,
    },
    rowData: [], // Initial empty data
    // Other AG-Grid configuration options
  };
  



// Fetch data from the server and populate the grid
function fetchAndPopulateDataProduct3() {
    fetch('../api/get_inventory_analytics_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptions17.api.setRowData(data);
        console.log(data)
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }


  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivProductInventoryAnalytics = document.querySelector('#gridManageInventoryAnalyticsProduct');
    new agGrid.Grid(gridDivProductInventoryAnalytics, gridOptions17);
  
    // Fetch and populate data
    fetchAndPopulateDataProduct3();
  });