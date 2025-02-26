<?php


include_once("../Config/config.php");
include_once("../Config/database.php");

include_once(dir_url."models/book.php");

// Add book functional 

if(isset($_POST['publish']))
{
  $res=insertBook($conn,$_POST);
  if(isset($res['success'])){
    $_SESSION['success']="Book has been created Successfully";
    header("LOCATION:" .base_url ."books");
  }
  else{
    $_SESSION['error']="Something went wrong, please try agine later ! ".$res['error'];
    header("LOCATION:" .base_url ."books");
  }

}
include_once(dir_url."include/header.php");
include_once(dir_url."include/navbar.php");
include_once(dir_url."include/sidebar.php");

?>
      <!-- main containe start -->
       <main class="mt-1 pt-3">
        <div class="container-fluid">
            <h4 class="fw-bold text-uppercase">Add newbook</h4>
          
 
            <div class="card">
              <div class="card-header">
                Fill the form
              </div>
              <div class="card-body">
                <form method="post" action="<?php echo base_url;?>books/add_newbook.php">
                  <div class="row">
                    <div class="col-lg-6"><div class="mb-3">
                      <label  class="form-label">Book Name</label>
                      <input type="text" class="form-control" name="title" >
                    </div>
                  </div>
                    <div class="col-lg-6"><div class="mb-3">
                      <label  class="form-label">ISBN</label>
                      <input type="text" class="form-control" name="isbn" >
                    </div>
                  </div>
                    <div class="col-lg-6"><div class="mb-3">
                      <label  class="form-label">Authore Name</label>
                      <input type="text" class="form-control" name="author" >
                    </div>
                  </div>
                    <div class="col-lg-6"><div class="mb-3">
                      <label  class="form-label">Publisher Year</label>
                      <input type="text" class="form-control" name="publication_year" >
                    </div>
                  </div>
                    <div class="col-lg-6"><div class="mb-3">
                      <label  class="form-label">Catagoery/Coures</label>
                      <select class="form-select" aria-label="Disabled select example" name="catagory_id">
                        <option selected>please select</option>
                        <!-- php code used for get catagories names -->

                        <?php
                            $cat=getCategories($conn);
                            while($row=$cat->fetch_assoc()){
                              ?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                              <?php
                            }
                            
                        ?>
                        
                       
                      </select>
                    </div>
                  </div>
                  </div>
                            
                  <input type="submit" class="btn btn-success" name="publish" value="Publish">
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