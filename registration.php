<?php
ini_set('session.gc_maxlifetime', 86400);
session_start();
if (isset($_SESSION['user'])) {
    header("location: ./");
}

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

    <!-- sweet alert -->
    <link rel="stylesheet" href="./static/css/sweet-alert.css">

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
    <section class="log-in-section section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto d-flex justify-content-center align-items-center" style="height: 100vh !important;">
                    <div class="image-contain d-flex justify-content-center align-items-center" style="position: sticky;">
                        <img src="./static/assets/images/inner-page/sign-up.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class=" col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3> আল-হুদা দাওয়াহ সেন্টার বাংলাদেশে আপনাকে স্বাগতম</h3>
                            <h4>নতুন একাউন্ট তৈরি করুন। অবশ্যই সম্পুর্ন তথ্য ইংরেজিতে দিবেন।</h4>
                        </div>

                        <div class="input-box">
                            <form class="row g-4" method="POST">
                                <div>
                                    <label for="reg-name">আপনার নাম:</label>
                                    <input class="form-control" type="text" id="reg-name" placeholder="Your Full Name" />
                                </div>
                                <div>
                                    <label for="reg-fathersName">আপনার বাবার নাম:</label>
                                    <input class="form-control" type="text" id="reg-fathersName" placeholder="Your Father's Name" />
                                </div>
                                <div>
                                    <label for="reg-mothersName">আপনার মায়ের নাম:</label>
                                    <input class="form-control" type="text" id="reg-mothersName" placeholder="Your Mother's Name" />
                                </div>
                                <div>
                                    <strong class="pe-3">লিঙ্গ:</strong>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input " value="Male" type="radio" name="reg-gender" id="male">
                                        <label class=" form-check-label" for="male">
                                            পুরুষ
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" value="Female" type="radio" name="reg-gender" id="female">
                                        <label class="form-check-label" for="female">
                                            নারী
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" value="Others" type="radio" name="reg-gender" id="others">
                                        <label class="form-check-label" for="others">
                                            অন্যান্য
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <label for="reg-dob">আপনার জন্মসাল:</label>
                                    <input class="form-control" type="date" id="reg-dob" />
                                </div>
                                <div>
                                    <label for="reg-location">আপনার ঠিকানা:</label>
                                    <input class="form-control" type="text" id="reg-location" placeholder="Your present Address" />
                                </div>
                                <div>
                                    <?php $years = range(date('Y'), date('Y', strftime("%Y", time()))); ?>
                                    <select class="form-control" id="reg-complete-gradution">
                                        <option>কত সালে পড়াশোনা শেষ করেছেন</option>

                                        <?php foreach ($years as $year) : ?>
                                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="reg-graduated-at">কোথায় থেকে পড়াশোনা করেছেন? এবং কি পর্যন্ত পড়েছেন?</label>
                                    <input class="form-control" type="text" id="reg-graduated-at" placeholder="College/University" />
                                </div>
                                <div>
                                    <label for="reg-mobileNumber">আপনার মোবাইল নাম্বার:</label>
                                    <input class="form-control" type="text" id="reg-mobileNumber" placeholder="Contact Number" maxlength="11" />
                                </div>
                                <div>
                                    <label for="reg-email">আপনার ই-মেইল ঠিকানা:</label>
                                    <input class="form-control" type="email" id="reg-email" placeholder="Email" />
                                </div>
                                <div>
                                    <label for="reg-pass">আপনার পাসওয়ার্ড দিন:</label>
                                    <input class="form-control" type="password" id="reg-pass" placeholder="Password" />
                                </div>
                                <div>
                                    <label for="reg-confirm_pass">আপনার পাসওয়ার্ড পুনরায় দিন:</label>
                                    <input class="form-control" type="password" id="reg-confirm_pass" placeholder="Confirm Password" />
                                </div>
                                <div>
                                    <label for="reg-ref-token">Referal Code: (optional)</label>
                                    <input class="form-control" type="text" id="reg-ref-token" placeholder="Referal Code" />
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100" type="button" id="register1923" name="register">রেজিস্টার করুন</button>
                                </div>
                            </form>
                        </div>

                        <div class="sign-up-box">
                            <h4>আগে থেকে একাউন্ট করা আছে?</h4>
                            <a href="./login.php">Log In</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
            </div>
        </div>
    </section>
    <!-- log in section end -->
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#reg-gradution-year").datepicker({
                dateFormat: 'yy'
            });
        });
    </script>
    <script src="./static/js/sweet-alert.min.js"></script>
    <script type="text/javascript" src="./static/js/register-ajax.js"></script>
</body>

</html>