<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="functions.js"></script>

</head>

<body class= "students_page">


<?php
    
    include("database.php");
    
    try{


        $db = $conn;

        $name = $_REQUEST['name'];

        $sqlStud = "SELECT * FROM person WHERE name = '$name';";
       	$studResult = $db->prepare($sqlStud);
        $studResult->execute();

        if ($studResult->rowCount() != 0) {
  
        	$sqlDelStud = "DELETE FROM person WHERE name = '$name';";
        	$delStudResult = $db->prepare($sqlDelStud);
        	$delStudResult->execute();

        	echo '<h1 style="font-family:Sans-serif; text-align: center; font-size: 30px;">Student deleted</h1>';
        }

        else{

        	echo '<h1 style="font-family:Sans-serif; text-align: center; font-size: 30px;">Student Not deleted</h1>';
        	echo '<p>&nbsp;</p>';
        	echo '<p style="text-align:center; font-size: 20px;"> Cause: Wrong student name </p>';
        }
	}catch (PDOException $e)
    {
      echo("<p>ERRO: {$e->getMessage()}</p>");
    }

?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a href="index.html" style="text-align:center;display:block; font-size:25px;">Go Back</a></p>

</body>
</html>
        






