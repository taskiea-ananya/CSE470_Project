adminloginwel.php
<?php

require_once ('process/dbh.php');
$sql = "SELECT * FROM `user` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$bookname = mysqli_real_escape_string($conn, $_POST['bookName']);
	$authorname = mysqli_real_escape_string($conn, $_POST['authorName']);
	$series = mysqli_real_escape_string($conn, $_POST['series']);
	$firstpublished = mysqli_real_escape_string($conn, $_POST['firstPublished']);
	$publishername = mysqli_real_escape_string($conn, $_POST['publisherName']);
	$isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
	$language = mysqli_real_escape_string($conn, $_POST['language']);
	$format = mysqli_real_escape_string($conn, $_POST['format']);
	$totalpages = mysqli_real_escape_string($conn, $_POST['totalpages']);
	$goodreadsrating = mysqli_real_escape_string($conn, $_POST['goodreadsrating']);
	//$highlight = mysqli_real_escape_string($conn, $_POST['highlight']);





	// $result = mysqli_query($conn, "UPDATE `user` SET bookName`='$bookname',`authorName`='$authorname',`series`='$series',`firstPublished`='$firstpublished',`publisherName`='$publishername',`isbn`='$isbn',`language`='$language',`highlight`='$highlight',`format`='$format',`totalpages`='$totalpages',`goodreadsrating`='$goodreadsrating' WHERE id=$id);


$result = mysqli_query($conn, "UPDATE `user` SET `bookName`='$bookname',`authorName`='$authorname',`series`='$series',`firstPublished`='$firstpublished',`publisherName`='$publishername',`isbn`='$isbn',`language`='$language',`format`='$format',`totalpages`='$totalpages',`goodreadsrating`='$goodreadsrating' WHERE id=$id");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='viewuser.php';
    </SCRIPT>");



}
?>




<?php
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	$sql = "SELECT * from `user` WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
	$bookname = $res['bookName'];
	$authorname = $res['authorName'];
	$series = $res['series'];
	$firstpublished = $res['firstPublished'];
	$publishername = $res['publisherName'];
	$isbn = $res['isbn'];
	$language = $res['language'];
	$format = $res['format'];
	$totalpages = $res['totalpages'];
	$goodreadsrating = $res['goodreadsrating'];

}
}

?>

<html>
<head>
	<title>View user |  Admin Panel | Much Ado About Books</title>
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>
<body>
	<header>
		<nav>
			<h1>Much Ado About Books</h1>
			<ul id="navli">
				<li><a class="homeblack" href="index.html">HOME</a></li>
				<li><a class="homeblack" href="adduser.php">Add a Book</a></li>
				<li><a class="homered" href="viewuser.php">View Shelf</a></li>
				<li><a class="homeblack" href="userlogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<div class="divider"></div>


		<!-- <form id = "registration" action="edit.php" method="POST"> -->
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Update User Info</h2>
                    <form id = "registration" action="edit.php" method="POST">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" name="bookName" value="<?php echo $bookname;?>" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="authorName" value="<?php echo $authorname;?>">
                                </div>
                            </div>
                        </div>





                        <div class="input-group">
                            <input class="input--style-1" type="text"  name="series" value="<?php echo $series;?>">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="firstPublished" value="<?php echo $firstPublished;?>">

                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
									<input class="input--style-1" type="text" name="publishrName" value="<?php echo $publisherName;?>">
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" name="isbn" value="<?php echo $isbn;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="language" value="<?php echo $language;?>">
                        </div>


                         <div class="input-group">
                            <input class="input--style-1" type="text"  name="format" value="<?php echo $format;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" name="totalpages" value="<?php echo $totalpages;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="goodreadsrating" value="<?php echo $goodreadsrating;?>">
                        </div>
                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


     <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>


    <script src="js/global.js"></script> -->
</body>
</html>