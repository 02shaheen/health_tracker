<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Medical Records - Smart Health Tracker</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
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
            color: #ff4e00;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .tagline p {
            color: rgb(1, 1, 1);
            font-size: 18px;
        }

        .upload-records {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .upload-records h2 {
            color: #ff4e00;
            font-size: 28px;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        form label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            color: #334155;
        }

        form input,
        form select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.2s;
        }

        form input:focus,
        form select:focus {
            outline: none;
            border-color: rgb(43, 44, 45);
            box-shadow: 0 0 0 4px rgba(59,130,246,0.1);
        }

        button[type="submit"] {
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

        button[type="submit"]:hover {
            background: #ff4e00;
            transform: translateY(-2px);
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: center;
            font-weight: 500;
        }

        .alert-success {
            background-color: #ecfdf5;
            color: #059669;
            border: 1px solid #a7f3d0;
        }

        .alert-error {
            background-color: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        @media (max-width: 768px) {
            .upload-records {
                margin: 20px;
                padding: 20px;
            }

            .upload-records h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <?php include "header.php"; ?>

    <div class="banner-container">
        <img src="img/Untitled design - Copy (2).png" class="banner-image" alt="Medical Records Banner">
        <div class="banner-overlay"></div>
    </div>

    <div class="tagline">
        <h2>Medical Records Upload</h2>
        <p>Securely store and manage your medical documents</p>
    </div>

    <section class="upload-records">
        <h2>Upload Your Records</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file-type">Record Type:</label>
                <select id="file-type" name="file_type" required>
                    <option value="">Select record type</option>
                    <option value="prescription">Prescription</option>
                    <option value="report">Medical Report</option>
                    <option value="lab">Laboratory Results</option>
                    <option value="imaging">Imaging Results</option>
                    <option value="other">Other Documents</option>
                </select>
            </div>

            <div class="form-group">
                <label for="file-name">Select File:</label>
                <input type="file" id="file-name" name="file_name" accept=".pdf,.jpg,.png,.docx" required>
                <small style="color: #64748b; margin-top: 5px; display: block;">Accepted formats: PDF, JPG, PNG, DOCX</small>
            </div>

            <div class="form-group">
                <label for="date">Record Date:</label>
                <input type="date" id="date" name="upload_date" required>
            </div>

            <button type="submit" name="submit" value="submit">Upload Record</button>
        </form>
    </section>

    <?php
    if (isset($_POST['submit'])) {
        include 'config.php';

        $file_type = $_POST['file_type'];
        $upload_date = $_POST['upload_date'];
        $file = $_FILES['file_name'];
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $upload_dir = 'uploads/';

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $unique_file_name = uniqid() . '_' . $file_name;
        $file_path = $upload_dir . $unique_file_name;

        if (move_uploaded_file($file_tmp, $file_path)) {
            $sql = "INSERT INTO `medical_records` (`file_type`, `file_name`, `upload_date`) 
                    VALUES ('$file_type', '$unique_file_name', '$upload_date')";

            if ($con->query($sql)) {
                echo "<div class='alert alert-success'>Record uploaded successfully!</div>";
            } else {
                echo "<div class='alert alert-error'>Database Error: " . $con->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-error'>Error uploading file. Please try again.</div>";
        }
    }
    ?>

    <?php include "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>