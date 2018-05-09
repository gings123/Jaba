<?php

	$languageID=$_POST["language"];
	if(isset($_FILES["file"]) && isset($_FILES["file"]["name"]) && $_FILES["file"]["name"]!="")
	{
		include "compilers/make.php";
	}
	else
	{
		switch($languageID)
			{
				case "java":
				{
					include_once("compilers/java.php");
					break;
				}
			}
	}
?>
