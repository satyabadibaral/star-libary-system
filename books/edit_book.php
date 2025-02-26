<?php


include_once("../Config/config.php");
include_once("../Config/database.php");

include_once(dir_url."models/book.php");

// Add book functional 

if(isset($_POST['update']))
{
  
  $res=updateBook($conn,$_POST);
  if(isset($res['success'])){
    $_SESSION['success']="Book has been update Successfully";
    header("LOCATION:" .base_url ."books");
  }
  else{
    $_SESSION['error']="Something went wrong, please try agine later ! ".$res['error'];
    header("LOCATION:" .base_url ."books");
  }

}
// edit book funtion 

if (isset($_GET['action'])&& $_GET['action']=='edit'){
    $id=$_GET['id'];
    $data=editBook($conn,$id);
    
    if($data->num_rows>0)
    {
      $book=mysqli_fetch_assoc($data);
      

      
    }
    else{
      header("LOCATION:" .base_url ."books");
      exit;
    }
    
}
include_once(dir_url."include/header.php");
include_once(dir_url."include/navbar.php");
include_once(dir_url."include/sidebar.php");

?>
      <!-- main containe start -->
       <main class="mt-1 pt-3">
        <div class="container-fluid">
            <h4 class="fw-bold text-uppercase">Edit book details</h4>
          
 
            <div class="card">
              <div class="card-header">
                Fill the form
              </div>
              <div class="card-body">
                <form method="post" action="<?php echo base_url;?>books/edit_book.php">
                  <div class="row">
                    <div class="col-lg-6"><div class="mb-3">
                      <input type="hidden" class="form-control" name="id" value="<?php echo $book['id'];?>">
                      <label  class="form-label">Book Name</label>
                      <input type="text" class="form-control" name="title" value="<?php echo $book['title'];?>">
                    </div>
                  </div>
                    <div class="col-lg-6"><div class="mb-3">
                      <label  class="form-label">ISBN</label>
                      <input type="text" class="form-control" name="isbn" value="<?php echo $book['isbn'];?>">
                    </div>
                  </div>
                    <div class="col-lg-6"><div class="mb-3">
                      <label  class="form-label">Authore Name</label>
                      <input type="text" class="form-control" name="author" value="<?php echo $book['author'];?>">
                    </div>
                  </div>
                    <div class="col-lg-6"><div class="mb-3">
                      <label  class="form-label">Publisher Year</label>
                      <input type="text" class="form-control" name="publication_year" value="<?php echo $book['publication_year'];?>">
                    </div>
                  </div>
                    <div class="col-lg-6"><div class="mb-3">
                     
                      <label class="form-label">Category/Course</label>
<?php
$cat = getCategories($conn);
?>
<select class="form-select" aria-label="Disabled select example" name="catagory_id">
    <option selected>please select</option>
    <?php
    while ($row = $cat->fetch_assoc()) {
        $selected = ($row['id'] == $book['catagory_id']) ? 'selected' : '';
        ?>
        <option <?php echo $selected; ?> value="<?php echo $row['id']; ?>">
            <?php echo htmlspecialchars($row['name']); ?>
        </option>
        <?php
    }
    ?>
</select>
                    </div>
                  </div>
                  </div>

                  <input type="submit" class="btn btn-success" name="update" value="Update">
                  
                  <a href="<?php echo base_url?>/books" class="btn btn-secondary">Back</a>

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