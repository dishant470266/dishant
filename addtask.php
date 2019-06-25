<?php

session_start();

$servername="localhost";
$username="root";
$dbname="firstdb";

$con= new mysqli($servername,$username,"",$dbname);

$assignto=$_SESSION["id"];
$sql1="SELECT name FROM users where id='$assignto' ";
$result1=$con->query($sql1);
$row=$result1->fetch_assoc();
$name=$row['name'];
if(isset($_POST['add']))
{


   $title=$_POST["title"];
   $assignto=$_POST["assignto"];
   $description=$_POST["description"];
   $_SESSION["assignto"]=$_POST["assignto"];




         $sql="INSERT INTO taskusers (title,assignto,description) VALUES ('$title','$assignto','$description')";

         if($con->query($sql)===true)
            {
                   header("location: ses_welcome.php");
            }


}


//include 'dbconfig.php';

$sqldata = "SELECT * FROM users";

$users =$con->query($sqldata);



?>



<html >

<head>
	<title>Add Task</title>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>

	  <fieldset name=addtask" border="2px" >

  <form action="addtask.php" method="post" enctype="multipart/form-data">

        <div class="container">

  <div class="jumbotron">
			<h3><label for="title"><b>Title</b></label>
			<input type="text" placeholder="Title" name="title" required></h3>


          <h3>  <label >Assign To</label>

            <select name="assignto">

            <option>---Select User---</option></h3>

            <?php while($rowdata=$users->fetch_assoc()){ ?>

            <option value="<?php echo $row['name'];?>"> <?php echo $rowdata['name'];?>

            </option>

            <?php }?>

            </select>

			<h3><label for="description"><b>Descriptin</b></label>
		<input type="text" placeholder="about task" name="description" ></h3>

			<h3><input type="submit" name="add" value="Add" class="btn btn-primary"></h3>
          </div>
</div>
    </form>

  </fieldset>

</body>

</html>
