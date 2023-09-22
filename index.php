<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Sample</title>
</head>
<body>

<?php  //SAMPLE MYSQL CONNECTION

//   $con = new mysqli('localhost','root','','test');
//   $query = $con->query("
//     SELECT 
//       MONTHNAME(created) as monthname,
//         SUM(amount) as amount
//     FROM transactions
//     GROUP BY monthname
//   "); //this is a sample sql query to a MySQL database/table

//   foreach($query as $data)
//   {
//     $month[] = $data['monthname'];
//     $amount[] = $data['amount'];
//   }



// Sample data for demonstration
$dataSample = array(
    array("monthname" => "January", "amount" => 500),
    array("monthname" => "February", "amount" => 800),
    array("monthname" => "March", "amount" => 1200),
    array("monthname" => "April", "amount" => 600),
    array("monthname" => "May", "amount" => 950),
    array("monthname" => "June", "amount" => 750)
);

?>

<div style="width: 500px;">
  <canvas id="myChart"></canvas>
</div> 
 
<script>
        // Data from PHP
        var data = <?php echo json_encode($data); ?>;

        // Prepare labels and data for Chart.js
        var labels = [];
        var amounts = [];

        for (var i = 0; i < data.length; i++) {
            labels.push(data[i].monthname);
            amounts.push(data[i].amount);
        }

        // Create a Chart.js chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Transaction Amount',
                    data: amounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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
    </script>

<div style="width: 500px;">
  <canvas id="myPiechart"></canvas>
</div> 
 
<script>
        // Data from PHP
        var data = <?php echo json_encode($dataSample); ?>;

        // Prepare labels and data for Chart.js
        var labels = [];
        var amounts = [];

        for (var i = 0; i < data.length; i++) {
            labels.push(data[i].monthname);
            amounts.push(data[i].amount);
        }

        // Create a Chart.js chart
        var ctx = document.getElementById('myPiechart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Transaction Amount',
                    data: amounts,
                    backgroundColor: 'rgba(200, 74, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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
    </script>

</body>
</html>
