<style>
    footer
    {
      position: fixed;
      bottom: 0px;
      padding-left: 100px;
    }
  </style>
  <!-- ======= Hero Section ======= -->
  <section id="team" class="team mt-5 section-bg">
      <div class="container">
        <div class="row justify-content-center">
          <?php
            foreach($admins as $admin)
            {
          ?>
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <img src="<?php echo base_url(); ?>assets/uploads/profile/<?php echo $admin->profile; ?>">
                <h4><a href="<?php echo base_url(); ?>users/authorProfile?username=<?php echo $admin->username; ?>"><?php echo $admin->first.' '.$admin->middle.' '.$admin->last; ?></a></h4>
                <span>Author</span>
                <p>
                  Email: <a href="mailto:<?php echo $admin->email; ?>"><?php echo $admin->email; ?></a><br>
                  Contact Number: <a href="tel:<?php echo $admin->number; ?>"><?php echo $admin->number; ?></a>
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

      </div>
    </section><!-- End Hero -->

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