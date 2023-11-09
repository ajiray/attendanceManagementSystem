<?php 
include "db.php";
$recID = $_GET['recID'];

$sql = "DELETE FROM courses WHERE id=$recID";

if ($mysqli->query($sql) === TRUE) {
    header("Location: course.php?error=Program Successfully Deleted");
}
?>