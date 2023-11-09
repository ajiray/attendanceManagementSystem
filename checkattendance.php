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
        background-color: white;
    }
    .container {
        display: flex;
        justify-content: space-between;
    }
    .first {
        min-width: 100%;
        min-height: 1000px;
        border: 1px solid black;
    }
    .first form {
        margin: 10px 10px;
    }
    input[type="checkbox"] {
    display: inline-block;
  }
  table {
    margin: auto;
    min-width: 80%;
    margin-top: 20px;
    text-align: center;
  }
  table, td, th {
    border: 1px solid black;
    border-collapse: collapse;
  }
  td, th {
    padding: 10px 20px;
  }
  input[type="submit"] {
    padding: 5px 10px;
    margin-left: 45%;
  }
  th {
    font-size: 20px;
  }
  input[type="date"] {
  width: 150px;
}
.box {
    height: 300px;
    width: 70%;
    margin: auto;
    margin-top: 6%;
}
select {
    width: 570px;
    font-size: 17px;
    margin-left: 320px;
    margin-top: 15px;
}
.error {
	background: #F2DEDE;
	color: #A94442;
	padding: 5px;
	text-align: center;
  font-size: 25px;
	width: 68%;
	border-radius: 5px;
	margin-top: -35px;
	position: absolute;
 }
 .success {
	background: #b6fab6;
	color: green;
	padding: 5px;
	text-align: center;
  font-size: 25px;
	width: 68%;
	border-radius: 5px;
	margin-top: -35px;
	position: absolute;
 }
</style>
<body>
    <div class="container">
        <div class="first">
          <div class="box">
        <form action="" method="post" autocomplete="off">
        <?php
        session_start(); 
        include "db.php";
        
        $faculty_id = $_SESSION['faculty_id']; ?>
      <?php if (isset($_GET['error'])) { ?>
     		<em><p class="error"><?php echo $_GET['error']; ?></p></em>
     		<?php } ?>

        <?php if (isset($_GET['success'])) { ?>
        <em><p class="success"><?php echo $_GET['success']; ?></p></em>
     		<?php } ?>


        <?php
        $sql = "SELECT * FROM class_subject INNER JOIN class ON class_subject.class_id = class.id INNER JOIN courses ON class.course_id = courses.id INNER JOIN subjects ON class_subject.subject_id = subjects.id INNER JOIN faculty ON class_subject.faculty_id = faculty.id where faculty_id = $faculty_id";
        $result = mysqli_query($mysqli, $sql);
        echo "<select name='attendance' onchange='submitForm()'>";
        echo "<option value= disabled selected hidden>Select Class Here</option>";
        while ($row = mysqli_fetch_array($result)) {
       
      
        echo "<option value='" . $row['count'] . "' >" . $row['course'] ." " .$row['level']. " " .$row['section']." " .$row['subject']." [" .$row['name']. "]"." </option>";
        }
        echo "</select>";

        echo '<script>';
        echo 'function submitForm() {
                document.forms[0].submit();
                }';
        echo '</script>';
        ?>
        </form> 

        
        <form action="./processcheckattendance.php" method="post">
        <table>
        <tr>
        <th>Student</th>
        <th>Attendance</th>
        <th><input type="date" name="date" required></th>
        </tr>
        <?php
  include "db.php"; 
  // Construct the SELECT query
  if (isset($_POST['attendance'])) {
  $attendance = $_POST['attendance'];
 
  $sql1 = "SELECT * FROM students where class_id = $attendance";
  $result1 = mysqli_query($mysqli, $sql1);
  while ($row1 = mysqli_fetch_array($result1)) {; ?>
     
      <tr>
      <td style="display: none;"><input hidden value="<?php echo $attendance?>" name="class_subject_id"></td>
        
        <td><input hidden name="student" value="<?php echo $row1['id']?>" readonly><?php echo $row1['name']?></td>
        <td colspan="2">
  <input type="radio" name="attendance[<?php echo $row1['id']; ?>]" value="Present" id="present_<?php echo $row1['id']; ?>" style="display: inline-block;" required>
  <label for="present_<?php echo $row1['id']; ?>" style="display: inline-block;">Present</label>
  <input type="radio" name="attendance[<?php echo $row1['id']; ?>]" value="Absent" id="absent_<?php echo $row1['id']; ?>" style="display: inline-block;" required>
  <label for="absent_<?php echo $row1['id']; ?>" style="display: inline-block;">Absent</label>
  <input type="radio" name="attendance[<?php echo $row1['id']; ?>]" value="Late" id="late_<?php echo $row1['id']; ?>" style="display: inline-block;" required>
  <label for="late_<?php echo $row1['id']; ?>" style="display: inline-block;">Late</label>
</td>

      </tr>
      
      <?php
  }
  echo "<tr>";
  echo  "<td colspan='3'><input type='submit' value='Save'></td>";
    echo "</tr>";
}
?> 
    
        </table>
        
    </form>
        </div>
    </div>
        </div>
        
</body>
</html>