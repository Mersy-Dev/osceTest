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

// Query to retrieve the data
$sql = "SELECT reason, subreason, COUNT(*) as count FROM unsubscription GROUP BY reason, subreason";
$result = $conn->query($sql);

// Prepare data for JavaScript
$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Encode the data to JSON
$jsonData = json_encode($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unsubscription Analytics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Unsubscription Analytics</h1>

    <div style="width:90%; max-width:1300px; margin:auto;">
    <!-- Chart Containers -->
    <canvas id="reasonChart" width="400" height="200"></canvas>
    <canvas id="subreasonChart" width="400" height="200"></canvas>

    </div>

    <script>
        // Get the data from PHP
        const data = <?php echo $jsonData; ?>;

        // Process the data for the charts
        const reasons = {};
        const subreasons = {};

        data.forEach(item => {
            if (!reasons[item.reason]) {
                reasons[item.reason] = 0;
            }
            reasons[item.reason] += parseInt(item.count);

            if (item.subreason) {
                if (!subreasons[item.subreason]) {
                    subreasons[item.subreason] = 0;
                }
                subreasons[item.subreason] += parseInt(item.count);
            }
        });

        // Convert data for Chart.js
        const reasonLabels = Object.keys(reasons);
        const reasonCounts = Object.values(reasons);

        const subreasonLabels = Object.keys(subreasons);
        const subreasonCounts = Object.values(subreasons);

        // Create the Reason Chart
        const reasonCtx = document.getElementById('reasonChart').getContext('2d');
        new Chart(reasonCtx, {
            type: 'bar',
            data: {
                labels: reasonLabels,
                datasets: [{
                    label: '# of Unsubscriptions by Reason',
                    data: reasonCounts,
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

        // Create the Subreason Chart
        const subreasonCtx = document.getElementById('subreasonChart').getContext('2d');
        new Chart(subreasonCtx, {
            type: 'bar',
            data: {
                labels: subreasonLabels,
                datasets: [{
                    label: '# of Unsubscriptions by Subreason',
                    data: subreasonCounts,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
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
