<?php


include_once("../Config/config.php");
include_once("../Config/database.php");
include_once(dir_url."models/book.php");

// get Books

$res=fetchBook($conn);

// delect book

if(isset($_GET['action'])&& $_GET['action']=='delete'){
  
  $del=deletebook($conn,$_GET['id']);
  if($del){
     $_SESSION['success']="Book has been delected successfull";
     
  }
  else{
     $_SESSION['error']="Book has not been delected ";
  }
  header("LOCATION:".base_url ."books");
  exit;
}
// edit book details 
if(isset($_GET['action'])&& $_GET['action']=='edit'){
  
  $edit=editBook($conn,$_GET['id']);
  if($edit){
     $_SESSION['success']="Book has been edit successfull";
     
  }
  else{
     $_SESSION['error']="Book has not been edit";
  }
  header("LOCATION:".base_url ."books");
  exit;
}

// update status 
if (isset($_GET['action'])&& $_GET['action']=='status'){
$update=updateStatus($conn,$_GET['id'],$_GET['status']);
if($update)
{
  if($_GET['status']==0)
  $mes="Book has been successfully activated ";
else
$mes="Book has been successfully deactivated";
  $_SESSION['success']=$mes;
}
else{
  $_SESSION['error']="status update not successfull";
}
header("LOCATION:".base_url ."books");
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
      
     
      <h4 class="fw-bold text-uppercase">manage books</h4>
      <a href="<?php echo base_url;?>/books/add_newbook.php" class="btn btn-info">Add Book</a>
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
                      <th scope="col">Book name</th>
                      <th scope="col">Author name</th>
                      <th scope="col">Publish year</th>
                      <th scope="col">ISBN no</th>
                      <th scope="col">catagorie name</th>
                      <th scope="col">Status</th>

                      <th scope="col">Created at</th>
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
                  <td><?php  echo $row['title'] ;?></td>
                  <td><?php  echo $row['author'] ;?></td>
                  <td><?php  echo $row['publication_year'] ;?></td>
                  <td><?php  echo $row['isbn'] ;?></td>
                  <td><?php  echo $row['cat_name'] ;?></td>
                  <td>
                    <?php 
                    if($row['status']==1)
                    {
                      echo "<span class='badge text-bg-success'>active</span>" ;
                    }
                     else{
                      echo "<span class='badge text-bg-danger'>Inactive</span>" ;

                     }
                     ?>
                </td>
                  <td><?php  echo date("d-m-y h:i A",strtotime($row['created_at'])) ;?></td>
                  <td><span class="btn btn-primary">
                    <a href="<?php  echo base_url;?>books/edit_book.php?action=edit&id=<?php echo $row['id']?>" class="text-white text-decoration-none">Edit</a>
                  </span>
                  <span class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">
                      <a href="<?php  echo base_url;?>books?action=delete&id=<?php echo $row['id']?>" class="text-white text-decoration-none">Delete</a>
                  </span>
                  <?php
                  if($row['status']==0){ ?>
                    <span class="btn btn-success">
                      <a href="<?php  echo base_url;?>books?action=status&id=<?php echo $row['id']?>&status=1" class="text-white text-decoration-none">Active</a>
                  </span>
                  <?php 
                  }
                  else{?>

                            <span class="btn btn-warning">
                      <a href="<?php  echo base_url;?>books?action=status&id=<?php echo $row['id']?>&status=0" class="text-white text-decoration-none">inactive</a>
                  </span>
                    <?php }
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