<?php
session_start();
if(isset($_SESSION['userid']))
{
    $uid=$_SESSION['userid'];
    echo $uid;
}
else{
    echo "notset";
}

$classid=$_GET['classId'];

$servername = "localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password,"MyDb2");

$sql = "SELECT * FROM `ClassroomInfo` WHERE `ClassId` = $classid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$admin=$row['Admin'];

if($uid==$admin)
{
  header("location: class_content_admin.php?classId=$classid");
}
else{
  header("location: class_content_student.php?classId=$classid");
}

?>

