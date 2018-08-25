<?php
//die("hi");
include('connection.php');
$feedback=mysqli_query($conn,"select feedback_type,count(feedback_type) from employee_data group by feedback_type");
$request_dateWise=mysqli_query($conn,"select holiday_date,count(*) from employee_holiday group by holiday_date");
$feedbacktotal=mysqli_query($conn,"select employee_id,count(employee_id),feedback_type from employee_data where feedback_type='Complaint' group by employee_id");
$approverequest=mysqli_query($conn,"select holiday_date,count(holiday_date) from employee_holiday where status='Approve' group by holiday_date");
$declinedrequest=mysqli_query($conn,"select holiday_date,count(holiday_date) from employee_holiday where status='Declined' group by holiday_date");
//die($feedback);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manager's View</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChartFeedback);
      google.charts.setOnLoadCallback(drawChartEmployeeRequests);
      google.charts.setOnLoadCallback(drawChartFeedbackTotal);
      google.charts.setOnLoadCallback(drawChartApprove);
      google.charts.setOnLoadCallback(drawChartDeclined);

      function drawChartFeedback() {

        var data1 = google.visualization.arrayToDataTable([
          ['Feedback Type', 'Count(feedback type)'],
          <?php
          while($row=mysqli_fetch_assoc($feedback))
          {
            echo "['".$row['feedback_type']."',".$row['count(feedback_type)']."],";
          }
          ?>
        ]);
        var options1 = {
          title: 'Feedback Type given by the employees',
          is3D:true
        };
        var chart1 = new google.visualization.PieChart(document.getElementById('feedback_type_chart'));
        chart1.draw(data1, options1);
      }

      function drawChartEmployeeRequests() {

        var data1 = google.visualization.arrayToDataTable([
          ['Holiday Request Date', 'Count(Holiday Request)'],
          <?php
          while($row=mysqli_fetch_assoc($request_dateWise))
          {
            echo "['".$row['holiday_date']."',".$row['count(*)']."],";
          }
          ?>
        ]);
        var options1 = {
          title: 'Number of Holiday Requests Submitted by employees date wise',
        };
        var chart1 = new google.visualization.AreaChart(document.getElementById('holiday_date_wise'));
        chart1.draw(data1, options1);
      }
      function drawChartFeedbackTotal() {

        var data1 = google.visualization.arrayToDataTable([
          ['Complaint', 'Employee ID', 'Number Of Complaints by particular Employee'],
          <?php
          while($row=mysqli_fetch_assoc($feedbacktotal))
          {
            echo "['".$row['feedback_type']."',".$row['employee_id'].",".$row['count(employee_id)']."],";
          }
          ?>
        ]);
        var options1 = {
          title: 'Number of Complaints filed by particular Employee'
        };
        var chart1 = new google.visualization.BubbleChart(document.getElementById('employee_filed_complaints'));
        chart1.draw(data1, options1);
      }
      function drawChartApprove() {

        var data1 = google.visualization.arrayToDataTable([
          ['Date Of Approved Request', 'Number of Requests Approved'],
          <?php
          while($row=mysqli_fetch_assoc($approverequest))
          {
            echo "['".$row['holiday_date']."',".$row['count(holiday_date)']."],";
          }
          ?>
        ]);
        var options1 = {
          title: 'Number of Complaints filed by particular Employee'
        };
        var chart1 = new google.visualization.ColumnChart(document.getElementById('approve_request'));
        chart1.draw(data1, options1);
      }
      function drawChartDeclined() {

        var data1 = google.visualization.arrayToDataTable([
          ['Date Of Declined Request', 'Number of Requests Declined'],
          <?php
          while($row=mysqli_fetch_assoc($declinedrequest))
          {
            echo "['".$row['holiday_date']."',".$row['count(holiday_date)']."],";
          }
          ?>
        ]);
        var options1 = {
          title: 'Number of Complaints filed by particular Employee',
          colors:['red']
        };
        var chart1 = new google.visualization.ColumnChart(document.getElementById('declined_request'));
        chart1.draw(data1, options1);
      }
      </script>


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

<section class="vis-container">
<div class="row">
<div class="col-md-6">
 <div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">Feedback Type</div>
      <div class="panel-body text-center">
            <div id="feedback_type_chart" ></div>
      </div>
    </div>
</div>
</div>

<div class="col-md-6">
 <div class="panel-group">
    <div class="panel panel-danger">
      <div class="panel-heading">Number of Resignations</div>
      <div class="panel-body">
        Line Graph
      </div>
    </div>
</div>
</div>
</div>


<div class="col-md-12">
 <div class="panel-group">
    <div class="panel panel-warning">
      <div class="panel-heading">Requests from employees</div>
      <div class="panel-body">
       <div id="employee_filed_complaints" ></div>
      </div>
    </div>
</div>
</div>


</div>

<div class="row">

<div class="col-md-6">
 <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">Approved Requests</div>
      <div class="panel-body">
        <div id="approve_request" ></div>
      </div>
    </div>
</div>
</div>

<div class="col-md-6">
 <div class="panel-group">
    <div class="panel panel-danger">
      <div class="panel-heading">Declined Requests</div>
      <div class="panel-body">
        <div id="declined_request" ></div>
      </div>
    </div>
</div>
</div>

</div>

<div class="row">
<div class="col-md-12">
 <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">Feedbacks by date</div>
      <div class="panel-body">
         <div id="holiday_date_wise" ></div>
      </div>
    </div>
</div>
</div>
</div>
</section>
</body>
</html>