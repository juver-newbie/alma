
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Author Login | Management System for Modules, FLMS, and Creative Works at IMDP Center of SLSU-Tomas Oppus</title>
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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style type="text/css">
    main
   {
      background-color: #398cb5;
    }
  </style>
<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center" style="margin-bottom: 10px; text-align: center">
              <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo.png" style="width: 100px; margin-bottom: 10px"></a>
              <h5 style="color:white;"><b>MANAGEMENT SYSTEM FOR MODULES, FLMS AND CREATIVE WORKS AT IMDP CENTER OF SLSU-TOMAS OPPUS</b></h5>
            </div>
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Author Login</h5>
                    <p class="text-center small">Enter your username & password tologin</p>
                  </div> 

                  <form class="row g-3" action="<?php echo base_url(); ?>author/entry" method="post">

                    <div class="col-md-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" required>
                        <label for="username">Username</label>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" required>
                        <label for="username">Password</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="show" onchange="showPass();">
                        <label class="form-check-label" for="show">Show Password</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url(); ?>/assets/SuperAdmin/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/SuperAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/SuperAdmin/vendor/chart.js/chart.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/SuperAdmin/vendor/echarts/echarts.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/SuperAdmin/vendor/quill/quill.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/SuperAdmin//simple-datatables/simple-datatables.js"></script>
  <script src="<?php echo base_url(); ?>/assets/SuperAdmin/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/SuperAdmin/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>/assets/SuperAdmin/js/main.js"></script>
  <script>
    function showPass()
    {
      var chk = document.getElementById('show');
      var pass = document.getElementById('password');
      if(chk.checked == true)
      {
        pass.type = "text";
      }
      else
      {
        pass.type = "password";
      }
    }
  </script>
</body>

</html>