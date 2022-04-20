<?php

include './config/db.php';

function SetCompleted($detail)
{
    global $connection;
    $UserID = $detail['UserID'];
    $FirstName = $detail['FirstName'];
    $LastName = $detail['LastName'];
    $CartStart = $detail['CartStart'];
    $CartEnd = $detail['CartEnd'];
    $TotalAmount = $detail['TotalAmount'];
    $NumProduct = $detail['NumProduct'];
    $TransactionID = $detail['TransactionID'];
    $PhoneNumber = $detail['PhoneNumber'];
    $ShopLocation = $detail['ShopLocation'];
    $cartStart = $detail['CartStart'];
    $cartEnd = $detail['CartEnd'];

    $query = "INSERT INTO pickupcompleted(FirstName, LastName, PhonNumber, Total, CartStart, CartEnd, OrderNumber, Shop)
     VALUES ('$FirstName', '$LastName', '$PhoneNumber', '$TotalAmount', '$cartStart', '$cartEnd', '$TransactionID', '$ShopLocation')";
    $res = mysqli_query($connection, $query);
}

function deleteRow($detail)
{
    global $connection;
    $UserID = $detail['ID'];

    $query = "DELETE FROM pickuppayed WHERE Id= $UserID";;
    $res = mysqli_query($connection, $query);
    return $res;
}

function deleteRowCompleted($detail)
{
    global $connection;
    $UserID = $detail['Id'];

    $query = "DELETE FROM pickupcompleted WHERE Id= $UserID";;
    $res = mysqli_query($connection, $query);
    return $res;
}


function getDeliveryOrders($role, $location)
{
    global $connection;
    $Inout = array();

    if ($role == "SuperAdmin") {
        $query = "SELECT * From deliveryorders";
        $res = mysqli_query($connection, $query);
        $respon = mysqli_num_rows($res);


        while ($res2 = mysqli_fetch_assoc($res)) {
            $Inout[] = $res2;
        }

        return $Inout;
    } else {
        $query = "SELECT * From deliveryorders WHERE PickupLocation = '$location'";
        $res = mysqli_query($connection, $query);
        $respon = mysqli_num_rows($res);


        while ($res2 = mysqli_fetch_assoc($res)) {
            $Inout[] = $res2;
        }

        return $Inout;
    }
}


function getDeliveryPickedOrders($role, $location)
{
    global $connection;
    $Inout = array();

    if ($role == "SuperAdmin") {
        $query = "SELECT * From deliverypickedup";
        $res = mysqli_query($connection, $query);
        $respon = mysqli_num_rows($res);


        while ($res2 = mysqli_fetch_assoc($res)) {
            $Inout[] = $res2;
        }

        return $Inout;
    } else {
        $query = "SELECT * From deliverypickedup WHERE PickupLocation = '$location'";
        $res = mysqli_query($connection, $query);
        $respon = mysqli_num_rows($res);


        while ($res2 = mysqli_fetch_assoc($res)) {
            $Inout[] = $res2;
        }

        return $Inout;
    }
}


function getPickupOrders($role, $location)
{
    global $connection;
    $Inout = array();

    if ($role == "SuperAdmin") {
        $query = "SELECT * From pickuppayed WHERE Pickstatus = 'pending'";
        $res = mysqli_query($connection, $query);
        $respon = mysqli_num_rows($res);


        while ($res2 = mysqli_fetch_assoc($res)) {
            $Inout[] = $res2;
        }

        return $Inout;
    } else {
        $query = "SELECT * From pickuppayed WHERE ShopLocation = '$location'";
        $res = mysqli_query($connection, $query);
        $respon = mysqli_num_rows($res);


        while ($res2 = mysqli_fetch_assoc($res)) {
            $Inout[] = $res2;
        }

        return $Inout;
    }
}


function getDeliveryCompleted($role, $location)
{
    global $connection;
    $Inout = array();

    if ($role == "SuperAdmin") {
        $query = "SELECT * From completeddelivery";
        $res = mysqli_query($connection, $query);
        while ($res2 = mysqli_fetch_assoc($res)) {
            $Inout[] = $res2;
        }

        return $Inout;
    } else {
        $query = "SELECT * From completeddelivery WHERE PickupLocation = '$location'";
        $res = mysqli_query($connection, $query);
        $respon = mysqli_num_rows($res);


        while ($res2 = mysqli_fetch_assoc($res)) {
            $Inout[] = $res2;
        }

        return $Inout;
    }
}





function getPickupOrdersCompleted($role, $location)
{
    global $connection;
    $Inout = array();

    if ($role == "SuperAdmin") {
        $query = "SELECT * From pickupcompleted";
        $res = mysqli_query($connection, $query);
        while ($res2 = mysqli_fetch_assoc($res)) {
            $Inout[] = $res2;
        }

        return $Inout;
    } else {
        $query = "SELECT * From pickupcompleted WHERE Shop = '$location'";
        $res = mysqli_query($connection, $query);
        $respon = mysqli_num_rows($res);


        while ($res2 = mysqli_fetch_assoc($res)) {
            $Inout[] = $res2;
        }

        return $Inout;
    }
}

function getUserInput($UseID)
{
    global $connection;
    $query = "SELECT * FROM pickuppayed WHERE ID = '$UseID'";
    $res = mysqli_query($connection, $query);
    $res2 = mysqli_fetch_assoc($res);
    $respo = array();

    return $res2;
}

function getUserInputPickupCompleted($UseID)
{
    global $connection;
    $query = "SELECT * FROM pickupcompleted WHERE Id = '$UseID'";
    $res = mysqli_query($connection, $query);
    $res2 = mysqli_fetch_assoc($res);
    $respo = array();

    return $res2;
}

function getUserInputDelivery($UseID)
{
    global $connection;
    $query = "SELECT * FROM deliveryorders WHERE ID = '$UseID'";
    $res = mysqli_query($connection, $query);
    $res2 = mysqli_fetch_assoc($res);
    $respo = array();

    return $res2;
}

function getUserInputDeliveryPicked($UseID)
{
    global $connection;
    $query = "SELECT * FROM deliverypickedup WHERE ID = '$UseID'";
    $res = mysqli_query($connection, $query);
    $res2 = mysqli_fetch_assoc($res);
    $respo = array();

    return $res2;
}


function getUserInputDeliveryCompleted($UseID)
{
    global $connection;
    $query = "SELECT * FROM completeddelivery WHERE ID = '$UseID'";
    $res = mysqli_query($connection, $query);
    $res2 = mysqli_fetch_assoc($res);
    $respo = array();

    return $res2;
}




function GetSelection($ID)
{
    global $connection;
    $query = "SELECT * From products WHERE productId = '$ID'";
    $res = mysqli_query($connection, $query);
    $res2 = mysqli_fetch_assoc($res);

    return $res2;
}


