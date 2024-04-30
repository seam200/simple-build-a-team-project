<?php
include_once("./server/db-connect.php");
$select_image = $db_conn->query("SELECT * FROM `user-image`");
?>

<section id="portfolio-part">
    <div class="overlay">
        <div class="title">
            <h2>Our Members</h2>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint, perspiciatis.
            </p>
            <div class="container">
                <div class="port-slider">
                    <?php
                    if ($select_image->num_rows > 0 && $select_image->num_rows >= 1) {
                        while ($row = $select_image->fetch_assoc()) {
                    ?>
                            <div class="item">
                                <div class="img">
                                    <img src="./<?= $row['src'] ?>" alt="<?= $row['alt'] ?>" loading="lazy" />
                                    <div class="img-overlay">
                                        <a class="venobox" href="./<?= $row['src'] ?>"><i class="fas fa-search-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    } else {
                        echo "<h5 class='text-center mt-2 text-white'>No Management Member Found.</h5>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>