<!DOCTYPE html>
<html>
<head>
	<title>Employee Holiday requests</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <!-- <li><a href="#">Targets Completed By Employees</a></li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span>LogOut</a></li>
        <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
      </ul>
    </div>
  </div>
  </nav>
  <div class="container">
<table class="table table-bordered">
	<div class="table responsive">
	<thead>
	<tr>
	<th>Holiday ID</th>
	<th>Employee Id</th>
	<th>Holiday Date</th>
	<th>Holiday Reason</th>
	<th>Status</th>
	</tr>
	</thead>
	<tbody>
	<h1>Pending Holiday Approval Requests</h1>
	<?php
	include('connection.php');
$sql=mysqli_query($conn,"select * from  employee_holiday where status='Pending'");
$count=mysqli_num_rows($sql);
if(mysqli_num_rows($sql)>0)
{
	while($row=mysqli_fetch_assoc($sql))
	{
		
		echo "<tr>".
		"<td>".$row["holiday_id"]."</td>".
		"<td>".$row["employee_id"]."</td>".
		"<td>".$row["holiday_date"]."</td>".
		"<td>".$row["holiday_reason"]."</td>".
		"<td>".$row["status"]."</td>".
		"<td><a href='approve.php?id=".$row["holiday_id"]."'>Approve</a></td>".
		"<td><a href='not approve.php?id=".$row["holiday_id"]."'>Decline</a></td>".
		//'<td><button class="btn btn-primary btn-modal" onclick="modalname()">Donate</button></td>'.
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

<div class="row">
<div class="col-md-6">
   <div class="panel panel-primary">
      <div class="panel-heading">Approved Requests(Latest 5)</div>
      <div class="panel-body">
      	  <table class="table table-bordered">
  <div class="table responsive">
  <thead>
  <tr>
  <th>Holiday Request Date</th>
  <th>Holiday Reason</th>
  </tr>
  </thead>
  <tbody>
      <?php
      include('connection.php');
      $decline=mysqli_query($conn,"select * from employee_holiday where status='Approve' order by 'DESC' limit 5");
      $count=mysqli_num_rows($decline);
if(mysqli_num_rows($decline)>0)
{
  while($row=mysqli_fetch_assoc($decline))
  {
    
    echo "<tr>".
    "<td>".$row["holiday_date"]."</td>".
    "<td>".$row["holiday_reason"]."</td>".
    //'<td><button class="btn btn-primary btn-modal" onclick="modalname()">Donate</button></td>'.
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
    </div>
</div>
<div class="col-md-6">
   <div class="panel panel-danger">
      <div class="panel-heading">Declined Reuests(Latest 5)</div>
      <div class="panel-body">
      <table class="table table-bordered">
  <div class="table responsive">
  <thead>
  <tr>
  <th>Holiday Request Date</th>
  <th>Holiday Reason</th>
  </tr>
  </thead>
  <tbody>
      <?php
      include('connection.php');
      $decline=mysqli_query($conn,"select * from employee_holiday where status='Declined' order by 'DESC' limit 5");
      $count=mysqli_num_rows($decline);
if(mysqli_num_rows($decline)>0)
{
  while($row=mysqli_fetch_assoc($decline))
  {
    
    echo "<tr>".
    "<td>".$row["holiday_date"]."</td>".
    "<td>".$row["holiday_reason"]."</td>".
    //'<td><button class="btn btn-primary btn-modal" onclick="modalname()">Donate</button></td>'.
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
    </div>
</div>


</div>
</div>
</body>
</html>