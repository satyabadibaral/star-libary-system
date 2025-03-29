<?php


include_once("../Config/config.php");
include_once(dir_url."include/middleware.php");
include_once("../Config/database.php");

include_once(dir_url."models/subscription.php");

if(isset($_POST['submit'])){
  $add=create_purchase($conn,$_POST);
  if(isset($add['success'])){
    $_SESSION['success']="plan purchase successfull";
    header("LOCATION:".base_url."subscription/purchase_history.php");
    exit;
  }
}


// get purchase history 
$form="";
 $to="";
 if(isset($_GET['form'])){
  $form=$_GET['form'];
 }
 if(isset($_GET['to'])){
  $to=$_GET['to'];
 }
    $res=getPurchasehistory($conn,$form,$to);


// print_r($res);
// exit;

include_once(dir_url."include/header.php");
include_once(dir_url."include/navbar.php");
include_once(dir_url."include/sidebar.php");

?>
      <!-- main containe start -->
       <main class="mt-1 pt-3">
        <div class="container-fluid">
        <div class="row">
        <div class="col-lg-12">
            <h4 class="fw-bold text-uppercase">purchase history
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float:right";>
                Purchase subcription
</button></h4>
            

</div>
</div>

            <?php
            
        include_once(dir_url."include/alert.php");
        
        ?>


        <div class="row">
             <div class="col-lg-12">
          <div class="card">
  <div class="card-header">
  Subcription purchase history
  </div>
  <div class="card-body">
    <h4>Search</h4>
    <form action=""method="get">
        <div class="row">
        <div class="col-md-3">
                      <label  class="form-label">Start date</label>
                      <input type="date" class="form-control" name="form" >
                    
                    </div>
                    <div class="col-md-3">
                   
                      <label  class="form-label">End date</label>
                      <input type="date" class="form-control" name="to" >

                  </div>
                  <div class="col-md-3">
                  <div class="mb-3">
                  <input type="submit" class="btn btn-success" name="search" value="search" style="margin-top: 32px;">
                  </div>
                    </div>
                    
                  </div>
        </div>
    
    </form>
  
    
    
    <table id="datatable" class="table table-striped text-center" style="width:100%">
  <thead class="table-dark">
 <tr >
  <th>Sl no</th>
  <th>Studnt name</th>
  <th>Plan</th>
  <th>Start date</th>
  <th>End date</th>
  <th>Status</th>
 </tr>
  </thead>
<tbody>
  <?php
 $slno="";
 
  
  
  while($data=$res->fetch_assoc()){
    $slno++;?>
<tr>
        <td><?php echo $slno ;?></td>
        <td><?php echo $data['student_name'];?></td>
        <td><?php echo $data['plan'];?></td>
        <td><?php echo $data['start_date'];?></td>
        <td><?php echo $data['end_date'];?></td>
        <?php
        $today=date("Y-m-d");
        if($today<$data['end_date']){?>
        <td><?php echo "<span class='badge text-bg-success'>Active</span>";?></td>
        
         
       <?php }
       else{

        ?>
        <td><?php echo "<span class='badge text-bg-danger'>Expair</span>";?></td>
           
       <?php
       }
        ?>

        
        
    </tr>
  <?php }
  ?>
    
</tbody>
</table>
    
  </div>
</div>
          </div>
           </div>
        </div>
       </main>
      <!-- main containe end -->

      <!-- Modal for create subcritions-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Purchase subcription</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <div class="col-lg-12"><div class="mb-3">
                      <label  class="form-label">Student Name</label>
                      <select class="form-select" aria-label="Disabled select example" name="student_id">
                        <option selected>please select</option>
                        <!-- php code used for get catagoriestudents names -->

                        <?php
                            $cat=getStudent($conn);
                            while($row=$cat->fetch_assoc()){
                              ?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                              <?php
                            }
                            
                        ?>
                        
                       
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-12"><div class="mb-3">
                      <label  class="form-label">Plan</label>
                      <select class="form-select" aria-label="Disabled select example" name="plan_id">
                     
                        <option value="">Please Select</option>
                        <?php 
                        $plan=getPlan($conn);
                        while($plans=$plan->fetch_assoc()){?>
                          <option value="<?php echo $plans['id'];?>"><?php echo $plans['title'];?></option>

                          <?php  }
                        ?>
                        
                        
                      </select>
                    </div>
                  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    
        <input type="submit" name="submit"  class="btn btn-primary" value="Purchase">
      </div>
        </form>

    </div>
  </div>
</div>


      <?php

include_once(dir_url."include/footer.php");

?>