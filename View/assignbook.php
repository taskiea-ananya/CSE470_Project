adminloginwel.php
<?php

require_once ('process/dbh.php');
$sql = "SELECT * from `project` order by subdate desc";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Reading Status |  Admin Panel | Much Ado About Books</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	<header>
		<nav>
			<h1>Much Ado About Books</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>
				<li><a class="homered" href="adduser.php">Add Book</a></li>
                <li><a class="homeblack" href="viewuser.php">View Shelf</a></li>
                <li><a class="homeblack" href="assign.php">Assign Book</a></li>
                <li><a class="homeblack" href="assignbook.php">Reading Status</a></li>
                <li><a class="homeblack" href="highlightuser.php">Highlight </a></li> 
                <li><a class="homeblack" href="userleave.php">User Leave</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>

		<table>
			<tr>

				<th align = "center">User ID</th>
				<th align = "center">Book Name</th>
				<th align = "center">ISBN</th>
				<th align = "center">Due Date</th>
				<th align = "center">Submission Date</th>
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
					echo "<td><a href=\"rating.php?id=$user[userid]&isbn=$user[isbn]\">Rating</a>"; 

				}


			?>

		</table>
		
	
</body>
</html>