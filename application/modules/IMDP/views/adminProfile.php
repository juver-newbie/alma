
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-2 mt-20">
                  <img src="<?php echo base_url(); ?>assets/uploads/profile/<?php echo $admin->profile; ?>" style="width:100px">
                </div>
                <div class="col-lg-10 mt-20">
                  <h6><b><?php echo $admin->first.' '.$admin->middle.' '.$admin->last; ?></b></h6>
                  <p><i class="bi bi-person-circle"></i> <?php echo $admin->username.'<br><i class="bi bi-telephone"></i> <a href="tel:'.$admin->number.'">'.$admin->number.'</a><br><i class="bi bi-envelope"></i> <a href="mailto:'.$admin->email.'">'.$admin->email; ?></a></p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
              <!-- Bordered Tabs Justified -->
                  <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                      <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Uploads</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                      <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Requests</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                      <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Activity</button>
                    </li>
                  </ul>
                  <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                    <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                      <?php
                        foreach ($materials as $material)
                        {
                      ?>
                        <a href="<?php echo base_url().$material->path.$material->title; ?>" class="b-b-d" download><b><i class="bi bi-download"></i>&ensp;<?php echo $material->title;  ?></b></a><br>
                      <?php
                        }
                      ?>
                    </div>
                    <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                      <?php
                        foreach ($requests as $request)
                        {
                      ?>
                        <a href="<?php echo base_url(); ?>superadmin/accept?id=<?php echo $request->m_id; ?>&&username=<?php echo $request->username; ?>"><button type="button" class="btn btn-primary btn-sm"><i class="bi bi-check-circle"></i>&ensp;Accept</button></a>&ensp;<button type="button" class="btn btn-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#reject<?php echo $request->id; ?>"><i class="bi bi-x-circle"></i>&ensp;Reject</button>&emsp;<a href="<?php echo base_url().$request->path.$request->title; ?>" download><b class="b-b-d"><i class="bi bi-download"></i>&ensp;<?php echo $request->title; ?></b></a><br>
                        <div class="modal fade" id="reject<?php echo $request->id; ?>" tabindex="-1">
                          <div class="modal-dialog">
                            <form action="<?php echo base_url(); ?>superadmin/reject" method="post">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Reject Material</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="row mt-10">
                                    <div class="col-sm-12">
                                      <div class="form-floating mb-3">
                                        <textarea class="form-control" name="message" placeholder="Input description..." id="floatingTextarea" style="height: 100px;" required></textarea>
                                        <label for="floatingTextarea">Message</label>
                                      </div>
                                      <input type="hidden" name="admin" value="<?php echo $request->username; ?>">
                                      <input type="hidden" name="id" value="<?php echo $request->m_id; ?>">
                                      <input type="hidden" name="title" value="<?php echo $request->title; ?>">
                                      <input type="hidden" name="path" value="<?php echo $request->path; ?>">
                                      <p>*The file will be deleted permanently after you confirm.</p>
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
                      <?php
                        }
                      ?>
                    </div>
                    <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
                      <?php
                        foreach ($logs as $log)
                        {
                      ?>
                        <p class="b-b-d"><?php echo $log->a_title.' | ('.$log->a_date.','.$log->a_time.') '.$log->activity;  ?></p><br>
                      <?php
                        }
                      ?>
                    </div>
                  </div><!-- End Default Tabs -->
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