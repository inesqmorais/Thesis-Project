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

	<button class= "go_back" onclick="location.href='update_student.php';">< Back</button>

  	<div class="title">
    <h1 style="font-family:Sans-serif;" class="heading">Add Student Advisor</h1>
	</div>


	<div class= "s_form">
		<form class="student" action="update_student_new_advisor.php" method="post">

			<p class= "as_form_p" style="text-transform: none;"> Name of student to edit:  <input type="text" name="oldName" list="names" required/></p>
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
			<p>&nbsp;</p>
				

			<p class='s_p_p'> Advisor </p>

			<p class= "s_form_p">New Advisor: <input type="text" name="newAdv" list="advs" required></p>
				<datalist id="advs">
				  <?php 
				  $options = fetch_Advs();
				  foreach ($options as $option) {
				  	foreach ($option as $value){
				  ?>
			    <option ><?php echo $value; ?> </option>
			    <?php
			    }}
			   	?>
				</datalist>

			<p class= "s_form_p">Advising type: <input type="text" name="newAdvType" list="advTypes" required></p>
				<datalist id="advTypes">
				  <?php 
				  $options = fetch_Adv_Type();
				  foreach ($options as $option) {
				  	foreach ($option as $value){
				  ?>
			    <option ><?php echo $value; ?> </option>
			    <?php
			    }}
			   	?>
				</datalist>
			<p>&nbsp;</p>

			<button class='cancel' onclick="if(confirm('Cancel?')){location.href='update_student.php'}else{return false;};"> Cancel</button>
			<input type="submit" value="submit" onclick="return confirm('Update student information?')">
		</form>

	</div>
</body>
</html>