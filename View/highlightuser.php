adminloginwel.php
<?php

require_once ('process/dbh.php');
$sql = "SELECT user.id,highlight.year,highlight.totalpages,highlight.totalbookread from user,`highlight` where user.id=highlight.id";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Highlight Table | Much Ado About Books</title>
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
		
	</div>
	
	<table>
			<tr>
				<th align = "center">Use ID</th>				
				
				<th align = "center">Year</th>
				<th align = "center">Totalpges</th>
				<th align = "center">Totalbookread</th>
				
				
			</tr>
			
			<?php
				while ($user = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$user['id']."</td>";
					
					echo "<td>".$user['year']."</td>";
					echo "<td>".$user['totalpages']." %</td>";
					echo "<td>".$user['totalbookread']."</td>";
					
					

				}


			?>
			
			</table>
</body>
</html>