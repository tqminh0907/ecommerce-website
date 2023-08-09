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
                            <div class="form-group">
                                <label>Category name</label>
                                <input class="form-control" type="text" name="cat_name" placeholder="Enter category name...">
                            </div>

                            <div class="form-group">
                              <label>Choice parent category</label>
                              <select class="form-control select2bs4" name="parent_id" style="width: 100%;">
                                <option value="0">- parent category -</option>
                                <?php categoryRecusive($dataCat) ?>
                              </select>
                            </div>

                            <input type="hidden" name="action" value="add">
                            <button type="submit" name="click" value="add" class="btn bg-gradient-success float-right m-2">SAVE</button>
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