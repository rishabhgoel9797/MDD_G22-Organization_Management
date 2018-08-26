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
        $resign=$_POST['resign'];
        $resign_explain=$_POST['resign_explain'];
       // die($resign);
        $sql=mysqli_query($conn,"INSERT INTO employee_resignation(employee_id,reason,explanation)VALUES($id,'$resign','$resign_explain')");
        
        if ($sql) 
        {
            $error="Resignation request sent!!";
           echo "<script type='text/javascript'>alert('$error');window.location='employee.php';</script>";
            //echo "Successful";
        }
        else
        {
           
            $error="Resignation request not sent!!";
           echo "<script type='text/javascript'>alert('$error');window.location='employee.php';</script>";
           // echo "not";
        }
    }
?>