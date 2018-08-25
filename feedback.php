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
        $type=$_POST['type'];
        $feed_back=$_POST['feed_back'];
        $sql=mysqli_query($conn,"INSERT INTO employee_data(employee_id,feedback_type,feedback_reason)VALUES($id,'$type','$feed_back')");
        
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