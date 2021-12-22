<?php

session_start();
include "../connection.php";
$total_que=0;
$res1=mysqli_query($conn, "select * from questions where category = '$_SESSION[exam_category]'") or die(mysqli_error($conn));
$total_que=mysqli_num_rows($res1); //counts the number of rows
echo $total_que;

?>