<?php
require_once("conn.php");
$className=mysqli_real_escape_string($con,$_POST["className1"]);
?>
<html>
<body>
	<input type="hidden" name="className" value="<?php echo $className; ?>">
</body>
</html>