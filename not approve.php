<?php
include('connection.php');
$id=$_GET["id"];
mysqli_query($conn,"update employee_holiday set status='Declined' where holiday_id='$id'");
?>



<script type="text/javascript">
	window.location="employee_holiday.php";
</script>