<?php


include_once("../Config/config.php");
include_once("../Config/database.php");
include_once(dir_url."models/loan.php");

// get Loan details

$res=fetchloan($conn);


// delect loans

if(isset($_GET['action'])&& $_GET['action']=='delete'){
  
  $del=deleteloan($conn,$_GET['id']);
  if($del){
     $_SESSION['success']="loan has been delected successfull";
     
  }
  else{
     $_SESSION['error']="loan has not been delected ";
  }
  header("LOCATION:".base_url ."loans");
  exit;
}
// edit loans details 
// if(isset($_GET['action'])&& $_GET['action']=='edit'){
  
//   $edit=editloan($conn,$_GET['id']);
//   if($edit){
//      $_SESSION['success']="Book has been edit successfull";
     
//   }
//   else{
//      $_SESSION['error']="Book has not been edit";
//   }
//   header("LOCATION:".base_url ."books");
//   exit;
// }

// update status 
if (isset($_GET['action'])&& $_GET['action']=='status'){
$update=updateStatus($conn,$_GET['id'],$_GET['status']);
if($update)
{
  if($_GET['status']==0)
  $mes="loan  has been successfully cloaed ";
else
$mes="loan not  has been successfully closed";
  $_SESSION['success']=$mes;
}
else{
  $_SESSION['error']="status update not successfull";
}
header("LOCATION:".base_url ."loans");
  exit;
}

  
include_once(dir_url."include/header.php");
include_once(dir_url."include/navbar.php");
include_once(dir_url."include/sidebar.php");





?>
      <!-- main containe start -->
      <main class="mt-1 pt-3">
      <div class="container-fluid">
        <?php
        include_once(dir_url."include/alert.php");
        ?>
     <div class="d-flex justify-content-between">
      
     
      <h4 class="fw-bold text-uppercase">manage Loan</h4>
      <a href="<?php echo base_url;?>/loans/add_loan.php" class="btn btn-info">Add Loan</a>
      </div>
          <div class="card">
            <div class="card-header">
              All Books
            </div>
            <div class="card-body">
              <table id="datatable" class="table table-striped text-center" style="width:100%">
                <thead class="table-dark">
                  
                    <tr class="text-center">
                      <th scope="col">Sl No</th>
                      <th scope="col">student name</th>
                      <th scope="col">Book name</th>
                      <th scope="col">Loan date</th>
                      <th scope="col">Return date</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                
                </thead>
                <tbody>
                  
                  <?php 
                  $sl=0;
                 
                  
                  while($row=$res->fetch_assoc()){
                    $sl++;
                    ?>
                  <tr>
                  <td ><?php  echo  $sl;?></td>
                  <td><?php  echo $row['student_name'] ;?></td>
                  <td><?php  echo $row['book_name'] ;?></td>
                  <td><?php  echo $row['loan_date'] ;?></td>
                  <td><?php  echo $row['return_date'] ;?></td>
                  
                  <td>
                    <?php 
                    if($row['is_return']==1)
                    {
                      echo "<span class='badge text-bg-success'>active</span>" ;
                    }
                     else{
                      echo "<span class='badge text-bg-warning'>Returned</span>" ;

                     }
                     ?>
                </td>
                 
                  <td><span class="btn btn-primary">
                    <a href="<?php  echo base_url;?>loans/edit_loan.php?action=edit&id=<?php echo $row['id']?>" class="text-white text-decoration-none">Edit</a>
                  </span>
                  <span class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">
                      <a href="<?php  echo base_url;?>loans?action=delete&id=<?php echo $row['id']?>" class="text-white text-decoration-none">Delete</a>
                  </span>
                  <?php
                  if($row['is_return']==1){ ?>
                    <span class="btn btn-warning">
                      <a href="<?php  echo base_url;?>loans?action=status&id=<?php echo $row['id']?>&status=0" class="text-white text-decoration-none">Return</a>
                  </span>
                  <?php 
                  }
                  
                  ?>
                  
                  

                    </td>

                      <?php  } ?>
                  </tr>
                  
                </tbody>
              </table>
              
            </div>
            
          </div>
      </div>
      </main>
      <!-- main containe end -->


      <?php

include_once(dir_url."include/footer.php");

?>