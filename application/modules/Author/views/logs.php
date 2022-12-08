
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Logs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>author">Home</a></li>
          <li class="breadcrumb-item active">Logs</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Logs</h5>
              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"><i class="bi bi-pen"></i> Title</th>
                    <th scope="col"><i class="bi bi-list"></i> Activity</th>
                    <th scope="col"><i class="bi bi-calendar-event"></i> Date</th>
                    <th scope="col"><i class="bi bi-clock-history"></i> Time</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $count = 0;
                    foreach($logs as $log)
                    {
                      $count++;
                  ?>
                  <tr>
                    <th scope="row"><?php echo $count; ?></th>
                    <th><?php echo $log->a_title; ?></th>
                    <td><?php echo $log->activity; ?></td>
                    <td><?php echo $log->a_date; ?></a></td>
                    <td><?php echo $log->a_time; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>
<script>
  let scroll = document.getElementById('messagebox');
  scroll.scrollTop = scroll.scrollHeight;
</script>
</html>