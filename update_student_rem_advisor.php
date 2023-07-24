<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="functions.js"></script>

</head>

<body class= "students_page" style="text-transform: none;">
<h1 style="font-family:Sans-serif; text-align: center; font-size: 30px;" >Student updated</h1>


<?php
    
    include("database.php");
    
    try{


        $db = $conn;
        $oldName = $_REQUEST['oldName'];
        $advName= $_REQUEST['newAdv'];



        $sqlID = "SELECT id from person where name = '$oldName';";
        $resultID = $db->prepare($sqlID);
        $resultID->execute();
        $r_id = array_values($resultID->fetch(PDO::FETCH_ASSOC));
        $id = $r_id[0];



        
    	$sqlAdvExist = "SELECT person_id FROM advisedBy WHERE student_id = $id AND person_id IN (SELECT id from person where name = '$advName');";
    	$advResult = $db->prepare($sqlAdvExist);
    	$advResult->execute();



    	if($advResult->rowCount() != 0){


            $advId = array_values($advResult->fetch(PDO::FETCH_ASSOC));
            $personId = $advId[0];

    		$sqlDel = "DELETE FROM advisedBy WHERE student_id = $id AND person_id = $personId;";
    		$resultDel = $db->prepare($sqlDel);
    		$resultDel->execute();
    		

    	}else {

    		echo $advName. " is not an advisor of " .$oldName. ".";
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
        