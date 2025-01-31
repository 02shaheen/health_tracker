<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body{
            width:100%;
            height:100vh;
            display:flex;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            background-image: url('pexels-shvets-production-8413176.jpg');
            background-size: cover;
        }
        #register_page{
            width:35%;
            height:500px;
            border:1px solid gray;
            box-shadow: 3px 3px 3px  3px #ccc;
            padding-left: 15px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            border-radius: 5px;
           background-color:#B8B8B8;

        }
        #register_page h1{
            text-align: center;
            padding-top: 20px;
        }
        #register_page input{
            width:90%;
            height:32px;
            padding-left: 10px;
            font-size: 20px;
        }
        #register_page label{
            font-size: 20px;
            
        }
      #btn{
        width:40%;
        height:30px;
        font-size: 20px;
        margin-top: 30px;
        margin-left: 10px;
        background-color: grey;
        color: white;
      }
      #role{
        /* width: 20%; */
        height: 28px;
        font-size: 15px;
        color: grey;
        /* float: right; */
        margin-right: 30px;
      }
      
      #file input{
        width: 40%;
        font-size: 20px;
        /* margin-bottom: 15px; */
      }
      #roll{
        float: right;
      }
      #file{
        display: inline-block;
        width: 40;
      }
      
    </style>
</head>

<body>
    <div id="register_page">
        <form method="POST">
            <h1>Register Here</h1>
           <label> Name:</label><br>
            <input type="name"  required="required" name="sname"placeholder="Name"> <br><br>

            <label>Email:</label><br>
            <input type="email" required="required"  name="Email"placeholder="Email"><br><br>

           <label> Password:</label><br>
            <input type="password" required="required"  name="Password" placeholder="Password"><br><br>

            
    <div id="file">
    <label> Upload Photo:</label><br>
      <input type="file" name="file">
    </div>
    <div id="roll">
      <label>Role:</label><br>
            <select for ="Role"name="Role" id="role">Role
            <option>Choose any</option>
            <option for value="Patient">Patient</option>
            <option for value="Doctor">Doctor</option>
            
    </select>
    </div>
   <center><button id="btn" name="submit">Register</button></center>
   </form>
</div>
<?php
include 'config.php';
if(isset($_POST["submit"])){
    $Name=$_POST['sname'];
    $Email=$_POST['Email'];
    $Password= md5($_POST['Password']);
    $Role=$_POST['Role'];

      $dup_Email=mysqli_query($con," SELECT * FROM `login` WHERE Email='$Email'");

     if(mysqli_num_rows($dup_Email)){
        echo "<script> alert('This email is already token'); window.location.href='register.php';</script>";
     }
    else{ // insert data

    

   $sql =" INSERT INTO `login`(`Name`, `Email`, `Password`, `Role`) VALUES ('$Name','$Email','$Password','$Role')";
   //echo $sql;
    }

   if($con->query($sql)){
    echo "<script> alert('Registered successfully'); window.location.href='login.php';</script>";
   }else{
    echo "<script>alert('unsuccessfully');</script>";
   }
}
?>
</body>
</html>