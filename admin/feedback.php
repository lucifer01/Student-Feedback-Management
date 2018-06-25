<?php
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	//error_reporting(0);
	$obDBRel->redirect();
?>
<!DOCTYPE html>
	<head>
		<title>Feedback - Admin</title>
		<link rel="stylesheet" type="text/css" href="feedback.css">
	</head>
	<body>
		<header>
			<img src ="../images/tellus-logo.png"/>
			<span>
				<a href="../logout.php">Logout</a>
			</span>
		</header>
		<article>
			<h1>Type of Feedback:</h1>
			<div class=main>
				<div>
					<div class=lnkimg>
						<a href='fullfec.php'><img src="../images/feedback.png"></a>
					</div>
					<div class=shorten>
						<h3>Complete Feedback</h3>
						<p>Click to view all the feedback present in the database.</p>
					</div>
				</div>
				<div>
					<div class=lnkimg>
						<a href='subfed.php'><img src="../images/feedback.png"></a>
					</div>
					<div class=shorten>
						<h3>Filtered Feedback</h3>
						<p>Click to view feedback filtered by Subject.</p>
					</div>
			</div>
		</article>
	</body>
</html>