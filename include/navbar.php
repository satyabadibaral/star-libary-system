
<!-- navbar start  -->
<nav class="navbar navbar-expand-lg navbar-dark  navbar-dark bg-dark sticky-top">
      <div class="container-fluid">
        <!-- offcanva trigger start -->
       
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          <span class="navbar-toggler-icon "></span>
        </button>
        <!-- offcanva trigger end -->

        <a class="navbar-brand text-uppercase fw-bold me-auto" href="#" >Star libray</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
          <form class="d-flex ms-auto" role="search">
            <div class="input-group my-2 my-lg-0">
              <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="button-addon2" placeholder="Search...">
              <button class="btn btn-outline-secondary btn-primary" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass text-white"></i></button>
            </div>
          </form>
          <ul class="navbar-nav  mb-2 mb-lg-0">
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo base_url;?>./assets/images/p.jpeg" alt="" class="admin-icon">
                Admin
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">My profile</a></li>
                <li><a class="dropdown-item" href="#">change password</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="<?php echo base_url;?>logout.php">logout</a></li>
              </ul>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
     <!-- navbar end  -->