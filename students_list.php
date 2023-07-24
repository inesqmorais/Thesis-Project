<?php
include("fetch_student_data.php");
?>

<style><?php include 'css/style.css'; ?></style>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="functions.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>


<body class= "students_page">

	<button class= "go_back" onclick="location.href='index.html';">< Back</button>

	<div class="title">
    	<h1 style="font-family:Sans-serif;" class="heading">Student Analytics</h1>
	</div>


	<div class="box-container">
		<div class="box">
	        <p style = "padding: 15px;"><a id='analysis' href="all_students_list.php">All Students list</a></p>
	        <p style = "padding: 15px;"><a id='analysis' href="students.php" style=" font-family:Sans-serif; font-size: 20px;font-weight: bold;" >Students detailed list</a></p>


	    </div>

	</div>

</body>
</html>