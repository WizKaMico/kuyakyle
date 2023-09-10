// Initialize AG-Grid
var gridOptions3 = {
    columnDefs: [
        
      {
        headerName: 'PRODUCT INFORMATION',
        children: [
          { headerName: 'NAME', field: 'name' },
          { headerName: 'CATEGORY', field: 'category' },
          { headerName: 'PRICE', field: 'price' }
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
function fetchAndPopulateDataProduct() {
    fetch('../api/get_product_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptions3.api.setRowData(data);
        console.log(data)
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }


  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivProduct = document.querySelector('#gridProduct');
    new agGrid.Grid(gridDivProduct, gridOptions3);
  
    // Fetch and populate data
    fetchAndPopulateDataProduct();
  });