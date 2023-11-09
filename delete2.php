<?php 
include "db.php";
$recID = $_GET['recID'];

$sql = "DELETE FROM subjects WHERE id=$recID";

if ($mysqli->query($sql) === TRUE) {
    header("Location: subject.php?error=Subject Successfully Deleted");
}
?>