<?php
session_start(); 
include "db.php";
?>
<html>
<head>
<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
*{
    margin: 0;
	padding: 0;
	box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body
{
 background-color: white;
}
.box {
  text-align: center;
}
.box table {
  margin: auto;
  text-align: center;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  background-color: #14274E;
  color: #F1F6F9;
}
th, td {
  padding: 10px 20px;
}
td {
  font-size: 20px;
}
th {
  font-size: 40px;
}
p {
  margin-top: 100px;
  font-size: 30px;
  font-weight: 900;
}
.error {
	background: #F2DEDE;
	color: #A94442;
	padding: 5px;
	text-align: center;
  font-size: 25px;
	width: 68%;
  margin-left: 15%;
	border-radius: 5px;
	margin-top: -95px;
	position: absolute;
 }
 .success {
	background: #b6fab6;
	color: green;
	padding: 5px;
	text-align: center;
  font-size: 25px;
	width: 68%;
  margin-left: 15%;
	border-radius: 5px;
	margin-top: -95px;
	position: absolute;
 }

 a {
  text-decoration: none;
 }
 .red a{
  color: #cc5856;
 }
 .green a{
  color: #b6fab6;
 }
</style>

</head>

<body>
    <div class="box">
    <p class="list">List of Accounts</p>
<?php
$sql = "SELECT name, username, id, type, password FROM user ORDER BY id";
$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result) > 0) { ?>


<?php if (isset($_GET['error'])) { ?>
    <em><p class="error"><?php echo $_GET['error']; ?></p></em>
 <?php } ?>

 <?php if (isset($_GET['success'])) { ?>
  <em><p class="success"><?php echo $_GET['success']; ?></p></em>
 <?php } ?>
    <?php
  echo "<table>
    

<tr>
<th>Name</th>
<th>Username</th>
<th>Password</th>
<th>Position</th>
<th colspan=2>Action</th>
</tr>";
  while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  echo "<td>" . $row['type'] . "</td>";

  ?>
  <td class=red><a href="delete.php?recID= <?php echo $id ?>" onclick="return confirm('Are you sure you want to delete this account?');">Delete</a></td>
  <td class=green><a href="update.php?recID= <?php echo $id ?>" onclick="return confirm('Are you sure you want to update this account?');">Update</a></td>

  <?php
  echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

mysqli_close($mysqli);
?>
</div>
</body>

</html>