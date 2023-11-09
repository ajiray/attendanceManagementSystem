<?php
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    header("Location: signup.php?error=Passwords must match");
	exit();
}
$mysqli = require __DIR__ . "/db.php";
$username = $_POST["username"];
$password = $_POST["password"];
$usertype = $_POST["usertype"];
$name= $_POST["name"];
$sql = "SELECT * FROM user WHERE username='$username' ";
		$result = mysqli_query($mysqli, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=Username already used");
	exit();
		}else {
			$query = "SELECT MAX(faculty_id) FROM user WHERE type = 'Professor'";
			$result3 = $mysqli->query($query);
			$row = $result3->fetch_assoc();
			$maxId = $row['MAX(faculty_id)'];

			// Increment the ID value by one
			$newId = $maxId + 1;

			if ($usertype == "Professor"){
				$sql2 = "INSERT INTO faculty(name,username, password) VALUES('$name','$username', '$password')";
			   $result2 = mysqli_query($mysqli, $sql2);
			   if ($result2) {
					header("Location: listofuser.php");
				 
			   }

			   $sql2 = "INSERT INTO user(name,username, password, type, faculty_id) VALUES('$name','$username', '$password', '$usertype', '$newId')";
			   $result2 = mysqli_query($mysqli, $sql2);
			   if ($result2) {
					header("Location: signup.php?success=Successfully Signed Up");
				exit();
			   }
			} 

			$sql2 = "INSERT INTO user(name,username, password, type) VALUES('$name','$username', '$password', '$usertype')";
			$result2 = mysqli_query($mysqli, $sql2);
			if ($result2) {
				 header("Location: signup.php?success=Successfully Signed Up");
			 exit();
			}

         

		
		   else {
	           	header("Location: signupadmin.php?error=unknown error occurred&$user_data");
		        exit();
           }
        }









