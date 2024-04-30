<?php
include_once("./server/db-connect.php");
$select_news = $db_conn->query("SELECT * FROM `news` WHERE `id` = 1");
$fetch_news = $select_news->fetch_object();
if ($select_news->num_rows === 1) {
?>
    <marquee behavior="scroll" direction="" scrollamount="5" onmouseover="this.stop()" onmouseout="this.start()" class="slide bg-dark text-white">
        <a href="<?php if ($fetch_news->link_href !== "") {
                        echo $fetch_news->link_href;
                    } else { ?>javascript:void(0)<?php } ?>">
            <p><b><?= $fetch_news->details ?></b></p>
        </a>
    </marquee>
<?php
} else {
    null;
}
?>