style.css
<?php

require_once ('process/dbh.php');
$sql = "SELECT * from `user` , `rank` WHERE user.id = rank.eid";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>View Shelf |  Admin Panel | Much Ado About Books</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	<header>
		<nav>
			<h1>Much Ado Aout Books</h1>
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

		<table>
			<tr>

				<th align = "center">User ID</th>
				<th align = "center">Picture</th>
				<th align = "center">Book Name</th>
				<th align = "center">Author Name</th>
				<th align = "center">Series</th>
				<th align = "center">First Published</th>
				<th align = "center">Publisher Name</th>
				<th align = "center">ISBN</th>
				<th align = "center">Language</th>
				<th align = "center">Format</th>
				<th align = "center">Total Pages</th>
				<th align = "center">GoodReads Rating</th>
				<th align = "center">Point</th>
				
				
				<th align = "center">Options</th>
			</tr>

			<?php
				while ($user = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$user['id']."</td>";
					echo "<td><img src='process/".$user['pic']."' height = 60px width = 60px></td>";
					echo "<td>".$user['bookName']."</td>";
					echo "<td>".$user['authorName']."</td>";
					echo "<td>".$user['series']."</td>";
					echo "<td>".$user['firstPublished']."</td>";
					echo "<td>".$user['publisherName']."</td>";
					echo "<td>".$user['isbn']."</td>";
					echo "<td>".$user['language']."</td>";
					echo "<td>".$user['address']."</td>";
					echo "<td>".$user['format']."</td>";
					echo "<td>".$user['totalpages']."</td>";
					echo "<td>".$user['goodreadsrating']."</td>";
					echo "<td>".$user['points']."</td>";

					echo "<td><a href=\"edit.php?id=$user[id]\">Edit</a> | <a href=\"remove.php?id=$user[id]\" onClick=\"return confirm('Are you sure you want to remove it?')\">Remove</a></td>";

				}


			?>

		</table>
		
	
</body>
</html>