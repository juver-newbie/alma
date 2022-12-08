
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Uploads</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>author">Home</a></li>
          <li class="breadcrumb-item active">Uploads</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <button class="btn btn-primary btn-sm mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#addMaterial"><i class="bi bi-plus-square"></i>&ensp;Upload</button>
              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col"><i class="bi bi-file-earmark-text"></i> File</th>
                    <th scope="col"><i class="bi bi-hash"></i> Year</th>
                    <th scope="col"><i class="bi bi-list"></i> Category</th>
                    <th scope="col"><i class="bi bi-calendar-event"></i> Date</th>
                    <th scope="col"><i class="bi bi-clock-history"></i> Time</th>
                    <th scope="col"><i class="bi bi-check-lg"></i> Status</th>
                    <th scope="col"><i class="bi bi-trash"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($uploads as $upload)
                    {
                      if($upload->status == '1')
                      {
                        $a = "bg-success";
                        $b = "Approved";
                      }
                      else
                      {
                        $a = "bg-warning";
                        $b = "Pending";
                      }
                      $temp;
                      foreach($categories as $category)
                      {
                        if($category->code == $upload->category)
                        {
                          $temp = $category->name;
                        }
                      }
                  ?>
                  <tr>
                    <th scope="row"><a href="<?php echo base_url().$upload->path.$upload->title; ?>" class="text-primary" download><?php echo $upload->title; ?></a></th>
                    <td><?php echo $upload->yearlevel; ?></td>
                    <td><?php echo $temp; ?></td>
                    <td style="white-space: nowrap;"><?php echo $upload->up_date; ?></td>
                    <td style="white-space: nowrap;"><?php echo $upload->up_time; ?></a></td>
                    <td><span class="badge <?php echo $a; ?>"><?php echo $b; ?></span></td>
                    <td style="white-space: nowrap;"><b><a href="#" class="text-danger h-u" data-bs-toggle="modal" data-bs-target="#deleteUpload<?php echo $upload->id; ?>">Delete</a></b></td>
                  </tr>
                  <!-- delete modal -->
                  <div class="modal fade" id="deleteUpload<?php echo $upload->id; ?>" tabindex="-1">
                    <div class="modal-dialog">
                      <form action="<?php echo base_url(); ?>author/deleteMaterial" method="post">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-danger"><i class="bi bi-trash-fill"></i> <b>Delete</b></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row mb-3">
                              <div class="col-sm-12">
                                <h6><b>Delete Learning Material?</b></h6>
                                Filename: <b><?php echo $upload->title; ?></b><br>
                                Uploaded by: <b><?php echo $upload->username; ?></b>
                                <input type="hidden" name="id" value="<?php echo $upload->m_id; ?>">
                                <input type="hidden" name="file" value="<?php echo $upload->title; ?>">
                                <input type="hidden" name="path" value="<?php echo $upload->path; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="upload" class="btn btn-primary">Confirm</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>
</html>