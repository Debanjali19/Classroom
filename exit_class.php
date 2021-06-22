<?php
session_start();
$uid=$_SESSION['userid'];
echo $uid;
$classid=$_GET['classid'];
echo $classid;
$servername = "localhost";
$username="root";
$password="";
$conn=mysqli_connect($servername,$username,$password,"MyDb2");
    $sql2="DELETE from Participants where UserID=$uid AND ClassId=$classid";
    $result2 = mysqli_query($conn, $sql2);
    if($result2)
    {
        echo 'left the class';
        header("location: home.php");
    }
?>