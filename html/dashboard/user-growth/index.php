<?php 

// show errors
// error_reporting(E_ALL);

	require_once "../../inc/conn.php";
	require_once "../../inc/variables.php";
	logged_in(true);

// echo $_SESSION['admin'];
	if (!isset($_SESSION['admin']) OR $_SESSION['admin']==false) {
		header("Location: ../index");
		exit();
	}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Signups Graph</title>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<br><br><br><br>

<div>
<center>
  <h2>Total Users Growth</h2>
  <!-- <a href="user-growth.csv">Download csv</a> -->
</center>
  <canvas id="myChart" style="transform: scale(0.8);"></canvas>
</div>


<script>
	    <?php
    $query = "SELECT DATE(join_date) AS signup_date, COUNT(*) AS signup_count FROM user_login WHERE join_date >= '2023-01-01' GROUP BY DATE(join_date) ORDER BY signup_date";
    $result = mysqli_query($conn, $query);
    $dates = array();
    $counts = array();
    $cumulativeCount = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $dates[] = $row['signup_date'];
        $cumulativeCount += $row['signup_count'];
        $counts[] = $cumulativeCount;
    }

    // Convert data to JSON format
    $json_dates = json_encode(array_values($dates));
    $json_counts = json_encode(array_values($counts));


    // print_r($dates);
    ?>

  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo $json_dates; ?>,
      datasets: [{
        label: '# of Users',
        data: <?php echo $json_counts; ?>,
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


<br><br><br><br>

<!-- amount chart -->
<div style="max-width: 1200px;margin:auto">
<center><h2>Users/School</h2></center>
<canvas id="userSchoolChart"></canvas>
</div>

<script>

  <?php

  $sql = "SELECT university FROM user_info";
  $result = mysqli_query($conn, $sql);
  $universities_count = array();
  $universities_amount = array();
  $email_unique = array();

  while ($row = mysqli_fetch_assoc($result)) {
    $universities_count[$row['university']] = isset($universities_count[$row['university']]) ? $universities_count[$row['university']] + 1 : 1;
  }

  // get the top 40 and categorize the rest as 'others'
  $sorted = $universities_count;
  arsort($sorted);
  $sorted = array_slice($sorted, 0, 50);
  $sorted['Others'] = array_sum(array_slice($universities_count, 50));



  ?>


  var ctxUS = document.getElementById('userSchoolChart');
  var myChartUS = new Chart(ctxUS, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode(array_keys($sorted)); ?>,
      datasets: [{
        label: 'Amount',
        data: <?php echo json_encode(array_values($sorted)); ?>,
        borderWidth: 1
      }]
    },
  options: {
    indexAxis: 'y',
    // Elements options apply to all of the options unless overridden in a dataset
    // In this case, we are setting the border of each horizontal bar to be 2px wide
    elements: {
      bar: {
        borderWidth: 2,
      }
    },
    responsive: true,
    plugins: {
      legend: {
        position: 'right',
      }
    },
    scales: {
      y: {
        ticks: {
          autoSkip: false
        }
      }
    }
  },
  });
</script>

<br><br><br><br>


<div>
<center>
  <h2>Subscriber Growth</h2>
  <!-- <a href="subscribers.csv">Download csv</a> -->
</center>
  <canvas id="subGrowth" style="transform: scale(0.8);"></canvas>
</div>


<script>
	    <?php
    $query = "SELECT * FROM user_payments WHERE subscription_id IS NOT NULL AND period_start>'2024-01-15' ORDER BY period_start ASC";
    $result = mysqli_query($conn, $query);
    $dates = array();
    $counts = array();
    $cumulativeCount = 0;
    $emails = array();

    while ($row = mysqli_fetch_assoc($result)) {
      if(!in_array($row['email'], $emails)){
        $cumulativeCount++;
        $dates[substr($row['period_start'], 0, 10)] = $cumulativeCount;
        $emails[] = $row['email'];
      }
    }

    // Convert data to JSON format
    $json_dates = json_encode(array_keys($dates));
    $json_counts = json_encode(array_values($dates));

    // export data as csv
    // $fp = fopen('subscribers.csv', 'a+');
    // fputcsv($fp, array('Date', 'Count'));
    // foreach ($dates as $key => $value) {
    //   fputcsv($fp, array($key, $value));
    // }
    // fclose($fp);

    ?>

  const ctxsg = document.getElementById('subGrowth');

  new Chart(ctxsg, {
    type: 'line',
    data: {
      labels: <?php echo $json_dates; ?>,
      datasets: [{
        label: 'Premium User Growth',
        data: <?php echo $json_counts; ?>,
        borderWidth: 1,
        backgroundColor: '#31afb4',
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

<br><br><br><br>




<div style="max-width: 1200px;margin:auto">
<center><h2>Subscribers/School</h2></center>
<canvas id="subscriberChart"></canvas>
</div>


<?php
  $sql = "SELECT user_payments.email, user_payments.amount, user_info.university FROM user_payments INNER JOIN user_info ON user_payments.email = user_info.email WHERE period_end > '2021'";
  $result = mysqli_query($conn, $sql);
  $universities_count = array();
  $universities_amount = array();
  $email_unique = array();

  while ($row = mysqli_fetch_assoc($result)) {
    if (!in_array($row['email'], $email_unique)) {
      $email_unique[] = $row['email'];
      $universities_count[$row['university']] = isset($universities_count[$row['university']]) ? $universities_count[$row['university']] + 1 : 1;
      
      $universities_amount[$row['university']] = isset($universities_amount[$row['university']]) ? $universities_amount[$row['university']] + $row['amount'] : $row['amount'];
    }
  }

  // sort by highest count
  $sorted = $universities_count;
  arsort($sorted);


  ?>


<script>
  // horizontal bar chart
  var ctx2 = document.getElementById('subscriberChart');
  var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode(array_keys($sorted)); ?>,
      datasets: [{
        label: 'Number of Subscribers',
        data: <?php echo json_encode(array_values($sorted)); ?>,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }]
    },
  options: {
    indexAxis: 'y',
    // Elements options apply to all of the options unless overridden in a dataset
    // In this case, we are setting the border of each horizontal bar to be 2px wide
    elements: {
      bar: {
        borderWidth: 2,
      }
    },
    responsive: true,
    plugins: {
      legend: {
        position: 'right',
      }
    },
    scales: {
      y: {
        ticks: {
          autoSkip: false
        }
      }
    }
  },
  });

</script>


<br><br><br><br>

<!-- amount chart -->
<div style="max-width: 1200px;margin:auto">
<center><h2>Amount/School</h2></center>
<canvas id="amountChart"></canvas>
</div>

<script>
  // horizontal bar chart

  var ctx3 = document.getElementById('amountChart');
  var myChart3 = new Chart(ctx3, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode(array_keys($universities_count)); ?>,
      datasets: [{
        label: 'Amount',
        data: <?php echo json_encode(array_values($universities_amount)); ?>,
        borderWidth: 1
      }]
    },
  options: {
    indexAxis: 'y',
    // Elements options apply to all of the options unless overridden in a dataset
    // In this case, we are setting the border of each horizontal bar to be 2px wide
    elements: {
      bar: {
        borderWidth: 2,
      }
    },
    responsive: true,
    plugins: {
      legend: {
        position: 'right',
      }
    },
    scales: {
      y: {
        ticks: {
          autoSkip: false
        }
      }
    }
  },
  });
</script>





<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
</body>
</html>
