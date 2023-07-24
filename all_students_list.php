<?php
include("fetch_student_data.php");
?>

<style><?php include 'css/style.css'; ?></style>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script src="functions.js"></script>
</head>


<body onload="filterCols(); sortTable();" class= "students_page">

  <button class= "go_back" onclick="location.href='students_list.php';">< Back</button>

  <div class="title">
    <h1 style="font-family:Sans-serif;" class="heading">All Students</h1>
	</div>
	

  <div class= "s_form">
      <form class="student" action="#" method="post">
          <select id="selectButton" class="sortView" ></select>
          <input type="text" id="myInput" onkeyup="myFunction()" title="Type in a name">
          <!--<p class= "s_form_p"> Name: <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."/></p>-->
          <!--<p><input type="submit" value="search"/></p>-->
      </form>
  </div>

  <div class="sort">
      <p style="display: inline-block; font-size: 20px;"> Sort by: </p>
      <select id="selectButton2" class="sortView"></select>

  </div>


  
    <table class="s_table" id="myTable" style="margin-left: auto;  margin-right: auto;">
     
    <thead>
      <tr>
        <td><b>Name</b></td>
        <td><b>Research area</b></td>
        <td><b>Status</b></td>
        <td><b>Degree Type</b></td>
  
      </tr>
    </thead>

    <tbody> 
      <?php
        if(is_array($fetchLessData)){     
        foreach($fetchLessData as $data){
      ?> 

      <tr onclick= "location.href='student_profile.php?varname=<?php echo $data['name'] ?>';">
        <td><?php echo $data['name']; ?></td>
        <td><?php echo $data['researchArea']; ?></td>
        <td><?php echo $data['status']; ?></td>
        <td><?php echo $data['degreeType']; ?></td>

    

      <?php
      }}?>

    </tbody>


  </table>



</body>

</html>