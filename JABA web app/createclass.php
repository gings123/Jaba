<?php
session_start();

require_once("conn.php");

function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

$className=mysqli_real_escape_string($con,$_POST["className"]);
$classId= date('m').date('d').date('h').date('i').date('sa');
$classCode = random_string(6);
$instructorId = $_SESSION['instructorId'];
	$result=mysqli_query($con,"SELECT * FROM class WHERE className='$className'");
	if(mysqli_num_rows($result)>=1)
	{
	//echo  "<script type='text/javascript'>alert('Class already exist!');</script>";
		header('Location: class.php?class_error=1');
	}
	else{
						$sql = "INSERT INTO class (className,classId,classCode,instructorId)
						VALUES ('$className','$classId','$classCode','$instructorId')";

						if (mysqli_query($connect, $sql)) {
							header('Location: class.php?class_success=1');
						} else {
						    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
						}
	}
?>
