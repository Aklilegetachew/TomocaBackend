<?php include 'Componets/HeaderAdmin.php'; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'Componets/SideBar.php'; ?>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'Componets/TopBar.php'; ?>
                <!-- End of Topbar -->

                <!-- Content Wrapper -->
                <div class="container-fluid">
                    <?php include 'Componets/CartViewerCompleted.php'; ?>
                    <a href="function.php?UD=<?php echo $_GET['UD']; ?>&model=<?php echo $_GET['model']; ?>" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#DeleteModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash-alt"></i>
                        </span>
                        <span class="text">Delete Order</span>
                    </a>
                    <a href="./PickUpCompleted.php" class="btn btn-back btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Back</span>
                    </a>


                </div>




            </div>

            <!-- End of Main Content -->

            <?php include 'Componets/footer.php'; ?>