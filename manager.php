<!DOCTYPE html>
<html>
<head>
	<title>Manager's View</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
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
      <a class="navbar-brand" href="#">Manager's View</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Employee's Requests<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">By Date</a></li>
            <li><a href="#">By Names</a></li>
            <li><a href="#">By Age</a></li>
          </ul>
        </li>
        <li><a href="#">Targets Completed By Employees</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span>LogOut</a></li>
        <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
      </ul>
    </div>
  </div>
</nav>

<section class="vis-container">
<div class="row">
<div class="col-md-6">
 <div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">Completed Targets</div>
      <div class="panel-body text-center"></div>
    </div>
</div>
</div>

<div class="col-md-6">
 <div class="panel-group">
    <div class="panel panel-warning">
      <div class="panel-heading">Requests from employees</div>
      <div class="panel-body"></div>
    </div>
</div>
</div>

</div>
<div class="row">
<div class="col-md-12">
 <div class="panel-group">
    <div class="panel panel-danger">
      <div class="panel-heading">Number of Resignations</div>
      <div class="panel-body"></div>
    </div>
</div>
</div>



</div>

<div class="row">

<div class="col-md-6">
 <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">Approved Requests</div>
      <div class="panel-body"></div>
    </div>
</div>
</div>

<div class="col-md-6">
 <div class="panel-group">
    <div class="panel panel-danger">
      <div class="panel-heading">Declined Requests</div>
      <div class="panel-body"></div>
    </div>
</div>
</div>

</div>

<div class="row">
<div class="col-md-12">
 <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">Feedbacks by date</div>
      <div class="panel-body"></div>
    </div>
</div>
</div>
</div>
</section>
</body>
</html>