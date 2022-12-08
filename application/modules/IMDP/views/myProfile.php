
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>My Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>IMDP">Home</a></li>
          <li class="breadcrumb-item active">My Profile</li>
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
                <div class="col-lg-8 mt-20">
                  <h5><b><?php echo $admin->first.' '.$admin->middle.' '.$admin->last; ?></b></h5>
                  <p><i class="bi bi-person-circle"></i> <?php echo $admin->username.'<br><i class="bi bi-envelope"></i> '.$admin->email.'<br><i class="bi bi-telephone"></i> '.$admin->number; ?></p>
                </div>
                <div class="col-lg-2 mt-20">
                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editSuperadmin"><i class="bi bi-pencil-square"></i> Edit Profile</button>
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
                      <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Activity</button>
                    </li>
                  </ul>
                  <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                    <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                      <?php
                        foreach ($materials as $material)
                        {
                      ?>
                        <a href="<?php echo base_url().$material->path.$material->title; ?>" class="b-b-d" title="Descripttion: <?php echo $material->description; ?>" download><b><i class="bi bi-download"></i>&ensp;<?php echo $material->title;  ?></b></a><br>
                      <?php
                        }
                      ?>
                    </div>
                    <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
                      <?php
                        foreach ($logs as $log)
                        {
                      ?>
                        <p class="b-b-d"><?php echo $log->s_title.' | ('.$log->s_date.','.$log->s_time.') '.$log->activity;  ?></p>
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
  <div class="modal fade" id="editSuperadmin" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-pencil-square"></i> Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3" action="<?php echo base_url(); ?>IMDP/updateSuperadmin" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
              <img src="<?php echo base_url(); ?>assets/uploads/profile/<?php echo $admin->profile; ?>" id="img" style="width:100px">
            </div>
            <div class="col-md-12">
              <input class="form-control" type="file" name="profile" id="formFile" onchange="displayProfile(this)" accept="image/jpg">
            </div>
            <div class="col-md-6">
              &emsp;
            </div>
            <div class="col-md-6">
              <p id="txt" style="display: none; margin-bottom: 0px;">Username Already Exists!</p>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" name="id" id="id" placeholder="ID Number" value="<?php echo $admin->s_id; ?>" readonly>
                <label for="id">ID Number</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" value="<?php echo $admin->username; ?>" readonly>
                <label for="username">Username</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <input type="text" class="form-control" name="first" id="first" placeholder="First Name" autocomplete="off" value="<?php echo $admin->first; ?>" required>
                <label for="first">First Name</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <input type="text" class="form-control" name="middle" id="middle" placeholder="Middle Name" autocomplete="off" value="<?php echo $admin->middle; ?>" required>
                <label for="middle">Middle Name</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <input type="text" class="form-control" name="last" id="last" placeholder="Last Name" autocomplete="off" value="<?php echo $admin->last; ?>" required>
                <label for="last">Last Name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off" value="<?php echo $admin->email; ?>" required>
                <label for="last">Email</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" name="number" id="number" placeholder="Number" autocomplete="off" value="<?php echo $admin->number; ?>" required>
                <label for="last">Number</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" name="password" id="password" placeholder="Passwword" autocomplete="off"  value="<?php echo $this->encryption->decrypt($admin->password); ?>" required>
                <label for="password">Password</label>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
          </form>
      </div>
    </div>
  </div>
</body>
<script>
 function checkUsername()
 {
  var usernames = <?php echo json_encode($usernames); ?>;
  var inp = document.getElementById('username');
  var add = document.getElementById('addBtn');
  var txt = document.getElementById('txt');
  var a = 0;
  for(var i=0; i<usernames.length; i++)
  {
    if(usernames[i] == inp.value)
    {
      a++;
    }
  }
  if(a>0)
  {
    inp.style.backgroundColor = "#d98880";
    add.disabled = true;
    txt.style.display = "block";
  }
  else
  {
    inp.style.backgroundColor = "white";
    add.disabled = false;
    txt.style.display = "none";
  }
 }
</script>
</html>
</html>