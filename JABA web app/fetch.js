$(document).ready(function()
 {
	$.getJSON("fetch.php",function(data)
	{
		$("#display").empty();
		$.each(data,function()
		{	
			$("#display").append("<tr> <td>"+this['id']
								+"</td><td>"+this['fname']
								+"</td><td>"+this['lname']
								+"</td><td>"+this['email']
								+"</td><td>"+this['gender']
								+"</td><td>"+this['job']
								+"</td><td>"+this['nat']
								+"</td></tr>");
		});
		
	});
	
	$.getJSON("selectjob.php",function(data)
	{
		$("#sel1").empty();
		$.each(data,function()
		{
			$("#sel1").append("<option>"+this['job']+"</option");
	
		});
	});
	
	$("#btnsearch").click(function(){
		x=document.getElementById("sel1").value
		url="filterjob.php?job=".concat(x);
		alert(url);
		$.getJSON(url,function(data)
	{
		$("#display").empty();
		$.each(data,function()
		{
			$("#display").append("<tr> <td>"+this['id']
								+"</td><td>"+this['fname']
								+"</td><td>"+this['lname']
								+"</td><td>"+this['email']
								+"</td><td>"+this['gender']
								+"</td><td>"+this['job']
								+"</td><td>"+this['nat']
								+"</td></tr>");
			});	
		});
	});
});