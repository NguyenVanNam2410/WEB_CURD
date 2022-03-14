<?php
    include_once '../connect.php';
    $a  = new DB;
    // echo(isset($_GET['id']));
    if(isset($_GET['id']))
    {
        
        if($a->Delete('student',$_GET['id']) == true)
        {
            header('location: ../index.php'); 
        }else{
            echo 'delete lỗi';
        }

    }
?>