<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Banner styles */
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
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1));
        }

        .tagline {
            text-align: center;
            background: rgb(244, 247, 250);
            border-bottom: 1px solid #e5e7eb;
            height: 80px;
        }

        .tagline h2 {
            color: #ff4e00;
            font-size: 32px;
            margin-bottom: 10px;
            margin-top: 0;
        }

        /* Main layout styles */
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 48%;
            height: 300px;
        }

        .Mainbody {
            margin-left: 250px;
        }

        /* New BP chart legend styles */
        .bp-legend {
            margin-top: 10px;
            padding: 10px;
            font-size: 12px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .legend-color {
            width: 16px;
            height: 16px;
            margin-right: 8px;
            border-radius: 2px;
        }

        .legend-color.normal {
            background-color: rgba(0, 255, 0, 0.1);
            border: 1px solid rgba(0, 200, 0, 0.5);
        }

        .tagline {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        
        .login-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color:black;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #ff4e00;
        }
    </style>
</head>

<body>
    <?php include "sidebar.php"; ?>
    <div class="Mainbody">
        <div class="tagline">
            <h2>Your Health Dashboard</h2>
            <p>Monitor and track your health metrics over time</p>
            <a href="login-page-url" class="login-button">Login</a>
        </div>

        <div class="banner-container">
            <img src="WhatsApp Image 2025-01-29 at 4.11.13 PM.jpeg" class="banner-image" alt="Health Dashboard Banner">
            <div class="banner-overlay"></div>
        </div>

        <div class="bodyy">
            <div class="weight-container">
                <canvas id="weightChart"></canvas>
            </div>
            <div class="bottom-container">
                <div class="half-chart">
                    <canvas id="bpChart"></canvas>
                    <div class="bp-legend">
                        <div class="legend-item">
                            <span class="legend-color normal"></span>
                            <span>Target Range: Systolic ≤ 120 mmHg and Diastolic ≤ 80 mmHg</span>
                        </div>
                    </div>
                </div>
                <div class="half-chart">
                    <canvas id="sugarChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'config.php';

    $query = "SELECT date, weight, blood_pressure, sugar_level, notes FROM health_logs ORDER BY date ASC";
    $result = $con->query($query);

    $dates = [];
    $weights = [];
    $systolic = [];
    $diastolic = [];
    $sugar = [];
    $notes = [];

    while ($row = $result->fetch_assoc()) {
        $dates[] = date('Y-m-d', strtotime($row['date']));
        $weights[] = floatval($row['weight']);

        // Split blood pressure into systolic and diastolic
        $bp_parts = explode('/', $row['blood_pressure']);
        $systolic[] = intval($bp_parts[0]);
        $diastolic[] = intval($bp_parts[1]);
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

        // Weight Chart
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

        // Blood Pressure Chart
        new Chart(document.getElementById('bpChart'), {
            type: 'line',
            data: {
                labels: <?php echo json_encode($dates); ?>,
                datasets: [{
                        label: 'Systolic (mmHg)',
                        data: <?php echo json_encode($systolic); ?>,
                        borderColor: 'rgb(255, 99, 132)',
                        tension: 0.1,
                        order: 1
                    },
                    {
                        label: 'Diastolic (mmHg)',
                        data: <?php echo json_encode($diastolic); ?>,
                        borderColor: 'rgb(54, 162, 235)',
                        tension: 0.1,
                        order: 2
                    },
                    {
                        label: 'Systolic Target (120)',
                        data: Array(<?php echo count($dates); ?>).fill(120),
                        borderColor: 'rgba(255, 99, 132, 0.3)',
                        borderDash: [5, 5],
                        fill: false,
                        pointRadius: 0,
                        order: 3
                    },
                    {
                        label: 'Diastolic Target (80)',
                        data: Array(<?php echo count($dates); ?>).fill(80),
                        borderColor: 'rgba(54, 162, 235, 0.3)',
                        borderDash: [5, 5],
                        fill: false,
                        pointRadius: 0,
                        order: 4
                    }
                ]
            },
            options: {
                ...chartOptions,
                plugins: {
                    title: {
                        display: true,
                        text: 'Blood Pressure Tracking'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const value = context.raw;
                                const datasetLabel = context.dataset.label;
                                if (datasetLabel.includes('Target')) {
                                    return `${datasetLabel}: ${value} mmHg`; // Corrected line
                                }
                                const isNormal = (datasetLabel.includes('Systolic') && value <= 120) ||
                                    (datasetLabel.includes('Diastolic') && value <= 80);
                                return `${datasetLabel}: ${value} mmHg ${isNormal ? '✓' : '!'}`; // Corrected line
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 40,
                        max: 160,
                        ticks: {
                            stepSize: 20
                        },
                        grid: {
                            color: function(context) {
                                if (context.tick.value === 120 || context.tick.value === 80) {
                                    return 'rgba(255, 0, 0, 0.1)';
                                }
                                return 'rgba(0, 0, 0, 0.1)';
                            }
                        }
                    }
                }
            }
        });

        // Blood Sugar Chart
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