<!DOCTYPE HTML>
<html>
	<head>
		<title>Book Library</title>
	</head>
	<body>
		<center>
			<h1>Welcome to Online Book Library</h1>
			<table border="1">
				<tr>
					<th>Book Cover</th>
					<th>Book Info</th>
				</tr>
 <?php
  $host='group57.cvsxtry4bue3.us-east-1.rds.amazonaws.com';
  $user= 'admin';
  $pass='bcugroup57';
  $db='bkldb';
  
  $conn= new mysqli($host, $user, $pass, $db) or die ("Failed to Connect to DB: %s\n". $conn -> error);
  
  $sql = "SELECT * FROM `Books`";
  $query = $conn->query($sql);
  while($result = $query -> fetch_array(MYSQLI_ASSOC))
  {
	  $file_name = $result['ISBN'] . ".jpg";
	  $isbn = "ISBN: " . $result['ISBN'];
	  $title = "Title: " . $result['Title'];
	  $auth = "Author: " . $result['Author'];
	  $publisher = "Publisher: " . $result['Publisher'];
	  $pub_year = "Publishing Year: " . $result['Pub_year'];
	  
	  echo "<tr>";
	  echo "<td><img src=\"images\\$file_name\" alt=\"BookCover\" /></td>";
	  echo "<td>
				<div>$isbn</div>
				<div>$title</div>
				<div>$auth</div>
				<div>$publisher</div>
				<div>$pub_year</div>
				
	        </td>";
		
	  echo "</tr>";
	  
  }
  ?>
			</table>
		</center>
	</body>
</html>