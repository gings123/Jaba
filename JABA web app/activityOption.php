<?php
require_once("conn.php");
//Define the query
		    if (isset($_POST['delete'])) {
		    	    $activityName=mysqli_real_escape_string($con,$_POST["activityName"]);
		        		$query = "DELETE FROM activity WHERE activityName = '$activityName' LIMIT 1";

				//sends the query to delete the entry
				mysqli_query ($con,$query);

				if (mysqli_affected_rows($con) == 1) { 
				//if it updated
					header('Location: activity.php?Activity_deleted=1');
				?>
				<?php
				 } else { 
				 header('Location: activity.php?MALI DREW!');
				} 	
		    }
		     if (isset($_POST['view'])) {
		     	$activityName=mysqli_real_escape_string($con,$_POST["activityName"]);
		     	session_start();
		     	$_SESSION['activityName'] = $activityName;
		     	header('Location:activityView.php');

		     }
		    if (isset($_POST['update'])) {
		    	session_start();
		    	$oldActivityName=$_SESSION['activityName'];
				$activityName=mysqli_real_escape_string($con,$_POST["activityName"]);
				$description=mysqli_real_escape_string($con,$_POST["description"]);
				$content=mysqli_real_escape_string($con,$_POST["content"]);
				$input=mysqli_real_escape_string($con,$_POST["input"]);
				$output=mysqli_real_escape_string($con,$_POST["output"]);
				$correspondingGrade=mysqli_real_escape_string($con,$_POST["correspondingGrade"]);
				$class=mysqli_real_escape_string($con,$_POST["class"]);
				$expiry=mysqli_real_escape_string($con,$_POST["expiry"]);
				$instructorId = $_SESSION['instructorId'];

										$sql = "UPDATE activity SET activityName ='$activityName',content='$content',description='$description',input='$input',output='$output',correspondingGrade='$correspondingGrade',className='$class',expiration='$expiry' Where activityName='$oldActivityName'";

										if (mysqli_query($con, $sql)) {
											header('Location: activityView.php?Activity_Updated=1');
										} else {
										    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
										}
						    }
?>