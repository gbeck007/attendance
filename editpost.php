<?php 
     $title = 'edit post'; 
     require_once 'includes/header.php';
     require_once 'db/conn.php';
     
     if(isset($_POST['submit'])){
        //extract values from the $_POST ARRAY
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        //Call function to insert and track if success or not
        $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty);
        // echo '<h1 class="text-center text-success">You Have successfully updated the record!</h1>';
       
       
       
       
        if($result){
          header("Location: viewrecords.php");
      }
      else{ 
          echo 'error';
         include 'includes/errormessage.php'; 

     }
    }
  ?>


     

     

<?php require_once 'includes/footer.php';?>