// Get the canvas element by its id
var ctxPie = document.getElementById("pieChart").getContext("2d");

// Fetch JSON data from your PHP API
fetch("../api/get_pie_chart.php")
    .then((response) => response.json())
    .then((data) => {
        // Aggregate the data based on the "name" field
        var aggregatedData = {};
        data.forEach(function (item) {
            var name = item.name;
            var sumOrder = item.sum_order;
            if (aggregatedData[name] === undefined) {
                aggregatedData[name] = 0;
            }
            aggregatedData[name] += sumOrder;
        });

        // Process data to extract labels and values
        var label = Object.keys(aggregatedData);
        var order = Object.values(aggregatedData);

        // Create the pie chart data
        var pieChartData = {
            labels: label,
            datasets: [
                {
                    data: order,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        // Add more colors as needed
                    ],
                },
            ],
        };

        // Create the pie chart options (if needed)
        var pieChartOptions = {
            responsive: true,
        };

        // Create the pie chart
        var myPieChart = new Chart(ctxPie, {
            type: "pie",
            data: pieChartData,
            options: pieChartOptions,
        });
    })
    .catch(function (error) {
        console.error("Error fetching data pie:", error);
    });
