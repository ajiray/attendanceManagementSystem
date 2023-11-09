<?php
  // Connect to the database
  include "db.php";
  // Get the input value from the forme

  $class = $_POST['class'];
  $prof = $_POST['prof'];
  $subject = $_POST['subject']; 
  // Construct the INSERT query
  $query = "SELECT MAX(count) FROM class_subject";
			$result3 = $mysqli->query($query);
			$row = $result3->fetch_assoc();
			$maxId = $row['MAX(count)'];

			// Increment the ID value by one
			$newId = $maxId + 1;
  $query2 = "INSERT INTO class_subject (class_id, subject_id, faculty_id, count) VALUES ('$class', '$subject', '$prof', '$newId')";
  
  // Execute the query
  if (mysqli_query($mysqli, $query2)) {
    header("Location: assignprof.php");
  } else {
      echo "Error adding record: " . mysqli_error($db);
  }
?>
