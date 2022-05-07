<?php


include '../config/db.php';
// include 'Sqlfunc.php';

function addNotification($newOrder, $CustomerName, $dateOrder, $shopName)
{
    if (str_contains($newOrder, "pickup")) {
        $LinkUrl = "./PickOrder.php";
    } else {
        $LinkUrl = "./DeliveryOrder.php";
    }
    global $connection;
    $query = "INSERT INTO notificatione(newOrder, CustomerName, dateOrder, UrlOrder, ShopLocation) VALUES ('$newOrder', '$CustomerName', '$dateOrder', '$LinkUrl', '$shopName')";
    $res = mysqli_query($connection, $query);
    return $res;
}

// $oldArray= array();
// $Pushedarray = array();
// //  array_push();
// 
//  $_SESSION["name"] .= array("<script> document.write(localStorage.getItem('name')) </script>"); 
//  $_SESSION["SelectedShop"] .=array("<script> document.write(localStorage.getItem('SelectedShop')) </script>") ; 
//  $_SESSION["newOrder"] .= array("<script> document.write(localStorage.getItem('newOrder')) </script>"); 
//  $_SESSION["orderday"] .= array("<script> document.write(localStorage.getItem('orderday')) </script>"); 
//  $_SESSION["num"] = "<script> document.write(localStorage.getItem('num')) </script>"; 

// if (isset($_POST['btnsubmit'])) {

//     write_to_console($notification);
// }

// $notification = file_get_contents('php://input');
// file_put_contents("notfy.txt", $notification . PHP_EOL . PHP_EOL, FILE_APPEND);
// // $update = json_decode($input, true);

// function write_to_console($data)
// {
//     $console = $data;
//     if (is_array($console))
//         $console = implode(',', $console);

//     echo "<script>console.log('Console: " . $console . "' );</script>";
// }
// write_to_console($notification);




// echo $notification;

// addNotification($newOrder, $Msg, $dateOrder);
$received = json_decode(file_get_contents('php://input'));
$name2 = "hello";
file_put_contents("notfy.txt", $name2 . PHP_EOL . PHP_EOL, FILE_APPEND);

if ($received->action == 'submit') {

    echo json_encode(CancelLitsener($received->name, $received->Orderday, $received->NewOrder, $received->shopName));
}
function cancelLitsener($name, $Orderday, $NewOrder, $shopName)
{
    $_SESSION['new_order'] = true;
    $_SESSION['new_orderNum'] += 1;
    file_put_contents("notfy.txt", $name . PHP_EOL . PHP_EOL, FILE_APPEND);
    $r =  addNotification($NewOrder, $name, $Orderday, $shopName);
    return $r;
}
