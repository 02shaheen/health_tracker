<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Log Health Metrics - Smart Health Tracker</title>
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <style>
       .health-metrics {
           font-family: 'Inter', sans-serif;
           background: #f8fafc;
           color: #1e293b;
       }

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
           color:  #ff4e00;
           font-size: 32px;
           margin-bottom: 10px;
       }

       .tagline p {
           color:rgb(1, 1, 1);
           font-size: 18px;
       }

       .health-info {
           display: flex;
           justify-content: space-between;
           padding: 40px;
           max-width: 1200px;
           margin: 0 auto;
           gap: 20px;
       }

       .info-card {
           background: white;
           padding: 25px;
           border-radius: 12px;
           box-shadow: 0 2px 8px rgba(0,0,0,0.05);
           flex: 1;
       }

       .info-card h3 {
           color:  #ff4e00;
           font-size: 20px;
           margin-bottom: 10px;
       }

       .info-card p {
           color: black;
           font-size: 15px;
           line-height: 1.5;
       }

       .form-container {
           max-width: 600px;
           margin: 50px auto;
           padding: 30px;
           background: white;
           border-radius: 16px;
           box-shadow: 0 4px 20px rgba(0,0,0,0.1);
           position: relative;
           z-index: 1;
       }

       .form-header {
           text-align: center;
           margin-bottom: 30px;
       }

       .form-header h1 {
           font-size: 28px;
           color: #0f172a;
           margin-bottom: 10px;
       }

       .form-header p {
           color: #64748b;
           font-size: 16px;
       }

       .form-group {
           margin-bottom: 20px;
       }

       label {
           display: block;
           font-weight: 500;
           margin-bottom: 8px;
           color: #334155;
       }

       input, textarea {
           width: 100%;
           padding: 10px 14px;
           border: 1px solid #e2e8f0;
           border-radius: 8px;
           font-size: 14px;
           transition: all 0.2s;
       }

       input:focus, textarea:focus {
           outline: none;
           border-color:rgb(43, 44, 45);
           box-shadow: 0 0 0 4px rgba(59,130,246,0.1);
       }

       .submit-btn {
           width: 100%;
           padding: 12px;
           background:rgb(41, 41, 40);
           color: white;
           border: none;
           border-radius: 8px;
           font-size: 15px;
           font-weight: 500;
           cursor: pointer;
           transition: all 0.2s;
       }

       .submit-btn:hover {
           background:  #ff4e00;
           transform: translateY(-2px);
       }

       .side-image {
           margin-top: 50px;
           border-radius: 12px;
           box-shadow: 0 4px 12px rgba(0,0,0,0.1);
       }

       @media (max-width: 768px) {
           .health-info {
               flex-direction: column;
               padding: 20px;
           }
           
           .info-card {
               margin-bottom: 15px;
           }

           .side-image {
               width: 50%;
               height: auto;
               /* margin: 20px 0; */
               margin-left: 20px;
           }
       }
   </style>
</head>
<body>
   <?php include "header.php"; ?>

   <div class="health-metrics">
       <div class="banner-container">
           <img src="img/Untitled design - Copy.png" class="banner-image" alt="Health Tracking Banner">
           <div class="banner-overlay"></div>
       </div>

       <div class="tagline">
           <h2>Track Your Health Journey</h2>
           <p>Monitor vital signs daily for better health outcomes</p>
       </div>

       <div class="health-info">
           <div class="info-card">
               <h3>Blood Pressure Tracking</h3>
               <p>Regular monitoring helps prevent cardiovascular issues and maintains heart health.</p>
           </div>
           <div class="info-card">
               <h3>Weight Management</h3>
               <p>Keep track of your weight trends to maintain a healthy lifestyle.</p>
           </div>
           <div class="info-card">
               <h3>Blood Sugar Control</h3>
               <p>Monitor glucose levels for better diabetes management and prevention.</p>
           </div>
       </div>

       <div class="row">
           <div class="col-md-6">
           <div style="margin-left: 90px; margin-top: 60px;">
            <img src="img/bp.jpg" style="height:500px; width:550px;" class="side-image" alt="Health Monitoring">
        </div>
           </div>
           <div class="col-md-6">
               <div class="form-container">
                   <div class="form-header">
                       <h1>Log Your Daily Health Metrics</h1>
                       <p>Record your daily health measurements for better tracking</p>
                   </div>
                   <form method="POST">
                       <div class="form-group">
                           <label for="date">Date</label>
                           <input type="date" id="date" name="date" required>
                       </div>

                       <div class="form-group">
                           <label for="weight">Weight (kg)</label>
                           <input type="number" id="weight" name="weight" step="0.1" min="20" max="300" required>
                       </div>

                       <div class="form-group">
                           <label for="blood_pressure">Blood Pressure (mmHg)</label>
                           <input type="text" id="blood_pressure" name="blood_pressure" placeholder="e.g., 120/80" pattern="\d{2,3}/\d{2,3}" required>
                       </div>

                       <div class="form-group">
                           <label for="sugar_level">Blood Sugar Level (mg/dL)</label>
                           <input type="number" id="sugar_level" name="sugar_level" min="20" max="600" required>
                       </div>

                       <div class="form-group">
                           <label for="notes">Additional Notes</label>
                           <textarea id="notes" name="notes" placeholder="Any observations or symptoms..."></textarea>
                       </div>

                       <button type="submit" name="submit" class="submit-btn">Log Health Data</button>
                   </form>
               </div>
           </div>
       </div>
   </div>

   <?php
   if (isset($_POST['submit'])) {
       include 'config.php';
       
       $date = mysqli_real_escape_string($con, $_POST['date']);
       $weight = mysqli_real_escape_string($con, $_POST['weight']);
       $blood_pressure = mysqli_real_escape_string($con, $_POST['blood_pressure']);
       $sugar_level = mysqli_real_escape_string($con, $_POST['sugar_level']);
       $notes = mysqli_real_escape_string($con, $_POST['notes']);

       $sql = "INSERT INTO health_logs (date, weight, blood_pressure, sugar_level, notes) 
               VALUES ('$date', '$weight', '$blood_pressure', '$sugar_level', '$notes')";

       if ($con->query($sql)) {
           echo "<script>
                   document.getElementById('successMessage').style.display = 'block';
                   setTimeout(() => {
                       document.getElementById('successMessage').style.display = 'none';
                   }, 3000);
                 </script>";
       } else {
           echo "<script>
                   document.getElementById('errorMessage').style.display = 'block';
                   setTimeout(() => {
                       document.getElementById('errorMessage').style.display = 'none';
                   }, 3000);
                 </script>";
       }
   }
   ?>

   <?php include "footer.php"; ?>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>