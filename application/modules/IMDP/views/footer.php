<!-- Vendor JS Files -->
  <script src="<?php echo base_url(); ?>assets/SuperAdmin/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/SuperAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/SuperAdmin/vendor/chart.js/chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/SuperAdmin/vendor/echarts/echarts.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/SuperAdmin/vendor/quill/quill.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/SuperAdmin/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?php echo base_url(); ?>assets/SuperAdmin/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/SuperAdmin/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery-3.0.0.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>/assets/SuperAdmin/js/main.js"></script>
  <script>
    function displayProfile(input)
    {
      if(input.files && input.files[0])
      {
        var reader = new FileReader();
        reader.onload = function (e){
          document.querySelector("#img").setAttribute("src",e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
    function message()
    {
      var m = document.getElementById('message').value;
      if(m == 'exist')
      {
        alert('Username already EXISTS!');
      }
      if(m == 'wrong')
      {
        alert('WRONG username or password');
      }
    }
  </script>