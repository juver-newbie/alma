
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Categories</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>IMDP">Home</a></li>
          <li class="breadcrumb-item active">Categories</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 mt-20 mb-10">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory"><i class="bi bi-plus-lg"></i> Add Category</button>
                </div>
                <div class="modal fade" id="addCategory" tabindex="-1">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form class="row g-3" action="<?php echo base_url(); ?>superadmin/addCategory" method="post">
                          <div class="col-md-12">
                            <?php
                              $temp = $lastID->id+1;
                              $code = "";
                              if(strlen($temp) == 1)
                              {
                                $code = '0'.$temp;
                              }
                              else
                              {
                                $code = $temp;
                              }
                            ?>
                            <div class="form-floating">
                              <input type="text" class="form-control" name="code" id="code" placeholder="Code" autocomplete="off" value="<?php echo $code; ?>" readonly>
                              <label for="code">Code</label>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="name" id="name" placeholder=" Name" autocomplete="off" required>
                              <label for="name">Name</label>
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="reset" class="btn btn-secondary">Clear</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                      </div>
                        </form>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div style="width: 100%; overflow-x: auto; ">
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Edit/Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $count = 0;
                        foreach($categories as $category)
                        {
                          $count++;
                      ?>
                        <tr scope="row">
                          <th><?php echo $count; ?></th>
                          <th><?php echo $category->code; ?></th>
                          <th><?php echo $category->name; ?></th>
                          <th><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editCategory<?php echo $category->id; ?>">Edit</button>
                      <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCategory<?php echo $category->id; ?>">Delete</button></th>
                        </tr>
                        <div class="modal fade" id="editCategory<?php echo $category->id; ?>" tabindex="-1">
                          <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Update Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form class="row g-3" action="<?php echo base_url(); ?>superadmin/updateCategory" method="post">
                                  <div class="col-md-12 mt-10">
                                    <input type="hidden" name="id" value="<?php echo $category->id; ?>">
                                    <div class="form-floating">
                                      <input type="text" class="form-control" name="code" id="code" placeholder="Code" autocomplete="off" value="<?php echo $category->code; ?>" readonly>
                                      <label for="code">Code</label>
                                    </div>
                                  </div>
                                  <div class="col-md-12 mt-10">
                                    <div class="form-floating">
                                      <input type="text" class="form-control" name="name" id="name" placeholder=" Name" autocomplete="off" value="<?php echo $category->name; ?>" required>
                                      <label for="name">Name</label>
                                    </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="reset" class="btn btn-secondary">Clear</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                                </form>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="deleteCategory<?php echo $category->id; ?>" tabindex="-1">
                          <div class="modal-dialog">
                            <form action="<?php echo base_url(); ?>superadmin/deleteCategory" method="post">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Delete Category?</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  Delete category "<?php echo $category->name.'"?<br>Code: '.$category->code; ?> 
                                  <input type="hidden" name="id" value="<?php echo $category->id; ?>">
                                  <input type="hidden" name="name" value="<?php echo $category->name; ?>">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-danger">Confirm</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                  </div>
                </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>