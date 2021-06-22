<HTML>
 <head>
<style>
    #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 70%;
  margin-top: 100px;
  margin-left: 100px;
  margin-right: 100px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:darkgray;
  color: white;
}
.nopost{

font-size: 20px;
color: darkgrey;
    width: 200px;
    border: 1px solid darkgray;
   font-weight: lighter;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 70px;
    box-shadow: 0 10px 40px 0 rgba(0,0,0,0.3);
    
    /* min-height: 570px; */
    /* display: grid;
    grid-template-columns: 100px;  */
    display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: center;
    
}
</style>
</head>
<body>
<?php

$servername = "localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password,"MyDb2");
$qid=$_GET['queid'];
//echo $qid;
$classid=$_GET['classId'];

if(array_key_exists('delbutton',$_POST))
{
    $sql1="delete from polls where QId=$qid";
    $result1=mysqli_query($conn,$sql1);
    if($result1)
    {
        //header("location: class_content.php?classId=$classid");
        echo "pollquestion deleted";
    }
    else{
        echo "not successful";
    }

    $sql4="delete from poll_options where QId=$qid";
    $result4=mysqli_query($conn,$sql4);
    if($result4)
    {
        //header("location: class_content.php?classId=$classid");
        echo "polloption deleted";
    }
    else{
        echo "not successful";
    }


    $sql5="delete from user_response where QId=$qid";
    $result5=mysqli_query($conn,$sql5);
    if($result5)
    {
        header("location: class_content.php?classId=$classid");
        echo "pollresponse deleted";
    }
    else{
        echo "not successful";
    }

}

echo '<div class="nopost">
<center> Want to delete this poll?
<form method="post">
<input type="submit" name="delbutton" value="Click here" />
</form></center>
</div>';


$sql="select * from poll_options where QId=$qid";
$result=mysqli_query($conn,$sql);
echo'<table id="customers">
<tr>
  <th>Option</th>
  <th>Numbers of student who chose the option</th>
</tr>';
while($row = mysqli_fetch_assoc($result))
{
    $option=$row['Option'];
    $number=$row['Numbers'];
  
    echo '<br>';
    echo'
    <tr>
      <td>'.$option.'</th>
      <td>'.$number.'</th>
    </tr>';
}
echo '</table>';



?>
</body>
</HTML>