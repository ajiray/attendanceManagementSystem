<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }
    body {
        background-color: #9BA4B4;
    }
    .container {
        display: block;
        width:800px;
        margin-left:-150px;

    }
    .first {
        min-width: 50%;
        min-height: 950px;

    }
    .second {
        min-width: 50%;
        min-height: 950px;
        margin-top:-700px;
        margin-left:auto;
        margin-right:auto;
    }
    .first form {
        margin: 10px 10px;
    }
    button {
 --button_radius: 0.75em;
 --button_color: #e8e8e8;
 --button_outline_color: #000000;
 font-size: 17px;
 font-weight: bold;
 border: none;
 border-radius: var(--button_radius);
 background: var(--button_outline_color);
 margin-top: 20px;
 margin-left: 210px;
 cursor: pointer;
}

.button_top {
 display: block;
 box-sizing: border-box;
 border: 2px solid var(--button_outline_color);
 border-radius: var(--button_radius);
 padding: 0.75em 1.5em;
 background: var(--button_color);
 color: var(--button_outline_color);
 transform: translateY(-0.2em);
 transition: transform 0.1s ease;
}

button:hover .button_top {
  /* Pull the button upwards when hovered */
 transform: translateY(-0.33em);
}

button:active .button_top {
  /* Push the button downwards when pressed */
 transform: translateY(0);
}
table, td, th {
    border: 1px solid black;
    border-collapse: collapse;
    background-color: ##dc9800;
  color: #000000;
}
td, th {
    padding: 5px 15px;
    text-align: center;
}
td {
    font-size: 25px;
}
th {
    font-size: 45px;
}
table {
    margin: auto;
    margin-top: 60px;
    background-color: #dc9800;
    color: #dc9800;
    max-width: 1200px;
    max-width: 1200px;

}
.input {
  background-color: #F1F6F9;
  min-width: 250px;
  height: 40px;
  padding: 10px;
  border: 2px solid white;
  border-radius: 5px;
  margin-left: 150px;
  margin-top: 30px;
  border-radius: 10px;
}

.input:focus {


  box-shadow: #394867;
  transition: .1s;
  transition-property: box-shadow;

}
.box {
    height: 180px;
    width: 75%;
    border: 1px solid black;
    border-radius: 10px;
    margin: auto;
    margin-top: 6%;
    background-color: #dc9800;
    margin-left: 40%;
}
.error {
	background: #F2DEDE;
	color: #A94442;
	padding: 5px;
	text-align: center;
  font-size: 25px;
	width: 35%;
    margin-left: 37%;
	border-radius: 5px;
	margin-top: -135px;
	position: absolute;
 }
 .success {
	background: #b6fab6;
	color: green;
	padding: 5px;
	text-align: center;
  font-size: 25px;
	width: 35%;
    margin-left: 37%;
	border-radius: 5px;
	margin-top: -135px;
	position: absolute;
 }
 a {
  text-decoration: none;
 }
 .red a{
  color: #ff0600;
 }
 .green a{
  color: #06ff00;
 }

 .boxer{
    width:900px;
    margin-left:auto;
    margin-right:auto;
    margin-bottom:500px;
    font-family: tahoma;
 }
 .boxer1{
    width:800px;
    margin-left:auto;
    margin-right:auto;
    margin-bottom:300px;
    font-family: tahoma;
    
 }
 
</style>
<body>

    <div class="boxer1">
    <div class="container">
    
        <div class="first">
        <form action="./processcollege.php" method="post" autocomplete="off">
      
            <div class="box">
            <input placeholder="Enter College Name Here" class="input" name="inputCollege" type="text"><br>
            <?php if (isset($_GET['error'])) { ?>
    <em><p class="error"><?php echo $_GET['error']; ?></p></em>
 <?php } ?>

 <?php if (isset($_GET['success'])) { ?>
  <em><p class="success"><?php echo $_GET['success']; ?></p></em>
 <?php } ?>
        <button>
        <span class="button_top"> 
            Add College
        </span>
        </button>
        </form> 
        </div>
 </div>
 </div>
 <div class="boxer">
        <div class="second">
            <table>
                <tr>
                    <th>College</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                    include "db.php"; 
                    // Construct the SELECT query
                    $query = "SELECT * FROM colleges ORDER BY college_id ASC";
                    
                    // Execute the query
                    $result = mysqli_query($mysqli, $query);
                    
                    // Loop through the query results and display the data
                    while ($row = mysqli_fetch_array($result)) 
                    { $college_id = $row['college_id']; 
                       
                ?>
                        <tr>
                            <td><?php echo $row['college_name'];?></td>
                            <td class=red><a href="deleteCollege.php?recID=<?php echo $college_id; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a></td>
                            <td class=green><a href="updateCollege.php?recID=<?php echo $college_id; ?>" onclick="return confirm('Are you sure you want to update this record?');">Update</a></td>
                        </tr>
                <?php
                    }
                ?>
        </table>
</div>
</div>
        </div>
</body>
</html>