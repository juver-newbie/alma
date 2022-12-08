  <style>
    footer
    {
      position: fixed;
      bottom: 0px;
      padding-left: 100px;
    }
  </style>
  <section id="what-we-do" class="what-we-do mt-5 section-bg">

      <div class="container">
        <div class="section-title">
          <!-- <div class="row">
            <div class="col-lg-12 mb-10">
              <h3 style="margin-bottom: 0px; color: black;"><b>MATERIALS</b></h3>
            </div>
          </div> -->
          <div class="row">
            <div class="col-lg-12">
              <form method="post" action="<?php echo base_url(); ?>users/searchResults">
                <div class="row">
                  <div class="col-lg-3 mt-10">
                    <input type="text" name="keyword" class="form-control" placeholder="Search Filename, Author, ID..." value="<?php echo $searchText; ?>" autocomplete="off">
                  </div>
                  <!-- <div class="col-lg-2">
                    <select name="category" class="form-select">
                      <option value="*" selected disabled>Category</option>
                      <?php
                        foreach($categories as $category)
                        {
                      ?>
                        <option value="<?php echo $category->code; ?>"><?php echo $category->name; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div> -->
                  <div class="col-lg-2 mt-10">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Search</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <h3 class="text-black"><b>LEARNING MATERIALS</b></h3>
          </div>
          <div class="col-lg-12 mt-10">
            <div class="table-div">
              <table style="width:100%">
                <tr>
                  <th></th>
                  <th>File Name</th>
                  <th>Author</th>
                  <th>Category</th>
                  <th>Year Level</th>
                  <th>Date Uploaded</th>
                  <th>Time Uploaded</th>
                  <th></th>
                </tr>
                <?php
                  foreach($materials as $material)
                  {
                    $temp;
                    foreach($categories as $category)
                    {
                      if($material->category == $category->code)
                      {
                        $temp = $category->name;
                      }
                    }
                ?>
                  <tr style="border-bottom:1px dotted #0af">
                    <td><i class="bi <?php echo $material->icon; ?>"></i></td>
                    <td><a href="<?php echo base_url().$material->path.$material->title; ?>" download><?php echo $material->title; ?></a></td>
                    <td><a href="<?php echo base_url(); ?>users/authorProfile?username=<?php echo $material->username; ?>"><?php echo $material->username; ?></a></td>
                    <td><?php echo $temp; ?></td>
                    <td><?php echo $material->yearlevel; ?></td>
                    <td><?php echo $material->up_date; ?></td>
                    <td><?php echo $material->up_time; ?></td>
                    <td><a href="<?php echo base_url().$material->path.$material->title; ?>" download><i class="bi bi-arrow-down-square-fill text-success" title="Download"></i></a></td>
                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#reportFile<?php echo $material->id; ?>" title="Report File"><i class="bi bi-exclamation-triangle-fill text-danger"></i></a></td>
                  </tr>
                  <div class="modal fade" id="reportFile<?php echo $material->id; ?>" tabindex="-1">
                    <div class="modal-dialog">
                      <form action="<?php echo base_url(); ?>users/reportFile" method="post">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Report File</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-sm-12">
                                <p>What seems to be a problem?</p>
                                <div class="form-floating mb-3">
                                  <input type="hidden" name="id" value="<?php echo $material->m_id; ?>">
                                  <textarea class="form-control" name="message" placeholder="Input description..." id="floatingTextarea" style="height: 100px;" required></textarea>
                                  <label for="floatingTextarea">Message</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="upload" class="btn btn-primary">Report</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- insert modal below for report file -->
                <?php
                    }
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

  <footer id="footer">
    <div class="container d-md-flex py-2">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; All Rights Reserved. <b>SLSU-TO Students</b>
        </div>
      </div>
    </div>
  </footer>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  

</body>

</html>