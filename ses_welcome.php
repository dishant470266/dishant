<?php
session_start();
$id=$_SESSION["id"];

$servername="localhost";
$username="root";
$dbname="firstdb";

$con= new mysqli($servername,$username,"",$dbname);


if($con->connect_error)
    {
       die("connecton failed".$con->connect_error);
    }


$sql="SELECT id,name,email,password,address,gender,shift,selectcountry, path FROM users where id='$id' ";
$result=$con->query($sql);

while($row=$result->fetch_assoc())
    {
        $id= $row['id'];
		$name= $row['name'];
		$email= $row['email'];
		$password= $row['password'];
		$address= $row['address'];
    $gender= $row['gender'];
    $shift= $row['shift'];
    $selectcountry= $row['selectcountry'];


		$path=$row['path'];
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="welcomestyle.css">
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>

    <body>
	    <fieldset name="welcome" border="2px" >
		    <form action="ses_welcome.php" method="post" enctype="multipart/form-data">
	            <div class="aparent">
	                <div class="imgcontainer">
                        <center><img src="<?php echo $path ?> "  alt="Avatar" class="avatar"></center>
                    </div>
                    <div class="container">

                        <h3><b> welcome <?php echo $name ?> ! you are successfully login </b></h3>
                        <h1> users deatail :</h1>
                        <h3> Id: <?php echo $id ?> </h3>
                        <h3> Name: <?php echo $name ?> </h3>
                        <h3> Email: <?php echo $email ?> </h3>
                        <h3> Address: <?php echo $address ?> </h3>
                        <h3> Gender: <?php echo $gender ?> </h3>
                        <h3> Shift: <?php echo $shift ?> </h3>
                        <h3> Selectcountry: <?php echo $selectcountry ?> </h3>
                    </div>
                    <div style="clear:both; font-size:1px;"></div>
                </div>
                <div class="btn">
                    <input type="submit" name="update" value="Update" class="btn btn-warning">
                    <input type="submit" name="logout" value="Log Out"class="btn btn-danger">
                    <input type="submit" name="addtask" value="Add Task"class="btn btn-success">
                </div>

            </form>
        </fieldset>

<?php


if(isset($_POST['update']))
	{
	    header("location: ses_welaction.php");
	}
if(isset($_POST['logout']))
	{
		session_destroy();
		header("location: ses_login.php");
	}
if(isset($_POST['addtask']))
    {
	    header("location: addtask.php");
	}

?>


<table border='1'>
  	<form action="su_ses.php" method="post">
	<tr>
		<th>Title</th><br>
		<th>Assign To</th><br>
		<th>Description</th>
		<th>action</th>

	</tr>

<?php

   $sql1=" SELECT  * FROM taskusers  ";
   $result1=$con->query($sql1);
   //$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
   //var_dump($result1);
   while($row1=$result1->fetch_assoc())
        {
	      ?>

	    <tr>
           <td><?php echo $row1['title']; ?></td>
		   <td><?php echo $row1['assignto']; ?></td>
		   <td><?php echo $row1['description']; ?></td>
           <td><a href="remove.php?id1=<?php echo $row1['id']; ?>">Remove </a>
   <a href="updatetask.php?id=<?php echo $row1['id']; ?>">update</a></td>
        </tr>


<?php
        }
 ?>


</table>
</body>
</html>
