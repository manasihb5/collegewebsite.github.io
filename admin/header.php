<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="index-2.html"><img
                src="https://cdn.discordapp.com/attachments/903936215718461481/1002587122571689984/download.png" alt=""
                height="70px"></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <?php
    session_start();
    if ($_SESSION['admin'] == null) {
        header("location:login.php");
    }

    ?>
    <ul id="sidebar_menu">
        <li class="">
            <a class="has-arrow" href="index.php" aria-expanded="false">

                <div class="icon_menu">
                    <img src="img/menu-icon/dashboard.svg" alt="">
                </div>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="">
            <a class="has-arrow" href="fees.php" aria-expanded="false">

                <div class="icon_menu">
                    <img src="img/menu-icon/dashboard.svg" alt="">
                </div>
                <span>Fees Paid</span>
            </a>
        </li>
    </ul>
</nav>