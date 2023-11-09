<?php
  // Connect to the database
  include "db.php";
  // Get the input value from the form
  $course = $_POST['course']; 
  // Construct the INSERT query
  $query = "INSERT INTO courses (course) VALUES ('$course')";
  
  // Execute the query
  if (mysqli_query($mysqli, $query)) {
    header("Location: course.php");
  } else {
      echo "Error adding record: " . mysqli_error($db);
  }
?>
