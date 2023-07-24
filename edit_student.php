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
    <h1 style="font-family:Sans-serif;" class="heading">Update Student Information</h1>
	</div>


	<p class= 's_p_p' style="font-size: 22px;color:#bb0000;"> Please fill in *ONLY* the information you wish to change. </p>
	<p>&nbsp;</p>

	<div class= "s_form">
		<form class="student" action="update_student_info.php" method="post">

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
				<p class='s_p_p'> Personal information </p>


				<p class= "as_form_p">New Name: <input type="text" name="name"></p>

				<p class= "as_form_p" style = "margin-left:250px;">New Full name: <input type="text" name="fullName"></p>
				<p class= "s_form_p">New Gender: <input type="text" name="gender" list="genders"></p>
				<datalist id="genders">
					  <?php 
					  $options = fetch_gender();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>
				<p class= "as_form_p">New Email: <input type="text" name="email"></p>
				<p class= "as_form_p" style = "margin-left:250px;">Email 2: <input type="text" name="email2"></p>
				<p> </p>
				<p class= "as_form_p">New Nationality: <input type="text" name="nationality" list="nationalities"></p>
				<datalist id="nationalities">
					  <?php 
					  $options = fetch_nationality();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>
				<p class= "as_form_p" style = "margin-left:205px;">New Nationality 2: <input type="text" name="nationality2" list="nationalities"></p>

				<p class= "s_form_p">New Nationality Area: <input type="text" name="nationalityArea" list="n_areas"></p>
				<datalist id="n_areas">
					  <?php 
					  $options = fetch_nationalityArea();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>


				<p>&nbsp;</p>
				<p class='s_p_p'> Academic Information </p>

				<p class= "s_form_p">New Degree Type: <input type="text" name="degreeType" list="degreeTypes"></p>
				<datalist id="degreeTypes">
					  <?php 
					  $options = fetch_degreeType();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>

				<p class= "s_form_p">New Status: <input type="text" name="status" list="statuses"></p>
				<datalist id="statuses">
					  <?php 
					  $options = fetch_status();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>

				<p class= "s_form_p">New Research Area: <input type="text" name="researchArea" list="r_areas"></p>
				<datalist id="r_areas">
					  <?php 
					  $options = fetch_researchArea();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>

				<p class= "s_form_p">New Enroll Date: <input type="date" name="enrollDate"></p>

				<p class= "as_form_p">New Enroll Year: <input type="number" name="enrollYear" list="enrollYears"></p>
				<datalist id="enrollYears">
					  <?php 
					  $options = fetch_enrollYear();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>

				<p class= "as_form_p" style = "margin-left:200px;">New Academic Enroll Year: <input type="text" name="acadEnrollYear" list="acadEnrollYears"></p>
				<datalist id="acadEnrollYears">
					  <?php 
					  $options = fetch_academicEnrollYear();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>

				<p class= "s_form_p">New Expected Graduation Year: <input type="number" name="expectGradYear" list="expectGradYears"></p>
				<datalist id="expectGradYears">
					  <?php 
					  $options = fetch_expectGradYear();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>

				<p class= "s_form_p">Graduation / Withdrawal Year: <input type="number" name="endYear" list="expectGradYears"></p>
				<datalist id="expectGradYears">
					  <?php 
					  $options = fetch_expectGradYear();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>

				<p class= "s_form_p">New Scholarship Number: <input type="text" name="scholarshipNr"></p>


				<p>&nbsp;</p>
				<p class='s_p_p'> Academic Information </p>


				<p class='s_p_p_d'> CMU </p>
				<p class='s_p_p_d' style="padding-top: 0px; font-weight: normal; color:#bb0000; text-transform: none;font-size:20px;"> If you wish to change the information in this section, please fill in all the possible fields.</p>
				

				<p class= "as_form_p">New Program Name: <input type="text" name="CMUProgName" list="CMUprogs"></p>
				<datalist id="CMUprogs">
					  <?php 
					  $options = fetch_CMUprogs();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>s
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>


				<p class= "as_form_p" style="margin-left:165px;">New Program Abbreviation: <input type="text" name="CMUProgAbbrv" list="CMUabbrv"></p>
					<datalist id="CMUabbrv">
					  <?php 
					  $options = fetch_CMUabbrv();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>

				<p class= "s_form_p">New School Name: <input type="text" name="CMUSchool" list="CMUschools"></p>
					<datalist id="CMUschools">
					  <?php 
					  $options = fetch_CMUschool();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>


				<p class= "s_form_p">New Department Name <input type="text" name="CMUDept" list="CMUdepts"></p>
					<datalist id="CMUdepts">
					  <?php 
					  $options = fetch_CMUdept();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>


				<p class='s_p_p_d'> PT </p>
				<p class='s_p_p_d' style="padding-top: 0px; font-weight: normal; color:#bb0000; text-transform: none; font-size:20px;"> If you wish to change the information in this section, please fill in all the fields.</p>

				<p class= "as_form_p">New Program Name: <input type="text" name="PTProgName" list="PTprogs"></p>
				<datalist id="PTprogs">
					  <?php 
					  $options = fetch_PTprogs();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>s
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>


				<p class= "as_form_p" style="margin-left:165px;">New Program Abbreviation: <input type="text" name="PTProgAbbrv" list="PTabbrv"></p>
					<datalist id="PTabbrv">
					  <?php 
					  $options = fetch_PTabbrv();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>

				<p> </p>
				<p class= "as_form_p">New School Name: <input type="text" name="PTSchool" list="PTschools" ></p>
					<datalist id="PTschools">
					  <?php 
					  $options = fetch_PTschool();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>

				<p class= "as_form_p" style="margin-left:180px;">New School Abbreviation: <input type="text" name="PTSchoolAbbrv" list="PTSchoolAbbrvs"></p>
					<datalist id="PTSchoolAbbrvs">
					  <?php 
					  $options = fetch_PTschoolAbbrv();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>

				<p> </p>
				<p class= "as_form_p">New University Name: <input type="text" name="PTUni" list="PTunis"></p>
					<datalist id="PTunis">
					  <?php 
					  $options = fetch_PTuni();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>


				<p class= "as_form_p" style="margin-left:150px;">New University Abbreviation: <input type="text" name="PTUniAbbrv" list="PTuniAbbrvs"></p>
					<datalist id="PTuniAbbrvs">
					  <?php 
					  $options = fetch_PTuniAbbrv();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>


				<p>&nbsp;</p>
				<p class='s_p_p'> Host Institution </p>

				<p class= "as_form_p">New Institution Name: <input type="text" name="hostInst" list="hostInsts"></p>
					<datalist id="hostInsts">
					  <?php 
					  $options = fetch_hostInst();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>


				<p class= "as_form_p" style="margin-left:150px;">New Institution Abbreviation: <input type="text" name="hostAbbrv" list="hostAbbrvs"></p>
					<datalist id="hostAbbrvs">
					  <?php 
					  $options = fetch_hostAbbrv();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>


				<p class= "as_form_p" style="margin-left:185px;">New Institution Type: <input type="text" name="hostType" list="hostTypes" ></p>
					<datalist id="hostTypes">
					  <?php 
					  $options = fetch_hostTypes();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>


				
				<p>&nbsp;</p>
				<p class='s_p_p'> Thesis Information  </p>


				<p class= "as_form_p">Thesis Name: <input type="text" name="thesisName"/></p>

				<p class= "as_form_p" style="margin-left:180px;">Thesis Url: <input type="text" name="thesisUrl"/></p>


				<p>&nbsp;</p>
				<p class='s_p_p'> Social Media </p>

				<p class= "s_form_p">New Google Scholar: <input type="text" name="gScholar"></p>
				<p class= "s_form_p">New LinkedIn: <input type="text" name="linkedIn"></p>
				<p class= "s_form_p">New Orcid: <input type="text" name="orcid"></p>
				<p class= "s_form_p">New Research Gate: <input type="text" name="rGate"></p>
				<p class= "s_form_p">New DBLP: <input type="text" name="dblp"></p>
				<p class= "s_form_p">New Webpage: <input type="text" name="webpage"></p>

				<p>&nbsp;</p>
				<p class='s_p_p'> Site Information </p>

				<p class= "d_form_p">New Introduction Text: <input type="text" name="introText"></p>
				<p class= "d_form_p">New Research Topics: <input type="text" name="rTopics"></p>

				<p>&nbsp;</p>

				<button class='cancel' onclick="if(confirm('Cancel?')){location.href='update_student.php'}else{return false;};"> Cancel</button>
				<input type="submit" value="submit" onclick="return confirm('Update student information?')">
		</form>

	</div>
</body>
</html>