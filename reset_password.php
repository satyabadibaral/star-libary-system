<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reset_password</title>
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
                          <h1 class="card-title">Star Library</h1>
                          <p class="card-text">Reset Password</p>
                          <form action="Dashbord.html" >
                        
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Reset code</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="reset_code">
                              </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label"> New Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="new_password">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Confirom password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="con_password">
                              </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                          <hr>
                          
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
</html>
