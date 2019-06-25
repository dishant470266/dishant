

<?php

$servername="localhost";
$username="root";
$dbname="firstdb";

$con= new mysqli($servername,$username,"",$dbname);

if(isset($_POST['signup']))
{

   $email=$_POST["email"];

  //
  // $sql1="SELECT $email FROM users";
  //     $result1=$con->query($sql1);
  //
  //
  //     if($result1!=true)
  //     {
		 $name=$_POST["name"];
$gender=$_POST["gender"];

$shift=implode(',', $_POST['shift']);
$selectcountry=$_POST["selectcountry"];
         $password=$_POST["password"];
         $address=$_POST["address"];
         $path1 =$_FILES["photo"]["name"];
          $upload_directory = "images/";
          $TargetPath=$upload_directory.$path1;
          //move_uploaded_file($_FILES['photo']['tmp_name'],"/opt/lampp/htdocs/profileview/images");

         $sql="INSERT INTO users (name,email,password,address,gender,shift,selectcountry, path) VALUES ('$name','$email','$password','$address','$gender','$shift','$selectcountry','$TargetPath')";

         if($con->query($sql)===true)
            {
                 header("location: ses_login.php");
            }

	  // }

	  else
	  {
		  echo "already registered";
	  }

}

?>

<html>
<head>
<title> signup </title>
<link rel="stylesheet" type="text/css" href="signupstyle.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>
<body>
  <fieldset name=signup" border="2px" >

  <form action="su_ses.php" method="post" enctype="multipart/form-data">
        <div class="imgcontainer">
            <input type="file" name="photo" class="avatar">
        </div>
        <br>
        <div class="container">
			<label for="name"><b>Name</b></label>
			<input type="text" placeholder="enter name" name="name" required>

			<label for="email"><b>email</b></label>
			<input type="email" placeholder="enter email" name="email" required>

			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="enter password" name="password" required>

			<label for="address"><b>Address</b></label>
			<input type="text" placeholder="enter address" name="address" required>

      	<label for="gender"><b>Gender</b></label><br>
        <input type="radio" name="gender" value="male"> Male<br>
         <input type="radio" name="gender" value="female"> Female<br><br>

         	<label for="shift"><b>Shift</b></label><br>
          <input type="checkbox" name="shift[]" value="day"> day<br>
          <input type="checkbox" name="shift[]" value="night"> night  <br><br>

          <label for="selectcountry" ><b>selectcountry</label>
<select name="selectcountry" class="btn btn-primary dropdown-toggle data-toggle="dropdown">
          <option value="india">india</option>
        <option value="uk">uk</option>
         <option value="china">china</option>
          <option value="usa">usa</option>
</select >

			<input type="submit" name="signup" >
        </div>
  </form>

</fieldset>
</body>
</html>
