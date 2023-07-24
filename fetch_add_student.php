<?php
    
    include("database.php");
    
    try{

        $db = $conn;


    function fetch_names(){
    	global $db;

	    $sql ="SELECT DISTINCT name FROM person ORDER BY name";

	    $result = $db->prepare($sql);
        $result->execute();
        $row= $result->fetchAll(PDO::FETCH_NUM);
	    return $row; 
	    
	}

    function fetch_gender(){
    	global $db;

	    $sql ="SELECT DISTINCT gender FROM person ORDER BY gender";

	    $result = $db->prepare($sql);
        $result->execute();
        $row= $result->fetchAll(PDO::FETCH_NUM);
	    return $row; 
	    
	}


    function fetch_nationality(){
    	global $db;

	    $sql ="SELECT DISTINCT nationality FROM student ORDER BY nationality";

	    $result = $db->prepare($sql);
        $result->execute();
        $row= $result->fetchAll(PDO::FETCH_NUM);
	    return $row; 
	    
	}


	function fetch_nationalityArea(){
    	global $db;

	    $sql ="SELECT DISTINCT nationalityArea FROM student ORDER BY nationalityArea";

	    $result = $db->prepare($sql);
        $result->execute();
        $row= $result->fetchAll(PDO::FETCH_NUM);
	    return $row; 
	    
	}


    function fetch_degreeType(){
		global $db;

	    $sql ="SELECT DISTINCT degreeType FROM student ORDER BY degreeType";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= $result->fetchAll(PDO::FETCH_NUM);
	    return $row; 
	    
	}

	function fetch_status(){
		global $db;

	    $sql ="SELECT DISTINCT status FROM student ORDER BY status";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= $result->fetchAll(PDO::FETCH_NUM);
	    return $row; 
	    
	}

	function fetch_researchArea(){
		global $db;

	    $sql ="SELECT DISTINCT researchArea FROM student ORDER BY researchArea";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= $result->fetchAll(PDO::FETCH_NUM);
	    return $row; 
	    
	}

	function fetch_enrollYear(){
		global $db;

	    $sql ="SELECT DISTINCT enrollYear FROM student ORDER BY enrollYear";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= $result->fetchAll(PDO::FETCH_NUM);
	    return $row; 
	    
	}

	function fetch_academicEnrollYear(){
		global $db;

	    $sql ="SELECT DISTINCT academicEnrollYear FROM student ORDER BY academicEnrollYear";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= $result->fetchAll(PDO::FETCH_NUM);
	    return $row; 
	    
	}

	function fetch_expectGradYear(){
		global $db;

	    $sql ="SELECT DISTINCT expectedGradYear FROM student ORDER BY expectedGradYear";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= $result->fetchAll(PDO::FETCH_NUM);
	    return $row; 
	    
	}


	function fetch_CMUprogs(){
		global $db;

	    $sql ="SELECT DISTINCT progName FROM program WHERE instName= 'Carnegie Mellon University' ORDER BY progName";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= $result->fetchAll(PDO::FETCH_NUM);
	    return $row; 
	    
	}

	function fetch_CMUabbrv(){
		global $db;

	    $sql ="SELECT DISTINCT progNameAbbrv FROM program WHERE instName= 'Carnegie Mellon University' ORDER BY progNameAbbrv";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row; 
	    
	}


	function fetch_CMUschool(){
		global $db;

	    $sql ="SELECT DISTINCT schoolName FROM school WHERE instName= 'Carnegie Mellon University' ORDER BY schoolName";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row; 
	    
	}

	function fetch_CMUdept(){
		global $db;

	    $sql ="SELECT DISTINCT deptName FROM department ORDER BY deptName";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row; 
	    
	}


	function fetch_PTprogs(){
		global $db;

	    $sql ="SELECT DISTINCT progName FROM program WHERE instName != 'Carnegie Mellon University' ORDER BY progName";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= $result->fetchAll(PDO::FETCH_NUM);
	    return $row; 
	    
	}

	function fetch_PTabbrv(){
		global $db;

	    $sql ="SELECT DISTINCT progNameAbbrv FROM program WHERE instName != 'Carnegie Mellon University' ORDER BY progNameAbbrv";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row; 
	    
	}

	function fetch_PTschool(){
		global $db;

	    $sql ="SELECT DISTINCT schoolName FROM school WHERE instName!= 'Carnegie Mellon University' ORDER BY schoolName";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row; 
	    
	}

	function fetch_PTschoolAbbrv(){
		global $db;

	    $sql ="SELECT DISTINCT schoolNameAbbrv FROM school WHERE instName!= 'Carnegie Mellon University' ORDER BY schoolNameAbbrv";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row; 
	    
	}

	function fetch_PTuni(){
		global $db;

	    $sql ="SELECT DISTINCT instName FROM institution WHERE instName!= 'Carnegie Mellon University' AND instType ='University' ORDER BY instName";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row; 
	    
	}

	function fetch_PTuniAbbrv(){
		global $db;

	    $sql ="SELECT DISTINCT instNameAbbrv FROM institution WHERE instName!= 'Carnegie Mellon University' AND instType ='University' ORDER BY instNameAbbrv";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row; 
	    
	}


	function fetch_hostInst(){
		global $db;

	    $sql ="SELECT DISTINCT instName FROM institution WHERE instType ='Research Center' ORDER BY instName";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row; 
	    
	}

	function fetch_hostAbbrv(){
		global $db;

	    $sql ="SELECT DISTINCT instNameAbbrv FROM institution WHERE instType ='Research Center' ORDER BY instNameAbbrv";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row; 
	    
	}

	function fetch_hostTypes(){
		global $db;

	    $sql ="SELECT DISTINCT instType FROM institution ORDER BY instType";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row; 
	    
	}


	function fetch_Adv_Type(){
		global $db;

	    $sql = "SELECT DISTINCT advisingType FROM advisedBy ORDER BY advisingType";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row;  
	}

	function fetch_Advs(){
		global $db;

	    $sql ="SELECT DISTINCT name FROM person AS p NATURAL JOIN advisedBy AS a WHERE p.id = a.person_id ORDER BY name";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row;  
	}


	function fetch_CMUAdv(){
		global $db;

	    $sql ="SELECT DISTINCT name FROM person AS p NATURAL JOIN advisedBy AS a WHERE p.id = a.person_id AND advisingType = 'CMU' ORDER BY name";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row;  
	}

	function fetch_PTAdv(){
		global $db;

	    $sql ="SELECT DISTINCT name FROM person AS p NATURAL JOIN advisedBy AS a WHERE p.id = a.person_id AND advisingType = 'PT' ORDER BY name";

	    $result = $db->prepare($sql);
	    $result->execute();
	    $row= array_values($result->fetchAll(PDO::FETCH_ASSOC));
	    return $row;  
	}


    }catch (PDOException $e)
        {
          echo("<p>ERRO: {$e->getMessage()}</p>");
        }
?>