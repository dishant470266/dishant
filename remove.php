

<?php

$servername="localhost";
$username="root";
$dbname="firstdb";

$con= new mysqli($servername,$username,"",$dbname);

              $id1 = $_REQUEST['id1'];

		   	  $sql2="DELETE from taskusers where  id='".$id1."'  ";
		   	  $result2=$con->query($sql2);
		   	  if($con->query($sql2)==true)
		   	  {

			    header("location: ses_welcome.php");
			  }

?>
