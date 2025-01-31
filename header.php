<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Health Tracker</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
   margin: 0;
   padding: 0;
   box-sizing: border-box;
   font-family: 'Inter', sans-serif;
}

.header {
   background-color: white;
   padding: 15px 0;
   width: 100%;
   position: sticky;
   top: 0;
   z-index: 1000;
   box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.header-container {
   max-width: 1200px;
   margin: 0 auto;
   display: flex;
   justify-content: space-between;
   align-items: center;
   padding: 0 20px;
}

.logo h3 {
   color: #ff4e00;
   font-size: 24px;
   font-weight: 600;
}

.header-right {
   display: flex;
   align-items: center;
   gap: 25px;
}

.header-right a {
   color: #1e293b;
   text-decoration: none !important;
   font-size: 15px;
   font-weight: 500;
   padding: 8px 16px;
   border-radius: 8px;
   transition: all 0.3s ease;
}

.header-right a:hover {
   color: #ff4e00;
   background-color: rgba(255, 78, 0, 0.1);
   transform: translateY(-1px);
   text-decoration: none !important;
}

.header-right a.active {
   color: #ff4e00;
   background-color: rgba(255, 78, 0, 0.1);
   text-decoration: none !important;
}

.mobile-menu-btn {
   display: none;
   background: none;
   border: none;
   color: #1e293b;
   font-size: 24px;
   cursor: pointer;
   padding: 8px;
}

@media (max-width: 768px) {
   .header {
       padding: 10px 0;
   }

   .mobile-menu-btn {
       display: block;
   }

   .header-right {
       display: none;
       position: absolute;
       top: 100%;
       left: 0;
       right: 0;
       background: white;
       flex-direction: column;
       padding: 20px;
       gap: 15px;
       box-shadow: 0 4px 6px rgba(0,0,0,0.1);
       text-decoration: none !important;
   }

   .header-right.active {
       display: flex;
       text-decoration: none !important;
   }

   .header-right a {
       width: 100%;
       padding: 12px 20px;
       text-align: left;
       text-decoration: none !important;
   }

   .header-right a:hover {
       padding-left: 25px;
       text-decoration: none !important;
   }

   .logo h3 {
       font-size: 20px;
   }
}

        @media (max-width: 768px) {
            .header {
                padding: 10px 0;
            }

            .mobile-menu-btn {
                display: block;
            }

            .header-right {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                padding: 20px;
                gap: 15px;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                text-decoration: none; 
            }

            .header-right.active {
                display: flex;
                text-decoration: none; 
            }

            .header-right a {
                width: 100%;
                padding: 12px 20px;
                text-align: left;
                text-decoration: none; 
            }

            .header-right a:hover {
                padding-left: 25px;
                text-decoration: none; 
            }

            .logo h3 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <h3>Smart Health Tracker</h3>
            </div>

            <button class="mobile-menu-btn" onclick="toggleMenu()">☰</button>

            <nav class="header-right">
                <a href="index.php" class="active">Dashboard</a>
                <a href="log_metrics.php">Log Health Metrics</a>
                <a href="medical_records.php">Medical Records</a>
                <a href="search_doctor.php">Find Doctors</a>
                <a href="appointments.php">Appointments</a>
            </nav>
        </div>
    </header>

    <script>
        function toggleMenu() {
            document.querySelector('.header-right').classList.toggle('active');
        }

        // Set active menu item based on current page
        document.addEventListener('DOMContentLoaded', function() {
            const currentPage = window.location.pathname.split('/').pop();
            const menuLinks = document.querySelectorAll('.header-right a');
            
            menuLinks.forEach(link => {
                if(link.getAttribute('href') === currentPage) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>