<?php 
session_start(); 
include "db.php";

$faculty_id = $_SESSION['faculty_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

        *{
  max-width: 100%;
  max-height: 100%;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: 'Josefin Sans', sans-serif;
}
body{
  max-width: 100%;
  max-height: 100%;
  height: 100%;
  overflow: hidden;
}

.wrapper{
  max-width: 100%;
  max-height: 100%;
  display: flex;
  position: relative;
}

.wrapper .sidebar{
  max-width: 100%;
  max-height: 100%;
  width: 200px;
  height: 100%;
  background: #F1F6F9;
  padding: 30px 0px;
  position: fixed;
}

.wrapper .sidebar h2{
  max-width: 100%;
  max-width: 100%;
  color: #394867;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 30px;
}

.wrapper .sidebar ul li{
  max-width: 100%;
  max-width: 100%;
  padding: 15px;
  border-bottom: 1px solid #222831;
  border-bottom: 1px solid rgba(0,0,0,0.05);
  border-top: 1px solid rgba(255,255,255,0.05);
}    

.wrapper .sidebar ul li a{
  max-width: 100%;
  max-width: 100%;
  color: #394867;
  display: block;
}

.wrapper .sidebar ul li a .fas{
  max-width: 100%;
  max-width: 100%;
  width: 25px;
}

.wrapper .sidebar ul li:hover{
  max-width: 100%;
  max-width: 100%;
  background-color: #F1F6F9;
}
    
.wrapper .sidebar ul li:hover a{
  max-width: 100%;
  min-width: 100%;
  color: #9BA4B4;
}
.wrapper button{
  max-width: 100%;
    background-color: #394867;
    width: 100px;
    height: 40px;
    float: right;
    font-size: 15px;
    margin-top: 250%;
    margin-right: 27%;
    cursor: pointer;
    border-radius: 10px;
    text-align: center;
    color: #F1F6F9;
}
iframe {
  max-width: 100%;
  margin-left: 200px;
  min-height: 1000px;
  max-height: 100%;
}
body {
    background: whitesmoke;
  }
  
    </style>
</head>
<body>
   <div class="wrapper">
       <div class="sidebar">
           <h2>Attendance Checker</h2>
           <ul>
               <li><a href="./home.php" target="iframe_a"><i class="fas fa-home"></i>Home</a></li>
               <li><a href="./student.php" target="iframe_a"><i class="fas fa-user"></i>Student</a></li>
               <li><a href="./checkattendance.php" target="iframe_a"><i class="fas fa-user"></i>Check Attendance</a></li>
               <li><a href="./attendancerecord.php" target="iframe_a"><i class="fas fa-user"></i>Attendance Record</a></li>
           </ul> 

           <a href="logout.php"><button>Logout</button></a>
    </div>
    </div>

    <iframe src="home.php" name="iframe_a" width="90%" frameBorder="0"></iframe>


</body>
</html>
    
    
    
    
    
    
    
    
    
    
    