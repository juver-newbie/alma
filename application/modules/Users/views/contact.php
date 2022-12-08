
  <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title mt-5">
          <h4><b>Contact Us</b></h4>
          <p>For inquiries, you can contact us at:</p>
        </div>

        <div class="row justify-content-center">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>Tomas Oppus<br>Southern Leyte</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p><a href="mailto:info@example.com">info@example.com</a><br><a href="mailto:contact@example.com">contact@example.com</a></p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p><a href="tel:09123456789">09123456789</a><br><a href="tel:09987654321">09987654321</a></p>
                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="row mt-5 justify-content-center">
          <!-- <div class="col-lg-10" align="center" id="">
            <h5><b>Thak you for your feedback!</b></h5>
            <h1><i class="bi bi-check-circle-fill" style="color:green"></i></h1>
          </div> -->
          <div class="col-lg-10">
            <h5><b>Please send us your feedback. We are happy to hear from you.</b></h5>
            <form action="<?php echo base_url(); ?>users/sendFeedback" method="post">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name (Optional)" autocomplete="off">
                </div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="text-center mt-10"><button type="submit" class="btn btn-primary">Send Feedback</button></div>
            </form>
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