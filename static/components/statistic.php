<?php
include_once("./server/db-connect.php");
$select_all_resgister = $db_conn->query("SELECT * FROM `register`");
?>

<section id="counter-part">
    <div class="overlay">
        <div class="align">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="item">
                            <h2 class="counter"><?= htmlspecialchars($select_all_resgister->num_rows) ?? "0" ?>
                            </h2>
                            <p>Total Members</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item">
                            <h2 class="counter">40</h2>
                            <p>Total representative </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item">
                            <h2 class="counter">5</h2>
                            <p>Total District</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>