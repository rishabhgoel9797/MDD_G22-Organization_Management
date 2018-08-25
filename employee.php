<?php
session_start();
$id=$_SESSION["employee_id"];
if(!isset($_SESSION['employee_id']))
{
  $error="sorry you are not logged in or not registered with us.You will be redirected to signup page.";
  echo "<script type='text/javascript'>alert('$error');window.location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee's View</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
	.vis-container
	{

			max-width:1200px;
			margin:0 auto;
	}
	.panel
	{
		min-height:300px;
	}
	.form-group
	{
		margin:10px;
	}
	.text-center
	{
		margin-top:20%;
		text-decoration: underline;
	}
	.glyphicon
	{
		float:right;
	}
	.glyphicon-ok
	{
		color: green;
	}
	.glyphicon-remove
	{
		color:red;
	}
</style>
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
      <a class="navbar-brand" href="#">Employee's View</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Targets Completed<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">By Date</a></li>
            <li><a href="#">By Title</a></li>
          </ul>
        </li>
        <li><a href="#">Visualizations</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
                    <a href="#">Hello,<?php echo $_SESSION['ngouser'];?>
                        <!-- <span class="menu-icon pull-right hidden-xs showopacity "></span> -->
                    </a>
                </li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span>LogOut</a></li>
        <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
      </ul>
    </div>
  </div>
</nav>

<section class="vis-container">
<div class="row">
<div class="col-md-4">
   <div class="panel panel-danger">
      <div class="panel-heading">Targets to be completed</div>
      <div class="panel-body text-center" style=""><h4>Check List for Targets</h3><small>(Employee's List Will be displayed)</small></div>

    </div>
</div>

<div class="col-md-4">
   <div class="panel panel-warning">
      <div class="panel-heading">Request Holiday</div>
      <form>
        <div class="form-group">
      <label for="holiday_date">Holiday Date</label>
      <input type="date" class="form-control" id="holiday_date" name="holiday_date">
    </div>
    <div class="form-group">
      <label for="reason_holiday">Reason</label>
      <input type="text" class="form-control" id="reason_holiday" placeholder="Enter Reason for holiday" name="reason_holiday">
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary form-control">Submit Request</button>
    </div>
    </form>
    </div>
</div>

<div class="col-md-4">
   <div class="panel panel-primary">
      <div class="panel-heading">Requests(Pending or Approved)</div>
      <div class="panel-body">
      	<h4>Sample Design</h4>
      	<ul>
      	<li>Sister's Marriage Holiday<span class="glyphicon glyphicon-ok"></span></li>
      	<li>Cricket Match<span class="glyphicon glyphicon-remove"></span></li>
      	</ul>

      </div>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-9">

   <div class="panel panel-default" style="margin-left:30%">
      <div class="panel-heading">Enter Suggestion</div>
<form>
        <div class="form-group">
        <h3>Feedback Type</h3>
      <label for="holiday_date">Type</label>
      <select class="form-control">
      	<option value="Feedback">Feedback</option>
      	<option value="Complaint">Complaint</option>
      </select>
    </div>
    <div class="form-group">
      <label for="feed_back">Feedback / Complaint</label>
      <input type="text" class="form-control" id="feed_back" placeholder="Enter Here" name="feed_back">
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary form-control">Submit Feedback</button>
    </div>
    </form>
</div>
</div>
</section>
</body>
</html>