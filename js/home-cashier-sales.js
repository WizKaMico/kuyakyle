// Initialize AG-Grid
// Initialize AG-Grid
var gridOptions7 = {
    columnDefs: [
      { headerName: 'QUEUE ID', field: 'customer_id' },
      { headerName: 'ORDER ID', field: 'member',  cellRenderer: orderLinkRenderer  },
      { headerName: 'AMOUNT', field: 'amount' },
      { headerName: 'CUSTOMER', field: 'name' },
      { headerName: 'STATUS', field: 'order_status' },
      { headerName: 'DATE', field: 'order_at' },
      {
        headerName: 'ORDER DETAILS',
        field: 'orderDetails',
        cellRenderer: 'agGroupCellRenderer',
        cellRendererParams: {
          suppressCount: true,
        },
      },
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
    autoGroupColumnDef: {
      headerName: 'ORDER ID',
      field: 'customer_id',
      cellRenderer: 'agGroupCellRenderer',
      cellRendererParams: {
        checkbox: true,
        suppressCount: true,
      },
    },
    rowData: [], // Initial empty data
    // Other AG-Grid configuration options
  };
  
  function orderLinkRenderer(params) {
    var member = params.value;
    var link = document.createElement('a');
    link.href = '#'; // Use "#" as the href to prevent default link behavior
    link.textContent = member;
  
    // Add a click event listener to open the modal
    link.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      openModal(member); // Open the modal with the specified UID
    });
  
    return link;
  }
  
  // Custom cell renderer for the "Edit" link
  
  function openModal(member) {
    // Display the modal
    console.log(member)
    var modal = document.getElementById('orderModalUpdate');
    modal.style.display = 'block';
  
    // Populate the modal content using the UID
    const orderInput = modal.querySelector('#orderInput');
    orderInput.value = member;
  }
  
  // Close the modal when clicking outside the modal content
  window.addEventListener('click', function(event) {
    var modal = document.getElementById('orderModalUpdate');
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });
  
  // Fetch data from the server and populate the grid
  function fetchAndPopulateDataSalesCashier() {
    fetch('../api/get_sales_cashier_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        // Add the productDetails field to each row with an empty array for now
        data.forEach(function(row) {
          row.productDetails = [];
        });
  
        gridOptions7.api.setRowData(data);
        console.log(data + 'SALES');
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }
  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivSalesCashier = document.querySelector('#gridSalesToday');
    new agGrid.Grid(gridDivSalesCashier, gridOptions7);
  
    // Fetch and populate data
    fetchAndPopulateDataSalesCashier();
  });
  