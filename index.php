
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Add these new styles for banner */
        .banner-container {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
        }

        .banner-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.1));
        }

        .tagline {
            text-align: center;
            padding: 40px 20px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
        }

        .tagline h2 {
            color: #ff4e00;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .tagline p {
            color: rgb(1, 1, 1);
            font-size: 18px;
        }

        /* Your existing styles */
        .bodyy {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f4f4f9;
        }
        .weight-container {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin: 0 auto 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            width: 90%;
            height: 300px;
        }
        .bottom-container {
            display: flex;
            justify-content: space-between;
            width: 90%;
            margin: 0 auto;
            gap: 20px;
        }
        .half-chart {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            width: 48%;
            height: 300px;
        }
    </style>
</head>
<body>
<?php include "header.php"; ?>

<!-- Add banner section -->
<div class="banner-container">
    <img src="img/pexels-shvetsa-4769133.jpg" class="banner-image" alt="Health Dashboard Banner">
    <div class="banner-overlay"></div>
</div>

<div class="tagline">
    <h2>Your Health Dashboard</h2>
    <p>Monitor and track your health metrics over time</p>
</div>

<!-- Your existing content -->
<div class="bodyy">
    <div class="weight-container">
        <canvas id="weightChart"></canvas>
    </div>
    <div class="bottom-container">
        <div class="half-chart">
            <canvas id="bpChart"></canvas>
        </div>
        <div class="half-chart">
            <canvas id="sugarChart"></canvas>
        </div>
    </div>
</div>

    <?php
    include 'config.php';
    
    $query = "SELECT date, weight, blood_pressure, sugar_level, notes FROM health_logs ORDER BY date ASC";
    $result = $con->query($query);
    
    $dates = [];
    $weights = [];
    $bp = [];
    $sugar = [];
    $notes = [];
    
    while($row = $result->fetch_assoc()) {
        $dates[] = date('Y-m-d', strtotime($row['date']));
        $weights[] = floatval($row['weight']);
        $bp[] = intval($row['blood_pressure']);
        $sugar[] = floatval($row['sugar_level']);
        $notes[] = $row['notes'];
    }
    ?>

    <script>
    const chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Date'
                }
            }
        }
    };

    new Chart(document.getElementById('weightChart'), {
        type: 'line',
        data: {
            labels: <?php echo json_encode($dates); ?>,
            datasets: [{
                label: 'Weight (kg)',
                data: <?php echo json_encode($weights); ?>,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            ...chartOptions,
            plugins: {
                title: {
                    display: true,
                    text: 'Weight Tracking'
                }
            }
        }
    });

    new Chart(document.getElementById('bpChart'), {
        type: 'line',
        data: {
            labels: <?php echo json_encode($dates); ?>,
            datasets: [{
                label: 'Blood Pressure (mmHg)',
                data: <?php echo json_encode($bp); ?>,
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.1
            }]
        },
        options: {
            ...chartOptions,
            plugins: {
                title: {
                    display: true,
                    text: 'Blood Pressure Tracking'
                }
            },
            scales: {
                ...chartOptions.scales,
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 10
                    }
                }
            }
        }
    });

    new Chart(document.getElementById('sugarChart'), {
        type: 'line',
        data: {
            labels: <?php echo json_encode($dates); ?>,
            datasets: [{
                label: 'Blood Sugar (mg/dL)',
                data: <?php echo json_encode($sugar); ?>,
                borderColor: 'rgb(153, 102, 255)',
                tension: 0.1
            }]
        },
        options: {
            ...chartOptions,
            plugins: {
                title: {
                    display: true,
                    text: 'Blood Sugar Tracking'
                }
            }
        }
    });
    </script>
    <?php include "footer.php"; ?>
</body>
</html>