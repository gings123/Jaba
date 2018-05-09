<?php
require_once('conn.php');
$job=$_GET['job'];
$fetched=array();
$query="select * from employee where job = '$job' ";
$result=mysql_query($query);
if($result)
{
	while($row=mysql_fetch_array($result,MYSQL_NUM))
	{
		array_push($fetched,array('id'=> $row[0],
								  'fname'=>$row[1],
								  'lname'=>$row[2],
								  'email'=>$row[3],
								  'gender'=>$row[4],
								  'job'=>$row[5],
								  'nat'=>$row[6]
								  ));
	}
}
echo json_encode($fetched);
?>