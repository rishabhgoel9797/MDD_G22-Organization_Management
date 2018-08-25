<?php 

session_start();
$id=$_SESSION["employee_id"];
$_SESSION['message']='';

include('connection.php');

if(!$conn)
{
    die('couldnot connect'.mysqli_connect_error());
}


    if(isset($_POST['submit']))
    {
        $date=$_POST['holiday_date'];
        $reason=$_POST['reason_holiday'];
        //die($reason);
        $sql=mysqli_query($conn,"INSERT INTO employee_holiday(employee_id,holiday_date,holiday_reason)VALUES($id,'$date','$reason')");
        
        if ($sql) 
        {
            $_SESSION['message']="Request Submitted";
        }
        else
        {
           
            $_SESSION['message']="Request Not Submitted";
        }
    }
?>