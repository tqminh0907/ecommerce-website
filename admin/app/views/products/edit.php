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
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">EDIT</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="index.php" enctype="multipart/form-data">
                            <input type="hidden" name="controller" value="products">

                            <input type="hidden" name="pro_id" value="<?php echo $dataPro[0]['pro_id'] ?>">
                            <!-- Tên sản phẩm -->
                            <div class="form-group">
                                <label>Product name</label>
                                <input class="form-control" type="text" name="pro_name" placeholder="Enter product name..." value="<?php echo $dataPro[0]['pro_name'] ?>">
                            </div>

                            <!-- hình đại diện sản phẩm -->
                            <div class="form-group">
                                <label>Add avatar</label>
                                <div class="d-flex">
                                  <img src="../assets/images/products/<?php echo $dataPro[0]['pro_avatar'] ?>" style="width:20%" alt="">
                                  <input type="file" class="form-control-file" name="pro_avatar" value="<?php echo $dataPro[0]['pro_avatar'] ?>">
                                </div>
                            </div>

                            <!-- hình ảnh của sản phẩm -->
                            <div class="form-group">
                                <label>Add images</label>
                                <div class="row d-flex">
                                  <?php
                                      foreach ($dataImg as $key => $value)
                                      {
                                        ?>
                                        <div class="card" style="width:10%">
                                          <div class="card-tool">
                                              <a href="index.php?controller=products&action=edit&pro_id=<?php echo $value['pro_id'] ?>&click=deleteImg&img_id=<?php echo $value['img_id'] ?>&img_name=<?php echo $value['img_name'] ?>" class="btn-close" aria-label="Close"></a>
                                          </div>
                                          <div class="card-body">
                                            <img src="../assets/images/products/<?php echo $value['img_name'] ?>" style="width:100%" alt="">
                                          </div>
                                        </div>
                                        <?php
                                      }
                                  ?>
                                </div>
                            
                                <input type="file" class="form-control-file" name="pro_images[]" multiple>
                            </div>

                            <!-- giá -->
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" type="number" name="pro_price" placeholder="Enter product price..." value="<?php echo $dataPro[0]['pro_price'] ?>">
                            </div>

                            <!-- Loại sản phẩm -->
                            <div class="form-group">
                              <label>Product category</label>
                              <select class="form-control select2bs4" name="cat_id" style="width: 100%;">
                                <?php categoryRecusive($dataCat, $dataPro[0]['cat_id']) ?>
                              </select>
                            </div>

                            <!-- Nội dung sản phẩm -->
                            <div class="form-group">
                                <label>Product content</label>
                                <textarea id="summernote" name="pro_content">
                                      <?php echo $dataPro[0]['pro_content'] ?>
                                </textarea>
                            </div>

                            <input type="hidden" name="action" value="edit">
                            <button type="submit" name="click" value="editPro" class="btn bg-gradient-success m-2">SAVE</button>
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