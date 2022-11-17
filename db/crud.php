<?php 
    class crud
    {
        // private database object\
        private $db;
        
        //constructor to initialize private to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        //function to insert a new record into the attendee database
        public function insertAttendees($fname, $lname, $dob, $email,$phone,$specialty){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO attendee (firstname,lastname,dateofbirth,emailaddress,contactnumber,speciality_id)
                 VALUES (:fname,:lname,:dob,:email,:contact,:specialty)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                //$stmt->bindparam(":id",$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email); //was email
                $stmt->bindparam(':contact',$phone); //was contact
                $stmt->bindparam(':specialty',$specialty);
                // execute statement
                $stmt->execute();
                return true;




            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty) {   
        //    $sql = "UPDATE `attendee` SET `firstname` =[value-2], `lastname` =[value-3],
        //     `dateofbirth`=[value-4], `emailaddress`=[value-5], `contactnumber`=[value-6], `specialty_id`=[value-7] WHERE id";
           try{
              $sql = "UPDATE `attendee` SET `firstname` =:firstname, `lastname` =:lastname,
            `dateofbirth`=:dob, `emailaddress`=:email, `contactnumber`=:phone, `speciality_id` =:specialty WHERE attendee_id = :id";

              //prepare the sql statement for execution
              $stmt = $this->db->prepare($sql);
              //bind all placeholders to the actual values
              $stmt->bindparam(':id', $id);
              $stmt->bindparam(':firstname',$fname);
              $stmt->bindparam(':lastname',$lname);
              $stmt->bindparam(':dob',$dob);
              $stmt->bindparam(':email',$email); //was email
              $stmt->bindparam(':phone',$contact); //was contact
              $stmt->bindparam(':specialty',$specialty);
              //execute statement
              $stmt->execute();
              return true;
         } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
     
    
        public function getAttendees(){ 
            try{
               $sql = "SELECT * FROM `attendee` a inner join specialties s on a.speciality_id = s.specialty_id";
               $result = $this->db->query($sql);
               return $result;
        }  catch (PDOException $e) {
             echo $e->getMessage();
             return false;
        }
    }

        public function getAttendeeDetails($id){
             try{
                $sql = "select * from attendee a inner join specialties s on a.speciality_id = s.specialty_id where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
         } catch (PDOException $e) {
             echo $e->getMessage();
             return false;
        }
    }

        public function deleteAttendee($id){ 
            try{
               $sql = "delete from attendee where attendee_id = :id";
               $stmt = $this->db->prepare($sql);
               $stmt->bindparam(':id', $id);
               $stmt->execute();
               return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }


        }
         public function getSpecialties(){
            try{
               $sql = "SELECT * FROM `specialties`"; //Was Specialities
               $result = $this->db->query($sql);
               return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        
        
        }

        }

    }


?> 
