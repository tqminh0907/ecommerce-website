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
                              <th>Order id</th>
                              <th>Customer id</th>
                              <th>name</th>
                              <th>email</th>
                              <th>phone</th>
                              <th>address</th>
                              <th>Note</th>
                              <th>Status</th>
                              <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach($dataOrders as $key => $value) {
                              ?>
                              <tr>
                                  <td><?php echo $key+1 ?></td>
                                  <td><?php echo $value['order_id'] ?></td>
                                  <td><?php echo $value['cus_id'] ?></td>
                                  <td><?php echo $value['name'] ?></td>
                                  <td><?php echo $value['email'] ?></td>
                                  <td><?php echo $value['phone'] ?></td>
                                  <td><?php echo $value['address'] ?></td>
                                  <td><?php echo $value['note'] ?></td>
                                  <td>
                                        <?php
                                          $textclass = '';
                                          $slect0 = '';
                                          $slect1 = '';
                                          $slect2 = '';
                                          $slect3 = '';
                                          switch($value['status']){
                                            case 0:
                                                $textclass = 'text-warning';
                                                $slect0 = 'selected';
                                                break;
                                            case 1:
                                                $textclass = 'text-primary';
                                                $slect1 = 'selected';
                                                break;
                                            case 2:
                                                $textclass = 'text-success';
                                                $slect2 = 'selected';
                                                break;
                                            case 3:
                                                $textclass = 'text-danger';
                                                $slect3 = 'selected';
                                                break;
                                          }
                                        
                                        ?>
                                        <form action="index.php" class="d-flex">
                                          <input type="hidden" name="controller" value="orders">
                                          <select name="status" class="btn-sm <?php echo $textclass ?>">
                                            <option value="0" <?php echo $slect0 ?> class="text-warning"> PROCESSING </option>
                                            <option value="1" <?php echo $slect1 ?> class="text-primary"> DELIVERY </option>
                                            <option value="2" <?php echo $slect2 ?> class="text-success"> COMPLETE</option>
                                            <option value="3" <?php echo $slect3 ?> class="text-danger"> CANCELED </option>
                                          </select>
                                          <input type="hidden" name="order_id" value="<?php echo $value['order_id'] ?>">
                                          <button type="submit" name="click" value="changestatus" class="btn-sm btn-secondary">save</button>
                                      </form>
                                  </td>
                                  <td>
                                    <a href="index.php?controller=orders&action=edit&order_id=<?php echo $value['order_id'] ?>" class="btn bg-gradient-warning btn-sm float-right m-2">
                                      Edit
                                    </a>
                                    <a href="index.php?controller=orders&click=delete&order_id=<?php echo $value['order_id'] ?>" class="btn bg-gradient-danger btn-sm float-right m-2">
                                      Delete
                                    </a>
                                  </td>
                              </tr>
                              <?php
                          }
                          ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>#</th>
                              <th>Order id</th>
                              <th>Customer id</th>
                              <th>name</th>
                              <th>email</th>
                              <th>phone</th>
                              <th>address</th>
                              <th>Note</th>
                              <th>Status</th>
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