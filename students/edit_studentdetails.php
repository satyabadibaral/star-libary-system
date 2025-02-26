<?php


include_once("../Config/config.php");
include_once("../Config/database.php");

include_once(dir_url."models/students.php");

// Add book functional for update

if(isset($_POST['update']))
{
  
  $res=updateStudents($conn,$_POST);
  if(isset($res['success'])){
    $_SESSION['success']="Student has been update Successfully";
    header("LOCATION:" .base_url ."students");
  }
  else{
    $_SESSION['error']="Something went wrong, please try agine later ! ".$res['error'];
    header("LOCATION:" .base_url ."students");
  }

}
// get student data  funtion 

if (isset($_GET['action'])&& $_GET['action']=='edit'){
    $id=$_GET['id'];
    $data=getStudentbyid($conn,$id);
    
    if($data->num_rows>0)
    {
      $student=mysqli_fetch_assoc($data);
    
    }
    else{
      header("LOCATION:" .base_url ."students");
      exit;
    }
    
}
include_once(dir_url."include/header.php");
include_once(dir_url."include/navbar.php");
include_once(dir_url."include/sidebar.php");

?>
      <!-- main containe start -->
       <main class="mt-1 pt-3">
        <div class="container-fluid">
            <h4 class="fw-bold text-uppercase">Edit Student details</h4>
          
 
            <div class="card">
              <div class="card-header">
                Fill the form
              </div>
              <div class="card-body">
              <form method="post" action="<?php echo base_url;?>students/edit_studentdetails.php">
                  <div class="row">

                    <div class="col-lg-6">
                      <div class="mb-3">
                      <input type="hidden" class="form-control" name="id" value="<?php echo $student['id'];?>">
                      <label  class="form-label">Student Name</label>
                      <input type="text" class="form-control" name="name" value="<?php  echo $student['name']?>" >
                    </div>
                  </div>
                    <div class="col-lg-6">
                      <div class="mb-3">
                      <label  class="form-label">Email</label>
                      <input type="text" class="form-control" name="email" value="<?php  echo $student['email']?>" >
                    </div>
                  </div>
                    <div class="col-lg-6">
                      <div class="mb-3">
                      <label  class="form-label">Phone no</label>
                      <input type="text" class="form-control" name="phone_no" value="<?php  echo $student['phone_no']?>">
                    </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="mb-3">
                      <label  class="form-label">DOB</label>
                      <input type="date" class="form-control" name="dob" value="<?php  echo $student['dob']?>" >
                    </div>
                  </div>
                    <div class="col-lg-12">
                      <div class="mb-3">
                      <label  class="form-label">Address</label>
                      <textarea name="address" id="" class="form-control" ><?php  echo $student['address']?></textarea>
                      
                    </div>
                  </div>
                  </div>
                  <input type="submit" class="btn btn-success" name="update" value="Update">
                  <button type="submit" class="btn btn-secondary" name="cancel">Cancel</button>

                </form>
                
              </div>
              
            </div>
           
           </div>
        </div>
       </main>
      <!-- main containe end -->


      <?php

include_once(dir_url."include/footer.php");

?>