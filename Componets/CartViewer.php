<!--  -->
<?php include  'Sqlfunc.php'; ?>

<?php


$ListID = urldecode(base64_decode($_GET['UD']));


if ($ListID) {
    global $connection;
    // $ListID = $_GET['UD'];
    $detail = getUserInput($ListID);

    $ChartStart = intval($detail['CartStart']);
    $ChartEnd = intval($detail['CartEnd']);


    $arryDetail = array();


    if ($ChartStart > $ChartEnd) {
    } else {

?>


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cart </h1>
        </div>
        <div class="row">
            <?php
            for ($x = $ChartStart; $x <= $ChartEnd; $x++) {
                $query = "SELECT * From cart WHERE cartId= '$x'";
                $res = mysqli_query($connection, $query);

                $res = mysqli_fetch_assoc($res);
                $productID = $res['ProductId'];
                $selectedItem = GetSelection($productID);

                $Ch_title = $selectedItem['Title'];
                $Ch_quan = $res['Quantity'];
                $Ch_prc = $selectedItem['price'];
                $Ch_siz = $selectedItem['size'];
                $Ch_Roast = $selectedItem['Roast'];
                $Ch_amn = $res['Amount'];
                $Ch_Update = $res['Updated'];
                $Ch_dsc = $selectedItem['Description'];
                $Ch_Amount = $res['Amount'];
            ?>



                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <?php echo $Ch_title; ?> </div>

                                    <div class="h5 mb-0 font-weight text-gray-800">Product type: <span class="h6 mb-0 font-weight text-gray-400"><?php echo $Ch_dsc; ?></span>
                                    </div>
                                    <div class="h5 mb-0 font-weight text-gray-800">Roast type: <span class="h6 mb-0 font-weight text-gray-400"><?php echo $Ch_Roast; ?></span></div>
                                    <div class="h5 mb-0 font-weight text-gray-800">Size: <span class="h6 mb-0 font-weight text-gray-400"><?php echo $Ch_siz; ?></span></div>
                                    <div class="h5 mb-0 font-weight text-gray-800">Qty: <span class="h6 mb-0 font-weight text-gray-400"> <?php echo $Ch_quan; ?></span></div>

                                    <div class="h5 mb-0 font-weight text-gray-800">Price/bag: <span class="h6 mb-0 font-weight text-gray-400"><?php echo $Ch_prc; ?> ETB</span></div>
                                    <div class="h5 mb-0 font-weight text-gray-800">Total: <span class="h6 mb-0 font-weight text-gray-400"><?php echo $Ch_Amount; ?>ETB </span></div>
                                </div>
                                <span class="col-auto">
                                    <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                    <!-- <img src="./img/logo.jpg" class="rounded fa-2x text-gray-300 row-cols-1" alt="..."> -->
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Annual) Card Example -->




    <?php
            }
        }
    }
    ?>
        </div>