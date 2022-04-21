<?php

require './config/db.php';


function getshopNotification()
{
    global $connection;
    $Inout = array();
    $loggedShop = "Historical";

    $query = "SELECT * FROM notificatione WHERE ShopLocation = '$loggedShop'";
    $res = mysqli_query($connection, $query);
    while ($res2 = mysqli_fetch_assoc($res)) {
        $Inout[] = $res2;
    }

    return $Inout;
}


function getshopNotificationAll()
{
    global $connection;
    $Inout = array();
    $loggedShop = "Historical";

    $query = "SELECT * FROM notificatione ";
    $res = mysqli_query($connection, $query);
    while ($res2 = mysqli_fetch_assoc($res)) {
        $Inout[] = $res2;
    }

    return $Inout;
}


?>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter" id="notifynum">1</span>

                <!-- Counter - Alerts -->
                <?php if (1 != 0) { ?>
                <?php } else { ?>
                    <!-- <span class="badge badge-danger badge-counter" id="notifynum"></span> -->

                <?php } ?>

            </a>
            <!-- Dropdown - Alerts -->

            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" id="noteMode">
                <h6 class="dropdown-header">Alerts Center</h6>

                <?php if ($_SESSION['shopname'] == "Central") {
                    $respo = getshopNotification();
                    foreach ($respo as $row) {
                ?>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500" id="notifyday">
                                    <?php echo  $row["dateOrder"]; ?>
                                </div>
                                <span class="font-weight-bold" id="notifyMsg">
                                    <?php echo  $row["newOrder"]; ?>

                                </span>
                                <div class="text-gray-500" id="notifytype">

                                    <?php echo  $row["ShopLocation"]; ?>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                    <?php } else {
                    $respo = getshopNotification();
                    foreach ($respo as $row) {
                    ?>


                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-bell fa-fw text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500" id="notifyday">
                                    <?php echo  $row["dateOrder"]; ?>
                                </div>
                                <span class="font-weight-bold" id="notifyMsg">

                                    <?php echo  $row["newOrder"]; ?>
                                </span>
                                <div class="text-gray-500" id="notifytype">

                                    <?php echo  $row["CustomerName"]; ?>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                <?php } ?>


                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
        </li>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./index.php" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>