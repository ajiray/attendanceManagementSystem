<?php
  // Connect to the database
  include "db.php";
  // Get the input value from the forme
  $name = $_POST['name'];
  $class = $_POST['class'];

  
  // Construct the INSERT query
  $query = "INSERT INTO students (class_id, name) VALUES ('$class', '$name')";
  
  // Execute the query
  if (mysqli_query($mysqli, $query)) {
    header("Location: student.php");
  } else {
      echo "Error adding record: " . mysqli_error($db);
  }
?>
