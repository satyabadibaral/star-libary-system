<?php


include_once("../Config/config.php");
include_once("../Config/database.php");

include_once(dir_url."models/loan.php");

// Add book functional 

if(isset($_POST['update']))
{
 
  $res=updateloan($conn,$_POST);
  if(isset($res['success'])){
    
    $_SESSION['success']="loans has been update Successfully";
    header("LOCATION:" .base_url ."loans");
  }
  else{
    $_SESSION['error']="Something went wrong, please try agine later ! ".$res['error'];
    header("LOCATION:" .base_url ."loans");
  }

}
// get book loan data by id

if (isset($_GET['action'])&& $_GET['action']=='edit'){
    $id=$_GET['id'];

    
    
    $data=getLoandatbyid($conn,$id);
    
    if($data->num_rows>0)
    {
      $loan=mysqli_fetch_assoc($data);
     
      
    }
    else{
      header("LOCATION:" .base_url ."loans");
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
            <h4 class="fw-bold text-uppercase">Edit loan details</h4>
          
 
            <div class="card">
              <div class="card-header">
                Fill the form
              </div>
              <div class="card-body">
              <form method="post" action="<?php echo base_url;?>loans/edit_loan.php">
                  <div class="row">
                  <div class="col-lg-6"><div class="mb-3">
                  <input type="hidden"  name="id" value="<?php echo $loan['id'];?>">
                      <label  class="form-label">Student Name</label>
                      <select class="form-select" aria-label="Disabled select example" name="student_id">
                        <option selected>please select</option>
                        <!-- php code used for get catagories names -->

                        <?php
                            $cat=getStudent($conn);
                            while($row=$cat->fetch_assoc()){
                              $selected=($row['id']==$loan['student_id'])?'selected':'';
                              ?>
                                <option <?php echo $selected ;?> value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                              <?php
                            }
                            
                        ?>
        
                       
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6"><div class="mb-3">
                      <label  class="form-label">Books Name</label>
                      <select class="form-select" aria-label="Disabled select example" name="books_id">
                        <option selected>please select</option>
                        <!-- php code used for get catagories names -->

                        <?php
                            $cat=getBook($conn);
                            while($row=$cat->fetch_assoc()){
                              $selected=($row['id']==$loan['books_id'])?'selected':'';
                              ?>
                                <option <?php echo$selected;?> value="<?php echo $row['id']?>"><?php echo $row['title']?></option>
                              <?php
                            }
                            
                        ?>
                        
                       
                      </select>
                    </div>
                  </div>
                    
                    <div class="col-lg-6"><div class="mb-3">
                      <label  class="form-label">Loan date</label>
                      <input type="date" class="form-control" name="loan_date" value="<?php echo $loan['loan_date'];?>" >
                    </div>
                  </div>
                  <div class="col-lg-6"><div class="mb-3">
                      <label  class="form-label">Return date</label>
                      <input type="date" class="form-control" name="return_date" value="<?php echo $loan['return_date'];?>" >
                    </div>
                  </div>
                  </div>
                            
                  <input type="submit" class="btn btn-success" name="update" value="Submit">
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