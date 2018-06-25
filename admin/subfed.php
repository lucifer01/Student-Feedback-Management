<?php
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	$obDBRel->redirect();
	error_reporting(0);
	
	//Function for Dropdown menu
	function abc(){
		$obDBRel = new DBRel;

		//Connecting PHP with DBMS and Obtaining Result of a query
		$conn = $obDBRel->DBConn();

		if ($conn->connect_error)
			die("Connection failed: " . $conn->connect_error);
	
		$sql = "SELECT Sub_Name FROM Subject";
		$result = $conn->query($sql);
		
		//Inserting values in dropdown
		echo "<select name='SUB'>";
		echo "<option value='subject'>Subject</option>";

		if ($result->num_rows > 0)
			while ($row = $result->fetch_assoc())
				echo "<option value='" . $row['Sub_Name'] . "'>" . $row['Sub_Name'] . "</option>";
		else
			echo "0 results";
		echo "</select>";
		
		//Saving Resource
		$conn->close();
	}
?>
<!DOCTYPE html>
	<head>
		<title>Feedback - Admin</title>
		<link rel="stylesheet" type="text/css" href="subfed.css">
	</head>
	<body>
		<header>
			<img src ="../images/tellus-logo.png"/>
			<span>
				<a href="../logout.php">Logout</a>
			</span>
		</header>
		<article>
			<form action="subfed.php" method=POST>
				<div class=input>
					<?php abc(); ?>
					<button type=submit>Show</button>
				</div>
				<div class=output>
					<?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$sql="Select * from feedback where Sub_Name='".$_POST['SUB']."'";
						$result = $conn->query($sql);


						if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							
							if($result->num_rows > 0){
								echo "<table class=slist>";
								echo "<tr>";
								echo 	"<th>Feedback No.</td>";
								echo 	"<th>Roll No.</td>";
								echo 	"<th>Subject Name</td>";
								echo 	"<th>Feedback</td>";
								echo "</tr>";
								while($row = $result->fetch_assoc()){
									echo "<tr>";
									echo 	"<td>" . $row["Fed_No"] . "</td>";
									echo 	"<td>" . $row["Roll_No"] . "</td>";
									echo 	"<td>" . $row["Sub_Name"] . "</td>";
									echo 	"<td>" . $row["Feedback"] . "</td>";
									echo "</tr>";
								}	
							}
							else
								echo "<div align='center' style='font-size:20px'>No Feedback submitted.</div>";
						}

						else
							echo "<div align='center' style='font-size:20px'>No Feedback submitted.</div>";

						echo "</table>";

						$conn->close();
					?>
				</div>
			</form>
		</article>
	</body>
</html>