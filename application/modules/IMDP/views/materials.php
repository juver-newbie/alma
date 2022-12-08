  <style>
    table
    {
      width: 100%;
    }
  </style>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Materials</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>IMDP">Home</a></li>
          <li class="breadcrumb-item active">Materials</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 mb-20">
                  <form method="post" action="<?php echo base_url(); ?>IMDP/searchResults">
                    <div class="row mt-20">
                      <div class="col-lg-3">
                        <input type="text" name="keyword" class="form-control" placeholder="Search..." value="<?php echo $searchText; ?>">
                      </div>
                      <!-- <div class="col-lg-3">
                        <select class="form-select" name="category">
                          <option value="0" selected disabled>Category</option>
                          <?php 
                            for($i=0; $i<count($categories); $i++)
                            {
                          ?>
                            <option value="<?php echo $categories[$i]->code; ?>"><?php echo $categories[$i]->name; ?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                      <div class="col-lg-3">
                        <select class="form-select" name="yearlevel">
                          <option value="0" selected disabled>Year Level</option>
                          <option value="1">1st Year</option>
                          <option value="2">2nd Year</option>
                          <option value="3">3rd Year</option>
                          <option value="4">4th Year</option>
                        </select>
                      </div> -->
                      <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Search</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-lg-12">
                  <table>
                    <tr>
                      <th></th>
                      <th>File Name</th>
                      <th>Author</th>
                      <th>Year Level</th>
                      <th>Category</th>
                      <th>Date/Time</th>
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
                          <td><?php echo $material->up_date."/".$material->up_time; ?></td>
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