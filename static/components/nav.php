<nav class="navbar navbar-expand-lg menu" id="home">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="./static/images/logo/logo.png" class="img-fluid" height="60px" loading="lazy" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#banner-part">Home</a>
                </li>
                <?php if (!isset($_SESSION['user']) || $_SESSION['user']['user_role'] !== "Admin") { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#about-part">About</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="#portfolio-part">Members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#service-part">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonial-part">Top Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#member-part">Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#footer-part">Contact us</a>
                </li>
                <?php if (isset($_SESSION['user'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./profile">Profile</a>
                    </li>
                    <?php
                    if ($_SESSION['user']['user_role'] === "Admin") {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./administrator">Panel</a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="logout my-2 my-md-0" href="./server/logout.php" class="hire-btn">LOGOUT</a>
                    </li>
                <?php } ?>
            </ul>

        </div>
    </div>
</nav>