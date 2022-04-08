<!--  -->
<?php include  'Componets/Sqlfunc.php'; ?>


<?php


$ListID = $_GET['UD'];



if ($ListID) {
    $detail = getUserInputPickupCompleted($ListID);
    deleteRowCompleted($detail);
    // $arryDetail = array();
    header("Location: PickupCompleted.php");
}
?>