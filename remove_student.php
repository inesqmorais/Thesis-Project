<?php
include("fetch_add_student.php");
?>

<style><?php include 'css/style.css'; ?></style>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="functions.js"></script>

</head>

<body class= "students_page">

	<button class= "go_back" onclick="location.href='index.html';">< Back</button>

  <div class="title">
    <h1 style="font-family:Sans-serif;" class="heading"> Remove Student</h1>
	</div>

	<p class='s_p_p' style="font-size:23px;"> Select student to remove </p>

	<div class= "s_form">
		<form class="student" action="delete_student.php" method="post">
			<p class= "s_form_p">Name: <input type="text" name="name" list="names" required/></p>
			<datalist id="names">
				<?php 
				  $options = fetch_names();
				  foreach ($options as $option) {
				  	foreach ($option as $value){
				  ?>
			    <option ><?php echo $value; ?> </option>
			    <?php
			    }}
			   	?>
			</datalist>
			<p>&nbsp;</p>
			<p><input type="submit" value="submit" onclick="return confirm('Remove student?')"/></p>
		</form>
	</div>
</body>
</html>