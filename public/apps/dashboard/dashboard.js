$(document).ready(function(){

     var totalsales = parseFloat($('#totalsales').text());
     var incometoday = parseFloat($('#incometoday').text());
     var netprofit = parseFloat($('#netprofit').text());
     var totalcost = parseFloat($('#totalcost').text());
    var expenses = parseFloat($('#totalexpenses').text())
     // Format and update numbers
     var formattedTotalSales = formatNumber(totalsales);
     var formattedIncomeToday = formatNumber(incometoday);
     var formattedNetProfit = formatNumber(netprofit);
     var formattedCost = formatNumber(totalcost);
     var formattotalexpenses = formatNumber(expenses);

     $('#totalsales').text(formattedTotalSales);
     $('#incometoday').text(formattedIncomeToday);
     $('#netprofit').text(formattedNetProfit);
     $('#totalcost').text(formattedCost);
     $('#totalexpenses').text(formattotalexpenses);


     var ctxBar = document.getElementById('chart_widget_2').getContext('2d');
     var myBarChart = new Chart(ctxBar, {
         type: 'bar',
         data: {
             labels: [], // Will be populated dynamically
             datasets: [{
                 label: 'Sales',
                 data: [], // Will be populated dynamically
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)',
                     'rgba(255, 99, 132, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 99, 132, 1)'
                 ],
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
 
     // Fetch data using Axios
     axios.get('dashboardgraph')
         .then(function (response) {
             // Process the data
             var data = response.data;
             var labels = [];
             var values = [];
 
             data.forEach(function (item) {
                 labels.push(item.formatted_date + ' ' + item.year);
                 values.push(parseFloat(item.total)); // Convert total to float
             });
 
             // Update chart data
             myBarChart.data.labels = labels;
             myBarChart.data.datasets[0].data = values;
             myBarChart.update(); // Update the chart
         })
         .catch(function (error) {
             console.error('Error fetching data:', error);
         });

// Initialize the doughnut chart
var ctxDonut = document.getElementById('chart_widget_donut').getContext('2d');
var myDonutChart = new Chart(ctxDonut, {
    // type: 'doughnut',
    type : 'bar',
    data: {
        labels: [], // Will be populated dynamically with product names
        datasets: [{
            label: 'Product Sales',
            data: [], // Will be populated dynamically with quantities sold
            backgroundColor: [
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        cutoutPercentage: 70, // Controls the thickness of the donut ring
        responsive: true,
        maintainAspectRatio: false
    }
});

// Fetch data from the API and update the chart
axios.get('dashdunot') 
    .then(function (response) {
        var data = response.data;

        // Extract labels (product names) and data (quantities sold)
        var labels = data.map(item => `${item.product_name} ${item.mg}mg (${item.brandname})`);
        var salesData = data.map(item => item.total_quantity_sold);

        // Update chart data

        myDonutChart.data.labels = labels;
        myDonutChart.data.datasets[0].data = salesData ;

        // Update the chart to reflect the new data
        myDonutChart.update();
    })
    .catch(function (error) {
        console.error('Error fetching sales data:', error);
    });

});