 <?php
    include_once("./server/db-connect.php");
    $select_all_sponsor = $db_conn->query("SELECT * FROM `sponsor`");
    $result = array();
    if ($select_all_sponsor->num_rows > 0) {
        while ($row = $select_all_sponsor->fetch_assoc()) {
            $result[] = $row;
        }

    ?>
     <section id="sponsor-part">
         <div class="align">
             <div class="container">
                 <div class="sponsor-slider">
                     <?php
                        foreach ($result as $row) {
                        ?>
                         <div class="item">
                             <img src="./<?= htmlspecialchars($row['image_src']) ?? null ?>" alt="<?= htmlspecialchars($row['image_alt']) ?>" />
                         </div>
                     <?php
                        }
                        ?>
                 </div>
             </div>
         </div>
     </section>

 <?php
    } else {
    ?>
     <section id="sponsor-part" class="bg-transparent">

     </section>
 <?php
    }
    ?>