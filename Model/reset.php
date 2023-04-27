<?php 
include("process/dbh.php");
$sql1 = "UPDATE rank SET points = 0";
$sql2 = "UPDATE `highlight` SET `totalpages` = 0, `totalbookread` = 0 ,`year` = 2023";

mysqli_query($conn , $sql1);
mysqli_query($conn , $sql2);

header("Location:adminloginwel.php");
 ?>