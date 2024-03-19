<!DOCTYPE html>
<html>
<script src="https://www.gstatic.com/charts/loader.js"></script>

<body>
<div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  // Initialize the DataTable and add columns for the chart
  const data = new google.visualization.DataTable();
  data.addColumn('string', 'Country');
  data.addColumn('number', 'Value');
  data.addColumn({type: 'string', role: 'style'});

  // Add rows to the DataTable. The third value in each row represents the color.
  data.addRows([
    ['PROGRESS RAG', 100, null], // Color will be set based on value
    ['OTJ', 49, null],          // Color will be set based on value
    ['EMP', 44, null],          // Color will be set based on value
    ['COMPLETED', 24, null],    // Color will be set based on value
    ['IN-PROGRESS', 10, null]   // Color will be set based on value
  ]);

  // Function to determine the color based on the value
  const determineColor = (value) => {
    if (value <= 10) return 'red';
    else if (value > 10 && value <= 50) return 'orange';
    else return 'green';
  };

  // Update the color for each row based on the 'Value' column
  for (let i = 0; i < data.getNumberOfRows(); i++) {
    const value = data.getValue(i, 1); // Get the value from the 'Value' column
    const color = determineColor(value); // Determine the color based on the value
    data.setValue(i, 2, color); // Set the color in the 'style' role column
  }

  // Chart options
  const options = {
    title: 'Learner Progress',
    legend: 'none', // Do not display a legend
  };

  // Draw the chart
  const chart = new google.visualization.BarChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>

</body>
</html>
