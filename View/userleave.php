adminloginwel.php
<?php

require_once ('process/dbh.php');

//$sql = "SELECT * from `user_leave`";
$sql = "Select user.id, user_leave.start, user_leave.end, user_leave.reason, user_leave.status, user_leave.token From user, user_leave Where user.id = user_leave.id order by user_leave.token";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>User Leave | Admin Panel | Much Ado About Books</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
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
	<div id="divimg">
		<table>
			<tr>
				<th>User ID</th>
				<th>Token</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Total Days</th>
				<th>Reason</th>
				<th>Status</th>
				<th>Options</th>
			</tr>

			<?php
				while ($user = mysqli_fetch_assoc($result)) {

				$date1 = new DateTime($user['start']);
				$date2 = new DateTime($user['end']);
				$interval = $date1->diff($date2);
				$interval = $date1->diff($date2);
				//echo "difference " . $interval->days . " days ";

					echo "<tr>";
					echo "<td>".$user['id']."</td>";
					echo "<td>".$user['token']."</td>";
					
					echo "<td>".$user['start']."</td>";
					echo "<td>".$user['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$user['reason']."</td>";
					echo "<td>".$user['status']."</td>";
					echo "<td><a href=\"approve.php?id=$user[id]&token=$user[token]\"  onClick=\"return confirm('Are you sure you want to Approve the request?')\">Approve</a> | <a href=\"cancel.php?id=$user[id]&token=$user[token]\" onClick=\"return confirm('Are you sure you want to Canel the request?')\">Cancel</a></td>";

				}


			?>

		</table>
		
	</div>
</body>
</html>