<?php

require_once ('dbh.php');

$bookName = $_POST['bookName'];
$authorName = $_POST['authorName'];
$series = $_POST['series'];
$firstPublished = $_POST['firstPublished'];
$publisherName = $_POST['publisherName'];
$isbn = $_POST['isbn'];
$language = $_POST['language'];
$format = $_POST['format'];
$totalpages = $_POST['totalpages'];
$goodreadsrating =$_POST['goodreadsrating'];
$files = $_FILES['file'];
$filename = $files['name'];
$filrerror = $files['error'];
$filetemp = $files['tmp_name'];
$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('png' , 'jpg' , 'jpeg');

if(in_array($filecheck, $fileextstored)){

    $destinationfile = 'images/'.$filename;
    move_uploaded_file($filetemp, $destinationfile);

    $sql = "INSERT INTO `user`(`id`,  `bookName`, `authorName`, `series`, `password`, `firstPublished`, `publisherName`, `isbn`, `language`, `format`, `totalpages`, `goodreadsrating`, `pic`) VALUES ('','$bookName','$authorName','$series','1234','$firstPublished','$publisherName','$isbn','$language','$format','$totalpages','$goodreadsrating','$destinationfile')";

$result = mysqli_query($conn, $sql);

$last_id = $conn->insert_id;

$sqlS = "INSERT INTO `highlight`(`id`, `totalbookread`, `totalpages` `year`,) VALUES ('$last_id',0,0,2023)";
$highlightQ = mysqli_query($conn, $sqlS);
$rank = mysqli_query($conn, "INSERT INTO `rank`(`userid`) VALUES ('$last_id')");

if(($result) == 1){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='..//viewuser.php';
    </SCRIPT>");
    //header("Location: ..//adminloginwel.php");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Register')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

}

else{

      $sql = "INSERT INTO `user`(`id`, `bookName`, `authorName`, `series`, `password`, `firstPublished`, `publisherName`, `isbn`, `language`,  `format`, `totalpages`, `goodreadsrating`, `pic`) VALUES ('','$bookName','$authorName','$series','1234','$firstPublished','$publisherName','$isbn','$language','$format','$totalpages','$goodreadsrating','images/no.jpg')";

$result = mysqli_query($conn, $sql);

$last_id = $conn->insert_id;

$sqlS = "INSERT INTO `highlight`(`id`, `totalbookread`, `totalpages`, `year`) VALUES ('$last_id',0,0,2023)";
$highlightQ = mysqli_query($conn, $sqlS);
$rank = mysqli_query($conn, "INSERT INTO `rank`(`userid`) VALUES ('$last_id')");

if(($result) == 1){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='..//viewuser.php';
    </SCRIPT>");
    //header("Location: ..//adminloginwel.php");
}

// else{
//     echo ("<SCRIPT LANGUAGE='JavaScript'>
//     window.alert('Failed to Register')
//     window.location.href='javascript:history.go(-1)';
//     </SCRIPT>");
// }
}

?>