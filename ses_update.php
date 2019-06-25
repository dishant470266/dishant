



<?php
session_start();
$servername="localhost";
$username="root";
$dbname="firstdb";

$con= new mysqli($servername,$username,"",$dbname);
if($con->connect_error)
{
    die("connecton failed".$con->connect_error);
}
else
{
echo "successfully connected to database";
echo "<br>";


$id=$_SESSION["id"];

$name=$_POST["name"];
$email=$_POST["email"];
$address=$_POST["address"];
$gender=$_POST["gender"];
$shift=implode(',', $_POST['shift']);
$selectcountry=$_POST["selectcountry"];


$path1 =$_FILES["updatephoto"]["name"];
$upload_directory = "updateimages/";
$TargetPath=$upload_directory.$path1;
//move_uploaded_file($_FILES['photo']['tmp_name'],'$TargetPath');



$sql1="UPDATE users SET name='$name',email='$email',address ='$address',gender='$gender',shift='$shift',selectcountry='$selectcountry' where id='$id' ";
$result1=$con->query($sql1);





if($con->query($sql1)===true)
{   echo "result1";
	if($path1!=null)
	{
	$sql="UPDATE users SET path='$TargetPath' where id='$id'";
    $result=$con->query($sql);

    if($con->query($sql)===true)
       {   echo " result ";
         header("location:ses_login.php ");
       }
    else
       {
           echo "error";
       }

    }
    else
    {
    header("location:ses_login.php ");
    }
}
else
{
	echo "email already registered";
}
}

?>
