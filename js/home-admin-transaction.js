// Initialize AG-Grid
var gridOptions1 = {
    columnDefs: [
        
      {
        headerName: 'ORDER DETAILS',
        children: [
          { headerName: 'ORDERS', field: 'total_order' },
          { headerName: 'PROFIT', field: 'total_amount' },
          { headerName: 'DATE', field: 'order_date' }
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
function fetchAndPopulateDataTransaction() {
    fetch('../api/get_transaction_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptions1.api.setRowData(data);
        console.log(data + 'TRANSAACTION')
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }


  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivTransaction = document.querySelector('#gridTransaction');
    new agGrid.Grid(gridDivTransaction, gridOptions1);
  
    // Fetch and populate data
    fetchAndPopulateDataTransaction();
  });