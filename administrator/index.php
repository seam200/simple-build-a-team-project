<?php
include_once("./server/db-connect.php");
include_once("./assets/components/html-header.php");

?>
<link rel="stylesheet" href="./assets/css/data-tables.css">

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <!-- Menu -->
    <?php
    include_once("./assets/components/manu.php");
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
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="d-flex align-items-end row">
                  <div>
                    <div class="col-sm-7">
                      <div class="card-body">
                        <h5 class="card-title text-primary">Congratulations <?= $_SESSION['user']['user_name'] ?? null ?>! 🎉</h5>
                        <p class="mb-4">
                          You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                          your profile.
                        </p>
                      </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                      <div class="card-body pb-0 px-0 px-sm-4">
                        <img src="./assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" loading="lazy" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            $select_news = ($db_conn->query("SELECT * FROM `news` WHERE `id` = 1"));
            $news_data = $select_news->fetch_object();
            ?>

            <div class="col-md-6">
              <div class="card p-4">
                <h4>Breaking News</h4>
                <div class="d-flex align-items-end row">
                  <form action="" method="POST">
                    <div class="mb-3">
                      <label class="col-sm-2 col-form-label" for="add-news-details">News</label>
                      <div class="col-sm-12 mb-3">
                        <input class="form-control" value="<?= $news_data->details ?? null ?>" type="text" id="add-news-details" placeholder="Details" />
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="col-sm-2 col-form-label" for "add-news-link">Link</label>
                      <div class="col-sm-12 mb-3">
                        <input class="form-control" value="<?= $news_data->link_href ?? null ?>" type="text" id="add-news-link" placeholder="News Link" />
                      </div>
                    </div>
                    <div class="row justify-content-start">
                      <div class="col-sm-12">
                        <?php
                        if ($select_news->num_rows !== 1) {
                        ?>
                          <button type="button" id="addBreakingNews1923" class="btn btn-primary">Add</button>
                        <?php
                        } else {
                        ?>
                          <button type="button" id="updateBreakingNews1923" class="btn btn-primary">Update</button>
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- all users -->
          <div class="card my-4 p-4">
            <h4 class="card-header px-0 pt-0 text-center text-primary text-md-start">All Users</h4>
            <div class="table-responsive text-nowrap">
              <?php
              $user_sn = 0;
              $select_all_users_query = "SELECT r.*, ui.src, ui.alt FROM `register` r
                                    LEFT JOIN `user-image` ui ON r.id = ui.user_id";
              echo $select_all_users_query;
              $result = $db_conn->query($select_all_users_query);
              ?>
              <table id="memberTable" class="table table-striped table-bordered">
                <thead>
                  <tr class="table-primary">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Study</th>
                    <th>G. Year</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Post</th>
                    <th>Register Date</th>
                    <th>Image</th>
                    <th>Referrer</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <?php
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_object()) {
                  ?>
                      <tr>
                        <td><?= ++$user_sn ?></td>
                        <td><?= $row->name ?></td>
                        <td><?= $row->father_name ?></td>
                        <td><?= $row->mother_name ?></td>
                        <td><?= $row->gender ?></td>
                        <td><?= $row->dob ?></td>
                        <td><?= $row->location ?></td>
                        <td><?= $row->study ?></td>
                        <td><?= $row->graduated_year ?></td>
                        <td class="text-lowercase"><?= $row->email ?></td>
                        <td><?= "0" . $row->mobile ?></td>
                        <td><?= $row->post ?></td>
                        <td><?= $row->reg_time ?></td>
                        <td>
                          <?php if ($row->src) { ?>
                            <img class="rounded-circle" src="../<?= $row->src ?>" alt="<?= $row->alt ?>" style="width: 50px; height: 50px; object-fit:cover" loading="lazy" />
                          <?php } else { ?>
                            No Image
                          <?php } ?>
                        </td>
                        <td>
                          <?php
                          $select_all_users_query = $db_conn->query("SELECT * FROM `register` WHERE `id` = '$row->referer'")->fetch_object();
                          ?>
                          <?= $select_all_users_query->name ?? "No Referer" ?></td>
                        <td>
                          <button type="button" class="btn btn-primary btn-sm d-flex justify-content-center align-items-center gap-1 edit-user-post" data-uId="<?= $row->id ?>" data-uPost="<?= $row->post ?>">
                            <i class='bx bxs-edit'></i>
                            Edit Post
                          </button>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

          <!-- all banners -->
          <div class="card my-4 p-4">
            <h4 class="card-header px-0 pt-0 text-primary text-center text-md-start">All Banners</h4>
            <div class="table table-responsive">
              <?php
              $banner_sn = 0;
              $select_all_banner = $db_conn->query("SELECT * FROM `banners`");
              ?>

              <table id="bannerTable" class="table table-striped table-bordered">
                <thead>
                  <tr class="table-primary">
                    <th>No.</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0 ">
                  <?php
                  if ($select_all_banner->num_rows > 0) {
                    while ($row = $select_all_banner->fetch_object()) {
                  ?>
                      <tr>
                        <td><?= ++$banner_sn ?></td>
                        <td><?= $row->title ?></td>
                        <td><?= $row->sub_title ?></td>
                        <td><img src="../<?= $row->image_src ?>" alt="<?= $row->image_alt ?>" width="80px" height="60px" style="object-fit: cover;" loading="lazy" /></td>
                        <td>
                          <div class="form-check form-switch fs-5">
                            <input class="form-check-input banner-status" data-bId="<?= $row->id ?>" type="checkbox" <?= $row->status === "active" ? "checked" : null ?> />
                          </div>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item edit-banner" href="javascript:void(0);" data-bid="<?= $row->id ?>" data-btitle="<?= $row->title ?>" data-bSubTitle="<?= $row->sub_title ?>" data-bImg="<?= $row->image_src ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item delete-banner" data-bid="<?= $row->id ?>" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>

                </tbody>
              </table>

            </div>
          </div>

          <!-- management member -->
          <div class="card my-4 p-4">
            <h4 class="card-header px-0 pt-0 text-primary text-center text-md-start">Management Members</h4>
            <div class="table table-responsive">
              <?php
              $m_member_sn = 0;
              $select_all_m_member = $db_conn->query("SELECT * FROM `management`");
              ?>
              <table id="m_memberTable" class="table table-striped table-bordered">
                <thead>
                  <tr class="table-primary">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Facebook</th>
                    <th>Twitter</th>
                    <th>Linkedin</th>
                    <th>Skype</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0 ">
                  <?php
                  if ($select_all_m_member->num_rows > 0) {
                    while ($row = $select_all_m_member->fetch_object()) {
                  ?>
                      <tr>
                        <td><?= ++$m_member_sn ?></td>
                        <td><?= $row->name ?></td>
                        <td><?= $row->title ?></td>
                        <td><img class="rounded-circle" src="../<?= $row->image_src ?>" alt="<?= $row->image_alt ?>" width="50px" height="50px" style="object-fit: cover;" loading="lazy" /></td>
                        <td><?= ($row->facebook_link) !== "" ? "$row->facebook_link" : "No Data" ?></td>
                        <td><?= ($row->twitter_link) !== "" ? "$row->facebook_link" : "No Data" ?></td>
                        <td><?= ($row->linkedin_link) !== "" ? "$row->facebook_link" : "No Data" ?></td>
                        <td><?= ($row->skype_link) !== "" ? "$row->facebook_link" : "No Data" ?></td>
                      </tr>
                  <?php
                    }
                  }
                  ?>


                </tbody>
              </table>

            </div>
          </div>

          <!-- sponsor -->
          <div class="card my-4 p-4">
            <h4 class="card-header px-0 pt-0 text-primary text-center text-md-start">Sponsors</h4>
            <div class="table table-responsive">
              <?php
              $sponsor_sn = 0;
              $select_all_sponsor = $db_conn->query("SELECT * FROM `sponsor`");
              ?>
              <table id="sponsorTable" class="table table-striped table-bordered">
                <thead>
                  <tr class="table-primary">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Image</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0 ">
                  <?php
                  if ($select_all_sponsor->num_rows > 0) {
                    while ($row = $select_all_sponsor->fetch_object()) {
                  ?>
                      <tr>
                        <td><?= ++$sponsor_sn ?></td>
                        <td><?= $row->name ?></td>
                        <td><?= $row->link ?></td>
                        <td><img class="rounded-circle" src="../<?= $row->image_src ?>" alt="<?= $row->image_alt ?>" width="50px" height="50px" style="object-fit: cover;" loading="lazy" /></td>
                      </tr>
                  <?php
                    }
                  }

                  ?>


                </tbody>
              </table>
            </div>
          </div>

          <!-- testimonials -->
          <div class="card my-4 p-4">
            <h4 class="card-header px-0 pt-0 text-primary text-center text-md-start">Customers Review</h4>
            <div class="table table-responsive">
              <?php
              $testimonials_sn = 0;
              $select_all_review = $db_conn->query("SELECT * FROM `testimonials`");
              ?>
              <table id="testimonialsTable" class="table table-striped table-bordered">
                <thead>
                  <tr class="table-primary">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th style="max-width: 300px; min-width: 300px;">Details</th>
                    <th>Image</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <?php
                  if ($select_all_review->num_rows > 0) {
                    while ($row = $select_all_review->fetch_object()) {
                  ?>
                      <tr>
                        <td><?= ++$testimonials_sn ?></td>
                        <td><?= $row->name ?></td>
                        <td><?= $row->location ?></td>
                        <td style="max-width: 300px; min-width: 300px;"><?= $row->details ?></td>
                        <td><img class="rounded-circle" src="../<?= $row->image_src ?>" alt="<?= $row->image_alt ?>" width="50px" height="50px" style="object-fit: cover;" loading="lazy" /></td>
                      </tr>
                  <?php
                    }
                  }
                  ?>

                </tbody>
              </table>

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
<!-- / Layout wrapper !-->

<!-- all modals -->
<?php
include_once("./assets/components/banner-modals.php");
include_once("./assets/components/user-modals.php");
?>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
  new DataTable('#memberTable', {
    lengthMenu: [
      [10, 20],
      [10, 20]
    ],
    "info": false,
  });
  new DataTable('#bannerTable', {
    lengthMenu: [
      [10, 20],
      [10, 20]
    ],
    "info": false,
  });
  new DataTable('#m_memberTable', {
    lengthMenu: [
      [10, 20],
      [10, 20]
    ],
    "info": false,
  });
  new DataTable('#sponsorTable', {
    lengthMenu: [
      [10, 20],
      [10, 20]
    ],
    "info": false,
  });
  new DataTable('#testimonialsTable', {
    lengthMenu: [
      [10, 20],
      [10, 20]
    ],
    "info": false,
  });
</script>
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<script src="./assets/js/update-banner-ajax.js"></script>
<script src="./assets/js/update-user-ajax.js"></script>
<script src="./assets/js/news-ajax.js"></script>


<?php
include_once("./assets/components/html-footer.php");
?>