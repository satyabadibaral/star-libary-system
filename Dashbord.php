<?php

include_once("Config/config.php");
include_once(dir_url."include/middleware.php");
include_once("Config/database.php");
include_once(dir_url."models/dashbords.php");




// get students details

$res=getSudents($conn);

// get card count 

$count=getCount($conn);

// get loan details 
$res_loan=fetchloan($conn);

// get purchase history 
$form="";
 $to="";
 if(isset($_GET['form'])){
  $form=$_GET['form'];
 }
 if(isset($_GET['to'])){
  $to=$_GET['to'];
 }
    $res_pur=getPurchasehistory($conn,$form,$to);


include_once(dir_url."include/header.php");
include_once(dir_url."include/navbar.php");
include_once(dir_url."include/sidebar.php");




?>
    
      
      <!-- main containe start -->
       <main class="mt-1 pt-3">
        <div class="container-fluid">
           <!-- card start  -->
          <div class="row dashbord-count">
            <div class="col-md-12">
              <h4 class="fw-bold text-uppercase">Dashbord</h4>
              <p>Statistics of the system!</p>
            </div>
           

            <div class="col-md-3">
              <div class="card " >
                <div class="card-body text-center">
                  <h6 class="card-title text-uppercase fw-bold text-muted">Total books</h6>
                  
                  <h1><?php echo $count['books']?></h1>
                  <a href="#" class="card-link link-underline-light">View more</a>
                  
                </div>
              </div>
              
            </div>
            <div class="col-md-3">
              <div class="card " >
                <div class="card-body text-center">
                  <h6 class="card-title text-uppercase fw-bold text-muted">Total student</h6>
                  
                  <h1><?php echo $count['student']?></h1>
                  <a href="#" class="card-link link-underline-light">View more</a>
                  
                </div>
              </div>
              
            </div>
            <div class="col-md-3">
              <div class="card " >
                <div class="card-body text-center">
                  <h6 class="card-title text-uppercase fw-bold text-muted">Total Revenues</h6>
                  
                  <h1><i class="fa-solid fa-indian-rupee-sign"></i><?php echo $count['revenue']?></h1>
                  <a href="#" class="card-link link-underline-light">View more</a>
                  
                </div>
              </div>
              
            </div>
            <div class="col-md-3">
              <div class="card " >
                <div class="card-body text-center">
                  <h6 class="card-title text-uppercase fw-bold text-muted">Total books lone</h6>
                  
                  <h1><?php echo $count['loan']?></h1>
                  <a href="#" class="card-link link-underline-light">View more</a>
                  
                </div>
              </div>
              
            </div>
            

             

          </div>
          <!-- card end-->
           <div class="row mt-5">
            <div class="row dashbord-tab">
              <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link text-uppercase active" id="home-tab" data-bs-toggle="tab" data-bs-target="#newstudent" type="button"
                     role="tab" aria-controls="newstudent" aria-selected="true">Newstudent</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link text-uppercase" id="profile-tab" data-bs-toggle="tab" 
                    data-bs-target="#recentlone" type="button" role="tab" aria-controls="recentlone" aria-selected="false">recent lone</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link text-uppercase" id="recent-sub" data-bs-toggle="tab" 
                    data-bs-target="#recent-sub-pane" type="button" role="tab" aria-controls="recent-sub-pane" aria-selected="false">recent subscription</button>
                  </li>
                  
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="newstudent" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <table class="table">
                      <thead class="table-dark">
                        
                          <tr>
                           

                            <th scope="col">Sl No</th>
                      <th scope="col">Student name</th>
                      <th scope="col">Phone no</th>
                      <th scope="col">Email</th>
                      <th scope="col">Registered on</th>
                      <th scope="col">Status</th>

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
                  <td><?php  echo $row['name'] ;?></td>
                  <td><?php  echo $row['phone_no'] ;?></td>
                  <td><?php  echo $row['email'] ;?></td>
                  <td><?php  echo date("d-m-y h:i A",strtotime($row['created_at'])) ;?></td>
                  
                  <td>
                    <?php 
                    if($row['status']==1)
                    {
                      echo "<span class='badge text-bg-success'>active</span>" ;
                    }
                     else{
                      echo "<span class='badge text-bg-danger'>Inactive</span>" ;

                     }}
                     ?>
                </td>
               
                    </tr>
                        
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="recentlone" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">           
                  <table class="table">
                    <thead class="table-dark">
                  
                    <tr >
                      <th scope="col">Sl No</th>
                      <th scope="col">student name</th>
                      <th scope="col">Book name</th>
                      <th scope="col">Loan date</th>
                      <th scope="col">Return date</th>
                      <th scope="col">Status</th>
                      
                    </tr>
                
                </thead>
                <tbody>
                  
                  <?php 
                  $sl=0;
                 
                  
                  while($row=$res_loan->fetch_assoc()){
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
                 
                  

                      <?php  } ?>
                  </tr>
                  
                </tbody>
                  </table></div>
                  <div class="tab-pane fade" id="recent-sub-pane" role="tabpanel" aria-labelledby="recent-sub" tabindex="0">
                    <table class="table">
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
 
  
  
  while($data=$res_pur->fetch_assoc()){
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
        </div>
       </main>
      <!-- main containe end -->


      <?php
include_once(dir_url."include/footer.php");


?>
   
