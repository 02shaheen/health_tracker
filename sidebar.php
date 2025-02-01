<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Basic Sidebar Styling */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color:rgb(244, 247, 250);
            color: #fff;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            transition: 0.3s;
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar-header h2 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
            color:black;
           
        }

        /* Sidebar Menu */
        .sidebar-menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 20px;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            color: black;
            /* Light color for text */
            text-decoration: none;
            font-size: 18px;
            padding: 10px;
            border-radius: 5px;
            /* Rounded corners */
            transition: background-color 0.3s ease, color 0.3s ease;
            /* Smooth hover effect */
        }

        .sidebar-menu li a i {
            font-size: 20px;
            /* Icon size */
            margin-right: 15px;
            /* Space between icon and text */
        }

        .sidebar-menu li a:hover {
            background-color: #ff4e00;
            color:rgb(246, 244, 251);
            /* Change text color on hover (e.g., golden color) */
        }

        

        /* Logout item with a different hover effect */
        .sidebar-menu li a.logout:hover {
            background-color: #e74c3c;
            /* Red color on hover for logout */
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                /* Smaller sidebar on smaller screens */
            }

            .sidebar-header h2 {
                font-size: 20px;
            }

            .sidebar-menu li a {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Health System</h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="log_metrics.php"><i class="fa fa-heart"></i>Log Health Metrics</a></li>
            <li><a href="medical_records.php"><i class="fa fa-file-image-o"></i>Upload Medical Records</a></li>
            <li><a href="search_doctor.php"><i class="fa fa-search"></i>Search Doctors</a></li>
            <li><a href="appointments.html"><i class="fa fa-calendar"></i>Manage Appointments</a></li>
            <li><a href="logout.html"><i class="fa fa-power-off"></i>Logout</a></li>
        </ul>
    </div>

</body>

</html>