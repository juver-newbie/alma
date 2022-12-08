
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Administrators <?php echo get_cookie('superadmin'); ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>IMDP">Home</a></li>
          <li class="breadcrumb-item active">Administrators</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <button type="button" class="btn btn-primary btn-sm" style="margin-top:20px" data-bs-toggle="modal" data-bs-target="#addAdminModal"><i class="bi bi-plus-square"></i>&ensp;Add Admin</button>
                </div>
                <div class="modal fade" id="addAdminModal" tabindex="-1">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Add Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body" id="modalbody">
                        <form class="row g-3" action="<?php echo base_url(); ?>IMDP/addAdmin" method="post" enctype="multipart/form-data">
                          <div class="col-md-12">
                            <img src="<?php echo base_url(); ?>assets/img/profile/profile.png" id="img" style="width:100px">
                          </div>
                          <div class="col-md-12">
                            <input class="form-control" type="file" name="profile" id="formFile" onchange="displayProfile(this)" accept="image/jpg" required>
                          </div>
                          <div class="col-md-6">
                            &emsp;
                          </div>
                          <div class="col-md-6">
                            <p id="txt" style="display: none; margin-bottom: 0px;">Username Already Exists!</p>
                          </div>
                          <div class="col-md-6">
                            <div class="form-floating">
                              <?php
                                $str = explode('-',$lastID->a_id);
                                $temp = $str[1]+1;
                                if(strlen($temp) == 1)
                                {
                                  $temp2 = "00";
                                }
                                else if(strlen($temp) == 2)
                                {
                                  $temp2 = "0";
                                }
                                else
                                {
                                  $temp2 = "";
                                }
                                $id = date('m').date('Y')."-".$temp2.$temp;
                              ?>
                              <input type="text" class="form-control" name="id" id="id" placeholder="ID Number" value="<?php echo $id; ?>" readonly>
                              <label for="id">ID Number</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-floating">
                              <?php
                                $temp = '';
                                foreach($admins as $admin)
                                {
                                  $temp = $temp.$admin->username.'^';
                                }
                                $temp = substr($temp,0,-1);
                                $usernames = explode('^',$temp);
                              ?>
                              <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" minlength="4" onkeyup="checkUsername();" required>
                              <label for="username">Username</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="first" id="first" placeholder="First Name" autocomplete="off" required>
                              <label for="first">First Name</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="middle" id="middle" placeholder="Middle Name" autocomplete="off" required>
                              <label for="middle">Middle Name</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="last" id="last" placeholder="Last Name" autocomplete="off" required>
                              <label for="last">Last Name</label>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-floating">
                              <input type="password" class="form-control" name="password" id="password" placeholder="Passwword" autocomplete="off" required>
                              <label for="password">Password</label>
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="reset" class="btn btn-secondary">Clear</button>
                        <button type="submit" id="addBtn" class="btn btn-primary">Add</button>
                      </div>
                        </form>
                    </div>
                  </div>
                </div>
              <!-- Table with stripped rows -->
              <div style="width: 100%; overflow-x: auto; ">
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">Name</th>
                      <th scope="col">ID</th>
                      <th scope="col">Username</th>
                      <th scope="col">Edit/Delete</th>
                      <th scope="col">Uploads</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $count = 1;
                      foreach($admins as $admin)
                      {
                    ?>
                    <tr>
                      <th scope="row"><?php echo $count; ?></th>
                      <td><?php echo $admin->first." ".$admin->middle." ".$admin->last; ?></td>
                      <td><?php echo $admin->a_id; ?></td>
                      <td><?php echo $admin->username; ?></td>
                      <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editAdminModal<?php echo $admin->id; ?>">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteAdminModal<?php echo $admin->id; ?>">Delete</button>
                      </td>
                      <td><a href="<?php echo base_url(); ?>IMDP/authorProfile?id=<?php echo $admin->a_id; ?>"><button type="button" class="btn btn-success btn-sm">Check</button></a></td>
                    </tr>
                    <div class="modal fade" id="editAdminModal<?php echo $admin->id; ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-scrollable">
                          <form class="" action="<?php echo base_url(); ?>IMDP/updateAdmin?num=<?php echo $count; ?>" method="post">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Update Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-floating">
                                      <input type="text" class="form-control" name="id<?php echo $count; ?>" id="id" placeholder="ID Number" value="<?php echo $admin->a_id; ?>" readonly>
                                      <label for="id">ID Number</label>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-floating">
                                      <input type="text" class="form-control" name="username<?php echo $count; ?>" id="updateusername" placeholder="Username" autocomplete="off" value="<?php echo $admin->username; ?>" readonly>
                                      <label for="updateusername">Username</label>
                                    </div>
                                  </div>
                                  <div class="col-md-4 mt-10">
                                    <div class="form-floating">
                                      <input type="text" class="form-control" name="first<?php echo $count; ?>" id="first" placeholder="First Name" autocomplete="off" value="<?php echo $admin->first; ?>" required>
                                      <label for="first">First Name</label>
                                    </div>
                                  </div>
                                  <div class="col-md-4 mt-10">
                                    <div class="form-floating">
                                      <input type="text" class="form-control" name="middle<?php echo $count; ?>" id="middle" placeholder="Middle Name" autocomplete="off" value="<?php echo $admin->middle; ?>" required>
                                      <label for="middle">Middle Name</label>
                                    </div>
                                  </div>
                                  <div class="col-md-4 mt-10">
                                    <div class="form-floating">
                                      <input type="text" class="form-control" name="last<?php echo $count; ?>" id="last" placeholder="Last Name" autocomplete="off" value="<?php echo $admin->last; ?>" required>
                                      <label for="last">Last Name</label>
                                    </div>
                                  </div>
                                  <div class="col-md-12 mt-10">
                                    <div class="form-floating">
                                      <input type="text" class="form-control" name="password<?php echo $count; ?>" id="password" placeholder="Password" autocomplete="off" value="<?php echo $this->encryption->decrypt($admin->password); ?>" required>
                                      <label for="password">Password</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </div>
                          </form>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteAdminModal<?php echo $admin->id; ?>" tabindex="-1">
                      <div class="modal-dialog">
                        <form action="<?php echo base_url(); ?>IMDP/deleteAdmin" method="post">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Admin?</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Delete admin <?php echo $admin->first.' '.$admin->middle.' '.$admin->last.'?<br>Username: '.$admin->username.'<br>ID Number: '.$admin->a_id; ?> 
                              <input type="hidden" name="id" value="<?php echo $admin->a_id; ?>">
                              <input type="hidden" name="name" value="<?php echo $admin->first.' '.$admin->middle.' '.$admin->last; ?>">
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
                      $count++;
                      }
                    ?>
                  </tbody>
                </table>
              <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>
<script type="text/javascript">
  function playnotif()
  {
    var audio = new Audio('../assets/sound/notif.mp3');
    audio.play();
  }
</script>
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