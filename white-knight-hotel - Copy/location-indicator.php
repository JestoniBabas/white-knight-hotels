<b>
    <span class="glyphicon glyphicon-menu-right"></span>
     <span  title="CURRENT PAGE">
        <?php
        $curr_page = basename($_SERVER['PHP_SELF']);
        $ex = explode(".", $curr_page);
        echo ucfirst($ex[0]);
    ?>
    </span>
</b>