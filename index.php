<?php

include_once("Config/config.php");
include_once("Config/database.php");


// $passwors="happy1996";
// $hash=password_hash($passwors,PASSWORD_DEFAULT);
// echo $hash;
// exit;
// // if(password_verify("happy1996",$hash)){
// //   echo "You are logged in!";
// // }
// // else{
// //   echo"invalid password";
// // }
include_once(dir_url."models/auth.php");
if($_POST['submit']){
  $res=login($conn,$_POST);

  if($res['status']==true){
    
    $_SESSION['is_user_login']=true;
    $_SESSION['user']=$res['user'];
    header("LOCATION:".base_url."Dashbord.php");
    exit;
  }
  else{
    $_SESSION['error']="invalid information";
    header("LOCATION:".base_url."index.php");
    exit;

  }
  
}

?>
<!DOCTYPE.php>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>login | Libary project</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha
    384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
      <link rel="stylesheet" href="./assets/css/Style.css">
  </head>
  <body style="background-color: rgb(41, 37, 37);">
    <div class="container  vh-100 d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3" style="max-width:900px;">
                    <div class="row g-0">
                      <div class="col-md-5">
                        <img src="./assets/images/library.jpg" class="img-fluid rounded-start " alt="..." style="height:100%;">
                      </div>
                      <div class="col-md-7">
                        <div class="card-body">
                         
                         <?php
                         include_once(dir_url."include/alert.php");
                         ?>
                       
                          <h1 class="card-title">Star Library</h1>
                          <p class="card-text">Enter email and password for login</p>
                          <form action="<?php echo base_url;?>index.php" method="post">
                            <div class="mb-3">
                              <label for="email" class="form-label">Email address</label>
                              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                             
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            </div>
                           
                            
                            <input type="submit" class="btn btn-primary" value="Login" name="submit">
                          </form>
                          <hr>
                          <a href="forgetpassword.php" class="card-link text-decoration-none" target="_blank">Forget password</a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</php>
