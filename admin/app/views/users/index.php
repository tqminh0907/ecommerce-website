<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Orders</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Orders Page</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <a href="index.php?controller=users&action=add" class="btn bg-gradient-primary float-right m-2">ADD</a>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User list</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                          <tr>
                              <th>#</th>
                              <th>User id</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>Type</th>
                              <th>Created at</th>
                              <td>Actions</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach($dataUser as $key => $value) {
                              ?>
                              <tr>
                                  <td><?php echo $key+1 ?></td>
                                  <td><?php echo $value['user_id'] ?></td>
                                  <td><?php echo $value['user_name'] ?></td>
                                  <td><?php echo $value['user_email'] ?></td>
                                  <td><?php echo $value['user_phone'] ?></td>
                                  <td><?php echo $value['user_address'] ?></td>
                                  <td>
                                    <?php 
                                      switch($value['administrator']) {
                                        case 0:
                                          echo "customer";
                                          break;
                                        case 1:
                                          echo "super admin";
                                          break;
                                        case 2:
                                          echo "admin";
                                          break;
                                      }
                                  
                                    ?>
                                  </td>
                                  <td><?php echo $value['created_at'] ?></td>
                                  <td>
                                    <a href="index.php?controller=users&action=edit&user_id=<?php echo $value['user_id'] ?>" class="btn bg-gradient-warning btn-sm float-right m-2">
                                      Edit
                                    </a>
                                    <?php
                                    if ($value['administrator'] != 1) {
                                      ?>
                                      <a href="index.php?controller=users&click=delete&user_id=<?php echo $value['user_id'] ?>" class="btn bg-gradient-danger btn-sm float-right m-2">
                                        Delete
                                      </a>
                                      <?php
                                    }
                                    ?>
                                  </td>
                              </tr>
                              <?php
                          }
                          ?>
                        </tbody>
                        <tfoot>
                            <tr>
                              <th>#</th>
                              <th>User id</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>Type</th>
                              <th>Created at</th>
                              <td>Actions</td>
                            </tr>
                        </tfoot>
                    </table>
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