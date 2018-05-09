<?php
require_once('conn.php');
$fetched=array();
$query="select distinct job from employee order by job";
$result=mysql_query($query);
if($result)
{
	while($row=mysql_fetch_array($result,MYSQL_NUM))
	{
		array_push($fetched,array('job'=>$row[0]
								  ));
	}
}
echo json_encode($fetched);
?>