<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ADD</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form method="post" action="index.php">
                        <input type="hidden" name="controller" value="users">
                          <div class="mb-3">
                              <label class="form-label">Email</label>
                              <input type="email" name="user_email" class="form-control" aria-describedby="emailHelp" placeholder="name@example.com">
                              <div id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</div>
                          </div>

                          <div class="mb-3">
                              <label class="form-label">Password</label>
                              <input type="password" name="user_pass" class="form-control" aria-describedby="passwordHelpBlock">
                              <div id="passwordHelpBlock" class="form-text text-muted">
                                  Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                              </div>
                          </div>

                          <div class="mb-3">
                              <label class="form-label">Name</label>
                              <input type="text" name="user_name" class="form-control">
                          </div>

                          <div class="mb-3">
                              <label class="form-label">Phone</label>
                              <input type="tel" name="user_phone" class="form-control">
                          </div>

                          <div class="mb-3">
                              <label class="form-label">Address</label>
                              <input type="text" name="user_address" class="form-control">
                          </div>

                          <label class="form-label">User type</label>
                          <div class="form-check">
                            <input type="radio" class="form-check-input" name="administrator" value="0">
                            <label class="form-check-label">Customer</label>
                          </div>

                          <div class="form-check">
                            <input type="radio" class="form-check-input" name="administrator" value="2">
                            <label class="form-check-label">Admin</label>
                          </div>

                          <button type="submit" name="click" value="signup" class="btn btn-primary m-2">Sign up</button>  
                      </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->