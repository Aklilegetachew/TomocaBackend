<!--  -->
<?php include  'Componets/Sqlfunc.php'; ?>


<?php


$ListID = $_GET['UD'];



if ($ListID) {
    echo "hello";
    // global $connection;
    // $ListID = $_GET['UD'];
    $detail = getUserInput($ListID);
    SetCompleted($detail);
    deleteRow($detail);
    // $arryDetail = array();
    header("Location: PickOrder.php");
}
?>