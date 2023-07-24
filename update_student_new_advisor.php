<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="functions.js"></script>

</head>

<body class= "students_page">
<h1 style="font-family:Sans-serif; text-align: center; font-size: 30px;" >Student updated</h1>


<?php
    
    include("database.php");
    
    try{


        $db = $conn;
        $oldName = $_REQUEST['oldName'];
        $advName= $_REQUEST['newAdv'];
        $advType= $_REQUEST['newAdvType'];


        $sqlID = "SELECT id from person where name = '$oldName';";
        $resultID = $db->prepare($sqlID);
        $resultID->execute();
        $r_id = array_values($resultID->fetch(PDO::FETCH_ASSOC));
        $id = $r_id[0];



        
    	$sqlAdvExist = "SELECT id FROM person WHERE name = '$advName';";
    	$advResult = $db->prepare($sqlAdvExist);
    	$advResult->execute();

    	if($advResult->rowCount()== 0){


    		$sqlID = "SELECT max(id) from person;";
    		$resultID = $db->prepare($sqlID);
    		$resultID->execute();
    		$maxId = array_values($resultID->fetch(PDO::FETCH_ASSOC));

    		$newId = $maxId[0] + 1;
   
    		$sqlNewAdv = "INSERT INTO person VALUES($newId, '$advName', null, null,null,null);";
    		$newAdv = $db->prepare($sqlNewAdv);
    		$newAdv->execute();

    		$sqlAdv = "INSERT INTO advisedBy VALUES($id, $newId, '$advType');";

    	}else {

    		$advId = array_values($advResult->fetch(PDO::FETCH_ASSOC));
    		$idAdv = $advId[0];
    		$sqlAdv = "INSERT INTO advisedBy VALUES($id, $idAdv, '$advType');";
    	}

		$advNew = $db->prepare($sqlAdv);
		$advNew->execute();

    
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
        