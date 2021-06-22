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
    box-shadow: 0 30px 30px 0 rgba(0,0,0,0.3);
    
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

$classid=$_GET['classId'];
//echo $classid;
$sql = "SELECT * FROM `ClassroomInfo` WHERE ClassId=$classid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$number=$row['Numbers'];
echo '<div class="nopost">
<center> TOTAL CLASSES: '.$number.'</center>
</div>';

echo '<br>';
echo'<table id="customers">
<tr>
  <th>Student</th>
  <th>Classes attended</th>
</tr>';
$sql = "SELECT * FROM `Participants` WHERE `ClassId` = $classid";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if($num>0){
while($row = mysqli_fetch_assoc($result)){
$userid=$row['UserId'];
$attendance=$row['Attendance'];
$sql2 ="SELECT * FROM `UserInfo` WHERE `UserId` = $userid" ;
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$name=$row2['Name'];
 

echo'
<tr>
  <td>'.$name.'</th>
  <td>'.$attendance.'</th>
</tr>';
echo '<br>'; 

}
echo '</table>';
}

?>
</body>
</HTML>