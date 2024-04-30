<?php
ini_set('session.gc_maxlifetime', 86400);
session_start();
include_once("./server/db-connect.php");

(!isset($_SESSION['user']) ? header("location: ./") : null);

$userId = $_SESSION['user']['user_id'];

$select_user_post = ($db_conn->query("SELECT * FROM `register` WHERE `id` = '$userId'"))->fetch_object();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Member Profile</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="./assets/vendor/fonts/boxicons.css" />

    <!-- sweet alert -->
    <link rel="stylesheet" href="./static/css/sweet-alert.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="./assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./assets/css/demo.css" />
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <a href="./"><img src="./static/images/logo/logo.png" alt="" class="img-fluid" height="60px"></a>
                            </div>
                        </div>

                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="./<?= $_SESSION['user']['user_image_src'] ?? "static/images/alhuda-demo-image.jpg" ?>" alt class="w-px-40 rounded-circle" height="70px" style="object-fit: cover;" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="./<?= $_SESSION['user']['user_image_src'] ?? "static/images/alhuda-demo-image.jpg" ?>" alt class="w-px-40 rounded-circle" height="70px" style="object-fit: cover;" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block"><?= $_SESSION['user']['user_name'] ?>
                                                    </span>
                                                    <small class="text-muted"><?= $select_user_post->post ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <?php
                                    if ((isset($_SESSION['user'])) && ($_SESSION['user']['user_role']) === "Admin") {
                                    ?>
                                        <li>
                                            <a class="dropdown-item d-flex gap-2 justify-content-start align-items-center" href="./administrator/">
                                                <ion-icon name="person-circle-outline"></ion-icon>
                                                <span class="align-middle">Admin Pannel</span>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                    ?>


                                    <li>
                                        <a class="dropdown-item d-flex gap-2 justify-content-start align-items-center" href="./">
                                            <ion-icon name="settings-outline"></ion-icon>
                                            <span class="align-middle">Back to Website</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex gap-2 justify-content-start align-items-center" href="./server/logout.php">
                                            <ion-icon name="log-out-outline"></ion-icon>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Al-huda /</span> Account</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="card mb-4">

                                        <h5 class="card-header mb-2 pb-0"><span class="text-warning"><?= $select_user_post->post ?></span> Profile Details</h5>
                                        <h6 class="card-header mt-0 pt-0">Referal Code: <code><?= $_SESSION['user']["user_ref_token"] !== "" ?  $_SESSION['user']["user_ref_token"] : "Code Not Found" ?></code></h6>
                                        <!-- Account -->
                                        <div class="card-body">
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <img src="./<?= $_SESSION['user']['user_image_src'] ?? "static/images/alhuda-demo-image.jpg" ?>" alt="user-avatar" class="d-block rounded" id="user-avatar" style="object-fit:cover;" height="100" width="100" />

                                                <div class="button-wrapper">
                                                    <label for="upload-img" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Upload new photo</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input type="file" id="upload-img" value="./<?= $_SESSION['user']['user_image_src'] ?? null ?>" hidden />
                                                    </label>

                                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 5MB</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-0" />
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="up-name" class="form-label">Name</label>
                                                    <input class="form-control" type="text" id="up-name" name="up-name" value="<?= $_SESSION['user']['user_name'] ?? null ?>" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="up-fname" class="form-label">Father's Name</label>
                                                    <input class="form-control" type="text" name="up-fname" id="up-fname" value="<?= $_SESSION['user']['user_father_name'] ?? null ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="up-mname" class="form-label">Mother's Name</label>
                                                    <input class="form-control" type="text" name="up-mname" id="up-mname" value="<?= $_SESSION['user']['user_mother_name'] ?? null ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Gender:</label>
                                                    <br>
                                                    <div class="d-flex gap-2 ">
                                                        <div class=" form-check d-inline-block">
                                                            <input class="form-check-input " value="Male" type="radio" name="up-gender" id="up-male" <?= ($_SESSION['user']['user_gender']) === "Male" ? "checked" : null ?>>
                                                            <label class=" form-check-label" for="up-male">
                                                                Male
                                                            </label>
                                                        </div>
                                                        <div class="form-check d-inline-block">
                                                            <input class="form-check-input" value="Female" type="radio" name="up-gender" id="up-female" <?= ($_SESSION['user']['user_gender']) === "Female" ? "checked" : null ?>>
                                                            <label class="form-check-label" for="up-female">
                                                                Female
                                                            </label>
                                                        </div>
                                                        <div class="form-check d-inline-block">
                                                            <input class="form-check-input" value="Others" type="radio" name="up-gender" id="up-others" <?= ($_SESSION['user']['user_gender']) === "Others" ? "checked" : null ?>>
                                                            <label class="form-check-label" for="up-others">
                                                                Others
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="up-dob" class="form-label">Date Of Birth</label>
                                                    <input type="date" class="form-control" id="up-dob" name="up-dob" value="<?= $_SESSION['user']['user_dob'] ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="up-location" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="up-location" name="up-location" placeholder="Address" value="<?= $_SESSION['user']['user_location'] ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="up-graduated-at" class="form-label">Graduated At</label>
                                                    <input class="form-control" type="text" id="up-graduated-at" name="up-graduated-at" placeholder="College/University" value="<?= $_SESSION['user']['user_study'] ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="up-complete-gradution" class="form-label">Gradution Year</label>

                                                    <select class="form-control" id="up-complete-gradution">
                                                        <?= ($_SESSION['user']['user_graduated_year']) ? "selected" : null ?>
                                                        <?php
                                                        if (isset($_SESSION['user']['user_graduated_year'])) {
                                                        ?>
                                                            <option value="<?= $_SESSION['user']['user_graduated_year'] ?>"><?= $_SESSION['user']['user_graduated_year'] ?></option>
                                                            <option>Complete Gradution Year</option>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <option>Complete Gradution Year</option>
                                                        <?php
                                                        }
                                                        $years = range(date('Y'), date('Y', strftime("%Y", time())));
                                                        ?>

                                                        <?php foreach ($years as $year) : ?>
                                                            <option value="<?= $year; ?>"><?= $year; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="up-phone">Phone Number</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">BD (+880)</span>
                                                        <input type="text" id="up-phone" name="up-phone" class="form-control" value="<?= substr($_SESSION['user']['user_mobile'], -11)  ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Email</label>
                                                    <div class="form-control"><?= $_SESSION['user']['user_email'] ?></div>
                                                    <span class="text-primary">You can't Update your email</span>
                                                </div>

                                            </div>
                                            <div class="mt-2">
                                                <button type="button" id="update1923" class="btn btn-primary me-2">Update</button>
                                                <button type="reset" class="btn btn-secondary me-2">Cancle</button>
                                            </div>

                                        </div>
                                        <!-- /Account -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="https://niyamotit.com" target="_blank" class="footer-link fw-bolder">Niyamot It</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>

    <!-- ion icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="./assets/vendor/js/bootstrap.js"></script>

    <script src="./assets/js/pages-account-settings-account.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="./static/js/sweet-alert.min.js"></script>
    <script src="./static/js/up-profile-ajax.js"></script>

    <script>
        // Listen for changes in the file input
        $("#upload-img").on("change", function() {
            // Get the selected file
            const file = this.files[0];

            if (file) {
                // Create a FileReader to read the selected file
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Set the src attribute of the img tag to the data URL of the selected file
                    $("#user-avatar").attr("src", e.target.result);
                };

                // Read the selected file as a data URL
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>