

<?php
session_start();



 ?>
<!DOCTYPE html>
<html>
<head>
<title> login </title>
<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>


  <fieldset name="login" border="2px" >

  <form action="ses_login.php" method="post">
        <div class="imgcontainer">
             <img src="avtr.jpeg" alt="Avatar" class="avatar">
        </div>
        <br>
        <div class="container">
			<label for="email"><b>email</b></label>
			<input type="email" placeholder="enter email" name="email" required>

			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="enter password" name="password" required>
		     <input type="submit" name="login" value="login" >
        </div>
  </form>

</fieldset>
</div>
</body>
</html>

<?php
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
	$email=null;
	$password=null;
if(isset($_POST['login']))
{
	  $email=$_POST["email"];
	  $password=$_POST["password"];
	  $sql1="SELECT id,email,password FROM users where email='$email' AND password='$password' ";
      $result1=$con->query($sql1);

      if($result1==true)
      {
		  $row=$result1->fetch_assoc();
		  $_SESSION["id"]=$row["id"];
		    header("location: ses_welcome.php");


	  }
	  else
	  {
		  echo "incorrect email or password";
	  }
}
}
?>
