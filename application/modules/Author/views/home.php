
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>author">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-8">
          <div class="card recent-sales overflow-auto">
            <div class="filter">
              <a class="icon" href="<?php echo base_url(); ?>author/uploads"><i class="bi bi-arrow-up-right-square"></i></a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Uploads</h5>
              <table class="table table-borderless datatable wordwrap">
                <thead>
                  <tr>
                    <th scope="col"><i class="bi bi-file-earmark-text"></i> File</th>
                    <!-- <th scope="col"><i class="bi bi-calendar-event"></i> Date</th> -->
                    <!-- <th scope="col"><i class="bi bi-clock-history"></i> Time</th> -->
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($uploads as $upload)
                    {
                      if($upload->status == '1')
                      {
                        $a = "bg-success";
                        $b = "Approved";
                      }
                      else
                      {
                        $a = "bg-warning";
                        $b = "Pending";
                      }
                  ?>
                  <tr>
                    <th scope="row"><a href="<?php echo base_url().$upload->path.$upload->title; ?>" class="text-primary" download><?php echo $upload->title; ?></a></th>
                    <!-- <td><?php echo $upload->up_date; ?></td> -->
                    <!-- <td><?php echo $upload->up_time; ?></a></td> -->
                    <td><span class="badge <?php echo $a; ?>"><?php echo $b; ?></span></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#"><i class="bi bi-arrow-up-right-square"></i></a>
            </div>

            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>
              <?php foreach($logs as $log){ ?>
                <div class="activity">
                  <div class="activity-item d-flex">
                    <div class="activite-label"><?php echo $log->a_time; ?></div>
                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                    <div class="activity-content">
                      <?php echo $log->activity; ?>
                    </div>
                  </div><!-- End activity item-->
                </div>
              <?php } ?>
            </div>
          </div><!-- End Recent Activity -->
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>
</html>