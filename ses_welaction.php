
<?php
session_start();
$id=$_SESSION["id"];
echo $id;
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


		   $sql="SELECT id,name,email,password,address,gender,shift,selectcountry, path FROM users where id='$id' ";
           $result=$con->query($sql);

           $row=$result->fetch_assoc();


		           $name= $row['name'];
		           $email= $row['email'];
		           $password= $row['password'];
		           $address= $row['address'];
               $gender= $row['gender'];
               $shift= $row['shift'];
               $selectcountry= $row['selectcountry'];
		           $path=$row['path'];



	           ?>
				            <html>
							    <head>
									  <link rel="stylesheet" type="text/css" href="welcomestyle.css">
	                            </head>

                                 <body>

	                                   <fieldset name="welcome" border="2px" >
				            		     <form action="ses_update.php" method="post" enctype="multipart/form-data">

                                           <div class="imgcontainer">
                                             <center><img src="<?php echo $path ?> "  alt="Avatar" class="avatar"></center>
                                             <input type="file" name="updatephoto" class="avatar2">



                                           </div>

                                           <div class="container">
                                             <h3><b> welcome <?php echo $name ?> ! you are successfully login </b></h3>
                                             <h1> users deatail :</h1>
                                             <h3> Id: <?php echo $id ?> </h3>
                                              <h3> Name:<input type="text" name="name" value=" <?php echo $name ?> " /></h3>
                                              <h3> Email: <input type="email" name="email"  value="<?php echo $email ?> " /></h3>
                                              <h3> Address:<input type="text" name="address" value=" <?php echo $address ?>"/> </h3>

                                            <h3>  Gender: male <input type="radio" name="gender" value="male" <?php if ($gender=="male"){echo "checked";} ?> >
                                               female <input type="radio" name="gender" value="female" <?php if ($gender=="female"){echo "checked";} ?> ><br><br>


                                              Shift: day <input type="checkbox" name="shift[]" value="day" <?php if ($shift=="day"){echo "checked";} ?>  />
                                               night <input type="checkbox" name="shift[]" value="night" <?php if ($shift=="night"){echo "checked";} ?> /> <br><br>


                                             </tr>
  <Tr>
    <th> SelectCountry</th>
  <Td>
  <select name="selectcountry">
  <option value="">Select Country</option>
  <option <?php if($row['selectcountry']=="india"){echo "selected";}?>>india</option>
  <option <?php if($row['selectcountry']=="uk"){echo "selected";}?>>uk</option>
  <option <?php if($row['selectcountry']=="china"){echo "selected";}?>>china</option>
  <option <?php if($row['selectcountry']=="usa"){echo "selected";}?>>usa</option>
  </select>
  </td>
  </tr>
                                            </div>
                                            <input type="submit" name="done" value="done" >

                                                  </form>
                                 </body>
                               </html>

	<?php    }



 ?>
