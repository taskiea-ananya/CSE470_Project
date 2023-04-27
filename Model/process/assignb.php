<?php

require_once ('dbh.php');

$bookname = $_POST['bookname'];
$authorname = $_POST['authorname'];
$userid = $_POST['userid'];
$subdate = $_POST['duedate'];

$sql = "INSERT INTO `project`(`userid`, `bookname`, `authorname`, `duedate`, `status`) VALUES ('$userid', '$bookname', '$authorname', '$subdate', 'Due')";

$result = mysqli_query($conn, $sql);


if(($result) == 1){
    
    
    header("Location: ..//assignbook.php");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Assign')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}




?>