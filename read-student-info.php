<?php
 include 'header.php';
 

 if(isset($_GET['id'])){
  $student_info=$student_obj->view_student_by_student_id($_GET['id']);
  


     
 }else{
  header('Location: index.php');
 }
 
 
 ?>
<div class="container " > 
    
  <div class="row content">

       
          
           
             <a  href="index.php"  class="button button-purple mt-12 pull-right">View Student List</a> 
     
 <h3>View Student Info</h3>
       
    
     <hr/>
   
   
 
      
    <label >Nom:</label>
   <?php  if(isset($student_info['student_nom'])){echo $student_info['student_nom']; }?>

<br/>
    <label>prenom:</label>
  <?php  if(isset($student_info['student_prenom'])){echo $student_info['student_prenom'];} ?>
    
    <br/>          

    <a href="<?php echo 'update-student-info.php?id='.$student_info["student_id"] ?>" class="button button-blue">Edit</a>

   
  
     
   
  </div>
     
</div>
<hr/>
 <?php
 include 'footer.php';
 ?>

