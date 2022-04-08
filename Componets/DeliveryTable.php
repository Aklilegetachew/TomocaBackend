<!-- <?php include  './config/db.php'; ?> -->
<!--  -->
<?php include  'Sqlfunc.php'; ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Delivery Orders</h1>
    <p class="mb-4">

    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                New Delivery Orders
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Order Number</th>
                            <th>Qty</th>
                            <th>Total Price</th>
                            <th>Delivery Tracking</th>
                            <th>Status</th>
                            <th>Cart</th>

                            <?php if ($_SESSION['user_role'] == 'SuperAdmin') { ?>
                                <th> Shop </th>

                        </tr>
                    </thead>
                    <?php $i = 1; ?>
                    <tbody>
                        <?php
                                $response = getDeliveryOrders($_SESSION['user_role'], $_SESSION['location']);

                                foreach ($response as $row) {
                                    $urlStr = base64_encode(urlencode($row['ID']));
                        ?>

                            <tr>

                                <td><?php echo $row['FirstName'] . " " . $row['LastName'];    ?></td>
                                <td><?php echo $row['PhoneNumber']; ?></td>
                                <td><?php echo $row['OrderNumber']; ?></td>
                                <td><?php echo $row['Quantity']; ?></td>
                                <td><?php echo $row['Total']; ?> ETB</td>
                                <td><?php echo $row['DeliveryUrl']; ?></td>
                                <td>pending</td>
                                <td>
                                    <a href="Cart.php?UD=<?php echo $urlStr; ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-cart"></i>
                                        </span>
                                        <span class="text">Cart List</span>
                                    </a>
                                </td>
                                <td><?php echo $row['PickupLocation']; ?></td>


                                <?php $i++; ?>
                            </tr>

                        <?php } ?>
                        <?php } elseif ($_SESSION['user_role'] != 'SuperAdmin') {
                                $response = getPickupOrders($_SESSION['user_role'], $_SESSION['location']);
                                foreach ($response as $row) { ?>
                            <tr>
                                <td><?php echo $row['FirstName'] . " " . $row['LastName'];    ?></td>
                                <td><?php echo $row['PhoneNumber']; ?></td>
                                <td><?php echo $row['TransactionID']; ?></td>
                                <td><?php echo $row['NumProduct']; ?></td>
                                <td><button class="btn btn-sm" href="#">List</button></td>
                                <td>$<?php echo $row['TotalAmount']; ?></td>
                                <td>pending</td>

                            </tr>
                        <?php }  ?>
                    <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>