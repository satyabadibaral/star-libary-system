
<!-- offcanvas start  -->
      
      
<div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <!-- <div class="offcanvas-header">
          
          
        </div> -->
        <div class="offcanvas-body">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <div class="text-secondary text-uppercase small fw-bold">Core</div>
            </li>
            <li class="nav-item my-0">
              <a class="nav-link active" aria-current="page" href="<?php echo base_url?>\Dashbord.php"><i class="fa-solid fa-gauge me-1"></i>Dashbord</a>
            </li>
            <li class="nav-item my-0">
              <hr>
            </li>
            <li class="nav-item">
              <div class="text-secondary text-uppercase small fw-bold">inventory</div>
            </li>
            <li class="nav-item">
              <a class="nav-link active sidebar-link" data-bs-toggle="collapse" href="#bookmgmt" role="button" aria-expanded="false" aria-controls="bookmgmt">

                <i class="fa-solid fa-book me-2"></i>Book Management <span class="right-icon float-end"><i class="fa-solid fa-chevron-down "></i></span>
              </a>
              <div class="collapse" id="bookmgmt">
                <ul class="navbar-nav ms-3">
                  <li class="nav-item">
                    <a href="<?php echo base_url;?>.\books\add_newbook.php" class="nav-link active"><i class="fa-solid fa-plus me-2"></i>Add new</a>
                    
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url;?>.\books" class="nav-link active"><i class="fa-solid fa-list me-2"></i>manage book</a>
                  </li>
                  </ul>
              </div>
              
            </li>
            <li class="nav-item">
              <a class="nav-link active sidebar-link" data-bs-toggle="collapse" href="#studentmgmt" role="button" aria-expanded="false" aria-controls="studentmgmt">

                <i class="fa-solid fa-user me-2"></i>Student Management <span class="right-icon float-end"><i class="fa-solid fa-chevron-down "></i></span>
              </a>
              <div class="collapse" id="studentmgmt">
                <ul class="navbar-nav ms-3">
                  <li class="nav-item">
                    <a href="<?php echo base_url;?>.\students\add_newstudents.php" class="nav-link active"><i class="fa-solid fa-plus me-2"></i>Add Student</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url;?>.\students" class="nav-link active"><i class="fa-solid fa-list me-2"></i>manage Student</a>
                  </li>
                  </ul>
              </div>
              
            </li>
            <li class="nav-item my-0">
              <hr>
            </li>
            <li class="nav-item">
              <div class="text-secondary text-uppercase small fw-bold">Business</div>
            </li>
            <li class="nav-item">
              <a class="nav-link active sidebar-link" data-bs-toggle="collapse" href="#lonemgmt" role="button" aria-expanded="false" aria-controls="lonemgmt">

                <i class="fa-solid fa-book-open me-2"></i>Book Loan <span class="right-icon float-end"><i class="fa-solid fa-chevron-down "></i></span>
              </a>
              <div class="collapse" id="lonemgmt">
                <ul class="navbar-nav ms-3">
                  <li class="nav-item">
                    <a href="<?php echo base_url;?>.\loans\add_loan.php" class="nav-link active"><i class="fa-solid fa-plus me-2"></i>Add new</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url;?>.\loans" class="nav-link active"><i class="fa-solid fa-list me-2"></i>manage Loan</a>
                  </li>
                  </ul>
              </div>
              
            </li>
            <li class="nav-item">
              <a class="nav-link active sidebar-link" data-bs-toggle="collapse" href="#Subscriptionmgmt" role="button" aria-expanded="false" aria-controls="Subscriptionmgmt">

                <i class="fa-solid fa-indian-rupee-sign me-2"></i>Subscription <span class="right-icon float-end"><i class="fa-solid fa-chevron-down "></i></span>
              </a>
              <div class="collapse" id="Subscriptionmgmt">
                <ul class="navbar-nav ms-3">
                  <li class="nav-item">
                    <a href="<?php echo base_url;?>./subscription/index.php" class="nav-link active"><i class="fa-solid fa-plus me-2"></i>Plans</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url;?>./subscription/purchase_history.php" class="nav-link active"><i class="fa-solid fa-list me-2"></i>Purchase History</a>
                  </li>
                  </ul>
              </div>
              
            </li>
            <li class="nav-item my-0">
              <hr>
            </li>
            <li class="nav-item my-0">
              <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-right-from-bracket me-1"></i>Logout</a>
            </li>
          </ul>
          
        </div>
      </div>
      <!-- offcanvas end  -->
