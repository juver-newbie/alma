  <style type="text/css">
    table
    {
      width: 100%;
    }
  </style>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Requests</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>IMDP">Home</a></li>
          <li class="breadcrumb-item active">Requests</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 mt-20">
                  <table>
                    <tr>
                      <th></th>
                      <th>File Name</th>
                      <th>Author</th>
                      <th>Year Level</th>
                      <th>Category</th>
                      <th></th>
                    </tr>
                    <?php
                      foreach($materials as $material)
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
                        <tr style="border-bottom:1px dotted #0af">
                          <td><i class="bi <?php echo $material->icon; ?>"></i></td>
                          <td><a href="<?php echo $material->title; ?>" download><?php echo $material->title; ?></a></td>
                          <td><a href="<?php echo base_url(); ?>IMDP/authorProfile?username=<?php echo $material->username; ?>"><?php echo $material->username; ?></a></td>
                          <td><?php echo $material->yearlevel; ?></td>
                          <td><?php echo $temp; ?></td>
                          <td><a href="<?php echo base_url(); ?>imdp/approve?id=<?php echo $material->m_id; ?>&&username=<?php echo $material->username; ?>" style="color: green;"><i class="bi bi-check-circle-fill"></i> Approve</a>&emsp;&emsp;<a href="<?php echo base_url(); ?>imdp/reject" style="color: red;"><i class="bi bi-trash-fill"></i> Reject</a></td>
                        </tr>
                    <?php } ?>
                  </table>
                </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>