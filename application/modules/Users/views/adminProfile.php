<style type="text/css">
  #profile-img
  {
    width: 150px;
    height: 150px;
    border-radius: 50%;
  }
</style>
  <section id="services" class="services mt-5 section-bg">
      <div class="container">
        <div class="section-title">
          <img src="<?php echo base_url(); ?>assets/uploads/profile/<?php echo $admin->profile; ?>" id="profile-img">
          <h4><b><?php echo $admin->first.' '.$admin->middle.' '.$admin->last; ?></b></h4>
          <p><i class="bi bi-person-circle"></i>&emsp;<?php echo $admin->username; ?><br><i class="bi bi-envelope"></i>&emsp;<a href="mailto:<?php echo $admin->email; ?>"><?php echo $admin->email; ?></a><br><i class="bi bi-telephone"></i>&emsp;<a href="tel:<?php echo $admin->number; ?>"><?php echo $admin->number; ?></a></p>
        </div>

        <div class="row">
          <div class="col-md-12 text-center">
            <h6 class="text-primary"><b>UPLOADS</b></h6>
          </div>
          <div class="col-md-6">
            <ul class="list-group mt-10">
              <?php foreach($materials as $material)
              {
                $temp;
                foreach($categories as $category)
                {
                  if($category->code == $material->category)
                  {
                    $temp = $category->name;
                  }
                }
              ?>
                <li class="list-group-item"><i class="bi bi-exclamation-circle text-danger" title="Report this file"></i> <i class="bi <?php echo $material->icon; ?> me-1 text-success"></i>&ensp;<a href="<?php echo base_url().$material->path.$material->title; ?>" download><b><?php echo $material->title; ?></b></a><br><i class="bi bi-people"></i> <?php echo $material->yearlevel.' Year &emsp;<i class="bi bi-list-ul"></i> '.$temp; ?></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </section>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  

</body>

</html>