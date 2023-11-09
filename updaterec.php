<?php 
include "db.php";



if (isset($_POST['newprog'])) {
   
    $recID = mysqli_real_escape_string($mysqli, $_POST["recID"]);
    $newprog = mysqli_real_escape_string($mysqli, $_POST["newprog"]);

    $sql = "UPDATE courses SET course='$newprog' WHERE id=$recID";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: course.php?success=Program Successfully Updated");
      }
}

$recID = $_GET['recID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>

<style>
    table {
        margin-left: 20%;
    }
    .box {
        margin: auto;
        background-color: #394867;
        width: 30%;
        margin-top: 15%;
        border-radius: 10px;
        padding-bottom: 40px;
    }
    h1 {
        color: #F1F6F9;
        font-size: 40px;
        margin-left: 40%;
        margin-top: 20%;
    }
    input[type="submit"] {
        padding: 5px 20px;
        margin-left: 200px;
        margin-top: 30px;
        background-color: #F1F6F9;
        color: #14274E;
        border-radius: 10px;
        cursor: pointer;
        font-size: 20px;
    }
    .right {
        color: #F1F6F9;
        text-align: right;
    }
</style>
<body>
    <div class="box">

    <h1>Update</h1>
    <form action="updaterec.php" method="post" autocomplete="off">

    <table>
    <tr>
    <input type="number" name="recID" value=<?php echo $recID?> hidden>
    <td class="right">Program: </td>
    <td><input type="text" name="newprog" required></td>
    </tr>
    </table>

    <input type="submit" value="update">
    </div>
    


    </form>
</body>
</html>