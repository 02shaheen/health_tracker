<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Doctors - Smart Health Tracker</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background:rgb(244, 247, 250)!important;
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
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1));
        }

        .tagline {
            text-align: center;
            padding: 0;
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

        .info-cards {
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
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            flex: 1;
        }

        .info-card h3 {
            color: #ff4e00;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .info-card p {
            color: black;
            font-size: 15px;
            line-height: 1.5;
        }

        .search-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
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

        select,
        input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.2s;
        }

        select:focus,
        input:focus {
            outline: none;
            border-color: rgb(43, 44, 45);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: rgb(41, 41, 40);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background: #ff4e00;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .info-cards {
                flex-direction: column;
                padding: 20px;
            }

            .info-card {
                margin-bottom: 15px;
            }
        }

        .Mainbody {
            margin-left: 250px;
        }
    </style>
</head>

<body>
    <?php include "sidebar.php"; ?>
    <div class="Mainbody">
        <div class="tagline">
            <h2>Find Your Doctor</h2>
            <p>Connect with the best healthcare professionals in your area</p>
        </div>
        <div class="banner-container">
            <img src="WhatsApp Image 2025-01-29 at 4.11.13 PM (2).jpeg" class="banner-image" alt="Doctor Search Banner">
            <div class="banner-overlay"></div>
        </div>

        <div class="info-cards">
            <div class="info-card">
                <h3>Trusted Specialists</h3>
                <p>Access a network of verified and experienced medical specialists.</p>
            </div>
            <div class="info-card">
                <h3>Easy Booking</h3>
                <p>Book appointments instantly with your preferred doctors.</p>
            </div>
            <div class="info-card">
                <h3>Expert Care</h3>
                <p>Get quality healthcare from renowned medical professionals.</p>
            </div>
        </div>

        <div class="search-container">
            <div class="form-header">
                <h1>Search Doctors</h1>
                <p>Find and book appointments with trusted healthcare providers</p>
            </div>
            <form action="search_doctors.php" method="GET">
                <div class="form-group">
                    <label for="specialization">Specialization</label>
                    <select id="specialization" name="specialization" required>
                        <option value="">Select specialization</option>
                        <option value="general">General Practitioner</option>
                        <option value="cardiologist">Cardiologist</option>
                        <option value="dermatologist">Dermatologist</option>
                        <option value="orthopedic">Orthopedic</option>
                        <option value="pediatrician">Pediatrician</option>
                        <option value="neurologist">Neurologist</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" placeholder="Enter city or area" required>
                </div>

                <button type="submit" class="submit-btn">Search Doctors</button>
            </form>
        </div>
    </div>

    <?php include "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>