<?php
include_once("./server/db-connect.php");
$select_all_banner = $db_conn->query("SELECT * FROM `banners` WHERE `status` = 'active'");
?>

<section id="banner-part">
  <div class="banner-slider">
    <?php
    if ($select_all_banner->num_rows > 0) {
      while ($row = $select_all_banner->fetch_assoc()) {
    ?>
        <div class="banner" style="background: url('./<?= htmlspecialchars($row['image_src']) ?>') no-repeat center !important " loading="lazy">
          <div class="overlay">
            <h2><?= htmlspecialchars($row['title']) ?></h2>
            <h1>বাংলাদেশ</h1>
            <p>
              <?= htmlentities($row['sub_title']) ?>
            </p>
            <?php if (isset($_SESSION['user'])) { ?>
              <a class="logout hire-btn" href="./server/logout.php">LOGOUT</a>
            <?php } else { ?>
              <a href="./registration.php">Registration</a>
              <a href="./login.php" class="hire-btn">Login</a>
            <?php } ?>
          </div>
        </div>
      <?php
      }
    } else {
      ?>
      <div class="banner">
        <div class="overlay">
          <h2>Al- Huda</h2>
          <h1>বাংলাদেশ</h1>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab error aut velit? Laboriosam nobis aliquam quidem excepturi officia nihil? Magnam, nostrum rem enim omnis iusto facere aspernatur saepe amet nemo corrupti atque obcaecati libero consectetur incidunt? Inventore ipsam quisquam voluptatibus vel at. Facere veritatis ipsum modi, ea illum delectus harum.
          </p>
          <?php if (isset($_SESSION['user'])) { ?>
            <a class="logout hire-btn" href="./server/logout.php">LOGOUT</a>
          <?php } else { ?>
            <a href="./registration.php">Registration</a>
            <a href="./login.php" class="hire-btn">Login</a>
          <?php } ?>
        </div>
      </div>

    <?php
    }
    ?>
  </div>
</section>