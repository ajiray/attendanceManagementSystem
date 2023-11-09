<?php
  // Connect to the database
  include "db.php";
  // Get the input value from the form
  $collegeName = $_POST['inputCollege']; 
 
   // Construct the INSERT query
   $query = "INSERT INTO colleges (college_name) VALUES ('$collegeName')";

  // Execute the query
  if (mysqli_query($mysqli, $query)) {
    header("Location: college.php");
  } else {
      echo "Error adding record: " . mysqli_error($db);
  }
?>
