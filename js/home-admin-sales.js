// Initialize AG-Grid
var gridOptions2 = {
    columnDefs: [
        
      {
        headerName: 'ORDER DETAILS',
        children: [
          { headerName: 'ORDER ID', field: 'customer_id' },
          { headerName: 'AMOUNT', field: 'amount' },
          { headerName: 'CUSTOMER', field: 'name' },
          { headerName: 'STATUS', field: 'order_status' },
          { headerName: 'DATE', field: 'order_at' }
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
function fetchAndPopulateDataSales() {
    fetch('../api/get_sales_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptions2.api.setRowData(data);
        console.log(data + 'SALES')
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }


  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivSales = document.querySelector('#gridSales');
    new agGrid.Grid(gridDivSales, gridOptions2);
  
    // Fetch and populate data
    fetchAndPopulateDataSales();
  });