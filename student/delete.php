<?php
    include_once '../connect.php';
    $a  = new DB;
    echo(($_REQUEST['id']));
    if(isset($_REQUEST['id']))
    {
        if($a->Delete('student',$_REQUEST['id']) == true)
        {
            header('location: ../index.php'); 
        }else{
            echo 'delete lỗi';
        }

    }
?>