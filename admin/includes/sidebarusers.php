<div class="image">
    <!-- <img src="img/user2-160x160.jpg" class="img-circle elevation-2" /> -->
    <img class="img-circle elevation-2" src="uploadeddata/<?php echo $logo; ?>">
</div>
<div class="info">
    <?php

    //Fetching admin Name
    $adid = $_SESSION['aid'];
    $ret1 = mysqli_query($con, "select AdminName from tbladmin where ID='$adid'");
    while ($row1 = mysqli_fetch_array($ret1)) {
    ?>

        <span class="mr-2 d-none d-lg-inline text-white"><?php echo $row1['AdminName']; ?></span>
    <?php } ?>
</div>