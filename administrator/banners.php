<?php
include_once("./assets/components/html-header.php");
?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <!-- Menu -->
    <?php
    include_once("./assets/components/manu.php")
    ?>
    <!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
      <!-- Navbar -->
      <?php
      include_once("./assets/components/nav.php");
      ?>
      <!-- / Navbar -->

      <!-- Content wrapper -->
      <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">administrator/</span> <?= basename($_SERVER['REQUEST_URI']) ?></h4>

          <!-- Basic Layout & Basic with Icons -->
          <div class="row">
            <!-- Basic with Icons -->
            <div class="col-xxl">
              <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Add Banners</h5>
                  <!-- <small class="text-muted float-end">Merged input group</small> -->
                </div>
                <div class="card-body">
                  <!-- add banners -->
                  <form action="" method="POST" enctype="multipart/form-data" id="addBanner1923">
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Title</label>
                      <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bx-text'></i></span>
                          <input type="text" class="form-control" placeholder="Banner Title" aria-label="Banner Title" id="add-banner-title" />
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Sub Title</label>
                      <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bxs-edit-alt'></i></span>
                          <input type="text" class="form-control" placeholder="Sub Title" aria-label="Sub Title" id="add-banner-subTitle" />
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Banner Image</label>
                      <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                          <input class="form-control" type="file" id="add-banner-img" />
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-end">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <?php
        include_once("./assets/components/footer.php");
        ?>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<script src="./assets/js/add-banner-ajax.js"></script>

<?php
include_once("./assets/components/html-footer.php");
?>