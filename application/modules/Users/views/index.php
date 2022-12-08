<style type="text/css">
  html, body
  {
    height: 100%;
  }
  .cat
  {
    cursor: pointer;
  }
  #gradient-overlay
  {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    background-image: linear-gradient(to right, rgba(0,0,0,0.7), rgba(255,255,255,0));
  }
</style>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center" style="height: 100%">
    <div id="gradient-overlay"></div>
    <div class="container text-left text-md-left" data-aos="fade-up" id="intro">
      <h3 id="subheading">Southern Leyte State University-Tomas Oppus</h2>
      <h1 id="heading">Management System for Modules, FLMS and Creative Works at Instructional Materials Development Production Center of SLSU-Tomas Oppus</h1>
      <!-- <h2><b>MANAGEMENT SYSTEM FOR MODULES, FLMS AND CREATIVE WORKS AT IMDP CENTER OF SLSU-TOMAS OPPUS</b></h2> -->
      <div class="row text-left text-md-left">
        <div class="col-lg-4">
          <form action="<?php echo base_url(); ?>users/searchResults" method="post">
            <input type="text" name="keyword" class="form-control text-left" placeholder="Search..." style="border-radius: 0px" autocomplete="off">
            <button type="submit" class="btn btn-primary mt-10" style="border-radius: 0px"><i class="bi bi-search"></i>&emsp;Search</button>
          </form>
        </div>
      </div>
  </section><!-- End Hero --><br><br>
  <section id="about" class="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <img src="<?php echo base_url(); ?>assets/img/logo.png" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 text-black">
          <h3>ABOUT US</h3>
          <p>
            The <strong>Management System for Modules, FLMS, and Creative Works at IMDP Center of SLSU-Tomas Oppus</strong> is a thesis project from a group of 4th year students that is developed to provide a convenient and efficient management system for IMDP that will connect students and teachers effectively.
          </p>
          <div class="row icon-boxes">
            <div class="col-md-6">
              <i class="bx bx-rocket"></i>
              <h4>Mission</h4>
              <p>By 2040, Southern Leyte State University is a leading higher education institution that advances knowledge and will be known for innovation and compassion for humanity, creating an inclusive society and a sustainable world.</p>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
              <i class="bx bx-show"></i>
              <h4>Vision</h4>
              <p>We commit to be a smart and green University that advances education, technological and professional instruction, research and innovation, community engagement services and progressive leadership in arts, sciences and technology that are relevant to the needs of the glocal communities. We produce graduates and life-long learners equipped with knowledge that enhances lives and invigorates economic development.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><br><br>
  <section id="wave-bg" id="services" class="services section-bg">
    <div class="container">
      <div class="section-title text-white">
        <h2><b>CATEGORIES</b></h2>
        <p>We put into different categories for you to find things easily.</p>
      </div>

      <div class="row">
        <div class="col-md-4 mt-4 cat" onclick="document.getElementById('agriculture').submit();">
          <div class="icon-box">
            <i class="bi bi-flower2"></i>
            <form action="<?php echo base_url(); ?>users/searchResults" method="post" id="agriculture">
              <input type="hidden" name="keyword" value="agriculture">
              <h4><a href="#">Agriculture</a></h4>
            </form>
          </div>
        </div>
        <div class="col-md-4 mt-4 cat" onclick="document.getElementById('arts').submit();">
          <div class="icon-box">
            <i class="bi bi-brush"></i>
              <form action="<?php echo base_url(); ?>users/searchResults" method="post" id="arts">
                <input type="hidden" name="keyword" value="arts">
                <h4><a href="#">Arts</a></h4>
              </form>
          </div>
        </div>
        <div class="col-md-4 mt-4 cat" onclick="document.getElementById('business').submit();">
          <div class="icon-box">
            <i class="bi bi-building"></i>
            <form action="<?php echo base_url(); ?>users/searchResults" method="post" id="business">
              <input type="hidden" name="keyword" value="business">
              <h4><a href="#">Business</a></h4>
            </form>
          </div>
        </div>
        <div class="col-md-4 mt-4 cat" onclick="document.getElementById('communication').submit();">
          <div class="icon-box">
            <i class="bi bi-chat-left-dots"></i>
            <form action="<?php echo base_url(); ?>users/searchResults" method="post" id="communication">
              <input type="hidden" name="keyword" value="communication">
              <h4><a href="#">Communication</a></h4>
            </form>
          </div>
        </div>
        <div class="col-md-4 mt-4 cat" onclick="document.getElementById('engineering').submit();">
          <div class="icon-box">
            <i class="bi bi-gear-wide-connected"></i>
            <form action="<?php echo base_url(); ?>users/searchResults" method="post" id="engineering">
              <input type="hidden" name="keyword" value="engineering">
              <h4><a href="#">Engineering</a></h4>
            </form>
          </div>
        </div>
        <div class="col-md-4 mt-4 cat" onclick="document.getElementById('history').submit();">
          <div class="icon-box">
            <i class="bi bi-hourglass"></i>
            <form action="<?php echo base_url(); ?>users/searchResults" method="post" id="history">
              <input type="hidden" name="keyword" value="history">
              <h4><a href="#">History</a></h4>
            </form>
          </div>
        </div>
        <div class="col-md-4 mt-4 cat" onclick="document.getElementById('agriculture').submit();">
          <div class="icon-box">
            <i class="bi bi-infinity"></i>
            <form action="<?php echo base_url(); ?>users/searchResults" method="post" id="mathematics">
              <input type="hidden" name="keyword" value="mathematics">
              <h4><a href="#">Mathematics</a></h4>
            </form>
          </div>
        </div>
        <div class="col-md-4 mt-4 cat" onclick="document.getElementById('music').submit();">
          <div class="icon-box">
            <i class="bi bi-music-note"></i>
            <form action="<?php echo base_url(); ?>users/searchResults" method="post" id="music">
              <input type="hidden" name="keyword" value="music">
              <h4><a href="#">Music</a></h4>
            </form>
          </div>
        </div>
        <div class="col-md-4 mt-4 cat" onclick="document.getElementById('science').submit();">
          <div class="icon-box">
            <i class="bi bi-boxes"></i>
            <form action="<?php echo base_url(); ?>users/searchResults" method="post" id="science">
              <input type="hidden" name="keyword" value="science">
              <h4><a href="#">Science</a></h4>
            </form>
          </div>
        </div>
        <div class="col-md-4 mt-4 cat" onclick="document.getElementById('sports').submit();">
          <div class="icon-box">
            <i class="bi bi-trophy"></i>
            <form action="<?php echo base_url(); ?>users/searchResults" method="post" id="sports">
              <input type="hidden" name="keyword" value="sports">
              <h4><a href="#">Sports</a></h4>
            </form>
          </div>
        </div>
        <div class="col-md-4 mt-4 cat" onclick="document.getElementById('technology').submit();">
          <div class="icon-box">
            <i class="bi bi-globe"></i>
            <form action="<?php echo base_url(); ?>users/searchResults" method="post" id="technology">
              <input type="hidden" name="keyword" value="technology">
              <h4><a href="#">Technology</a></h4>
            </form>
          </div>
        </div>
        <div class="col-md-4 mt-4 cat" onclick="document.getElementById('tourism').submit();">
          <div class="icon-box">
            <i class="bi bi-map"></i>
            <form action="<?php echo base_url(); ?>users/searchResults" method="post" id="tourism">
              <input type="hidden" name="keyword" value="tourism">
              <h4><a href="#">Tourism</a></h4>
            </form>
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