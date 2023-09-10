// Initialize AG-Grid
var gridOptions8 = {
    columnDefs: [
        
      {
        headerName: 'ORDER DETAILS',
        children: [
          { headerName: 'ORDERID', field: 'customer_id' },
          { headerName: 'AMOUNT', field: 'amount' },
          { headerName: 'STATUS', field: 'order_status' }
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
function fetchAndPopulateDataTransactionTake() {
    fetch('api/get_transaction_data_take.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptions8.api.setRowData(data);
        console.log(data + 'TRANSAACTION')
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }


  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivTake = document.querySelector('#gridTransactionTake');
    new agGrid.Grid(gridDivTake, gridOptions8);
  
    // Fetch and populate data
    fetchAndPopulateDataTransactionTake();
  });