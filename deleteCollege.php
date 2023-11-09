<?php 
include "db.php";
$recID = $_GET['recID'];

$sql = "DELETE FROM colleges WHERE college_id=$recID";

if ($mysqli->query($sql) === TRUE) {
    header("Location: college.php?error=Successfully Deleted");
}
?>