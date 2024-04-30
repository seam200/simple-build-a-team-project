<?php
ini_set('session.gc_maxlifetime', 86400);
session_start();
if (isset($_SESSION['user'])) {
    header("location: ./");
}
include_once("./server/db-connect.php");
include_once("./server/val-login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Niyamat Online">
    <meta name="keywords" content="Niyamat Online">
    <meta name="author" content="Niyamat Online">
    <link class="fav" rel="shortcut icon" href="./static/images/logo/favicon.png" type="image/x-icon" />
    <title>আল-হুদা দাওয়াহ সেন্টার বাংলাদেশ</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="./static/assets/css/vendors/bootstrap.css">

    <!-- wow css -->
    <link rel="stylesheet" href="./static/assets/css/animate.min.css">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="./static/assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="./static/assets/css/vendors/feather-icon.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="./static/assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./static/assets/css/vendors/slick/slick-theme.css">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="./static/assets/css/bulk-style.css">
    <link rel="stylesheet" type="text/css" href="./static/assets/css/vendors/animate.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="./static/assets/css/style.css">
</head>

<body class="bg-effect">

    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->
    <section class="log-in-section background-image-2 section-b-space" style="min-height: 100vh;">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto" style="max-height: max-content;">
                    <div class="image-contain">
                        <img src="./static/assets/images/inner-page/log-in.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>আল-হুদা দাওয়াহ সেন্টার বাংলাদেশে আপনাকে স্বাগত</h3>
                            <h4>আপনার একাউন্টে Log In করুন</h4>
                        </div>

                        <div class="input-box">
                            <form action="" class="row" method="POST">
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="text" maxlength="13" class="form-control" id="username" placeholder="Your Number" name="mobile" value="<?= $mobile ?? $corr_mobile ?? null ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        <label for="username">আপনার মোবাইল নাম্বার</label>
                                        <span class="text-danger fw-bold my-2"><?= $error_mobile ?? null ?></span>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="pass">
                                        <label for="password">আপনার পাসওয়ার্ড</label>
                                        <span class="text-danger fw-bold my-2"><?= $error_pass ?? null ?></span>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit" name="login">
                                        লগ ইন করুন</button>
                                </div>
                            </form>
                        </div>

                        <div class="sign-up-box">
                            <h4>নতুন একাউন্ট রেজিস্টার করবেন?</h4>
                            <a href="./registration.php">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- latest jquery-->
    <script src="./static/assets/js/jquery-3.6.0.min.js"></script>

    <!-- jquery ui-->
    <script src="./static/assets/js/jquery-ui.min.js"></script>

    <!-- Bootstrap js-->
    <script src="./static/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="./static/assets/js/bootstrap/bootstrap-notify.min.js"></script>
    <script src="./static/assets/js/bootstrap/popper.min.js"></script>

    <!-- feather icon js-->
    <script src="./static/assets/js/feather/feather.min.js"></script>
    <script src="./static/assets/js/feather/feather-icon.js"></script>

    <!-- Lazyload Js -->
    <script src="./static/assets/js/lazysizes.min.js"></script>

    <!-- Slick js-->
    <script src="./static/assets/js/slick/slick.js"></script>
    <script src="./static/assets/js/slick/slick-animation.min.js"></script>
    <script src="./static/assets/js/slick/custom_slick.js"></script>

    <!-- Auto Height Js -->
    <script src="./static/assets/js/auto-height.js"></script>

    <!-- Timer Js -->
    <script src="./static/assets/js/timer1.js"></script>

    <!-- Fly Cart Js -->
    <script src="./static/assets/js/fly-cart.js"></script>

    <!-- Quantity js -->
    <script src="./static/assets/js/quantity-2.js"></script>

    <!-- WOW js -->
    <script src="./static/assets/js/wow.min.js"></script>
    <script src="./static/assets/js/custom-wow.js"></script>

    <!-- script js -->
    <script src="./static/assets/js/script.js"></script>

    <!-- theme setting js -->
    <script src="./static/assets/js/theme-setting.js"></script>
</body>

</html>