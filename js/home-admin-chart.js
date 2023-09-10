// Get the canvas element by its id
var ctxLine = document.getElementById("lineChart").getContext("2d");

// Fetch JSON data from your PHP API
fetch("../api/get_line_chart.php")
  .then((response) => response.json())
  .then((data) => {
    var labels = data.map(function (item) {
      return item.date;
      
    });
    var totals = data.map(function (item) {
      return item.total;
    });

    var chartData = {
      labels: labels,
      datasets: [
        {
          label: "Total Count",
          borderColor: "rgba(75, 192, 192, 1)",
          borderWidth: 2,
          data: totals,
          fill: false,
        },
      ],
    };

    var chartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          type: "time",
          time: {
            unit: "day",
            displayFormats: {
              day: "MMM D",
            },
          },
        },
        y: {
          beginAtZero: true,
          max: 100, // Set an appropriate maximum value for the y-axis
        },
      },
    };

    new Chart(ctxLine, {
      type: "line",
      data: chartData,
      options: chartOptions,
    });
  })
  .catch(function (error) {
    console.error("Error fetching data:", error);
  });
