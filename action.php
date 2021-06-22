<?php
$qid=$_GET['queid'];
$classid=$_GET['classId'];
//echo $qid;
$username="root";
$password="";
$conn=mysqli_connect($servername,$username,$password,"MyDb2");

	$userData = count($_POST['name']);
	if ($userData > 0) {
	    for ($i=0; $i <$userData; $i++) { 
		if (trim($_POST['name'] != '')) {
			$name   = $_POST['name'][$i];
            $query="INSERT INTO `poll_options`(`QId`,`OptionId`,`Option`) VALUES ($qid, $i,'$name')";
			$result = mysqli_query($conn, $query);
		  }
	    }
	    echo "options inserted successfully";
		
		//header("location: class_content_admin.php?classId=$classid");
	}else{
	    echo "Unsuccessfull";
	}

?>