<?php
require_once("conn.php");
//Define the query
		$className=mysqli_real_escape_string($con,$_POST['className']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted

    if (isset($_POST['delete'])) {
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
    } else {
        //assume btnSubmit
    }
}
header('Location: class.php?Class_option=1');
?>