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
        $endYear = $_REQUEST['endYear'];
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

        $thesisName = $_REQUEST['thesisName'];
        $thesisUrl = $_REQUEST['thesisUrl'];
        $gScholar = $_REQUEST['gScholar'];
        $linkedIn = $_REQUEST['linkedIn'];
        $orcid = $_REQUEST['orcid'];
        $rGate = $_REQUEST['rGate'];
        $dblp = $_REQUEST['dblp'];
        $webpage = $_REQUEST['webpage'];
 
        $sqlID = "SELECT id from person where name = '$oldName';";
        $resultID = $db->prepare($sqlID);
        $resultID->execute();
        $r_id = array_values($resultID->fetch(PDO::FETCH_ASSOC));
        $id = $r_id[0];


        $sqlODT =  "SELECT degreeType from person natural join student where id = '$id';";
        $resultODT = $db->prepare($sqlODT);
        $resultODT->execute();
        $r_odt = array_values($resultODT->fetch(PDO::FETCH_ASSOC));
        $odt= $r_odt[0];

        if (!empty($name)){
            $sqlName = "UPDATE person SET name = '$name' WHERE id = '$id';";
            $resultName = $db->prepare($sqlName);
            $resultName->execute();
        }

        if (!empty($fullName)){
            $sqlFname = "UPDATE person SET fullName = '$fullName' WHERE id = '$id';";
            $resultFname = $db->prepare($sqlFname);
            $resultFname->execute();
        }

        if (!empty($gender)){
            $sqlGender = "UPDATE person SET gender = '$gender' WHERE id = '$id';";
            $resultGender = $db->prepare($sqlGender);
            $resultGender->execute();
        }

        if (!empty($email)){
            $sqlEmail = "UPDATE person SET email = '$email' WHERE id = '$id';";
            $resultEmail = $db->prepare($sqlEmail);
            $resultEmail->execute();
        }

        if (!empty($email2)){
            $sqlEmail2 = "UPDATE person SET email2 = '$email2' WHERE id = '$id';";
            $resultEmail2 = $db->prepare($sqlEmail2);
            $resultEmail2->execute();
        }

        if (!empty($nationality)){
            $sqlNat = "UPDATE student SET nationality = '$nationality' WHERE id = '$id';";
            $resultNat = $db->prepare($sqlNat);
            $resultNat->execute();
        }


        if (!empty($nationality2)){
            $sqlNat2 = "UPDATE student SET nationality2 = '$nationality2' WHERE id = '$id';";
            $resultNat2 = $db->prepare($sqlNat2);
            $resultNat2->execute();
        }
    

        if (!empty($degreeType)){
            $sqlDT = "UPDATE student SET degreeType = '$degreeType' WHERE id = '$id';";
            $resultDT = $db->prepare($sqlDT);
            $resultDT->execute();
        }

        if (!empty($status)){
            $sqlStatus = "UPDATE student SET status = '$status' WHERE id = '$id';";
            $resultStatus = $db->prepare($sqlStatus);
            $resultStatus->execute();
        }

        if (!empty($researchArea)){
            $sqlRA = "UPDATE student SET researchArea = '$researchArea' WHERE id = '$id';";
            $resultRA = $db->prepare($sqlRA);
            $resultRA->execute();
        }

        if (!empty($researchArea)){
            $sqlRA = "UPDATE student SET researchArea = '$researchArea' WHERE id = '$id';";
            $resultRA = $db->prepare($sqlRA);
            $resultRA->execute();
        }

        if (!empty($enrollDate)){
            $sqlED = "UPDATE student SET enrollDate = '$enrollDate' WHERE id = '$id';";
            $resultED = $db->prepare($sqlED);
            $resultED->execute();
        }

        if (!empty($enrollYear)){
            $sqlEY = "UPDATE student SET enrollYear = '$enrollYear' WHERE id = '$id';";
            $resultEY = $db->prepare($sqlEY);
            $resultEY->execute();
        }

        if (!empty($acadEnrollYear)){
            $sqlAEY = "UPDATE student SET academicEnrollYear = '$acadEnrollYear' WHERE id = '$id';";
            $resultAEY = $db->prepare($sqlAEY);
            $resultAEY->execute();
        }

        if (!empty($expectGradYear)){
            $sqlEGY = "UPDATE student SET expectedGradYear = '$expectGradYear' WHERE id = '$id';";
            $resultEGY = $db->prepare($sqlEGY);
            $resultEGY->execute();
        }

        if (!empty($endYear)){
            $sqlEY = "UPDATE student SET endYear = '$endYear' WHERE id = '$id';";
            $resultEY = $db->prepare($sqlEY);
            $resultEY->execute();
        }


        if (!empty($scholarshipNr)){
            $sqlSN = "UPDATE student SET scholarshipNr = '$scholarshipNr' WHERE id = '$id';";
            $resultSN = $db->prepare($sqlSN);
            $resultSN->execute();
        }

        if (!empty($introText)){
            $sqlIT = "UPDATE student SET introText = '$introText' WHERE id = '$id';";
            $resultIT = $db->prepare($sqlIT);
            $resultIT->execute();
        }

        if (!empty($rTopics)){
            $sqlRT = "UPDATE student SET researchTopic = '$rTopics' WHERE id = '$id';";
            $resultRT = $db->prepare($sqlRT);
            $resultRT->execute();
        }


        if ($odt == 'Dual Degree' or $degreeType == 'Dual Degree'){

            if (!empty($CMUProgName) && !empty($CMUProgAbbrv) && !empty($CMUSchool) && !empty($CMUDept)) {

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

                        
                        $sqlCMUenroll = "UPDATE enrolledIn SET progName ='$CMUProgName', schoolNameAbbrv='$CMUSchool' WHERE id=$id;";
                        $CMUenroll = $db->prepare($sqlCMUenroll);
                        $CMUenroll->execute();

                    }else{
                        echo "Non-existent CMU school at CMU Program. Student's CMU enrollment not saved.";
                    }


                }else{


                	$sqlCMUenrolled= "SELECT * FROM enrolledIn WHERE id=$id AND enrollType = 'CMU';";
                	$CMUenrolled = $db->prepare($sqlCMUenrolled);
                    $CMUenrolled->execute();

                    if ($CMUenrolled->rowCount() == 0) {
	                    $sqlCMUenrollN = "INSERT INTO enrolledIn VALUES($id, '$CMUProgName', '$CMUSchool', 'Carnegie Mellon University', 'CMU');";
	                    $CMUenrollN = $db->prepare($sqlCMUenrollN);
	                    $CMUenrollN->execute();

                	}else{
	                	$sqlCMUenroll = "UPDATE enrolledIn SET progName ='$CMUProgName', schoolNameAbbrv='$CMUSchool' WHERE id=$id AND enrollType = 'CMU';";
	                	$CMUenroll = $db->prepare($sqlCMUenroll);
	                	$CMUenroll->execute();

                	}
                }


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
                        echo "Non-existent CMU school at CMU Program. Student's CMU enrollment not saved. ";
                    }       
                }else{ 

                	$sqlCMUassociated= "SELECT * FROM associatedToDept WHERE id=$id;";
                	$CMUassociated = $db->prepare($sqlCMUassociated);
                    $CMUassociated->execute();

                    if ($CMUassociated->rowCount() == 0) {
	                    $sqlCMUassociatedN = "INSERT INTO associatedToDept VALUES($id, '$CMUDept', '$CMUSchool', 'Carnegie Mellon University');";
	                    $CMUenrollN = $db->prepare($sqlCMUenrollN);
	                    $CMUenrollN->execute();

	                }else{

	                    $sqlCMUDept = "UPDATE associatedToDept SET deptName ='$CMUDept', schoolNameAbbrv='$CMUSchool' WHERE id=$id;";
	                    $CMUDept = $db->prepare($sqlCMUDept);
	                    $CMUDept->execute();
	                }
                }

                /*$sqlCMUenroll = "UPDATE enrolledIn SET progName ='$CMUProgName', schoolNameAbbrv='$CMUSchool' WHERE id=$id AND enrollType = 'CMU';";
                $CMUenroll = $db->prepare($sqlCMUenroll);
                $CMUenroll->execute();

                $sqlCMUDept = "UPDATE associatedToDept SET deptName ='$CMUDept', schoolNameAbbrv='$CMUSchool' WHERE id=$id;";
                $CMUDept = $db->prepare($sqlCMUDept);
                $CMUDept->execute();*/

            }   
        }


        if ($odt == 'Affiliated' or $degreeType == 'Affiliated'){

        	if ($odt == 'Dual Degree'){

        		$sqlDel = "DELETE FROM enrolledIn WHERE id=$id AND enrollType = 'CMU';";
        		$delResult = $db->prepare($sqlDel);
                $delResult->execute();
            }



            if (!empty($CMUSchool) && !empty($CMUDept)) {


                $sqlCMUdept = "SELECT * FROM department WHERE deptName = '$CMUDept' AND schoolNameAbbrv = '$CMUSchool' AND instName = 'Carnegie Mellon University';";
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
                        echo "Non-existent CMU school at CMU Program. Student's CMU enrollment not saved. ";
                    }       
                }else{ 


					$sqlCMUassociatedA= "SELECT * FROM associatedToDept WHERE id=$id;";
                	$CMUassociatedA = $db->prepare($sqlCMUassociatedA);
                    $CMUassociatedA->execute();

                    if ($CMUassociatedA->rowCount() == 0) {
	                    $sqlCMUassociatedN = "INSERT INTO associatedToDept VALUES($id, '$CMUDept', '$CMUSchool', 'Carnegie Mellon University');";
	                    $CMUenrollN = $db->prepare($sqlCMUenrollN);
	                    $CMUenrollN->execute();

	                }else{

	                    $sqlCMUDept = "UPDATE associatedToDept SET deptName ='$CMUDept', schoolNameAbbrv='$CMUSchool' WHERE id=$id;";
	                    $CMUDept = $db->prepare($sqlCMUDept);
	                    $CMUDept->execute();
	                }
                }
            }
        }



        if(!empty($PTProgName) && !empty($PTProgAbbrv) && !empty($PTSchool) && !empty($PTSchoolAbbrv) && !empty($PTUni) && !empty($PTUniAbbrv)) {

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

            $sqlPTenroll = "UPDATE enrolledIn SET progName = '$PTProgName', schoolNameAbbrv = '$PTSchoolAbbrv', instName = '$PTUni' WHERE id = $id AND enrollType = 'PT';";
            $PTenroll = $db->prepare($sqlPTenroll);
            $PTenroll->execute();
        }


        if(!empty($hostInst)){
            $sqlHostInst = "SELECT * FROM institution WHERE instName = '$hostInst';";
            $hostInstName = $db->prepare($sqlHostInst);
            $hostInstName->execute(); 

            if ($hostInstName->rowCount() == 0) {
                $sqlNewInst = "INSERT INTO institution VALUES('$hostInst', '$hostAbbrv', '$hostType');";
                $newInst = $db->prepare($sqlNewInst);
                $newInst->execute();
            }

            $sqlAWI = "SELECT * FROM affiliatedWithInst WHERE id=$id;";
            $aWI = $db->prepare($sqlAWI);
            $aWI->execute();

            if ($aWI->rowCount() == 0) {
                $sqlHost = "INSERT INTO affiliatedWithInst VALUES($id,'$hostInst');";
                $host = $db->prepare($sqlHost);
                $host->execute();
            }else{
                $sqlHost = "UPDATE affiliatedWithInst SET instName ='$hostInst' WHERE id= $id;";
                $host = $db->prepare($sqlHost);
                $host->execute();
            }

        }


        if(!empty($thesisName)){
	        $sqlwritesExist = "SELECT * FROM writes WHERE id=$id;";
        	$writesExist = $db->prepare($sqlwritesExist);
        	$writesExist->execute();

        	if ($writesExist->rowCount() == 0) {

                $sqlID = "SELECT max(thesisId) from thesis;";
		        $resultID = $db->prepare($sqlID);
		        $resultID->execute();
		        $maxId = array_values($resultID->fetch(PDO::FETCH_ASSOC));

		        $tId = $maxId[0] + 1; 

		        $sqlThesis = "INSERT INTO thesis VALUES($tId, '$thesisName', null);";
		        $resultThesis = $db->prepare($sqlThesis);
		        $resultThesis->execute();


        		$sqlWritesN = "INSERT INTO writes VALUES($id,$tId);";
        		$WritesN = $db->prepare($sqlWritesN);
	        	$WritesN->execute();

	       	
	       	}else{

	       		$sqlThesisId = "SELECT thesisId FROM writes WHERE id=$id;";
	       		$resThesisId = $db->prepare($sqlThesisId);
        		$resThesisId->execute();
        		$thesisIdExist = array_values($resThesisId->fetch(PDO::FETCH_ASSOC));

        		$sqlThesisE = "UPDATE thesis SET thesisTitle='$thesisName' WHERE thesisId=$thesisIdExist[0];";
		        $resultThesis = $db->prepare($sqlThesisE);
		        $resultThesis->execute();
		    }


        }

        


        if(!empty($thesisName) && !empty($thesisUrl)){

	        $sqlwritesExist = "SELECT * FROM writes WHERE id=$id;";
        	$writesExist = $db->prepare($sqlwritesExist);
        	$writesExist->execute();

        	if ($writesExist->rowCount() == 0) {

                $sqlID = "SELECT max(thesisId) from thesis;";
		        $resultID = $db->prepare($sqlID);
		        $resultID->execute();
		        $maxId = array_values($resultID->fetch(PDO::FETCH_ASSOC));

		        $tId = $maxId[0] + 1; 

		        $sqlThesis = "INSERT INTO thesis VALUES($tId, '$thesisName', '$thesisUrl');";
		        $resultThesis = $db->prepare($sqlThesis);
		        $resultThesis->execute();


        		$sqlWritesN = "INSERT INTO writes VALUES($id,$tId);";
        		$WritesN = $db->prepare($sqlWritesN);
	        	$WritesN->execute();

	       	
	       	}else{

	       		$sqlThesisId = "SELECT thesisId FROM writes WHERE id=$id;";
	       		$resThesisId = $db->prepare($sqlThesisId);
        		$resThesisId->execute();
        		$thesisIdExist = array_values($resThesisId->fetch(PDO::FETCH_ASSOC));

        		$sqlThesisE = "UPDATE thesis SET thesisTitle='$thesisName', url = '$thesisUrl' WHERE thesisId=$thesisIdExist[0];";
		        $resultThesis = $db->prepare($sqlThesisE);
		        $resultThesis->execute();
		    }



        }elseif(!empty($thesisName)){
	        $sqlwritesExist = "SELECT * FROM writes WHERE id=$id;";
        	$writesExist = $db->prepare($sqlwritesExist);
        	$writesExist->execute();

        	if ($writesExist->rowCount() == 0) {

                $sqlID = "SELECT max(thesisId) from thesis;";
		        $resultID = $db->prepare($sqlID);
		        $resultID->execute();
		        $maxId = array_values($resultID->fetch(PDO::FETCH_ASSOC));

		        $tId = $maxId[0] + 1; 

		        $sqlThesis = "INSERT INTO thesis VALUES($tId, '$thesisName', null);";
		        $resultThesis = $db->prepare($sqlThesis);
		        $resultThesis->execute();


        		$sqlWritesN = "INSERT INTO writes VALUES($id,$tId);";
        		$WritesN = $db->prepare($sqlWritesN);
	        	$WritesN->execute();

	       	
	       	}else{

	       		$sqlThesisId = "SELECT thesisId FROM writes WHERE id=$id;";
	       		$resThesisId = $db->prepare($sqlThesisId);
        		$resThesisId->execute();
        		$thesisIdExist = array_values($resThesisId->fetch(PDO::FETCH_ASSOC));

        		$sqlThesisE = "UPDATE thesis SET thesisTitle='$thesisName' WHERE thesisId=$thesisIdExist[0];";
		        $resultThesis = $db->prepare($sqlThesisE);
		        $resultThesis->execute();
		    }

        }elseif(!empty($thesisUrl)){
	        $sqlwritesExist = "SELECT * FROM writes WHERE id=$id;";
        	$writesExist = $db->prepare($sqlwritesExist);
        	$writesExist->execute();

        	if ($writesExist->rowCount() != 0) {

	       		$sqlThesisId = "SELECT thesisId FROM writes WHERE id=$id;";
	       		$resThesisId = $db->prepare($sqlThesisId);
        		$resThesisId->execute();
        		$thesisIdExist = array_values($resThesisId->fetch(PDO::FETCH_ASSOC));

        		$sqlThesisE = "UPDATE thesis SET url='$thesisUrl' WHERE thesisId=$thesisIdExist[0];";
		        $resultThesis = $db->prepare($sqlThesisE);
		        $resultThesis->execute();
		    }
		}


        
		if(!empty($gScholar)){
			$sqlgSExist = "SELECT * FROM profile WHERE id=$id AND type = 'Google Scholar';";
        	$gSexist = $db->prepare($sqlgSExist);
        	$gSexist->execute();

        	if ($gSexist->rowCount() == 0) {
        		$sqlGS = "INSERT INTO profile VALUES($id,'Google Scholar', '$gScholar');";
        		$resultGS = $db->prepare($sqlGS);
        		$resultGS->execute();

        	}else{
        		$sqlGSN = "UPDATE profile SET url= '$gScholar' WHERE id=$id AND type = 'Google Scholar';";
        		$resultGSN = $db->prepare($sqlGSN);
        		$resultGSN->execute();
        	}
        }


       	if(!empty($linkedIn)){
			$sqlLIExist = "SELECT * FROM profile WHERE id=$id AND type = 'LinkedIn';";
        	$LIexist = $db->prepare($sqlLIExist);
        	$LIexist->execute();

        	if ($LIexist->rowCount() == 0) {
        		$sqlLI = "INSERT INTO profile VALUES($id,'LinkedIn', '$linkedIn');";
        		$resultLI = $db->prepare($sqlLI);
        		$resultLI->execute();

        	}else{
        		$sqlLIN = "UPDATE profile SET url= '$linkedIn' WHERE id=$id AND type = 'LinkedIn';";
        		$resultLIN = $db->prepare($sqlLIN);
        		$resultLIN->execute();
        	}
        }


        if(!empty($orcid)){
			$sqlOExist = "SELECT * FROM profile WHERE id=$id AND type = 'Orcid';";
        	$Oexist = $db->prepare($sqlOExist);
        	$Oexist->execute();

        	if ($Oexist->rowCount() == 0) {
        		$sqlO = "INSERT INTO profile VALUES($id,'Orcid', '$orcid');";
        		$resultO = $db->prepare($sqlO);
        		$resultO->execute();

        	}else{
        		$sqlON = "UPDATE profile SET url= '$orcid' WHERE id=$id AND type = 'Orcid';";
        		$resultON = $db->prepare($sqlON);
        		$resultON->execute();
        	}
        }


        if(!empty($rGate)){
			$sqlRGExist = "SELECT * FROM profile WHERE id=$id AND type = 'Research Gate';";
        	$RGexist = $db->prepare($sqlRGExist);
        	$RGexist->execute();

        	if ($RGexist->rowCount() == 0) {
        		$sqlRG = "INSERT INTO profile VALUES($id,'Research Gate', '$rGate');";
        		$resultRG = $db->prepare($sqlRG);
        		$resultRG->execute();

        	}else{
        		$sqlRGN = "UPDATE profile SET url= '$rGate' WHERE id=$id AND type = 'Research Gate';";
        		$resultRGN = $db->prepare($sqlRGN);
        		$resultRGN->execute();
        	}
        }


        if(!empty($dblp)){
			$sqlDExist = "SELECT * FROM profile WHERE id=$id AND type = 'DBLP';";
        	$Dexist = $db->prepare($sqlDExist);
        	$Dexist->execute();

        	if ($Dexist->rowCount() == 0) {
        		$sqlD = "INSERT INTO profile VALUES($id,'DBLP', '$dblp');";
        		$resultD = $db->prepare($sqlD);
        		$resultD->execute();

        	}else{
        		$sqlDN = "UPDATE profile SET url= '$dblp' WHERE id=$id AND type = 'DBLP';";
        		$resultDN = $db->prepare($sqlDN);
        		$resultDN->execute();
        	}
        }




        if(!empty($webpage)){
			$sqlWPExist = "SELECT * FROM profile WHERE id=$id AND type = 'Webpage';";
        	$WPexist = $db->prepare($sqlWPExist);
        	$WPexist->execute();

        	if ($WPexist->rowCount() == 0) {
        		$sqlWP = "INSERT INTO profile VALUES($id,'Webpage', '$webpage');";
        		$resultWP = $db->prepare($sqlWP);
        		$resultWP->execute();

        	}else{
        		$sqlWPN = "UPDATE profile SET url= '$webpage' WHERE id=$id AND type = 'Webpage';";
        		$resultWPN = $db->prepare($sqlWPN);
        		$resultWPN->execute();
        	}
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


