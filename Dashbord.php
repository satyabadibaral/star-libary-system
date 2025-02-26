<?php
include_once("Config/config.php");
include_once("Config/database.php");
  
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
                  
                  <h1>100</h1>
                  <a href="#" class="card-link link-underline-light">View more</a>
                  
                </div>
              </div>
              
            </div>
            <div class="col-md-3">
              <div class="card " >
                <div class="card-body text-center">
                  <h6 class="card-title text-uppercase fw-bold text-muted">Total student</h6>
                  
                  <h1>130</h1>
                  <a href="#" class="card-link link-underline-light">View more</a>
                  
                </div>
              </div>
              
            </div>
            <div class="col-md-3">
              <div class="card " >
                <div class="card-body text-center">
                  <h6 class="card-title text-uppercase fw-bold text-muted">Total Revenues</h6>
                  
                  <h1><i class="fa-solid fa-indian-rupee-sign"></i>120300</h1>
                  <a href="#" class="card-link link-underline-light">View more</a>
                  
                </div>
              </div>
              
            </div>
            <div class="col-md-3">
              <div class="card " >
                <div class="card-body text-center">
                  <h6 class="card-title text-uppercase fw-bold text-muted">Total books lone</h6>
                  
                  <h1>35</h1>
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
                            <th scope="col">Name</th>
                            <th scope="col">Preparing for</th>
                            <th scope="col">Registered on</th>
                            <th scope="col">Status</th>
                          </tr>
                      
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>et</td>
                          <td>erfds</td>
                          <td>dsfe</td>
                          <td><span class="badge text-bg-success">Success</span></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="recentlone" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">           
                  <table class="table">
                    <thead class="table-dark">
                      
                        <tr>
                          <th scope="col">Sl No</th>
                          <th scope="col">Book Name</th>
                          <th scope="col">Student Name</th>
                          <th scope="col">Lone Date</th>
                          <th scope="col">Due Date</th>
                          <th scope="col">Status</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>et</td>
                        <td>erfds</td>
                        <td>dsfe</td>
                        <td>dsfe</td>
                        <td><span class="badge text-bg-success">Success</span></td>
                      </tr>
                      
                    </tbody>
                  </table></div>
                  <div class="tab-pane fade" id="recent-sub-pane" role="tabpanel" aria-labelledby="recent-sub" tabindex="0">
                    <table class="table">
                      <thead class="table-dark">
                        
                          <tr>
                            <th scope="col">Sl No</th>
                            <th scope="col">Student name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Status</th>
                          </tr>
                      
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>et</td>
                          <td>erfds</td>
                          <td>dsfe</td>
                          <td>dsfe</td>
                          <td><span class="badge text-bg-success">Success</span></td>
                        </tr>
                        
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
   
