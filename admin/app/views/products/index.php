<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Products</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Products Page</li>
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
            <a href="index.php?controller=products&action=add" class="btn bg-gradient-primary float-right m-2">ADD</a>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                          <tr>
                              <th>#</th>
                              <th>Product Name</th>
                              <th>Image</th>
                              <th>Price</th>
                              <th>Category</th>
                              <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if (isset($dataPro)) {
                            foreach($dataPro as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $key+1 ?></td>
                                    <td><?php echo $value['pro_name'] ?></td>
                                    <td><img src="../assets/images/products/<?php echo $value['pro_avatar'] ?>" style="width:100px" alt=""></td>
                                    <td><?php echo number_format($value['pro_price']) ?>₫</td>
                                    <td><?php echo $value['cat_name'] ?></td>
                                    <td>
                                      <a href="index.php?controller=products&action=edit&pro_id=<?php echo $value['pro_id'] ?>" class="btn bg-gradient-warning btn-sm float-right m-2">
                                        Edit
                                      </a>
                                      <a href="index.php?controller=products&click=deletePro&pro_id=<?php echo $value['pro_id'] ?>" class="btn bg-gradient-danger btn-sm float-right m-2">
                                        Delete
                                      </a>
                                    </td>
                                </tr>
                                <?php
                            }
                          }
                          ?>
                        </tbody>
                        <tfoot>
                            <tr>
                              <th>#</th>
                              <th>Product Name</th>
                              <th>Image</th>
                              <th>Price</th>
                              <th>Category</th>
                              <th>Actions</th>
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