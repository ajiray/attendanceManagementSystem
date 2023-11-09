<?php 
session_start(); 
include "db.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);
		$sql = "SELECT * FROM user WHERE username='$username' AND password ='$password'";

		$result = mysqli_query($mysqli, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $password) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['faculty_id'] = $row['faculty_id'];
				$_SESSION['type'] = $row['type'];
				$_SESSION['id'] = $row['id'];
				

				if(isset($_SESSION['faculty_id'])){
					$faculty_id = $_SESSION['faculty_id'];

				}

				if(isset($_SESSION['id'])){
					$faculty_id = $_SESSION['id'];

				}
					
				if(isset($_SESSION['type'])){
                    $type = $_SESSION['type'];
					
					$sql = "SELECT type FROM user WHERE type = '$type'";
                    
                    $result = mysqli_query($mysqli, $sql);
            
                    if($type=="admin")
                    {   
                      header("Location: dashboard.php");
                        
                    } else if ($type=="Professor") {
						header("Location: profdb.php");
					} else if ($type=="dean") {
						header("Location: deandb.php");
					} 
                } 
			
		        exit();
            } else{
				header("Location: index.php?error=Incorrect User name or password");
				exit();
			}
		       
			} else{
			header("Location: index.php?error=Incorrect User name or password");
	        exit();
		}
	
}
