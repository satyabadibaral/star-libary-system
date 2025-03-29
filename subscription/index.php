<?php


include_once("../Config/config.php");
include_once(dir_url."include/middleware.php");
include_once("../Config/database.php");

include_once(dir_url."models/subscription.php");

// // Add New plan

if(isset($_POST['submit']))

{
 
  $res=addplan($conn,$_POST);
  if(isset($res['success'])){
    $_SESSION['success']="subscription was  Successfully";
    
  }
  else{
    $_SESSION['error']="Something went wrong, please try agine later ! ".$res['error'];
    
  }
  header("LOCATION:" .base_url ."subscription/index.php");
  exit;
}
// fetch the subcription plan

$plan=getsubcription($conn);
// status update 

if(isset($_GET['action']) && $_GET['action']=='status'){

$update=statusUpdate($conn,$_GET['id'],$_GET['status']);
if($update)
{
  if($_GET['status']==0)
  $mes="plan  has been successfully cloaed ";
else
$mes="plan not  has been successfully open";
  $_SESSION['success']=$mes;
}
else{
  $_SESSION['error']="status update not successfull";
}
header("LOCATION:".base_url ."subscription");
  exit;
}

// Delect plan 

if(isset(($_GET['action'])) && $_GET['action']=='delete'){

  $delete=subDelete($conn,$_GET['id']);
    if($delete){
      $_SESSION['success']="delete was successfull";
    }
    
    else{
      $_SESSION['error']="delete was not successfull";
    }

      header("LOCATION:".base_url ."subscription");
  exit;
}





include_once(dir_url."include/header.php");
include_once(dir_url."include/navbar.php");
include_once(dir_url."include/sidebar.php");

?>
      <!-- main containe start -->
       <main class="mt-1 pt-3">
        <div class="container-fluid">
        
        
            <h4 class="fw-bold text-uppercase">Subscription plan</h4>
            <?php
            
        include_once(dir_url."include/alert.php");
        
        ?>
        <div class="row">
          <div class="col-lg-8">
          <div class="card">
  <div class="card-header">
  All Plan
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
    <table class="table table-striped table-hover">
  <thead class="table-dark">
 <tr >
  <th>Sl no</th>
  <th>Title</th>
  <th>Amount</th>
  <th>Duration</th>
  <th>Status</th>
  <th>Action</th>
 </tr>
  </thead>
  <tbody>
    <?php
$sl=0;
    while($data=$plan->fetch_assoc()){
      $sl++;
      ?>
<tr>
<td><?php echo $sl ;?></td>
  <td><?php echo $data['title'];?></td>
  <td><?php echo $data['amount'];?></td>
  <td><?php echo $data['duration'];?></td>
  <td>
  <?php 
                    if($data['status']==1)
                    {
                      echo "<span class='badge text-bg-success'>active</span>" ;
                    }
                     else{
                      echo "<span class='badge text-bg-danger'>Inactive</span>" ;

                     }
                     ?>
  </td>
  <td>
  <span class="btn btn-primary">
                    <a href="<?php  echo base_url;?>subscription/edit_subcription.php?action=edit&id=<?php echo $data['id']?>" class="text-white text-decoration-none">Edit</a>
                  </span>
                  <span class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">
                      <a href="<?php  echo base_url;?>subscription/index.php?action=delete&id=<?php echo $data['id']?>" class="text-white text-decoration-none">Delete</a>
                  </span>
                  <?php
                  if($data['status']==0){ ?>
                    <span class="btn btn-success">
                      <a href="<?php  echo base_url;?>subscription?action=status&id=<?php echo $data['id']?>&status=1" class="text-white text-decoration-none">Active</a>
                  </span>
                  <?php 
                  }
                  else{?>

                            <span class="btn btn-warning">
                      <a href="<?php  echo base_url;?>subscription?action=status&id=<?php echo $data['id']?>&status=0" class="text-white text-decoration-none">inactive</a>
                  </span>
                    <?php }
                  ?>
                  
                  
  </td>
 
</tr>

   <?php }
    ?>

  </tbody>
</table>
    </blockquote>
  </div>
</div>
          </div>
          <div class="col-lg-4">
          <div class="card">
  <div class="card-header">

  Add New Plan
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
    <form method="post" action="<?php echo base_url;?>subscription/index.php">
                  <div class="row">
                    <div class="col-lg-12"><div class="mb-3">
                      <label  class="form-label">Title</label>
                      <input type="text" class="form-control" name="title" >
                    </div>
                  </div>
                    
                  <div class="col-lg-12"><div class="mb-3">
                      <label  class="form-label">Amount</label>
                      <input type="text" class="form-control" name="amount" >
                    </div>
                  </div>
                  <div class="col-lg-12"><div class="mb-3">
                      <label  class="form-label">Duraction</label>
                      <select class="form-select" aria-label="Disabled select example" name="duration">
                     
                        <option value="">Please Select</option>
                        <?php 
                        for($i=1; $i<13;$i++){?>
                          <option value="<?php echo $i;?>"><?php echo $i;?>Month(s)</option>

                          <?php  }
                        ?>
                        
                        
                      </select>
                    </div>
                  </div>
                  </div>
                  <input type="submit" class="btn btn-success" name="submit" value="Save">
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