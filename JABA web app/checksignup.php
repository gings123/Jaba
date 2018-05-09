<?php
session_start();

require_once("conn.php");

$id=mysqli_real_escape_string($con,$_POST["usn"]);
$password=mysqli_real_escape_string($con,$_POST["password"]);
$fname=mysqli_real_escape_string($con,$_POST["fname"]);
$lname=mysqli_real_escape_string($con,$_POST["lname"]);
$mi=mysqli_real_escape_string($con,$_POST["mi"]);
$email=mysqli_real_escape_string($con,$_POST["email"]);
$repassword=mysqli_real_escape_string($con,$_POST["repassword"]);
$gender=mysqli_real_escape_string($con,$_POST["gender"]);
$status=mysqli_real_escape_string($con,$_POST["status"]);

if($status == 'teacher'){
	$result=mysqli_query($con,"SELECT * FROM tbl_instructor WHERE instructorId='$id'");
	if(mysqli_num_rows($result)>=1)
	{
		header('Location: Signup.php?usn_taken=1');
	}else{
			if($password == $repassword){
						$sql = "INSERT INTO tbl_instructor (fname, lname, mi, email, instructorId,password,gender)
						VALUES ('$fname','$lname','$mi','$email','$id','$password','$gender')";

						if (mysqli_query($connect, $sql)) {
							header('Location: Signup.php?signup_success=1');
						} else {
						    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
						}
			}else{
				header('Location: Signup.php?password_did_not_match=1');

			}
	}
}
if($status == 'student'){
	$result=mysqli_query($con,"SELECT * FROM tbl_student WHERE studentId='$id'");
	if(mysqli_num_rows($con,$result)>=1)
	{
		header('Location: Signup.php?usn_taken=1');
	}else{
			if($password == $repassword){
						$sql = "INSERT INTO tbl_student (fname, lname, mi, email, studentId,password,gender)
						VALUES ('$fname','$lname','$mi','$email','$id','$password','$gender')";

						if (mysqli_query($connect, $sql)) {
							header('Location: Signup.php?signup_success=1');
						} else {
						    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
						}
			}else{
				header('Location: Signup.php?password_did_not_match=1');

			}
	}
}
?>
