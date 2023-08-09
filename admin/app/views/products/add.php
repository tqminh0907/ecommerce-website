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
                        <h3 class="card-title">ADD</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="index.php" enctype="multipart/form-data">

                            <input type="hidden" name="controller" value="products">

                            <!-- Tên sản phẩm -->
                            <div class="form-group">
                                <label>Product name</label>
                                <input class="form-control" type="text" name="pro_name" placeholder="Enter product name...">
                            </div>

                            <!-- hình đại diện sản phẩm -->
                            <div class="form-group">
                                <label>Add avatar</label>
                                <input type="file" class="form-control-file" name="pro_avatar">
                            </div>

                            <!-- hình ảnh của sản phẩm -->
                            <div class="form-group">
                                <label>Add images</label>
                                <input type="file" class="form-control-file" name="pro_images[]" multiple>
                            </div>

                            <!-- giá -->
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" type="number" name="pro_price" placeholder="Enter product name...">
                            </div>

                            <!-- Loại sản phẩm -->
                            <div class="form-group">
                              <label>Product category</label>
                              <select class="form-control select2bs4" name="cat_id" style="width: 100%;">
                                <?php categoryRecusive($dataCat) ?>
                              </select>
                            </div>

                            <!-- Nội dung sản phẩm -->
                            <div class="form-group">
                                <label>Product content</label>
                                <textarea id="summernote" name="pro_content">
                                    Don't have <u>description</u>.
                                </textarea>
                            </div>

                            <input type="hidden" name="action" value="add">
                            <button type="submit" name="click" value="addPro" class="btn bg-gradient-success m-2">SAVE</button>
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