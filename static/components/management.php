<?php
include_once("./server/db-connect.php");
$select_all_management_member = $db_conn->query("SELECT * FROM `management`");
?>

<section id="member-part">
    <div class="title">
        <h2>Management</h2>
        <p>
            Principal owners of our company. They currently manage all his work.
        </p>
    </div>
    <div class="container">
        <div class="member-slider">
            <?php
            if ($select_all_management_member->num_rows > 0) {
                while ($row = $select_all_management_member->fetch_assoc()) {
            ?>
                    <div class="member">
                        <div class="img">
                            <img src="./<?= htmlspecialchars($row['image_src']) ?>" alt="<?= htmlspecialchars($row['image_alt']) ?>" class="img-fluid" style="height: 260px; width: max-content; object-fit: cover; aspect-ratio: 2/1;" loading="lazy" />
                            <div class="overlay">
                                <a class="venobox" data-gall="gallery" href="./<?= htmlspecialchars($row['image_src']) ?>"><i class="fas fa-search-plus"></i></a>
                            </div>
                        </div>
                        <div class="details">
                            <h3><?= htmlspecialchars($row['name']) ?></h3>
                            <p><?= htmlspecialchars($row['title']) ?></p>
                            <div class="icon">
                                <!-- facebook link -->
                                <a href="<?php if (htmlspecialchars($row['facebook_link']) !== "") {
                                                echo htmlspecialchars($row['facebook_link']);
                                            } else {
                                            ?>javascript:void(0)<?php } ?>" tabindex="0" target="<?= (htmlspecialchars($row['facebook_link']) !== "") ? "_blank" : null; ?>"><i class="fab fa-facebook-f"></i></a>

                                <!-- twitter link -->
                                <a href="<?php if (htmlspecialchars($row['twitter_link']) !== "") {
                                                echo htmlspecialchars($row['twitter_link']);
                                            } else {
                                            ?>javascript:void(0)<?php } ?>" tabindex="0" target="<?= (htmlspecialchars($row['twitter_link']) !== "") ? "_blank" : null; ?>"><i class="fab fa-twitter"></i></a>


                                <!-- linkedin link -->
                                <a href="<?php if (htmlspecialchars($row['linkedin_link']) !== "") {
                                                echo htmlspecialchars($row['linkedin_link']);
                                            } else {
                                            ?>javascript:void(0)<?php } ?>" tabindex="0" target="<?= (htmlspecialchars($row['linkedin_link']) !== "") ? "_blank" : null; ?>"><i class="fab fa-linkedin"></i></a>

                                <!-- skype link -->
                                <a href="<?php if (htmlspecialchars($row['skype_link']) !== "") {
                                                echo htmlspecialchars($row['skype_link']);
                                            } else {
                                            ?>javascript:void(0)<?php } ?>" class="google-plus" target="<?= (htmlspecialchars($row['skype_link']) !== "") ? "_blank" : null; ?>"><i class="fab fa-skype"></i></a>
                            </div>
                        </div>
                    </div>

                <?php
                }
            } else {
                ?>
                <h5 class="text-center">No Management Member Found.</h5>
            <?php
            }
            ?>
        </div>
</section>