<?php
include("fetch_student_data.php");
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

	<button class="go_back" onclick="history.back()">< Back</button>

	<?php
        $name=$_GET['varname'];
    ?>



	<div class="title">
        <h1 style="font-family:Sans-serif;" class="heading"><?php echo $name; ?></h1>
    </div>


    <p class='s_p_p'> Personal information </p>

    <table class="s_p_table">

        <?php

          	$fetch_p_data = fetch_student_personal_data($name);

        	$cols = array_keys($fetch_p_data->fetch(PDO::FETCH_ASSOC));

			echo '<thead>';
			echo "<tr>";
			foreach ($cols as $value) {
			    echo "<td><b>$value<b></td>";
			}
			echo "</tr>";
			echo '</thead>';

			echo '<tbody>';

			$fetch_p_data = fetch_student_personal_data($name);

			$rows = $fetch_p_data->fetchAll(\PDO::FETCH_NUM);

          	if(is_array($rows)){ 
          		foreach($rows as $data){
          			echo '<tr>';
          			foreach($data as $cell){
          		 		echo "<td>$cell</td>";
          		 	}
          		 	echo '<tr>';
          		}
          	}

		?> 

		</tbody>
    </table>

    <p>&nbsp;</p>

    <p class='s_p_p'> Academic information </p>

     <table class="s_p_table">
	    <?php

	      	$fetch_a_data = fetch_academic_data($name);

	    	$cols = array_keys($fetch_a_data->fetch(PDO::FETCH_ASSOC));

			echo '<thead>';
			echo "<tr>";
			foreach ($cols as $value) {
			    echo "<td><b>$value<b></td>";
			}
			echo "</tr>";
			echo '</thead>';

			echo '<tbody>';

			$fetch_a_data = fetch_academic_data($name);

			$rows = $fetch_a_data->fetchAll(\PDO::FETCH_NUM);

	      	if(is_array($rows)){ 
	      		foreach($rows as $data){
	      			echo '<tr>';
	      			foreach($data as $cell){
	      		 		echo "<td>$cell</td>";
	      		 	}
	      		 	echo '<tr>';
	      		}
	      	}

		?> 

		</tbody>
    </table>

    <p>&nbsp;</p>

    <p class='s_p_p'> Enrollment information </p>

    <table class="s_p_table">
	    <thead>
	        <tr>
	          <td><b>Enroll Type</b></td>
	          <td><b>Program Name</b></td>
	          <td><b>Program Abbreviation</b></td>
	          <td><b>School Name</b></td>
	          <td><b>School Abbreviation</b></td>
	          <td><b>Department Name</b></td>
	          <td><b>University Name</b></td>
	          <td><b>University Abbreviation</b></td>
	        </tr>
	      </thead>

		<tbody> 

	        <?php

	          	$fetch_s_data = fetch_school_data($name);
	          	if(is_array($fetch_s_data)){ 
	          		foreach($fetch_s_data as $data){
	          			echo '<tr>';
	          			foreach($data as $cell){
	          		 		echo "<td>$cell</td>";
	          		 	}
	          		 	echo '<tr>';
	          		}
	          	}

			?> 
	   	
	   	</tbody>
	</table>


	<?php

  	$fetch_h_data = fetch_host_data($name);

  	$var = $fetch_h_data->fetch(PDO::FETCH_ASSOC);

  	if (!empty($var['Name'])){

  		echo '<p>&nbsp;</p>';

  		echo "<p class='s_p_p'>Host Institution</p>";

		echo '<table class="s_p_table">';

		$fetch_h_data = fetch_host_data($name);
		$cols = array_keys($fetch_h_data->fetch(PDO::FETCH_ASSOC));
	
		echo '<thead>';
		echo "<tr>";
		foreach ($cols as $value) {
		    echo "<td><b>$value<b></td>";
		}
		echo "</tr>";
		echo '</thead>';

		$fetch_h_data = fetch_host_data($name);
		$rows = $fetch_h_data->fetchAll(\PDO::FETCH_NUM);

      	if(is_array($rows)){ 
      		foreach($rows as $data){
      			echo '<tr>';
      			foreach($data as $cell){
      		 		echo "<td>$cell</td>";
      		 	}
      		 	echo '<tr>';
      		}
      	}
    }

    echo '</tbody>';
    echo '</table>';



  	$fetch_ad_data = fetch_advisors_data($name);

  	$var = $fetch_ad_data->fetch(PDO::FETCH_ASSOC);

  	if (!empty($var['name'])){

  		echo '<p>&nbsp;</p>';

  		echo "<p class='s_p_p'>Advisors</p>";

		echo '<table class="s_p_table">';

		$fetch_ad_data = fetch_advisors_data($name);
		$cols = array_keys($fetch_ad_data->fetch(PDO::FETCH_ASSOC));
	
		echo '<thead>';
		echo "<tr>";
		foreach ($cols as $value) {
		    echo "<td><b>$value<b></td>";
		}
		echo "</tr>";
		echo '</thead>';

		$fetch_ad_data = fetch_advisors_data($name);
		$rows = $fetch_ad_data->fetchAll(\PDO::FETCH_NUM);

      	if(is_array($rows)){ 
      		foreach($rows as $data){
      			echo '<tr>';
      			foreach($data as $cell){
      		 		echo "<td>$cell</td>";
      		 	}
      		 	echo '<tr>';
      		}
      	}
    }


    echo '</tbody>';

    echo '</table>';



  	$fetch_t_data = fetch_thesis_data($name);

  	$var = $fetch_t_data->fetch(PDO::FETCH_ASSOC);

  	if (!empty($var['thesisTitle'])){

  		echo '<p>&nbsp;</p>';

  		echo "<p class='s_p_p'>Thesis Information </p>";

		echo '<table class="s_p_table">';

		$fetch_t_data = fetch_thesis_data($name);
		$cols = array_keys($fetch_t_data->fetch(PDO::FETCH_ASSOC));
	
		echo '<thead>';
		echo "<tr>";
		foreach ($cols as $value) {
		    echo "<td><b>$value<b></td>";
		}
		echo "</tr>";
		echo '</thead>';

		$fetch_t_data = fetch_thesis_data($name);
		$rows = $fetch_t_data->fetchAll(\PDO::FETCH_NUM);

      	if(is_array($rows)){ 
      		foreach($rows as $data){
      			echo '<tr>';
      			foreach($data as $cell){
      		 		echo "<td>$cell</td>";
      		 	}
      		 	echo '<tr>';
      		}
      	}
    }


    echo '</tbody>';

    echo '</table>';
    
	   	

    $fetch_p_data = fetch_profiles_data($name);

  	$var = $fetch_p_data->fetch(PDO::FETCH_ASSOC);

  	if (!empty($var['type'])){

  		echo '<p>&nbsp;</p>';

  		echo "<p class='s_p_p'> Social Media </p>";

		echo '<table class="s_p_table">';

		$fetch_p_data = fetch_profiles_data($name);
		$cols = array_keys($fetch_p_data->fetch(PDO::FETCH_ASSOC));
	
		echo '<thead>';
		echo "<tr>";
		foreach ($cols as $value) {
		    echo "<td><b>$value<b></td>";
		}
		echo "</tr>";
		echo '</thead>';

		$fetch_p_data = fetch_profiles_data($name);
		$rows = $fetch_p_data->fetchAll(\PDO::FETCH_NUM);

      	if(is_array($rows)){ 
      		foreach($rows as $data){
      			echo '<tr>';
      			foreach($data as $cell){
      		 		echo "<td>$cell</td>";
      		 	}
      		 	echo '<tr>';
      		}
      	}
    }


   ?>


</body>
</html>


