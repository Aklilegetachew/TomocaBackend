<?php

require '../config/db.php';
session_start();

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




$ShopName = $_POST["shopName"];
$dateOrder = $_POST["Orderday"];
$newOrder = $_POST["NewOrder"];
$CustomerName = $_POST["name"];


if ($_SESSION['shopname'] == "Central") {
    $respo = getshopNotification();
    foreach ($respo as $row) {
        echo   '<a class="dropdown-item d-flex align-items-center" href="#">
    <div class="mr-3">
        <div class="icon-circle bg-primary">
            <i class="fas fa-bell fa-fw text-white"></i>
        </div>
    </div>
    <div>
        <div class="small text-gray-500" id="notifyday">';
        echo  $dateOrder;
        echo ' </div>
        <span class="font-weight-bold" id="notifyMsg">';

        echo  $newOrder;
        echo '</span>
        <div class="text-gray-500" id="notifytype">';

        echo  $ShopName;
        echo '</div>
    </div>
</a>';
    }
} else {
    $respo = getshopNotification();
    foreach ($respo as $row) {
        echo   '<a class="dropdown-item d-flex align-items-center" href="#">
    <div class="mr-3">
        <div class="icon-circle bg-primary">
            <i class="fas fa-bell fa-fw text-white"></i>
        </div>
    </div>
    <div>
        <div class="small text-gray-500" id="notifyday">';
        echo  $dateOrder;
        echo ' </div>
        <span class="font-weight-bold" id="notifyMsg">';

        echo  $newOrder;
        echo '</span>
        <div class="text-gray-500" id="notifytype">';

        echo  $CustomerName;
        echo '</div>
    </div>
</a>';
    }
}
