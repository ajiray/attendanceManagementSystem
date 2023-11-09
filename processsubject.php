<?php
  // Connect to the database
  include "db.php";
  // Get the input value from the form
  $subject = $_POST['subject']; 
  // Construct the INSERT query
  $query = "INSERT INTO subjects (subject) VALUES ('$subject')";
  
  // Execute the query
  if (mysqli_query($mysqli, $query)) {
    header("Location: subject.php");
  } else {
      echo "Error adding record: " . mysqli_error($db);
  }
?>
