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
    display: flex;
    flex-direction: column; /* this will stack the flex items vertically */
    
}

    .first {
        min-width: 50%;
    }
    .second {
        min-width: 50%;
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
 margin-top: 30px;
 margin-left: 170px;
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
    background-color: #394867;
  color: #F1F6F9;
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
    background-color: #F1F6F9;
    color: #394867;
    min-width: 90%;
    max-width: 90%;

}
.input {
  background-color: #F1F6F9;
  min-width: 250px;
  height: 40px;
  padding: 10px;
  border: 2px solid white;
  border-radius: 5px;
  margin-left: 110px;
  margin-top: 90px;
  border-radius: 10px;
}

.input:focus {
  color: #394867;
  background-color: #F1F6F9;
  outline-color: #394867;
  box-shadow: #394867;
  transition: .1s;
  transition-property: box-shadow;

}
.box {
    height: 300px;
    width: 30%;
    border: 1px solid black;
    border-radius: 10px;
    margin: auto;
    margin-top: 4%;
    background-color: #394867;

}
.error {
	background: #F2DEDE;
	color: #A94442;
	padding: 5px;
	text-align: center;
  font-size: 25px;
	width: 25%;
    margin-left: 30%;
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
	width: 25%;
    margin-left: 30%;
	border-radius: 5px;
	margin-top: -135px;
	position: absolute;
 }
 a {
  text-decoration: none;
 }
 .red a{
  color: #cc5856;
 }
 .green a{
  color: #b6fab6;
 }
</style>
<body>
    <div class="container">
    
        <div class="first">
        <form action="./processcourse.php" method="post" autocomplete="off">
      
            <div class="box">
            <input placeholder="Enter Program Here" class="input" name="course" type="text" required><br>
            <?php if (isset($_GET['error'])) { ?>
    <em><p class="error"><?php echo $_GET['error']; ?></p></em>
 <?php } ?>

 <?php if (isset($_GET['success'])) { ?>
  <em><p class="success"><?php echo $_GET['success']; ?></p></em>
 <?php } ?>
        <button>
        <span class="button_top"> 
            Add Program
        </span>
        </button>
        </form> 
        </div>
        </div>
        <div class="second">
            <table>
                <tr>
                    <th>List of Programs</th>
                    <th colspan="2">Action</th>
                </tr>
        <?php
  include "db.php"; 
  // Construct the SELECT query
  $query = "SELECT * FROM courses ORDER BY id ASC";
  
  // Execute the query
  $result = mysqli_query($mysqli, $query);
  
  // Loop through the query results and display the data
  while ($row = mysqli_fetch_array($result)) {; 

    $id = $row['id'];
  ?>
      <tr>
      <td><?php echo $row['course'];?></td>
      <td class=red><a href="delete1.php?recID= <?php echo $id ?>" onclick="return confirm('Are you sure you want to delete this Program?');">Delete</a></td>
      <td class=green><a href="updaterec.php?recID= <?php echo $id ?>" onclick="return confirm('Are you sure you want to update this Program?');">Update</a></td>
      </tr>
      <?php
  }
?>
</table>
        </div>
    </div>
</body>
</html>