adminloginwel.php
<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	 $sql1 = "SELECT * FROM `user` where id = '$id'";
	 $result1 = mysqli_query($conn, $sql1);
	 $usern = mysqli_fetch_array($result1);
	 $userName = ($usern['1234']);

	$sql = "SELECT id,  points FROM user, rank WHERE rank.userid = user.id order by rank.points desc";
	$sql1 = "SELECT `bookname`, `duedate` FROM `project` WHERE userid = $id and status = 'Due'";

	$sql2 = "Select * From user, user_leave Where user.id = $id and user_leave.id = $id order by user_leave.token";

	$sql3 = "SELECT * FROM `highlight` WHERE id = $id";

//echo "$sql";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
?>



<html>
<head>
	<title>User Panel | Much Ado About Books</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>
<body>
	
	<header>
		<nav>
			<h1>Much Ado About Books</h1>
			<ul id="navli">
				<li><a class="homered" href="userloginwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a class="homeblack" href="userproject.php?id=<?php echo $id?>"">My Books</a></li>
				<li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>"">Take a Break</a></li>
				<li><a class="homeblack" href="userlogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">
	<div>
		<!-- <h2>Welcome <?php echo "$id"; ?> </h2> -->

		    	<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">User Leaderboard </h2>
    	<table>

			<tr bgcolor="#000">
				<th align = "center">Sequence</th>
				<th align = "center">User ID</th>
				<th align = "center">Points</th>
				

			</tr>

			

			<?php
				$seq = 1;
				while ($user = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$sequence"</td>";
					echo "<td>".$user['id']."</td>";
					
					echo "<td>".$user['points']."</td>";
					
					$sequence+=1;
				}


			?>

		</table>
   
    	<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Due Reads</h2>
    	

    	<table>

			<tr>
				<th align = "center">Book Name</th>
				<th align = "center">Due Date</th>
				
			</tr>

			

			<?php
				while ($user1 = mysqli_fetch_assoc($result1)) {
					echo "<tr>";
					
					echo "<td>".$user1['bookname']."</td>";
					
					echo "<td>".$user1['duedate']."</td>";

				}


			?>

		</table>



		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Highlight</h2>
    	

    	<table>

			<tr>
				
				<th align = "center">Year</th>
				<th align = "center">Total Books Read</th>
				<th align = "center">Total Pages</th>
				
			</tr>

			

			<?php
				while ($user = mysqli_fetch_assoc($result3)) {
					

					echo "<tr>";
					
					
					echo "<td>".$user['year']."</td>";
					echo "<td>".$user['totalbooksread']." %</td>";
					echo "<td>".$user['totalpages']."</td>";
					
				}


				


			?>

		</table>










		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Leave Satus</h2>
    	

    	<table>

			<tr>
				
				<th align = "center">Start Date</th>
				<th align = "center">End Date</th>
				<th align = "center">Total Days</th>
				<th align = "center">Reason</th>
				<th align = "center">Status</th>
			</tr>

			

			<?php
				while ($user = mysqli_fetch_assoc($result2)) {
					$date1 = new DateTime($user['start']);
					$date2 = new DateTime($user['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);

					echo "<tr>";
					
					
					echo "<td>".$user['start']."</td>";
					echo "<td>".$user['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$user['reason']."</td>";
					echo "<td>".$user['status']."</td>";
					
				}


				


			?>

		</table>




   
<br>
<br>
<br>
<br>
<br>







	</div>


		</h2>


		
		
	</div>
</body>
</html>