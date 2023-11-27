// Initialize AG-Grid
var gridOptions13 = {
    columnDefs: [
        
      {
        headerName: 'PRODUCT RAW MATERIALS',
        children: [
          { headerName: 'RID', field: 'rid' },
          { headerName: 'MATERIAL', field: 'material' },
          { headerName: 'QUANTITY', field: 'quantity' },
          { headerName: 'PRICE/QTY', field: 'price' },
          { headerName: 'DATE ADDED', field: 'date_added' }
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
function fetchAndPopulateDataProduct4() {
    fetch('../api/get_inventory_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptions13.api.setRowData(data);
        console.log(data)
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }


  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivProductInventory = document.querySelector('#gridManageInventoryProduct');
    new agGrid.Grid(gridDivProductInventory, gridOptions13);
  
    // Fetch and populate data
    fetchAndPopulateDataProduct4();
  });