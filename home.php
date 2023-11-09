<?php
    session_start();
    include "db.php";


$faculty = $_SESSION['faculty_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gantari&display=swap" rel="stylesheet">
    <title>Home</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap%27');

*{
    margin: 0;
    padding: 0;
    max-width: 100%;
    max-width: 100%;
}

body{
    height: 100vh;
    width: 100%;
    overflow: hidden
}

.first h1{
    color: #14274E;
    font-size: 57px;
    font-family: 'Josefin Sans', sans-serif;
    margin-left: 39%;
    margin-top: 5%;
}
.bg-image {
	position: relative;
	height: 100vh;
	width: 100vw;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
    position: relative;
}
h1 {
    position: absolute;
    color: #14274E;
    font-size: 57px;
    font-family: 'Josefin Sans', sans-serif;
    margin-top: 5%;
    width: 100%;

}
.container {
    text-align: center;
}


    </style>
</head>

<body>

    <div class="container">

            <div class="bg-image">
            <h1>Welcome     
            <?php 
                   if(isset($_SESSION['id'])){
                    $id = $_SESSION['id'];

                    $sql = "SELECT * FROM user where id = '$id'";
                    $result = mysqli_query($mysqli, $sql);

                    if(mysqli_num_rows($result)>0)
                    {
                        foreach($result as $row)
                        {
                            echo $row['name'];
                        }
                    }
                }?></h1>
        
      
            <img src="./bodybackground.jpg" alt="">
            
          
            </div>
    </div>

</body>
</html>