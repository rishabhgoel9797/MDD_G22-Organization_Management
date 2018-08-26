<!DOCTYPE html>
<html>
<head>
	<title>Resignation By Employees</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="manager.php">Manager's View</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="employee_holiday.php">Holiday Requests by employees</a></li>
      <li><a href="list_feedback.php">Feedbacks by employees</a></li>
        <li><a href="resignationview.php">Resignation By Employees</a></li>
      </ul>
     
    </div>
  </div>
  </nav>
<div class="container">
<h1>Resignation by Employees</h1>
<table class="table table-bordered">
	<div class="table responsive">
	<thead>
	<tr>
	<th>Employee ID</th>
	<th>Resignation Reason</th>
	<th>Resignation Explanation</th>
	</tr>
	</thead>
	<tbody>
	<?php
	include('connection.php');
$sql=mysqli_query($conn,"select * from  employee_resignation");
$count=mysqli_num_rows($sql);
if(mysqli_num_rows($sql)>0)
{
	while($row=mysqli_fetch_assoc($sql))
	{
		
		echo "<tr>".
		"<td>".$row["employee_id"]."</td>".
		"<td>".$row["reason"]."</td>".
		"<td>".$row["explanation"]."</td>".
		"</tr>";
	}
}
else
{
	echo "no results";
}
mysqli_close($conn);
	?>
	</tbody>
	</div>
</table>
</div>
</body>
</html>