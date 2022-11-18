<?php 
     $title = 'Success'; 
     require_once 'includes/header.php';
     require_once 'db/conn.php';
     require_once 'sendmail.php';
     
     if(isset($_POST['submit'])){
        //extract values from the $_POST ARRAY
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];


         
    $orig_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = "$target_dir$contact.$ext";
    move_uploaded_file($orig_file,$destination);

    

        //Call function to insert and track if success or not
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty, $destination);

         //FUNCTION ADDED FOR CONFIRMATION EMAILS
    $specialtyName = $crud->getSpecialtyById($specialty); //NEW EMail

        if($isSuccess){


          SendEmail::SendMail($email, 'Welcome to IT Conference 2022', 'You have successfuly registered for his year\'s IT Conference'); //NEW Mail


            // echo '<h1 class="text-center text-success">You Have Been Registered!</h1>';
            include 'includes/successmessage.php';
        }
        else{
          include 'includes/errormessage.php';
        }

     }
     ?>


     <!--This prints out values that were passed to the action page using method="get" -->
     <!--<div class="card" style="width: 18rem;">
       <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
         <h5 class="card-title">
             <?php //echo $_GET["firstname"] ."" . $_GET["lastname"]; ?>
         </h5>
         <h6 class="card-subtitle mb-2 text-muted">
             <?php // echo $_GET["speciality"]; ?>
         </h6>
         <p class="card-text">
           Date of Birth: <?php // echo $_GET["dob"]; ?>
         </p>
         <p class="card-text">
           Email Address: <?php // echo $_GET["emailhelp"]; ?>
         </p>
         <p class="card-text">
           Contact Number: <?php // echo $_GET["phonehelp"]; ?>

     </div>
 </div> -->

     <!--This prints out values that were passed to the action page using method="post" -->
     <img src="<?php echo $destination; ?>" class="rounded-circle" style="width: 20%; height: 20%"/>
 <div class="card" style="width: 18rem;">
       <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
         <h5 class="card-title">
         <?php echo $_POST['firstname'] . '' . $_POST['lastname']; ?>
         </h5>
         <h6 class="card-subtitle mb-2 text-muted">
             <?php  echo $specialtyName['name']; ?>
         </h6>
         <p class="card-text">
           Date of Birth: <?php  echo $_POST['dob']; ?>
         </p>
         <p class="card-text">
           Email Address: <?php  echo $_POST['email']; ?>
         </p>
         <p class="card-text">
           Contact Number: <?php  echo $_POST['phone']; ?>

     </div>
 </div> 



 <!-- <a href="view.php?id=<?php //echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>
          <a href="edit.php?id=<?php// echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
          <a onclick="return confirm('Are you sure you want to delete this record?');"
          href="delete.php?id=<?php //echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a></td> -->
<?php
        // echo $_POST["firstname"];
        // echo $_POST["lastname"];
        // echo $_POST["emailhelp"];
        // echo $_POST["phonehelp"];
        // echo $_POST["speciality"];


     ?>
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php';?>