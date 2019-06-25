<?php

$servername="localhost";
$username="root";
$dbname="firstdb";

$con= new mysqli($servername,$username,"",$dbname);


if($con->connect_error)
    {
       die("connecton failed".$con->connect_error);
    }
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<title></title>
</head>

<body>


<?php


//$sqlinsert = "INSERT INTO jointrecord name,rollno,marks1,marks2,marks3 SELECT student.name, student.rollno , marks.maths, marks.chemistry, marks.physics FROM student INNER JOIN marks on student.rollno=marks.rollno ";


$sql = "SELECT * FROM student INNER JOIN marks on student.rollno=marks.rollno ";

$pass=$con->query($sql);

$sql1 = "SELECT * FROM student CROSS JOIN marks ";

$pass1=$con->query($sql1);

$sql2 = "SELECT * FROM student LEFT JOIN marks on student.rollno=marks.rollno ";

$pass2=$con->query($sql2);

$sql3 = "SELECT * FROM student RIGHT JOIN marks on student.rollno=marks.rollno ";
//$sql3= "SELECT name, rollno, FROM `student` AS  RIGHT JOIN marks AS  ON student.rollno =mask. rollno";

$pass3=$con->query($sql3);

//SELECT *FROM student WHERE 1
//INSERT INTO 'student'(rollno,'name','branch','address') VALUES (12,'raj','cse','qwe')
//SELECT * FROM `marks` WHERE 1
//INSERT INTO `marks`(`rollno`, `maths`, `chemistry`, `physics`) VALUES (12,13,14,15)

/*INSERT INTO marks(rollno,maths,chemistry,physics)
VALUES(1,0,0,0),
      (2,2,2,2),
      (3,3,3,3),

-- insert data for employees table
INSERT INTO student(rollno,name,branch,address)
VALUES(1,'raj','cse','qwe' ),
      (2,'raj','cse','qwe' ),
      (3,'raj','cse','qwe' ),*/


?>



<table border="2px">
    <tr>INNER join </tr>

  <tr>
       <td>Name</td>
       <td>Roll No</td>
       <td>Maths</td>
       <td>Chemistry</td>
       <td>Physics</td>
       <td>Address</td>
       <td>Branch</td>
  </tr>


 <?php while($rowdata=$pass->fetch_assoc()){ ?>



        <tr>
       <td><?php echo $rowdata['name']; ?></td>
       <td><?php echo $rowdata['rollno']; ?></td>
		   <td><?php echo $rowdata['maths']; ?></td>
		   <td><?php echo $rowdata['chemistry']; ?></td>
       <td><?php echo $rowdata['physics']; ?></td>
         <td><?php echo $rowdata['address']; ?></td>
       <td><?php echo $rowdata['branch']; ?></td>

        </tr>



<?php }?>



 </table>

 <table border="2px">
  <tr>cross join </tr>
  <tr>
       <td>Name</td>
       <td>Roll No</td>
       <td>Maths</td>
       <td>Chemistry</td>
       <td>Physics</td>
       <td>Address</td>
       <td>Branch</td>
  </tr>


 <?php while($rowdata1=$pass1->fetch_assoc()){ ?>



        <tr>
       <td><?php echo $rowdata1['name']; ?></td>
       <td><?php echo $rowdata1['rollno']; ?></td>
       <td><?php echo $rowdata1['maths']; ?></td>
       <td><?php echo $rowdata1['chemistry']; ?></td>
       <td><?php echo $rowdata1['physics']; ?></td>
         <td><?php echo $rowdata1['address']; ?></td>
       <td><?php echo $rowdata1['branch']; ?></td>
        </tr>



<?php }?>

</table>

 <table border="2px">
  <tr>left join </tr>
  <tr>
       <td>Name</td>
       <td>Roll No</td>
       <td>Maths</td>
       <td>Chemistry</td>
       <td>Physics</td>
       <td>Address</td>
       <td>Branch</td>
  </tr>


 <?php while($rowdata2=$pass2->fetch_assoc()){ ?>



        <tr>
       <td><?php echo $rowdata2['name']; ?></td>
       <td><?php echo $rowdata2['rollno']; ?></td>
       <td><?php echo $rowdata2['maths']; ?></td>
       <td><?php echo $rowdata2['chemistry']; ?></td>
       <td><?php echo $rowdata2['physics']; ?></td>
        <td><?php echo $rowdata2['address']; ?></td>
       <td><?php echo $rowdata2['branch']; ?></td>
        </tr>



<?php }?>



 </table>

 </table>

 <table border="2px">
  <tr> right join </tr>
  <tr>
       <td>Name</td>
       <td>Roll No</td>
       <td>Maths</td>
       <td>Chemistry</td>
       <td>Physics</td>
       <td>Address</td>
       <td>Branch</td>
  </tr>


 <?php while($rowdata3=$pass3->fetch_assoc()){ ?>



        <tr>
       <td><?php echo $rowdata3['name']; ?></td>
       <td><?php echo $rowdata3['rollno']; ?></td>
       <td><?php echo $rowdata3['maths']; ?></td>
       <td><?php echo $rowdata3['chemistry']; ?></td>
       <td><?php echo $rowdata3['physics']; ?></td>
        <td><?php echo $rowdata3['address']; ?></td>
       <td><?php echo $rowdata3['branch']; ?></td>

        </tr>



<?php }?>



</body>
</html>
