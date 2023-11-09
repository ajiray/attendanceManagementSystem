<?php
  // Connect to the database
  include "db.php";
  // Get the input value from the forme
  $class = $_POST['course'];
  $level = $_POST['level'];
  $section = $_POST['section']; 
  // Construct the INSERT query
  $query = "INSERT INTO class (course_id, Level, Section) VALUES ('$class', '$level', '$section')";
  
  // Execute the query
  if (mysqli_query($mysqli, $query)) {
    header("Location: class.php");
  } else {
      echo "Error adding record: " . mysqli_error($db);
  }
?>
