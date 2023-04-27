adminloginwel.php
<?php

require_once ('process/dbh.php');
$sql = "SELECT * FROM `user` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);


  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $sql = "SELECT * from `user` WHERE id=$id";
  $sql2 = "SELECT totalbookread from `highlight` WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  $result2 = mysqli_query($conn , $sql2);
  $highlight = mysqli_fetch_array($result2);
 
  if($result){
  while($res = mysqli_fetch_assoc($result)){
  $bookName = $res['bookName'];
  $authorName = $res['authorName'];
  $series = $res['series'];
  $firstPublished = $res['firstPublished'];
  $publisherName = $res['publisherName'];
  $isbn = $res['isbn'];
  $language = $res['language'];
  $format = $res['format'];
  $totalpages = $res['totalpages'];
  $goodreadsrating = $res['goodreadsrating'];
  $pic = $res['pic'];
}
}

?>

<html>
<head>
  <title>My Profile | Much Ado About Books</title>
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
        <li><a class="homeblack" href="userloginwel.php?id=<?php echo $id?>"">HOME</a></li>
        <li><a class="homered" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
        <li><a class="homeblack" href="userproject.php?id=<?php echo $id?>"">My Projects</a></li>
        <li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>"">Take a Break</a></li>
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
                    <h2 class="title">My Inforfation</h2>
                    <form method="POST" action="myprofileup.php?id=<?php echo $id?>" >

                        <div class="input-group">
                          <img src="process/<?php echo $pic;?>" height = 150px width = 150px>
                        </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Book Name</p>
                                     <input class="input--style-1" type="text" name="bookName" value="<?php echo $bookName;?>" readonly >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Author Name</p>
                                    <input class="input--style-1" type="text" name="authorName" value="<?php echo $authorname;?>" readonly>
                                </div>
                            </div>
                        </div>





                        <div class="input-group">
                          <p>Series</p>
                            <input class="input--style-1" type="text"  name="series" value="<?php echo $series;?>" readonly>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <p>First Published</p>
                                    <input class="input--style-1" type="text" name="firstPublished" value="<?php echo $firstPublished;?>" readonly>
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Publisher Name</p>
                                  <input class="input--style-1" type="text" name="publisherName" value="<?php echo $publisherName;?>" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                          <p>ISBN</p>
                            <input class="input--style-1" type="number" name="isbn" value="<?php echo $isbn;?>" readonly>
                        </div>

                        <div class="input-group">
                          <p>Language</p>
                            <input class="input--style-1" type="text" name="language" value="<?php echo $language;?>" readonly>
                        </div>

                        
                         <div class="input-group">
                          <p>Format</p>
                            <input class="input--style-1" type="text"  name="format" value="<?php echo $format;?>" readonly>
                        </div>

                        <div class="input-group">
                          <p>Total Pages</p>
                            <input class="input--style-1" type="text" name="totalpages" value="<?php echo $totalpages;?>" readonly>
                        </div>

                        <div class="input-group">
                          <p>GoodReads Rating</p>
                            <input class="input--style-1" type="text" name="goodreadsrating" value="<?php echo $goodreadsrating;?>" readonly>
                        </div>


                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green"  name="send" >Update Info</button>
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