<?php
session_start();

$con = mysqli_connect("localhost","root","","cs351");

$id=mysqli_real_escape_string($con,$_POST['id']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$status=mysqli_real_escape_string($con,$_POST['status']);

if($status=='teacher'){
		$result=mysqli_query($con,"SELECT * FROM tbl_instructor WHERE instructorId='$id'and password='$password'");
			if(mysqli_num_rows($result)==1)
		{
			session_start();
			$row=mysqli_fetch_array($result);
			$fname=$row['fname'];
			$lname=$row['lname'];
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;
			$_SESSION['instructorId'] = $id;
			header('Location: class.php?');
		}
		else
		{
			header('Location: login.php?login_attemptTeacher=1');
		}
}

else if($status=='student'){
		$result=mysqli_query($con,"SELECT * FROM tbl_student WHERE studentId='$id'and password='$password'");
			if(mysqli_num_rows($result)==1)
		{
			session_start();
			$row=mysqli_fetch_array($result);
			$fname=$row['fname'];
			$lname=$row['lname'];
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;
			$_SESSION['studentId'] = $id;
			header('Location: home.php');
		}
		else
		{
			header('Location: login.php?login_attemptStudent=1');
		}
}
else{
	echo "Error! Something went wrong!";
}
mysqli_close($con);
?>