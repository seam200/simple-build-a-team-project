<?php
ini_set('session.gc_maxlifetime', 86400);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>আল-হুদা দাওয়াহ সেন্টার বাংলাদেশ</title>
  <meta name="Description" content="Niyamat Online" />
  <meta name="Description" content=" Online" />
  <meta name="Description" content=" Online" />
  <link class="fav" rel="shortcut icon" href="./static/images/logo/favicon.png" type="image/x-icon" />
  <!-- google fonts start -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />
  <!-- google fonts end -->
  <!-- my css link start -->
  <link rel="stylesheet" href="./static/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./static/css/slick.css" />
  <link rel="stylesheet" href="./static/css/all.min.css" />
  <link rel="stylesheet" href="./static/css/venobox.css" />
  <link class="style" rel="stylesheet" href="./static/css/style.css" />
  <link rel="stylesheet" href="./static/css/member.css" />
  <link class="style-responsive" rel="stylesheet" href="./static/css/responsive.css" />
  <!-- my css link end -->
</head>

<body data-bs-spy="scroll" data-bs-target="#home" data-bs-offset="0">

  <?php
  // navigation bar
  include_once("./static/components/nav.php");

  // top banner
  include_once("./static/components/banner.php");

  // breaking news 
  include_once("./static/components/news.php");

  //  about 
  include_once("./static/components/about.php");

  // members
  include_once("./static/components/members.php");

  // servicess
  include_once("./static/components/service.php");

  // testimoniales
  include_once("./static/components/testimonial.php");

  // statistic
  include_once("./static/components/statistic.php");

  // management
  include_once("./static/components/management.php");

  // sponsorship
  include_once("./static/components/sponsor.php");

  // footer
  include_once("./static/components/footer.php");
  ?>



  <!--=====================================
        js file start
    ============================== -->
  <script src="./static/js/jquery-1.12.4.min.js"></script>
  <script src="./static/js/bootstrap.bundle.min.js"></script>
  <script src="./static/js/slick.min.js"></script>
  <script src="./static/js/venobox.min.js"></script>
  <script src="./static/js/waypoints.min.js"></script>
  <script src="./static/js/jquery.counterup.min.js"></script>
  <script src="./static/js/script.js"></script>
  <!--=====================================
        js file end
    ============================== -->
</body>

</html>