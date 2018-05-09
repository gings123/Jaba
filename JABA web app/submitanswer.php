<?php
require("conn.php");
	$activityName = mysqli_real_escape_string($con,$_POST['activityName']);
	$answered = mysqli_real_escape_string($con,$_POST['answered']);
	$grade = mysqli_real_escape_string($con,$_POST['corresponding']);
	$studentId = mysqli_real_escape_string($con,$_POST['studentId']);

						$sql = "INSERT INTO grades (activityName,Grade,answered,studentId)
						VALUES ('$activityName','$grade','$answered','$studentId')";
						if (mysqli_query($con, $sql)) {
							header('Location: answerActivity.php?answered');
						} else {
						    echo "Error: " . $sql . "<br>" . mysqli_error($con);
						}
?>