<?php 
include "db.php";
$recID = $_GET['recID'];

$sql = "DELETE FROM user WHERE id=$recID";

if ($mysqli->query($sql) === TRUE) {
    header("Location: listofuser.php?error=Account Successfully Deleted");
}
?>