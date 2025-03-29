<?php


include_once("../Config/config.php");
include_once(dir_url."include/middleware.php");
include_once("../Config/database.php");

include_once(dir_url."models/subscription.php");

// update data 
if (isset($_POST['update'])){
  $update=planUpdate($conn,$_POST);
  if(isset($update['success']))
  {
    $_SESSION['success']="update successfull";
   
    header("LOCATION:" .base_url ."subscription");
  }

}


// get plan by id 

if(isset($_GET['id'])&& $_GET['action']=='edit'){


  $sub=fetchplanbyId($conn,$_GET['id']);
  $subdata=$sub->fetch_assoc();
  
}


include_once(dir_url."include/header.php");
include_once(dir_url."include/navbar.php");
include_once(dir_url."include/sidebar.php");

?>
      <!-- main containe start -->
       <main class="mt-1 pt-3">
        <div class="container-fluid">
        
        
        <h4 class="fw-bold text-uppercase">Edit plan <span class="btn btn-success " style="float:right;"><a href="<?php echo base_url?>/subscription" class="text-white text-decoration-none">Back</a></span></h4>
        
            
            
          
        <div class="row">
          
          <div class="col-lg-12">
          <div class="card">
 
  <div class="card-body">
    <blockquote class="blockquote mb-0">
    <form method="post" action="<?php echo base_url;?>subscription/edit_subcription.php">
                  <div class="row">
                    <div class="col-lg-6"><div class="mb-3">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $subdata['id']?>">
                      <label  class="form-label">Title</label>
                      <input type="text" class="form-control" name="title" value="<?php echo $subdata['title']?>">
                    </div>
                  </div>
                    
                  <div class="col-lg-6"><div class="mb-3">
                      <label  class="form-label">Amount</label>
                      <input type="text" class="form-control" name="amount" value="<?php echo $subdata['amount']?>">
                    </div>
                  </div>
                  <div class="col-lg-6"><div class="mb-3">
                      <label  class="form-label">Duraction</label>
                      <select class="form-select" aria-label="Disabled select example" name="duration" value="<?php echo $subdata['amount']?>" >
                     
                        <option value="">Please Select</option>
                        <?php 
                        for($i=1; $i<13;$i++){
                          $selected=($i==$subdata['duration'])?'selected':'';
                          
                          ?>
                          <option <?php echo $selected ;?> value="<?php echo $i;?>"><?php echo $i;?>Month(s)</option>

                          <?php  }
                        ?>
                        
                        
                      </select>
                    </div>
                  </div>
                  </div>
                  <input type="submit" class="btn btn-success" name="update" value="update">
                  <button type="submit" class="btn btn-secondary" name="cancel">Cancel</button>

                </form>

    </blockquote>
  </div>
</div>
          </div>
        </div>
           
           </div>
        </div>
       </main>
      <!-- main containe end -->


      <?php

include_once(dir_url."include/footer.php");

?>