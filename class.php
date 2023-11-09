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
        justify-content: space-between;
    }
    .first {
        min-width: 50%;
        min-height: 950px;

    }
    .second {
        min-width: 50%;
        min-height: 950px;
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
    min-width: 600px;
    max-width: 600px;
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
  color: #394867;
  background-color: #F1F6F9;
  outline-color: #394867;
  box-shadow: #394867;
  transition: .1s;
  transition-property: box-shadow;

}
.box {
    height: 300px;
    width: 70%;
    border: 1px solid black;
    border-radius: 10px;
    margin: auto;
    margin-top: 6%;
    background-color: #394867;
    margin-left: 40%;
}
select {
    width: 270px;
    font-size: 15px;
    margin-left: 150px;
    margin-top: 15px;
}
.mar {
    margin-top: 50px;
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
  color: #cc5856;
 }
 .green a{
  color: #b6fab6;
 }
</style>
<body>
    <div class="container">
        <div class="first">
        <form action="./processclass.php" method="post" autocomplete="off">
            <div class="box">
        <?php
        include "db.php"; 
        $query = "SELECT * FROM courses ORDER BY id ASC";
        $result = mysqli_query($mysqli, $query);
        echo "<select name='course' class='mar'>";
        echo "<option value= disabled selected hidden>Select Program Here</option>";
        while ($row = mysqli_fetch_array($result)) {
       
        echo "<option value='" . $row['id'] . "' >" . $row['course'] . " </option>";
        }
        echo "</select>";
        ?>
        <br>
        <select name="level" id="">
        <option value= disabled selected hidden>Year Level</option>
            <option value="1st Year">1st Year</option>
            <option value="2nd Year">2nd Year</option>
            <option value="3rd Year">3rd Year</option>
            <option value="4th Year">4th Year</option>
        </select>
        <br>
        <input placeholder="Enter Section Here" class="input" name="section" type="text"><br>
     
        <button>
        <span class="button_top"> 
            Add Class
        </span>
        </button>
        </form> 
        </div>
        </form> 
        </div>
        <div class="second">
            <table>
                <tr>
                    <th>Class</th>
                </tr>
        <?php
  include "db.php"; 
  // Construct the SELECT query
  $sql1 = "SELECT * FROM class INNER JOIN courses ON class.course_id = courses.id";
  $result1 = mysqli_query($mysqli, $sql1);
  while ($row1 = mysqli_fetch_array($result1)) { ; ?>

      <tr>
        <td><?php echo $row1['course']. " " . $row1['level']. "-" .$row1['section']?></td>
      </tr>
      

      <?php
  }
?>
</table>
        </div>
    </div>
</body>
</html>