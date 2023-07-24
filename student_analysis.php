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
	        <p style = "padding: 15px;"><a id='analysis' href="dd_analysis.php">Dual Degree Students</a></p>
	        <p style = "padding: 15px;"><a id='analysis' href="a_analysis.php" style=" font-family:Sans-serif; font-size: 20px;font-weight: bold;" >Affiliated Students</a></p>
	        <p style = "padding: 15px;"> <a id='analysis' href="alumni_analysis.php" style= "font-family:Sans-serif; font-size: 20px;font-weight: bold;">Alumni</a></p>

	    </div>

	</div>

</body>
</html>