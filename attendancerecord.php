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
        min-height: 200px;
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
    max-width: 80%;
    text-align: center;
  }
  table, td, th {
    border: 1px solid black;
    border-collapse: collapse;
    background-color: #394867;
  color: #F1F6F9;
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
button {
  /* Variables */
 --button_radius: 0.75em;
 --button_color: #e8e8e8;
 --button_outline_color: #000000;
 font-size: 17px;
 font-weight: bold;
 border: none;
 border-radius: var(--button_radius);
 background: var(--button_outline_color);
 margin-top: 10px;
 margin-left: 40%;
 margin-bottom: 10px;
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
.box {
    height: 300px;
    width: 70%;
    margin: auto;
    margin-top: 6%;
}
select {
    width: 200px;
    font-size: 15px;
    margin-left: 320px;
    height: 40px;
}
</style>
<body>
  <div class="box">
<?php
  include "db.php";

  session_start(); 

  
  $faculty_id = $_SESSION['faculty_id']; 
  // Construct the SELECT query for the class subjects
  $sql = "SELECT * FROM class_subject INNER JOIN class ON class_subject.class_id = class.id INNER JOIN courses ON class.course_id = courses.id INNER JOIN subjects ON class_subject.subject_id = subjects.id INNER JOIN faculty ON class_subject.faculty_id = faculty.id where faculty_id = $faculty_id";
  $result = mysqli_query($mysqli, $sql);
?>
<form method="post" action="">
  <div class="first">
    <select name="attendance" required>
      <option value disabled selected hidden>Select Class Here</option>
      <?php
        while ($row = mysqli_fetch_array($result)) {
          echo "<option value='" . $row['count'] . "'>" . $row['course'] . " " . $row['level'] . " " . $row['section'] . " " . $row['subject'] . " [" . $row['name'] . "]" . "</option>";
        }
      ?>
    </select>
    <input type="date" name="date" style="height: 38px; width: 200px;" required>
    <br>
    <button>
        <span class="button_top"> 
            Search
        </span>
        </button>

</form> 
<table>
    <tr>
      <th>Student</th>
      <th>Attendance</th>
    </tr>
    <?php
      // Retrieve and display the attendance records if the form has been submitted
      if (isset($_POST['attendance'])) {
        $attendance = mysqli_real_escape_string($mysqli, $_POST['attendance']);
        $date = mysqli_real_escape_string($mysqli, $_POST['date']);

        $sql1 = "SELECT * FROM attendance_record INNER JOIN students ON attendance_record.student_id = students.id WHERE attendance_id = $attendance AND date = '$date'";
        $result1 = mysqli_query($mysqli, $sql1);
        while ($row1 = mysqli_fetch_array($result1)) {
    ?>
          <tr>
            <td><?php echo $row1['name']; ?></td>
            <td><?php echo $row1['status']; ?></td>
          </tr>
    <?php
        }
      }
    ?>
  </table>
  </div>
  </div>
</body>
</html>
