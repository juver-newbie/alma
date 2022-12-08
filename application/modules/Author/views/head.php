<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $this->nativesession->get("page"); ?> | Management System for Modules, FLMS, and Creative Works at IMDP Center of SLSU-Tomas Oppus</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>/assets/SuperAdmin/img/logo.png" rel="icon">
  <link href="<?php echo base_url(); ?>/assets/SuperAdmin/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>/assets/SuperAdmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>/assets/SuperAdmin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>/assets/SuperAdmin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>/assets/SuperAdmin/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>/assets/SuperAdmin/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>/assets/SuperAdmin/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>/assets/SuperAdmin/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>/assets/SuperAdmin/css/style.css" rel="stylesheet"> 
  <style type="text/css">
    .mt-10
    {
      margin-top: 10px;
    }
    .mt-20
    {
      margin-top: 20px;
    }
    .mb-10
    {
      margin-bottom: 10px;
    }
    .mb-20
    {
      margin-bottom: 20px;
    }
    .b-b-d
    {
      border-bottom: 1px dotted lightgray !important;
    }
  </style>
  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<input type="hidden" id="message" value="<?php echo $this->nativesession->get('message'); ?>">
<body onload="message();">
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?php echo base_url(); ?>author" class="logo d-flex align-items-center">
        <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">SLSU-TO</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="<?php echo base_url(); ?>author/messages">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number" id="badge">0</span>
          </a><!-- End Messages Icon -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo base_url(); ?>assets/uploads/profile/<?php echo $admin->profile; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo substr($admin->first,0,1).". ".$admin->last; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $admin->first.' '.$admin->middle.' '.$admin->last; ?></h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="myProfile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#addMaterial">
                <i class="bi bi-plus"></i>
                <span>Add Material</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#developers">
                <i class="bi bi-question-circle"></i>
                <span>Contact Developers</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>author/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  <div class="modal fade" id="addMaterial" tabindex="-1">
    <div class="modal-dialog">
      <form action="<?php echo base_url(); ?>author/addMaterial" method="post" enctype='multipart/form-data'>
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Learning Material</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-floating mb-3">
              <select class="form-select" id="floatingSelect" name="category" aria-label="Floating label select example">
                <?php 
                  for($i=0; $i<count($categories); $i++)
                  {
                ?>
                  <option value="<?php echo $categories[$i]->code; ?>"><?php echo $categories[$i]->name; ?></option>
                <?php
                  }
                ?>
              </select>
              <label for="floatingSelect">Category</label>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-check">
                  <input class="form-check-input" name="yearlevel" type="radio" id="gridRadios1" value="1st" checked>
                  <label class="form-check-label" for="gridRadios1">
                    1st  Year
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="yearlevel" type="radio" id="gridRadios2" value="2nd">
                  <label class="form-check-label" for="gridRadios2">
                    2nd Year
                  </label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-check">
                  <input class="form-check-input" name="yearlevel" type="radio" id="gridRadios3" value="3rd">
                  <label class="form-check-label" for="gridRadios3">
                    3rd Year
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="yearlevel" type="radio" id="gridRadios4" value="4th">
                  <label class="form-check-label" for="gridRadios4">
                    4th Year
                  </label>
                </div>
              </div>
            </div>
            <div class="row mt-10">
              <div class="col-sm-12">
                <div class="form-floating mb-3">
                  <textarea class="form-control" name="description" placeholder="Input description..." id="floatingTextarea" style="height: 100px;" required></textarea>
                  <label for="floatingTextarea">Description</label>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-12">
                <input class="form-control" type="file" name="file" id="formFile" required>
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
  <div class="modal fade" id="developers" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Contact Developers</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6>If you problems, you can contact:</h6>
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?php echo base_url(); ?>assets/developers/team-2.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Alma Melecio Litrero</h5>
                  <p class="card-text"><i class="bi bi-pin-map"></i>&ensp;Poblacion, Bontoc, Southern Leyte<br><i class="bi bi-envelope"></i>&ensp;<a href="mailto:sample@email.com">sample@email.com</a><br><i class="bi bi-telephone"></i>&ensp;0912345689</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?php echo base_url(); ?>assets/developers/team-2.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Ericha Elviña</h5>
                  <p class="card-text"><i class="bi bi-pin-map"></i>&ensp;Poblacion, Bontoc, Southern Leyte<br><i class="bi bi-envelope"></i>&ensp;<a href="mailto:sample@email.com">sample@email.com</a><br><i class="bi bi-telephone"></i>&ensp;0912345689</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?php echo base_url(); ?>assets/developers/team-2.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Jan Kristine Tao-on</h5>
                  <p class="card-text"><i class="bi bi-pin-map"></i>&ensp;Poblacion, Bontoc, Southern Leyte<br><i class="bi bi-envelope"></i>&ensp;<a href="mailto:sample@email.com">sample@email.com</a><br><i class="bi bi-telephone"></i>&ensp;0912345689</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php echo $navlink[0]; ?>" href="home">
          <i class="bi bi-house"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link <?php echo $navlink[1]; ?>" href="uploads">
          <i class="bi bi-upload"></i><span>Uploads</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link <?php echo $navlink[2]; ?>" href="messages">
          <i class="bi bi-chat-left-text"></i><span>Messages</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $navlink[3]; ?>" href="logs">
          <i class="bi bi-list-task"></i><span>Logs</span>
        </a>
      </li><!-- End Components Nav -->
      
    </ul>
  </aside><!-- End Sidebar-->

    <audio id="notif-audio" preload="auto" style="display:none;">
        <source src="<?php echo base_url(); ?>assets/sound/notif.ogg" type="audio/ogg">
        <source src="<?php echo base_url(); ?>assets/sound/notif.mp3" type="audio/mpeg">
      </audio>
      <button id="btn-interact" style="display: none;" onclick="alert('clicked')">Interact</button>
  <script type='text/javascript'>
            // baseURL variable
            var baseURL= "<?php echo base_url();?>";
            //var audio = new Audio(baseURL+'assets/sound/notif.mp3'); page need user interaction before play
          setInterval(function(){
            $(document).ready(function(){
                $.ajax({
                    url:'<?php echo base_url(); ?>index.php/author/getUnread',
                    method: 'post',
                    data: {status: '1'},
                    dataType: 'json',
                    success: function(response){
                        var len = response.length;
                        if(len > 0){
                            var num = $('#badge').text();
                            // if(len != num)
                            // {
                            //   console.log(num);
                            //   audio.play();cannot play
                            // }
                            // Read values
                            // var first = response[0].first;
                            // var middle = response[0].middle;
                            // var last = response[0].last;
                            //audio.play();
                            $('#badge').text(len);
                            // $('#middle').text(middle);
                            // $('#last').text(last);
                        }
                        else
                        {
                          $('#badge').text('0');
                        }
                    }
                });
            });
          },1000);
        </script>