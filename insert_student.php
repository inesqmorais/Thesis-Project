<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="functions.js"></script>

</head>

<body class= "students_page">
<h1 style="font-family:Sans-serif; text-align: center; font-size: 30px;" >Student submitted</h1>


<?php
    
    include("database.php");
    
    try{


        $db = $conn;

        $name = $_REQUEST['name'];
        $fullName = $_REQUEST['fullName'];
        $gender = $_REQUEST['gender'];
        $email = $_REQUEST['email'];
        $email2 = $_REQUEST['email2'];
        $nationality = $_REQUEST['nationality'];
       	$nationality2 = $_REQUEST['nationality2'];
        $nationalityArea = $_REQUEST['nationalityArea'];
        $degreeType = $_REQUEST['degreeType'];
        $status = $_REQUEST['status'];
        $researchArea = $_REQUEST['researchArea'];
        $enrollDate = $_REQUEST['enrollDate'];
        $enrollYear = $_REQUEST['enrollYear'];
        $acadEnrollYear = $_REQUEST['acadEnrollYear'];
        $expectGradYear = $_REQUEST['expectGradYear'];
        $scholarshipNr = $_REQUEST['scholarshipNr'];
        $introText = $_REQUEST['introText'];
        $rTopics = $_REQUEST['rTopics'];

        $CMUProgName = $_REQUEST['CMUProgName'];
        $CMUProgAbbrv = $_REQUEST['CMUProgAbbrv'];
        $CMUSchool = $_REQUEST['CMUSchool'];
        $CMUDept = $_REQUEST['CMUDept'];

        $PTProgName = $_REQUEST['PTProgName'];
        $PTProgAbbrv = $_REQUEST['PTProgAbbrv'];
        $PTSchool = $_REQUEST['PTSchool'];
        $PTSchoolAbbrv = $_REQUEST['PTSchoolAbbrv'];
        $PTUni = $_REQUEST['PTUni'];
        $PTUniAbbrv = $_REQUEST['PTUniAbbrv'];

        $hostInst = $_REQUEST['hostInst'];
        $hostAbbrv = $_REQUEST['hostAbbrv'];
        $hostType = $_REQUEST['hostType'];

        $CMUadv1 = $_REQUEST['CMUadv1'];
        $CMUadv2 = $_REQUEST['CMUadv2'];
        $CMUadv3 = $_REQUEST['CMUadv3'];
        $PTadv1 = $_REQUEST['PTadv1'];
        $PTadv2 = $_REQUEST['PTadv2'];
        $PTadv3 = $_REQUEST['PTadv3'];

        /*$thesisName = $_REQUEST['thesisName'];
        $thesisUrl = $_REQUEST['thesisUrl'];*/
        $gScholar = $_REQUEST['gScholar'];
        $linkedIn = $_REQUEST['linkedIn'];
        $orcid = $_REQUEST['orcid'];
        $rGate = $_REQUEST['rGate'];
        $dblp = $_REQUEST['dblp'];
        $webpage = $_REQUEST['webpage'];


        $sqlID = "SELECT max(id) from person;";
        $resultID = $db->prepare($sqlID);
        $resultID->execute();
        $maxId = array_values($resultID->fetch(PDO::FETCH_ASSOC));

        $id = $maxId[0] + 1;

        if (empty($email2)){
        	$sqlPinfo = "INSERT INTO person VALUES($id, '$name', '$fullName', '$gender', '$email', null);";
        }else {
        	$sqlPinfo = "INSERT INTO person VALUES($id, '$name', '$fullName', '$gender', '$email', '$email2');";
        }
        $pInfo = $db->prepare($sqlPinfo);
        $pInfo->execute();


       	if (empty($enrollDate)){
       		$sqlSinfo = "INSERT INTO student VALUES($id, '$researchArea', '$status', '$degreeType', null, $enrollYear, '$acadEnrollYear', '$expectGradYear', null, '$nationality', '$nationality2', '$nationalityArea', '$scholarshipNr', '$rTopics', '$introText');";
       	}else{
        	$sqlSinfo = "INSERT INTO student VALUES($id, '$researchArea', '$status', '$degreeType', '$enrollDate', $enrollYear, '$acadEnrollYear', $expectGradYear, null, '$nationality', '$nationality2', '$nationalityArea', '$scholarshipNr', '$rTopics', '$introText');";
    	}
        $sInfo = $db->prepare($sqlSinfo);
        $sInfo->execute();



        /* é possível por uma prog novo numa escola CMU já existente ou um prog n existente naquela escola antes*/
        if ($degreeType == 'Dual Degree'){

        	$sqlCMUprogram = "SELECT * FROM program WHERE progName = '$CMUProgName' AND schoolNameAbbrv = '$CMUSchool' AND instName = 'Carnegie Mellon University';";
        	$CMUprogResult = $db->prepare($sqlCMUprogram);
        	$CMUprogResult->execute();

        	if ($CMUprogResult->rowCount() == 0) {
  
        		$sqlCMUschool = "SELECT * FROM school WHERE schoolNameAbbrv = '$CMUSchool' AND instName = 'Carnegie Mellon University';";
        		$CMUschoolResult = $db->prepare($sqlCMUschool);
        		$CMUschoolResult->execute();

        		if ($CMUschoolResult->rowCount() != 0){
        			$sqlNewCMUprog = "INSERT INTO program VALUES('$CMUProgName', '$CMUProgAbbrv' ,'$CMUSchool', 'Carnegie Mellon University');";
        			$CMUnewProg = $db->prepare($sqlNewCMUprog);
        			$CMUnewProg->execute();

        			$sqlCMUenroll = "INSERT INTO enrolledIn VALUES($id,'$CMUProgName', '$CMUSchool', 'Carnegie Mellon University', 'CMU');";
        			$CMUenroll = $db->prepare($sqlCMUenroll);
        			$CMUenroll->execute();

        		}else{
        			echo "Non-existent CMU school at CMU Program. Student's CMU enrollment not saved.";
        		}

        	}else{
        		$sqlCMUenroll = "INSERT INTO enrolledIn VALUES($id,'$CMUProgName', '$CMUSchool', 'Carnegie Mellon University', 'CMU');";
        		$CMUenroll = $db->prepare($sqlCMUenroll);
        		$CMUenroll->execute();
        	}	
        }


        /* é possivel criar dept novo numa escola existente ou colocar dept n existenta naquela escola*/
        $sqlCMUdept = "SELECT * FROM department WHERE deptName = '$CMUDept' AND schoolNameAbbrv = '$CMUSchool'AND instName = 'Carnegie Mellon University';";
        $CMUdeptResult = $db->prepare($sqlCMUdept);
        $CMUdeptResult->execute();
     	
        if ($CMUdeptResult->rowCount() == 0) {
        	$sqlCMUschool = "SELECT * FROM school WHERE schoolNameAbbrv = '$CMUSchool' AND instName = 'Carnegie Mellon University';";
        	$CMUschoolResult = $db->prepare($sqlCMUschool);
        	$CMUschoolResult->execute();

        	if ($CMUschoolResult->rowCount() != 0){
        		$sqlNewCMUdept = "INSERT INTO department VALUES('$CMUDept','$CMUSchool', 'Carnegie Mellon University');";
        		$CMUnewdept = $db->prepare($sqlNewCMUdept);
        		$CMUnewdept->execute();

        		$sqlCMUAss = "INSERT INTO associatedToDept VALUES($id,'$CMUDept', '$CMUSchool', 'Carnegie Mellon University');";
	    		$CMUdepartment = $db->prepare($sqlCMUAss);
	    		$CMUdepartment->execute();
        	
        	}else{
        		echo "Non-existent CMU school at CMU Program. Student's CMU enrollment not saved.";
        	}     	
        }else{ 
	    	$sqlCMUAss = "INSERT INTO associatedToDept VALUES($id,'$CMUDept', '$CMUSchool', 'Carnegie Mellon University');";
	    	$CMUdepartment = $db->prepare($sqlCMUAss);
	    	$CMUdepartment->execute();
	    }


    
    	$sqlPTprogram = "SELECT * FROM program WHERE progName = '$PTProgName' AND schoolNameAbbrv = '$PTSchoolAbbrv' and instName = '$PTUni';";
    	$PTprogResult = $db->prepare($sqlPTprogram);
    	$PTprogResult->execute();

    	if ($PTprogResult->rowCount() == 0) {

    		$sqlPTschool = "SELECT * FROM school WHERE schoolNameAbbrv = '$PTSchoolAbbrv' AND instName = '$PTUni';";
        	$PTschoolResult = $db->prepare($sqlPTschool);
        	$PTschoolResult->execute();

        	if($PTschoolResult->rowCount() == 0){
        		$sqlPTuni = "SELECT * FROM institution WHERE instName = '$PTUni';";
        		$PTuniResult = $db->prepare($sqlPTuni);
        		$PTuniResult->execute();

        		if($PTuniResult->rowCount() == 0){
	        		$sqlNewPTuni = "INSERT INTO institution VALUES ('$PTUni', '$PTUniAbbrv', 'University');";
	        		$newPTuniResult = $db->prepare($sqlNewPTuni);
	        		$newPTuniResult->execute();
	        	}

        		$sqlNewPTschool = "INSERT INTO school VALUES('$PTSchoolAbbrv', '$PTSchool','$PTUni');";
        		$NewPTschoolResult = $db->prepare($sqlNewPTschool);
        		$NewPTschoolResult->execute();
        		
        	}

        	$sqlNewPTprogram = "INSERT INTO program VALUES('$PTProgName','$PTProgAbbrv','$PTSchoolAbbrv','$PTUni');";
    		$PTNewProgResult = $db->prepare($sqlNewPTprogram);
    		$PTNewProgResult->execute();
    	}

		$sqlPTenroll = "INSERT INTO enrolledIn VALUES($id,'$PTProgName', '$PTSchoolAbbrv', '$PTUni', 'PT');";
		$PTenroll = $db->prepare($sqlPTenroll);
		$PTenroll->execute();


        
    	/*É possível inserir toda uma nova instituição*/
        if(!empty($hostInst)){
        	$sqlHostInst = "SELECT * FROM institution WHERE instName = '$hostInst';";
        	$hostInstName = $db->prepare($sqlHostInst);
        	$hostInstName->execute(); 

        	 if ($hostInstName->rowCount() == 0) {
        	 	$sqlNewInst = "INSERT INTO institution VALUES('$hostInst', '$hostAbbrv', '$hostType');";
    			$newInst = $db->prepare($sqlNewInst);
				$newInst->execute();
    		}
    	 	$sqlHost = "INSERT INTO affiliatedWithInst VALUES($id,'$hostInst');";
    		$host = $db->prepare($sqlHost);
			$host->execute();

        }


        /*É possível inserir novos Advs mas sem info de email gender etc só o nome*/
        if(!empty($CMUadv1)){
        	$sqlCMUadv1 = "SELECT id FROM person WHERE name = '$CMUadv1';";
	    	$CMUadv1Result = $db->prepare($sqlCMUadv1);
	    	$CMUadv1Result->execute();

	    	if($CMUadv1Result->rowCount()== 0){

	    		$sqlID = "SELECT max(id) from person;";
        		$resultID = $db->prepare($sqlID);
        		$resultID->execute();
        		$maxId = array_values($resultID->fetch(PDO::FETCH_ASSOC));

        		$newId = $maxId[0] + 1;

	    		$sqlNewCMU1 = "INSERT INTO person VALUES($newId, '$CMUadv1', null, null,null,null);";
	    		$CMUNewadv1 = $db->prepare($sqlNewCMU1);
	    		$CMUNewadv1->execute();

	    		$sqlCMU1 = "INSERT INTO advisedBy VALUES($id, $newId, 'CMU');";

	    	}else {

	    		$CMUadv1Id = array_values($CMUadv1Result->fetch(PDO::FETCH_ASSOC));
        		$idCMU1 = $CMUadv1Id[0];
	    		$sqlCMU1 = "INSERT INTO advisedBy VALUES($id, $idCMU1, 'CMU');";
	    	}

    		$CMUadv1 = $db->prepare($sqlCMU1);
    		$CMUadv1->execute();

        }


        if(!empty($CMUadv2)){
        	$sqlCMUadv2 = "SELECT id FROM person WHERE name = '$CMUadv2';";
	    	$CMUadv2Result = $db->prepare($sqlCMUadv2);
	    	$CMUadv2Result->execute();

	    	if($CMUadv2Result->rowCount()== 0){


	    		$sqlID = "SELECT max(id) from person;";
        		$resultID = $db->prepare($sqlID);
        		$resultID->execute();
        		$maxId = array_values($resultID->fetch(PDO::FETCH_ASSOC));

        		$newId = $maxId[0] + 1;
	   
	    		$sqlNewCMU2 = "INSERT INTO person VALUES($newId, '$CMUadv2', null, null,null,null);";
	    		$CMUNewadv2 = $db->prepare($sqlNewCMU2);
	    		$CMUNewadv2->execute();

	    		$sqlCMU2 = "INSERT INTO advisedBy VALUES($id, $newId, 'CMU');";

	    	}else {

	    		$CMUadv2Id = array_values($CMUadv2Result->fetch(PDO::FETCH_ASSOC));
        		$idCMU2 = $CMUadv2Id[0];
	    		$sqlCMU2 = "INSERT INTO advisedBy VALUES($id, $idCMU2, 'CMU');";
	    	}

    		$CMUadv2 = $db->prepare($sqlCMU2);
    		$CMUadv2->execute();
        }


        if(!empty($CMUadv3)){
        	$sqlCMUadv3 = "SELECT id FROM person WHERE name = '$CMUadv3';";
	    	$CMUadv3Result = $db->prepare($sqlCMUadv3);
	    	$CMUadv3Result->execute();

	    	if($CMUadv3Result->rowCount()== 0){


	    		$sqlID = "SELECT max(id) from person;";
        		$resultID = $db->prepare($sqlID);
        		$resultID->execute();
        		$maxId = array_values($resultID->fetch(PDO::FETCH_ASSOC));

        		$newId = $maxId[0] + 1;
	   
	    		$sqlNewCMU3 = "INSERT INTO person VALUES($newId, '$CMUadv3', null, null,null,null);";
	    		$CMUNewadv3 = $db->prepare($sqlNewCMU3);
	    		$CMUNewadv3->execute();

	    		$sqlCMU3 = "INSERT INTO advisedBy VALUES($id, $newId, 'CMU');";

	    	}else {

	    		$CMUadv3Id = array_values($CMUadv3Result->fetch(PDO::FETCH_ASSOC));
        		$idCMU3 = $CMUadv3Id[0];
	    		$sqlCMU3 = "INSERT INTO advisedBy VALUES($id, $idCMU3, 'CMU');";
	    	}

    		$CMUadv3 = $db->prepare($sqlCMU3);
    		$CMUadv3->execute();
        }


        if(!empty($PTadv1)){
        	$sqlPTadv1 = "SELECT id FROM person WHERE name = '$PTadv1';";
	    	$PTadv1Result = $db->prepare($sqlPTadv1);
	    	$PTadv1Result->execute();

	    	if($PTadv1Result->rowCount()== 0){

	    		$sqlID = "SELECT max(id) from person;";
        		$resultID = $db->prepare($sqlID);
        		$resultID->execute();
        		$maxId = array_values($resultID->fetch(PDO::FETCH_ASSOC));

        		$newId = $maxId[0] + 1;

	    		$sqlNewPT1 = "INSERT INTO person VALUES($newId, '$PTadv1', null, null,null,null);";
	    		$PTNewadv1 = $db->prepare($sqlNewPT1);
	    		$PTNewadv1->execute();

	    		$sqlPT1 = "INSERT INTO advisedBy VALUES($id, $newId, 'PT');";

	    	}else {

	    		$PTadv1Id = array_values($PTadv1Result->fetch(PDO::FETCH_ASSOC));
        		$idPT1 = $PTadv1Id[0];
	    		$sqlPT1 = "INSERT INTO advisedBy VALUES($id, $idPT1, 'PT');";
	    	}

    		$PTadv1 = $db->prepare($sqlPT1);
    		$PTadv1->execute();

        }


        if(!empty($PTadv2)){
        	$sqlPTadv2 = "SELECT id FROM person WHERE name = '$PTadv2';";
	    	$PTadv2Result = $db->prepare($sqlPTadv2);
	    	$PTadv2Result->execute();

	    	if($PTadv2Result->rowCount()== 0){


	    		$sqlID = "SELECT max(id) from person;";
        		$resultID = $db->prepare($sqlID);
        		$resultID->execute();
        		$maxId = array_values($resultID->fetch(PDO::FETCH_ASSOC));

        		$newId = $maxId[0] + 1;
	   
	    		$sqlNewPT2 = "INSERT INTO person VALUES($newId, '$PTadv2', null, null,null,null);";
	    		$PTNewadv2 = $db->prepare($sqlNewPT2);
	    		$PTNewadv2->execute();

	    		$sqlPT2 = "INSERT INTO advisedBy VALUES($id, $newId, 'PT');";

	    	}else {

	    		$PTadv2Id = array_values($PTadv2Result->fetch(PDO::FETCH_ASSOC));
        		$idPT2 = $PTadv2Id[0];
	    		$sqlPT2 = "INSERT INTO advisedBy VALUES($id, $idPT2, 'PT');";
	    	}

    		$PTadv2 = $db->prepare($sqlPT2);
    		$PTadv2->execute();
        }


        if(!empty($PTadv3)){
        	$sqlPTadv3 = "SELECT id FROM person WHERE name = '$PTadv3';";
	    	$PTadv3Result = $db->prepare($sqlPTadv3);
	    	$PTadv3Result->execute();

	    	if($PTadv3Result->rowCount()== 0){


	    		$sqlID = "SELECT max(id) from person;";
        		$resultID = $db->prepare($sqlID);
        		$resultID->execute();
        		$maxId = array_values($resultID->fetch(PDO::FETCH_ASSOC));

        		$newId = $maxId[0] + 1;
	   
	    		$sqlNewPT3 = "INSERT INTO person VALUES($newId, '$PTadv3', null, null,null,null);";
	    		$PTNewadv3 = $db->prepare($sqlNewPT3);
	    		$PTNewadv3->execute();

	    		$sqlPT3 = "INSERT INTO advisedBy VALUES($id, $newId, 'PT');";

	    	}else {

	    		$PTadv3Id = array_values($PTadv3Result->fetch(PDO::FETCH_ASSOC));
        		$idPT3 = $PTadv3Id[0];
	    		$sqlPT3 = "INSERT INTO advisedBy VALUES($id, $idPT3, 'PT');";
	    	}

    		$PTadv3 = $db->prepare($sqlPT3);
    		$PTadv3->execute();
        }


        /*if(!empty($thesisName)){

    		$sqlTid = "SELECT max(id) from thesis;";
    		$resultTid = $db->prepare($sqlTid);
    		$resultID->execute();
    		$maxId = array_values($resultID->fetch(PDO::FETCH_ASSOC));

    		$newId = $maxId[0] + 1;

        	$sqlthesis = "INSERT INTO person VALUES($newId, '$PTadv3', null, null,null,null);";
	    	$PTNewadv3 = $db->prepare($sqlNewPT3);
	    	$PTNewadv3->execute();


        }*/

        if(!empty($gScholar)){
        	$sqlGS = "INSERT INTO profile VALUES($id,'Google Scholar', '$gScholar');";
        	$resultGS = $db->prepare($sqlGS);
        	$resultGS->execute();
        }

       	if(!empty($linkedIn)){
        	$sqlLI = "INSERT INTO profile VALUES($id,'LinkedIn', '$linkedIn');";
        	$resultLI = $db->prepare($sqlLI);
        	$resultLI->execute();
        }

        if(!empty($orcid)){
        	$sqlO = "INSERT INTO profile VALUES($id,'Orcid', '$orcid');";
        	$resultO = $db->prepare($sqlO);
        	$resultO->execute();
        }


        if(!empty($rGate)) {
        	$sqlRG = "INSERT INTO profile VALUES($id,'Research Gate', '$rGate');";
        	$resultRG = $db->prepare($sqlRG);
        	$resultRG->execute();
        }

        if(!empty($dblp)) {
        	$sqlDBLP = "INSERT INTO profile VALUES($id,'DBLP', '$dblp');";
        	$resultDBLP = $db->prepare($sqlDBLP);
        	$resultDBLP->execute();
        }

        if(!empty($webpage)) {
        	$sqlWP = "INSERT INTO profile VALUES($id,'Webpage', '$webpage');";
        	$resultWP = $db->prepare($sqlWP);
        	$resultWP->execute();
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


