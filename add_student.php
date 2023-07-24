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
    <h1 style="font-family:Sans-serif;" class="heading">Add Student</h1>
	</div>

	<p class='s_p_p'> Personal information </p>

	<div class= "s_form">
		<form class="student" action="insert_student.php" method="post">
				<p class= "as_form_p">Name<b>*</b>: <input type="text" name="name" required/></p>
				<p class= "as_form_p" style = "margin-left:250px;">Full name: <input type="text" name="fullName"/></p>
				<p class= "s_form_p">Gender<b>*</b>: <input type="text" name="gender" list="genders" required/></p>
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
				<p class= "as_form_p">Email<b>*</b>: <input type="text" name="email" required/></p>
				<p class= "as_form_p" style = "margin-left:250px;">Email 2: <input type="text" name="email2"/></p>
				<p> </p>
				<p class= "as_form_p">Nationality<b>*</b>: <input type="text" name="nationality" list="nationalities" required/></p>
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
				<p class= "as_form_p" style = "margin-left:205px;">Nationality 2: <input type="text" name="nationality2" list="nationalities"/></p>

				<p class= "s_form_p">Nationality Area<b>*</b>: <input type="text" name="nationalityArea" list="n_areas" required/></p>
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

				<p class= "s_form_p">Degree Type<b>*</b>: <input type="text" name="degreeType" list="degreeTypes" required/></p>
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

				<p class= "s_form_p">Status<b>*</b>: <input type="text" name="status" list="statuses" required/></p>
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

				<p class= "s_form_p">Research Area<b>*</b>: <input type="text" name="researchArea" list="r_areas" required/></p>
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

				<p class= "s_form_p">Enroll Date: <input type="date" name="enrollDate"/></p>

				<p class= "as_form_p">Enroll Year<b>*</b>: <input type="number" name="enrollYear" list="enrollYears" required/></p>
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

				<p class= "as_form_p" style = "margin-left:200px;">Academic Enroll Year<b>*</b>: <input type="text" name="acadEnrollYear" list="acadEnrollYears" required/></p>
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

				<p class= "s_form_p">Expected Graduation Year<b>*</b>: <input type="number" name="expectGradYear" list="expectGradYears" required/></p>
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

				<p class= "s_form_p">Scholarship Number: <input type="text" name="scholarshipNr"/></p>


				<p>&nbsp;</p>
				<p class='s_p_p'> Academic Information </p>


				<p class='s_p_p_d'> CMU </p>

				<p class= "as_form_p">Program Name: <input type="text" name="CMUProgName" list="CMUprogs"/></p>
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


				<p class= "as_form_p" style="margin-left:165px;">Program Abbreviation: <input type="text" name="CMUProgAbbrv" list="CMUabbrv"/></p>
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

				<p class= "s_form_p">School Name<b>*</b>: <input type="text" name="CMUSchool" list="CMUschools" required/></p>
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


				<p class= "s_form_p">Department Name<b>*</b> <input type="text" name="CMUDept" list="CMUdepts" required/></p>
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

				<p class= "as_form_p">Program Name<b>*</b>: <input type="text" name="PTProgName" list="PTprogs" required/></p>
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


				<p class= "as_form_p" style="margin-left:165px;">Program Abbreviation<b>*</b>: <input type="text" name="PTProgAbbrv" list="PTabbrv" required/></p>
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
				<p class= "as_form_p">School Name<b>*</b>: <input type="text" name="PTSchool" list="PTschools" required/></p>
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

				<p class= "as_form_p" style="margin-left:180px;">School Abbreviation<b>*</b>: <input type="text" name="PTSchoolAbbrv" list="PTSchoolAbbrvs" required/></p>
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
				<p class= "as_form_p">University Name<b>*</b>: <input type="text" name="PTUni" list="PTunis" required/></p>
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


				<p class= "as_form_p" style="margin-left:150px;">University Abbreviation<b>*</b>: <input type="text" name="PTUniAbbrv" list="PTuniAbbrvs" required /></p>
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

				<p class= "as_form_p">Institution Name: <input type="text" name="hostInst" list="hostInsts" /></p>
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


				<p class= "as_form_p" style="margin-left:150px;">Institution Abbreviation: <input type="text" name="hostAbbrv" list="hostAbbrvs" /></p>
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


				<p class= "as_form_p" style="margin-left:185px;">Institution Type: <input type="text" name="hostType" list="hostTypes" /></p>
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
				<p class='s_p_p'> Advisor(s) </p>

				<p class= "as_form_p">CMU Advisor 1: <input type="text" name="CMUadv1" list="CMUadvs" /></p>
					<datalist id="CMUadvs">
					  <?php 
					  $options = fetch_CMUAdv();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>

				<p class= "as_form_p" style="margin-left:155px;">CMU Advisor 2: <input type="text" name="CMUadv2" list="CMUadvs" /></p>

				<p class= "as_form_p" style="margin-left:255px;">CMU Advisor 3: <input type="text" name="CMUadv3" list="CMUadvs" /></p>

	
				<p class= "as_form_p">PT Advisor 1: <input type="text" name="PTadv1" list="PTadvs" /></p>
					<datalist id="PTadvs">
					  <?php 
					  $options = fetch_PTAdv();
					  foreach ($options as $option) {
					  	foreach ($option as $value){
					  ?>
				    <option ><?php echo $value; ?> </option>
				    <?php
				    }}
				   	?>
				</datalist>

				<p class= "as_form_p" style="margin-left:180px;">PT Advisor 2: <input type="text" name="PTadv2" list="PTadvs" /></p>

				<p class= "as_form_p" style="margin-left:285px;">PT Advisor 3: <input type="text" name="PTadv3" list="PTadvs" /></p>


				<!-- <p>&nbsp;</p>
				<p class='s_p_p'> Thesis Information  </p>


				<p class= "as_form_p">Thesis Name: <input type="text" name="thesisName"/></p>

				<p class= "as_form_p" style="margin-left:180px;">Thesis Url: <input type="text" name="thesisUrl"/></p> -->


				<p>&nbsp;</p>
				<p class='s_p_p'> Social Media </p>

				<p class= "s_form_p">Google Scholar: <input type="text" name="gScholar"/></p>
				<p class= "s_form_p">LinkedIn: <input type="text" name="linkedIn"/></p>
				<p class= "s_form_p">Orcid: <input type="text" name="orcid"/></p>
				<p class= "s_form_p">Research Gate: <input type="text" name="rGate"/></p>
				<p class= "s_form_p">DBLP: <input type="text" name="dblp"/></p>
				<p class= "s_form_p">Webpage: <input type="text" name="webpage"/></p>

				<p>&nbsp;</p>
				<p class='s_p_p'> Site Information </p>

				<p class= "d_form_p">Introduction Text: <input type="text" name="introText"/></p>
				<p class= "d_form_p">Research Topics: <input type="text" name="rTopics"/></p>

				<p>&nbsp;</p>

				<button class='cancel' onclick="if(confirm('Cancel?')){location.href='index.html'}else{return false;};"> Cancel</button>
				<input type="submit" value="submit" onclick="return confirm('Add student?')"/>
		</form>


	</div>
</body>
</html>