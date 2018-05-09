<?php
require_once("conn.php");
session_start();
//Define the query
		    if (isset($_POST['delete'])) {
		    	    $className=mysqli_real_escape_string($con,$_POST["className"]);
		        		$query = "DELETE FROM class WHERE className = '$className' LIMIT 1";

				//sends the query to delete the entry
				mysqli_query ($con,$query);

				if (mysqli_affected_rows($con) == 1) { 
				//if it updated
					header('Location: class.php?Class_deleted=1');
				?>
				<?php
				 } else { 
				//if it failed

				} 	
		    }
		     if (isset($_POST['view'])) {
		     	$className=mysqli_real_escape_string($con,$_POST["className"]);
		     	session_start();
		     	$classCode=mysqli_real_escape_string($con,$_POST["classCode"]);
		     	session_start();
		     	$_SESSION['className'] = $className;
		     	$_SESSION['classCode'] = $classCode;
		     	header('Location:classView.php');

		     }
		     if (isset($_POST['remove'])) {
		     	$studentId=mysqli_real_escape_string($con,$_POST["studentId"]);
		     	session_start();
		     	$className = $_SESSION['className'];
		        $query = "DELETE FROM joinclass WHERE className = '$className' || studentId = '$studentId' LIMIT 1";
				//sends the query to delete the entry
				mysqli_query ($con,$query);

				if (mysqli_affected_rows($con) == 1) { 
				//if it updated
					header('Location: classView.php?student_removed=1');
				?>
				<?php
				 } else { 
				//if it failed
				}

		     }
		    if (isset($_POST['update'])) {
		    	$className=mysqli_real_escape_string($con,$_POST["className"]);
		    	session_start();
		    	$oldclassName= $_SESSION['className'];
		        		$query2 = "UPDATE class SET className = '$className' WHERE className = '$oldclassName'";
				//sends the query to delete the entry
				mysqli_query ($con,$query2);

				if (mysqli_affected_rows($con) == 1) { 
				//if it updated
					$_SESSION['className'] = $className;
					$query3 = "UPDATE joinclass SET className = '$className' WHERE className = '$oldclassName'";
					mysqli_query ($con,$query3);
					$query3 = "UPDATE activity SET className = '$className' WHERE className = '$oldclassName'";
					mysqli_query ($con,$query3);
					header('Location: classView.php?class_name_updated=1');
				?>
				<?php
				 } else { 
				}
		    }
		   if (isset($_POST['drop'])) {
		   		$studentId=mysqli_real_escape_string($con,$_POST["studentId"]);
		    	$className= $_SESSION['className'];
		    	$query = "UPDATE joinclass SET drop = 'yes' WHERE className = '$className' AND studentId = '$studentId'";
		    	if (mysqli_query($con, $query)) {		
							header('Location: classView.php?drop_success=1');
						} else {
						    echo "Error: " . $query . "<br>" . mysqli_error($connect);
						}
		   }  
?>