<?php

// Connect to the database
include "db.php";

// Get the form data from the POST variables
$class_subject_id = $_POST['class_subject_id'];
$date = $_POST['date'];
$attendance_data = $_POST['attendance'];






$sql = "SELECT * FROM attendance_record WHERE attendance_id='$class_subject_id' AND date ='$date'";

		$result = mysqli_query($mysqli, $sql);

		if (mysqli_num_rows($result) > 0) {
      header("Location: checkattendance.php?error=Record is Already added for this date");
      die();
} else {

foreach ($attendance_data as $student_id => $status) {

  
  $stmt = $mysqli->prepare("INSERT INTO attendance_record (attendance_id, student_id, date, status) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("iiss", $class_subject_id, $student_id, $date, $status);
  $stmt->execute();
}
}

if ($stmt) {
  header("Location: checkattendance.php?success=Record Added");
 
 }

// Close the statement and connection
$stmt->close();
$mysqli->close();

?>
