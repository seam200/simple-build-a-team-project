<?php
include_once("./server/db-connect.php");
$select_all_review = $db_conn->query("SELECT * FROM `testimonials` ");
$reviews = array(); // Create an empty array to store the results

if ($select_all_review->num_rows > 0) {
    while ($row = $select_all_review->fetch_assoc()) {
        $reviews[] = $row; // Store each row in the array
    }

?>

    <section id="testimonial-part">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="depender">
                            <div class="line"></div>
                        </div>
                        <div class="img-slider">
                            <?php
                            foreach ($reviews as $row) {
                            ?>
                                <div class="img" style="width: 100px; height:100px">
                                    <div class="round">
                                        <img src="./<?= htmlspecialchars($row['image_src']) ?? "static/images/alhuda-demo-image.jpg" ?>" alt="<?= htmlspecialchars($row['image_alt']) ?>" style="object-fit: cover; aspect-ratio:2/1; width: 100px  !important; height:150px !important;" />
                                        <div class="img-overlay"></div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-9">
                        <div class="details-slider">
                            <?php
                            $top = 1;
                            foreach ($reviews as $row) {
                            ?>
                                <div class="details">
                                    <h3><?= htmlspecialchars($row['name']) ?></h3>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <h4><?= htmlspecialchars($row['location']) ?></h4>
                                    <p><?= htmlspecialchars($row['details']) ?></p>
                                    <h6>Top <?= $top++ ?></h6>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
} else {
    null;
}
?>