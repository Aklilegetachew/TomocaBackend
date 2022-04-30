<!--  -->
<?php include  'Componets/Sqlfunc.php'; ?>


<?php


$ListID = $_GET['UD'];



if ($ListID) { 
    $detail = getUserInput($ListID);
    SetCompleted($detail);
    deleteRow($detail);
    header("Location: PickOrder.php");
}
?>