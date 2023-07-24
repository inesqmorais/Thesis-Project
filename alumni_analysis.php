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

	<button class= "go_back" onclick="location.href='student_analysis.php';">< Back</button>

	<div class="title">
    	<h1 style="font-family:Sans-serif;" class="heading">Affiliated Students Analytics</h1>
	</div>



	
	<p class='s_p_p'> Alumni grouped by enrollment year and and study program at CMU </p>

	    <table class="s_p_table">

	        <?php

	          	$fetch_q2 = fetch_Al_phd_year();

	        	$cols = array_keys($fetch_q2->fetch(PDO::FETCH_ASSOC));

				echo '<thead>';
				echo "<tr>";
				foreach ($cols as $value) {
				    echo "<td><b>$value<b></td>";
				}
				echo "</tr>";
				echo '</thead>';

				echo '<tbody>';

				$fetch_q2 = fetch_Al_phd_year();

				$rows = $fetch_q2->fetchAll(\PDO::FETCH_NUM);

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
	
	<p class='s_p_p'> Alumni grouped by CMU department </p>

	    <table class="s_p_table">

	        <?php

	          	$fetch_q3 = fetch_Al_dept();

	        	$cols = array_keys($fetch_q3->fetch(PDO::FETCH_ASSOC));

				echo '<thead>';
				echo "<tr>";
				foreach ($cols as $value) {
				    echo "<td><b>$value<b></td>";
				}
				echo "</tr>";
				echo '</thead>';

				echo '<tbody>';

				$fetch_q3 = fetch_Al_dept();

				$rows = $fetch_q3->fetchAll(\PDO::FETCH_NUM);

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
	
	<p class='s_p_p'> Alumni grouped by institution PT </p>

	    <table class="s_p_table">

	        <?php

	          	$fetch_q4 = fetch_Al_instPT();

	        	$cols = array_keys($fetch_q4->fetch(PDO::FETCH_ASSOC));

				echo '<thead>';
				echo "<tr>";
				foreach ($cols as $value) {
				    echo "<td><b>$value<b></td>";
				}
				echo "</tr>";
				echo '</thead>';

				echo '<tbody>';

				$fetch_q4 = fetch_Al_instPT();

				$rows = $fetch_q4->fetchAll(\PDO::FETCH_NUM);

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
	
	<p class='s_p_p'> Alumni grouped by gender</p>

	    <table class="s_p_table">

	        <?php

	          	$fetch_q5 = fetch_Al_gender();

	        	$cols = array_keys($fetch_q5->fetch(PDO::FETCH_ASSOC));

				echo '<thead>';
				echo "<tr>";
				foreach ($cols as $value) {
				    echo "<td><b>$value<b></td>";
				}
				echo "</tr>";
				echo '</thead>';

				echo '<tbody>';

				$fetch_q5 = fetch_Al_gender();

				$rows = $fetch_q5->fetchAll(\PDO::FETCH_NUM);

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
	
	<p class='s_p_p'> Alumni grouped by nationality </p>

	    <table class="s_p_table">

	        <?php

	          	$fetch_q6 = fetch_Al_nationality();

	        	$cols = array_keys($fetch_q6->fetch(PDO::FETCH_ASSOC));

				echo '<thead>';
				echo "<tr>";
				foreach ($cols as $value) {
				    echo "<td><b>$value<b></td>";
				}
				echo "</tr>";
				echo '</thead>';

				echo '<tbody>';

				$fetch_q6 = fetch_Al_nationality();

				$rows = $fetch_q6->fetchAll(\PDO::FETCH_NUM);

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