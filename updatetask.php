

<?php

$servername="localhost";
$username="root";
$dbname="firstdb";

$con= new mysqli($servername,$username,"",$dbname);

if( isset($_GET['id']))
{
  $id = $_GET['id'];


}


$sql1="SELECT * FROM taskusers where id='$id' ";
$result1=$con->query($sql1);

$row=$result1->fetch_assoc();
   $title=$row['title'];
   $assignto=$row['assignto'];
   $description=$row['description'];

if(isset($_POST['update']))
{







          $sql1="UPDATE taskusers SET title='$_POST[title]',assignto='$_POST[assignto]',description ='$_POST[description]' where id='$id' ";
            if($con->query($sql1)===true)

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
	<title>Update Task</title>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>

<body>

	  <fieldset name=addtask" border="2px" >

  <form action=" " method="post" enctype="multipart/form-data">

        <div class="container">
            <div class="jumbotron">
			<label for="title"><b>Title</b></label>
			<input type="text" name="title" value=" <?php echo $title; ?> " required>


            <label >Assign To<titleel>

            <select name="assignto">

            <option><?php  echo $assignto; ?></option>

            <?php while($rowdata=$users->fetch_assoc()){ ?>

            <option value="<?php echo $rowdata['name'];?>"> <?php echo $rowdata['name'];?>

            </option>

            <?php }?>

            </select>

			<label for="description"><b>Descriptin</b></label>
			<input type="text" name="description" value=" <?php echo $description; ?> " >

			<input type="submit" name="update" value="update"  class="btn btn-primary" >
          </div>

    </form>

  </fieldset>

</body>

</html>
