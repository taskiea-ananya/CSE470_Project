<?php

require_once ('process/dbh.php');
//$id = (isset($_GET['id']) ? $_GET['id'] : '');
$bookname = $_GET['bookname'];
$id = $_GET['id'];
$date = date('Y-m-d');
//echo "$date";
$sql = "UPDATE `project` SET `subdate`='$date',`status`='Submitted' WHERE bookname = '$bookname';";
$result = mysqli_query($conn , $sql);
header("Location: userproject.php?id=$id");
?>