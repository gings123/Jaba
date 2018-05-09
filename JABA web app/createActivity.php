<?php
require_once("conn.php");
session_start();

function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}
$d=strtotime("tomorrow");
$activityName=mysqli_real_escape_string($con,$_POST["activityName"]);
$createDate= date('y/m/d h:i:s');
$description=mysqli_real_escape_string($con,$_POST["description"]);
$content=mysqli_real_escape_string($con,$_POST["content"]);
$input=mysqli_real_escape_string($con,$_POST["input"]);
$output=mysqli_real_escape_string($con,$_POST["output"]);
$correspondingGrade=mysqli_real_escape_string($con,$_POST["correspondingGrade"]);
$class=mysqli_real_escape_string($con,$_POST["class"]);
$expiry=mysqli_real_escape_string($con,$_POST["expiry"]);
$activityId=random_string(10);
$instructorId = $_SESSION['instructorId'];

$result=mysqli_query($con,"SELECT * FROM activity WHERE activityId='$activityId'");
	if(mysqli_num_rows($result)>=1)
	{
		header('Location: activity.php?activity_error=1');
	}
	else{
						$sql = "INSERT INTO activity (activityName,activityId,content,createDate,description,input,output,correspondingGrade,className,expiration)
						VALUES ('$activityName','$activityId','$content','$createDate','$description','$input','$output','$correspondingGrade','$class','$expiry')";

						if (mysqli_query($con, $sql)) {
							$sql1 = "INSERT INTO activitycreated (activityName,instructorId)
						VALUES ('$activityName','$instructorId')";
						mysqli_query($con, $sql1);
							header('Location: activity.php?activity_success=1');
						} else {
						    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
						}
	} 
?>
