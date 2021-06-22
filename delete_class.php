<?php
$classid=$_GET['classid'];
echo $classid;

$servername = "localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password,"MyDb2");
$conn2=mysqli_connect($servername,$username,$password,"MyDb2");
$sql="delete from ClassroomInfo where ClassId=$classid";
$result=mysqli_query($conn,$sql);
if($result)
{
    echo "successfully deleted classroom";
}
else{
    echo "classroom not deleted";
}
$sql2="delete from Participants where ClassId=$classid";
$result2=mysqli_query($conn,$sql2);
if($result2)
{
    echo "successfully deleted participants";
}
else{
    echo "participants not deleted";
}

$sql3="select * from polls where ClassId=$classid";
$result3=mysqli_query($conn,$sql3);
if($result3){
while($row3=mysqli_fetch_assoc($result3))
{
    $qid=$row3['QId'];
    echo $qid;
    
    $sql4="delete from poll_options where QId=$qid";
    $result4=mysqli_query($conn2,$sql4);
    if($result4)
    {
        echo "pollOptions deleted";
    }
    else{
        echo "polloptions not delted";
    }

    $sql5="delete from user_response where QId=$qid";
    $result5=mysqli_query($conn2,$sql5);
    if($result5)
    {
        echo "pollresponse deleted";
    }
    else{
        echo "pollresponse not delted";
    }
}
}
$sql6="delete from polls where ClassId=$classid";
$result6=mysqli_query($conn,$sql6);
if($result6)
{
    echo "polls deleted";
    header("location: home.php");
}
else{
    echo "polls not deleted";
}
?>