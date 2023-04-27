adminloginwel.php
<?php
require_once ('process/dbh.php');
$sql = "SELECT id,  points FROM user, rank WHERE rank.userid = user.id order by rank.points desc";
$result = mysqli_query($conn, $sql);
?>


<html>
<head>
	<title>Admin Panel | Much Ado About Books</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
</head>
<body>

	<header>
		<nav>
			<h1>Much Ado About Books</h1>
			<ul id="navli">
				<li><a class="homered" href="adminloginwel.php">HOME</a></li>
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
	<div id="divimg">
		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">User Performance</h2>
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

		<div class="p-t-20">
			<button class="btn btn--radius btn--green" type="submit" style="float: right; margin-right: 60px"><a href="reset.php" style="text-decoration: none; color: white"> Reset Points</button>
		</div>


	</div>
</body>
</html>