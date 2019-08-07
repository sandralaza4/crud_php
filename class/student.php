<?php
class Student
{
    private $conn;
    function __construct() {
    session_start();
    $servername = "localhost";
    $dbname = "Ecole";
    $username = "root";
    $password = "";
  

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
       }else{
        $this->conn=$conn;  
       }

    }


    public function student_list(){
        
       $sql = "SELECT * FROM students ORDER BY student_id asc ";
       $result=  $this->conn->query($sql);
       return $result;  
    }
    
    public function create_student_info($post_data=array()){
         
       if(isset($post_data['create_student'])){
       $student_nom= mysqli_real_escape_string($this->conn,trim($post_data['student_nom']));
       $student_prenom= mysqli_real_escape_string($this->conn,trim($post_data['student_prenom']));

       $sql="INSERT INTO students (student_nom, student_prenom) VALUES ('$student_nom', '$student_prenom')";
        
        $result=  $this->conn->query($sql);
        
           if($result){
           
               $_SESSION['message']="Successfully Created Student Info";
               
              header('Location: index.php');
           }
          
       unset($post_data['create_student']);
       }
       
        
    }
    
    public function view_student_by_student_id($id){
       if(isset($id)){
       $student_id= mysqli_real_escape_string($this->conn,trim($id));
      
       $sql="Select * from students where student_id='$student_id'";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 
    
       }  
    }
    
    
    public function update_student_info($post_data=array()){
       if(isset($post_data['update_student'])&& isset($post_data['id'])){
           
       $student_nom= mysqli_real_escape_string($this->conn,trim($post_data['student_nom']));
       $student_prenom= mysqli_real_escape_string($this->conn,trim($post_data['student_prenom']));
       $student_id= mysqli_real_escape_string($this->conn,trim($post_data['id']));

       $sql="UPDATE students SET student_nom='$student_nom',student_prenom='$student_prenom' WHERE student_id =$student_id";
     
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']="Successfully Updated Student Info";
           }
       unset($post_data['update_student']);
       }   
    }
    
    public function delete_student_info_by_id($id){
        
       if(isset($id)){
       $student_id= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  students  WHERE student_id =$student_id";
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']="Successfully Deleted Student Info";
            
           }
       }
         header('Location: index.php'); 
    }
    function __destruct() {
    mysqli_close($this->conn);  
    }
    
}

?>