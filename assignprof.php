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
 margin-left: 240px;
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
    min-width: 800px;
    max-width: 800px;

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
    margin-left: 25%;
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
</style>
<body>
    <div class="container">
        <div class="first">
        <div class="box">
        <form action="./processprof.php" method="post" autocomplete="off">
        <?php
        include "db.php"; 
        $sql = "SELECT * FROM courses INNER JOIN class ON courses.id = class.course_id";
        $result = mysqli_query($mysqli, $sql);
        echo "<select name='class' class='mar'>";
        echo "<option value= disabled selected hidden>Select Class Here</option>";
        while ($row = mysqli_fetch_array($result)) {
       
        echo "<option value='" . $row['id'] . "' >" . $row['course'] . " " . $row['level'] . " " . $row['section'] . " </option>";
        }
        echo "</select> <br><br>";

        $sql3 = "SELECT * FROM subjects ORDER BY id ASC";
        $result3 = mysqli_query($mysqli, $sql3);
        echo "<select name='subject'>";
        echo "<option value= disabled selected hidden>Select Subject Here</option>";
        while ($row3 = mysqli_fetch_array($result3)) {
       
        echo "<option value='" . $row3['id'] . "' >" . $row3['subject'] ." </option>";
        }
        echo "</select> <br><br>";

        $sql2 = "SELECT * FROM faculty ORDER BY id ASC";
        $result2 = mysqli_query($mysqli, $sql2);
        echo "<select name='prof'>";
        echo "<option value= disabled selected hidden>Select Professor Here</option>";
        while ($row2 = mysqli_fetch_array($result2)) {
       
        echo "<option value='" . $row2['id'] . "' >" . $row2['name'] ." </option>";
        }
        echo "</select> <br>";
        
        ?>
        <button>
        <span class="button_top"> 
            Add
        </span>
        </button>
        
        </form> 
        </div>
        </div>
        <div class="second">
        <table>
        <tr>
        <th>Class</th>
        <th>Subject</th>
        <th>Professor</th>
        </tr>
        <?php
  include "db.php"; 
  // Construct the SELECT query
  $sql = "SELECT * FROM class_subject INNER JOIN class ON class_subject.class_id = class.id INNER JOIN courses ON class.course_id = courses.id INNER JOIN subjects ON class_subject.subject_id = subjects.id INNER JOIN faculty ON class_subject.faculty_id = faculty.id";
  $result = mysqli_query($mysqli, $sql);
  while ($row = mysqli_fetch_array($result)) {; ?>

    
        <tr>
        <td><?php echo $row['course']. " " .$row['level']."-" .$row['section']."<br>";?></td>
        <td><?php echo $row['subject'];?></td>
        <td><?php echo $row['name'];?></td>
        </tr>
    
       

      <?php
  }
  
?>
</table>
        </div>
    </div>
</body>
</html>