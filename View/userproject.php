adminloginwel.php
<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$sql = "SELECT * FROM `project` where userid = '$id'";
	$result = mysqli_query($conn, $sql);
	
?>



<html>
<head>
	<title>User Panel | Much Ado About Books</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>Much Ado About Books</h1>
			<ul id="navli">
				<li><a class="homeblack" href="userloginwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a class="homered" href="userproject.php?id=<?php echo $id?>"">My Books</a></li>
				<li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>"">Take a Break</a></li>
				<li><a class="homeblack" href="userlogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">


		<table>
			<tr>

				<th align = "center">User ID</th>
				<th align = "center">Book Name</th>
				<th align = "center">ISBN</th>
				<th align = "center">Due Date</th>
				<th align = "center">Sub Date</th>
				<th align = "center">Rating</th>
				<th align = "center">Status</th>
				<th align = "center">Option</th>
			</tr>

			<?php
				while ($user = mysqli_fetch_assoc($result)) {

					echo "<tr>";
					echo "<td>".$user['userid']."</td>";
					echo "<td>".$user['bookname']."</td>";
					echo "<td>".$user['isbn']."</td>";
					echo "<td>".$user['duedate']."</td>";
					echo "<td>".$user['subdate']."</td>";
					echo "<td>".$user['rating']."</td>";
					echo "<td>".$user['status']."</td>";
					

					 echo "<td><a href=\"psubmit.php?userid=$user[userid]&id=$user[isbn]\">Submit</a>";

				}


			?>

		</table>

		</body>
</html>