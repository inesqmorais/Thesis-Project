<?php
    
    include("database.php");
    
    try{

        $db = $conn;

    
        function fetch_student_data($db){
  
            $sql = "WITH studentPT AS (SELECT * FROM person NATURAL JOIN student NATURAL JOIN enrolledIn WHERE enrollType = 'PT'), 
            dualdegreeCMU AS (SELECT *  FROM student NATURAL JOIN enrolledIn NATURAL JOIN associatedToDept),
            affiliatedDept AS (SELECT *  FROM student NATURAL JOIN associatedToDept WHERE degreeType = 'affiliated')
            SELECT studentPT.name, studentPT.researchArea, studentPT.status, studentPT.degreeType, studentPT.enrollYear, studentPT.endYear, studentPT.progName AS 'PT Program', studentPT.schoolNameAbbrv AS 'PT school', studentPT.instName AS 'PT University', dualdegreeCMU.progName AS 'CMU Program', dualdegreeCMU.schoolNameAbbrv  AS 'CMU School', dualdegreeCMU.deptname AS 'CMU Department'
            FROM studentPT
            INNER JOIN
            dualdegreeCMU
            ON studentPT.id = dualdegreeCMU.id
            UNION
            SELECT studentPT.name, studentPT.researchArea, studentPT.status, studentPT.degreeType, studentPT.enrollYear, studentPT.endYear, studentPT.progName AS 'PT Program', studentPT.schoolNameAbbrv AS 'PT school', studentPT.instName AS 'PT University', null, affiliatedDept.schoolNameAbbrv  AS 'CMU School', affiliatedDept.deptname AS 'CMU Department'
            FROM studentPT 
            INNER JOIN
            affiliatedDept
            ON studentPT.id = affiliatedDept.id
            ORDER BY enrollYear DESC;";
            
            $result = $db->prepare($sql);
            $result->execute();

            $row= $result->fetchAll();

            return $row;
        
        }

        $fetchData = fetch_student_data($db); 


        function fetch_student_less_data($db){
  
            $sqlStu = "SELECT name, researchArea, status, degreeType FROM person natural join student";
            
            $resultStu = $db->prepare($sqlStu);
            $resultStu->execute();

            $row= $resultStu->fetchAll();

            return $row;
        
        }

        $fetchLessData = fetch_student_less_data($db); 


        function fetch_student_personal_data($name){

            global $db;

            $email2_sql = "SELECT email2 from person WHERE name= '$name';";
            $email2_res = $db->prepare($email2_sql);
            $email2_res->execute();
            $email2 = array_values($email2_res->fetch(PDO::FETCH_ASSOC));


            $nationality2_sql = "SELECT nationality2 from person natural join student WHERE name= '$name';";
            $nationality2_res = $db->prepare($nationality2_sql);
            $nationality2_res->execute();
            $nationality2 = array_values($nationality2_res->fetch(PDO::FETCH_ASSOC));



            if (empty($email2[0]) && empty($nationality2[0])){
                $sql = "SELECT fullName AS 'Full Name', gender, email, nationality, nationalityArea AS 'Nationality Area' from person natural join student WHERE name= '$name';";
            }
            elseif (!empty($email2[0]) && empty($nationality2[0])){
                $sql = "SELECT fullName  AS 'Full Name', gender, email, email2, nationality, nationalityArea AS 'Nationality Area' from person natural join student WHERE name= '$name';";
            }
            elseif (empty($email2[0]) && !empty($nationality2[0])){
                $sql = "SELECT fullName  AS 'Full Name', gender, email, nationality, nationality2 AS 'Nationality 2', nationalityArea AS 'Nationality Area' from person natural join student WHERE name= '$name';";
            }else{
                $sql = "SELECT fullName  AS 'Full Name', gender, email, email2, nationality, nationality2 AS 'Nationality 2', nationalityArea AS 'Nationality Area' from person natural join student WHERE name= '$name';";
            
            }
            $result = $db->prepare($sql);
            $result->execute();

            /*$row = $result->fetchAll(\PDO::FETCH_NUM);*/

            return $result;
        
        }




        function fetch_academic_data($name){

            global $db;

            $student_sql = "SELECT status from person natural join student WHERE name= '$name';";
            $student_res = $db->prepare($student_sql);
            $student_res->execute();
            $student = $student_res->fetch(PDO::FETCH_ASSOC);

            


            if ($student['status'] =="Student"){ 
                $sql = "SELECT degreeType AS 'Degree Type', status, researchArea AS 'Research Area', enrollDate AS 'Enroll Date', academicEnrollYear AS 'Academic Enroll Year', enrollYear AS 'Enroll Year', expectedGradYear AS 'Expected Grad. Year', year(curdate()) - enrollYear AS 'Nr of Enrollments' from person natural join student WHERE name= '$name';";
            }else{


                $sql = "SELECT degreeType AS 'Degree Type', status, researchArea AS 'Research Area', enrollDate AS 'Enroll Date', academicEnrollYear AS 'Academic Enroll Year', enrollYear AS 'Enroll Year', endYear AS 'End Year', endYear - enrollYear AS 'Nr of Enrollments' from person natural join student WHERE name= '$name';";
            }
            
            $result = $db->prepare($sql);
            $result->execute();

            return $result;

            
        }


        function fetch_school_data($name){

            global $db;

            $sql1 = "SELECT enrollType, progName, progNameAbbrv, schoolName, null, deptName, instName, instNameAbbrv 
                    FROM person natural join enrolledIn natural join program natural join school natural join institution natural join associatedToDept
                    WHERE enrollType='CMU'AND name= '$name'
                    UNION
                    SELECT enrollType, progName, progNameAbbrv, schoolName, schoolNameAbbrv, null, instName,   instNameAbbrv 
                    from person natural join student natural join enrolledIn natural join program natural join school natural join institution 
                    WHERE enrollType='PT' AND degreeType= 'Dual Degree' AND name= '$name';";

            $sql2 = "SELECT 'CMU', null, null , schoolName, null, deptName, instName, instNameAbbrv 
                    FROM person natural join student natural join associatedToDept natural join school natural join institution
                    WHERE degreeType= 'Affiliated' AND name= '$name'
                    UNION
                    SELECT enrollType, progName, progNameAbbrv, schoolName, schoolNameAbbrv, null, instName,  instNameAbbrv 
                    FROM person natural join student natural join enrolledIn natural join program natural join school natural join institution 
                    WHERE enrollType='PT' AND degreeType= 'Affiliated' AND name= '$name';";

            
            $result1 = $db->prepare($sql1);
            $result2 = $db->prepare($sql2);
            
            $result1->execute();
            $result2->execute();
       
            $row1 = $result1->fetchAll(\PDO::FETCH_NUM);
            $row2 = $result2->fetchAll(\PDO::FETCH_NUM);

            if (!empty($row1)){
               return $row1;
            }           
            else {
                return $row2;
            }
        
        }



        function fetch_host_data($name){

            global $db;

            $sql = "SELECT instName AS 'Name', instNameAbbrv AS 'Abbreviation' from person natural join student natural join affiliatedWithInst natural join institution
                    WHERE name= '$name';";

            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;
        }




        function fetch_advisors_data($name){

            global $db;

            $sql = "WITH student AS ( SELECT id FROM person WHERE name = '$name')
                    SELECT advisingType AS 'Advsing Type', p.name
                    FROM student as s, advisedBy as a, person as p
                    WHERE s.id = a.student_id and a.person_id = p.id
                    ORDER BY advisingType;";  

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;
         
        }

        function fetch_thesis_data($name){

            global $db;

            $sql = "SELECT thesisTitle, url FROM person natural join writes natural join thesis WHERE name= '$name'";

            
            $result = $db->prepare($sql);
            
            $result->execute();
            return $result;

         
        }


        function fetch_profiles_data($name){

            global $db;

            $sql = "SELECT type, url 
                    FROM person natural join profile
                    WHERE name= '$name'";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }


        function fetch_DD_status_year(){
            global $db;

            $sql = "SELECT enrollYear AS 'Enrollment Year', status AS 'Status', COUNT(id) AS 'Nr of Dual degree Students' 
                    FROM student 
                    WHERE degreeType = 'Dual Degree'
                    GROUP BY enrollYear, status
                    ORDER BY enrollYear;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }





        function fetch_A_status_year(){
            global $db;

            $sql = "SELECT enrollYear AS 'Enrollment Year', status AS 'Status', COUNT(id) AS 'Nr of Affiliated Students' 
                    FROM student 
                    WHERE degreeType = 'Affiliated'
                    GROUP BY enrollYear, status
                    ORDER BY enrollYear;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }

            

        function fetch_DD_dept_year(){
            global $db;

            $sql = "SELECT enrollYear AS 'Enrollment Year', deptName AS 'Department CMU', COUNT(id) AS 'Nr of Dual degree Students'
                    FROM person NATURAL JOIN student NATURAL JOIN associatedToDept
                    WHERE degreeType = 'Dual Degree'
                    GROUP BY enrollYear, deptName
                    ORDER BY enrollYear;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }



        function fetch_Al_dept(){
            global $db;

            $sql = "SELECT deptName AS 'Department CMU', COUNT(id) AS 'Nr of Alumni'
                    FROM person NATURAL JOIN student NATURAL JOIN associatedToDept
                    WHERE status = 'Alumni'
                    GROUP BY deptName
                    ORDER BY deptName;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }


        function fetch_A_dept_year(){
            global $db;

            $sql = "SELECT enrollYear AS 'Enrollment Year', deptName AS 'Department CMU', COUNT(id) AS 'Nr of Affiliated Students'
                    FROM person NATURAL JOIN student NATURAL JOIN associatedToDept
                    WHERE degreeType = 'Affiliated'
                    GROUP BY enrollYear, deptName
                    ORDER BY enrollYear;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }


        function fetch_DD_phd_year(){
            global $db;

            $sql = "SELECT enrollYear AS 'Enrollment Year', progNameAbbrv AS 'Doctoral Program CMU', COUNT(id) AS 'Nr of Dual degree Students'
                    FROM student NATURAL JOIN enrolledIn NATURAL JOIN program
                    WHERE enrollType = 'CMU' AND degreeType = 'Dual Degree'
                    GROUP BY enrollYear, progNameAbbrv
                    ORDER BY enrollYear;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }




        function fetch_Al_phd_year(){
            global $db;

            $sql = "SELECT endYear AS 'Graduation Year', progNameAbbrv AS 'Doctoral Program CMU', COUNT(id) AS 'Nr of Alumni'
                    FROM student NATURAL JOIN enrolledIn NATURAL JOIN program
                    WHERE enrollType = 'CMU' AND status = 'Alumni'
                    GROUP BY endYear, progNameAbbrv
                    ORDER BY endYear;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }



        function fetch_A_area_year(){
            global $db;

            $sql = "SELECT enrollYear AS 'Enrollment Year', researchArea AS 'Research area', COUNT(id) AS 'Nr of Affiliated Students' 
                    FROM student 
                    WHERE degreeType = 'Affiliated'
                    GROUP BY enrollYear, researchArea
                    ORDER BY enrollYear;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }



        function fetch_DD_instPT(){
            global $db;

            $sql = "SELECT schoolNameAbbrv AS 'Institution PT', COUNT(id) AS 'Nr of Dual degree Students'
                    FROM student NATURAL JOIN enrolledIn 
                    WHERE enrollType = 'PT' AND degreeType = 'Dual Degree'
                    GROUP BY schoolNameAbbrv;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }


        function fetch_Al_instPT(){
            global $db;

            $sql = "SELECT schoolNameAbbrv AS 'Institution PT', COUNT(id) AS 'Nr of Alumni'
                    FROM student NATURAL JOIN enrolledIn 
                    WHERE enrollType = 'PT' AND status = 'Alumni'
                    GROUP BY schoolNameAbbrv;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }

        function fetch_A_instPT(){
            global $db;

            $sql = "SELECT schoolNameAbbrv AS 'Institution PT', COUNT(id) AS 'Nr of Affiliated Students'
                    FROM student NATURAL JOIN enrolledIn 
                    WHERE enrollType = 'PT' AND degreeType = 'Affiliated'
                    GROUP BY schoolNameAbbrv;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }

        function fetch_DD_gender(){
            global $db;

            $sql = "SELECT gender AS Gender, COUNT(id) AS 'Nr of Dual degree Students'
                    FROM person NATURAL JOIN student
                    WHERE degreeType = 'Dual Degree'
                    GROUP BY gender;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }

        function fetch_A_gender(){
            global $db;

            $sql = "SELECT gender AS Gender, COUNT(id) AS 'Nr of Affiliated Students'
                    FROM person NATURAL JOIN student
                    WHERE degreeType = 'Affiliated'
                    GROUP BY gender;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }


        function fetch_Al_gender(){
            global $db;

            $sql = "SELECT gender AS Gender, COUNT(id) AS 'Nr of Alumni'
                    FROM person NATURAL JOIN student
                    WHERE status = 'Alumni'
                    GROUP BY gender;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }


        function fetch_DD_nationality(){
            global $db;

            $sql = "SELECT nationalityArea AS Nationality, COUNT(id) AS 'Nr of Dual degree Students'
                    FROM person NATURAL JOIN student 
                    WHERE degreeType = 'Dual Degree'
                    GROUP BY nationalityArea;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }




        function fetch_A_nationality(){
            global $db;

            $sql = "SELECT nationalityArea AS Nationality, COUNT(id) AS 'Nr of Affiliated Students'
                    FROM person NATURAL JOIN student 
                    WHERE degreeType = 'Affiliated'
                    GROUP BY nationalityArea;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }


        function fetch_Al_nationality(){
            global $db;

            $sql = "SELECT nationalityArea AS Nationality, COUNT(id) AS 'Nr of Alumni'
                    FROM person NATURAL JOIN student 
                    WHERE status = 'Alumni'
                    GROUP BY nationalityArea;";

            
            $result = $db->prepare($sql);
            
            $result->execute();

            return $result;

        }


    }catch (PDOException $e)
        {
          echo("<p>ERRO: {$e->getMessage()}</p>");
        }


?>


