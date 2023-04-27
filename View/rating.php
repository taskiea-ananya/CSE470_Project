adminloginwel.php
<?php

require_once ('process/dbh.php');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$userid = (isset($_GET['userid']) ? $_GET['userid'] : '');
$sql = "SELECT userid, bookname, duedate, subdate, rating, points, authorName, year, totalpagespages, totalpagesbookread FROM `project` , `rank` ,`user`, `highlight`  WHERE project.userid = $id AND userid = $userid";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

  $userid = mysqli_real_escape_string($conn, $_POST['userid']);
  

  $rating = mysqli_real_escape_string($conn, $_POST['rating']);
  $points = mysqli_real_escape_string($conn, $_POST['points']);
  $year = mysqli_real_escape_string($conn, $_POST['year']);
  $totalpagesbookread = mysqli_real_escape_string($conn, $_POST['totalpagesbookread']);
  $totalpages = mysqli_real_escape_string($conn, $_POST['totalpages']);

  $upPoint = $points+$rating;
  
  $uptotalpagesbookread = $totalpagesbookread;
 
  echo "$uptotalpagesbookread";
  echo "string";
  
 
 $result = mysqli_query($conn, "UPDATE `project` SET `rating`='$rating' WHERE userid=$userid");

 $result = mysqli_query($conn, "UPDATE `rank` SET `points`='$upPoint' WHERE userid=$userid");
 $result = mysqli_query($conn, "UPDATE `highlight` SET `totalpagesbookread`='$uptotalpagesbookread' ,WHERE id=$userid");




 echo ("<SCRIPT LANGUAGE='JavaScript'>
   
    window.location.href='assignbook.php  ';
    </SCRIPT>");

  
}
?>




<?php
  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $userid = (isset($_GET['userid']) ? $_GET['userid'] : '');
  $sql1 = "SELECT userid, project.userid, project.bookname, project.duedate, project.subdate, project.rating, rank.points, highlight.year, highlight.totalpagesbookread, highlight.totalpagespages FROM `project` , `rank` ,`user`, `highlight`  WHERE project.userid = $id AND project.userid = $userid AND project.userid = rank.userid AND highlight.id = project.userid AND user.id = project.userid AND user.id = rank.userid";
  $result1 = mysqli_query($conn, $sql1);
  if($result1){
  while($res = mysqli_fetch_assoc($result1)){
  $bookname = $res['bookname'];
  $duedate = $res['duedate'];
  $subdate = $res['subdate'];
  $rating = $res['rating'];
  $points = $res['points'];
  $year = $res['year'];
  $totalpagesbookread = $res['totalpagesbookread'];
  $totalpages = $res['totalpages'];
  
}
}

?>

<html>
<head>
  <title>Book Rating | Much Ado About Books</title>
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
        <li><a class="homeblack" href="adminloginwel.php">HOME</a></li>
        <li><a class="homered" href="adduser.php">Add Book</a></li>
        <li><a class="homeblack" href="viewuser.php">View Shelf</a></li>
        <li><a class="homeblack" href="assign.php">Assign Book</a></li>
        <li><a class="homeblack" href="assignbook.php">Reading Status</a></li>
        <li><a class="homeblack" href="highlightuser.php">Highlight </a></li> 
        <li><a class="homeblack" href="userleave.php">User Leave</a></li>
        <li><a class="homeblack" href="adminlogin.html">Log Out</a></li>
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
                    <h2 class="title">Book Rating</h2>
                    <form id = "registration" action="rating.php" method="POST">



                        <div class="input-group">
                          <p>Book Name</p>
                            <input class="input--style-1" type="text"  name="bookname" value="<?php echo $bookname;?>" readonly>
                        </div>
                       
                        
                        <div class="input-group">
                          <p>Author Name</p>
                            <input class="input--style-1" type="text" name="authorName" value="<?php echo $authorName;?>" readonly>
                        </div>

                       


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Due Date</p>
                                     <input class="input--style-1" type="text" name="duedate" value="<?php echo $duedate;?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Submission Date</p>
                                    <input class="input--style-1" type="text"  name="subdate" value="<?php echo $subdate;?>" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="input-group">
                          <p>Assign Rating</p>
                            <input class="input--style-1" type="text"  name="rating" value="<?php echo $rating;?>">
                        </div>

                       
                        <input type="hidden" name="userid" id="textField" value="<?php echo $userid;?>" required="required">
                         <input type="hidden" name="points" id="textField" value="<?php echo $points;?>" required="required">
                        <input type="hidden" name="year" id="textField" value="<?php echo $year;?>" required="required">
                        <input type="hidden" name="totalpagesbookread" id="textField" value="<?php echo $totalpagesbookread;?>" required="required">
                        <input type="hidden" name="totalpages" id="textField" value="<?php echo $totalpages;?>" required="required">
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Assign Rating</button>
                        </div>
                        
                    </form>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>


</body>
</html>