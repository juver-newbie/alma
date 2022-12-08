<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $this->nativesession->get("page"); ?> | Management System for Modules, FLMS, and Creative Works at IMDP Center of SLSU-Tomas Oppus</title>
	<link href="<?php echo base_url(); ?>assets/img/logo.png" rel="icon">
  <link href="<?php echo base_url(); ?>assets/img/logo.png" rel="apple-touch-icon">
	<link href="<?php echo base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/custom2.css" rel="stylesheet">
  <style type="text/css">
  	html, body, section
  	{
  		width: 100%;
  		height: 100%;
  	}
  	body
  	{
  		/*background-image: linear-gradient(to right, blue, white);*/
  		background-color: #398cb5;
  	}
  	#img-featured
  	{
  		position: relative;
  		width: 100%;
  		box-shadow: 0px 10px 10px 0px;
  	}
  	#up,#down
  	{
  		width: 100%;
  	}
  	#up
  	{
  		position: absolute;
  		top: 0px;
  		left: 0px;
  		height: 70%;
  		background-color: white;
  		z-index: -1;
  	}
  	#div-curved
  	{
  		border: 3px solid lightblue;
  		padding: 30px;
  		border-radius: 10px;
  		background-color: rgba(255, 255, 255, 0.5);
  	}
  	#div-curved button
  	{
  		width: 100%;
  	}
  	#img-logo
  	{
  		width: 80px;
  		position: relative;
  		top: -60px;
  		margin-bottom: -30px;
  	}
  </style>
</head>
<body>
	<section id="contact" class="contact">
      	<div class="container">
      		<div id="up"></div>
      		<div id="down"></div>
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<img src="<?php echo base_url(); ?>assets/img/slsu-to-admin-building.jpg" id="img-featured">
				</div>
				<div class="col-lg-4">
					<div id="div-curved">
						<img src="<?php echo base_url(); ?>assets/img/logo.png" id="img-logo">
						<h4><b>Management System for Modules, FLMS and Creative Works at Instructional Materials Development Production Center of SLSU-Tomas Oppus</b></h4>
						<a href="<?php echo base_url(); ?>users/home"><button class="btn btn-primary mt-10">IMDP Center</button></a><br>
						<a href="<?php echo base_url(); ?>author"><button class="btn btn-primary mt-10">Author Login</button></a><br>
						<a href="<?php echo base_url(); ?>IMDP"><button class="btn btn-primary mt-10">IMDP Head Login</button></a>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
	<script src="<?php echo base_url(); ?>assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/three.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/vanta.net.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/vanta.waves.min.js"></script>
</html>