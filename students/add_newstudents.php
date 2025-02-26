<?php


include_once("../Config/config.php");
include_once("../Config/database.php");

include_once(dir_url."models/students.php");

// Add Students functional 

if(isset($_POST['submit']))
{
  $res=insertStudent($conn,$_POST);


  if(isset($res['success'])){
    $_SESSION['success']="student has been Added Successfully";
    header("LOCATION:" .base_url ."students");
  }
  else{
    $_SESSION['error']="Something went wrong, please try agine later ! ".$res['error'];
    header("LOCATION:" .base_url ."students");
  }

}
include_once(dir_url."include/header.php");
include_once(dir_url."include/navbar.php");
include_once(dir_url."include/sidebar.php");

?>
      <!-- main containe start -->
       <main class="mt-1 pt-3">
        <div class="container-fluid">
            <h4 class="fw-bold text-uppercase">Add newstudents</h4>
          
 
            <div class="card">
              <div class="card-header">
                Fill the form
              </div>
              <div class="card-body">
                <form method="post" action="<?php echo base_url;?>students/add_newstudents.php">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="mb-3">
                      <label  class="form-label">Student Name</label>
                      <input type="text" class="form-control" name="name" >
                    </div>
                  </div>
                    <div class="col-lg-6">
                      <div class="mb-3">
                      <label  class="form-label">Email</label>
                      <input type="text" class="form-control" name="email" >
                    </div>
                  </div>
                    <div class="col-lg-6">
                      <div class="mb-3">
                      <label  class="form-label">Phone no</label>
                      <input type="text" class="form-control" name="phone_no" >
                    </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="mb-3">
                      <label  class="form-label">DOB</label>
                      <input type="date" class="form-control" name="dob" >
                    </div>
                  </div>
                    <div class="col-lg-12">
                      <div class="mb-3">
                      <label  class="form-label">Address</label>
                      <textarea name="address" id="" class="form-control"></textarea>
                      
                    </div>
                  </div>
                  </div>
                  <input type="submit" class="btn btn-success" name="submit" value="Submit">
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