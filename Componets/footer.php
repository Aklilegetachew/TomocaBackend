<?php


?>


<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Versavvy 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cancel
                </button>
                <a class="btn btn-primary" href="index.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Successfully Completed order  -->

<div class="modal fade" id="CompleteModal" tabindex="-1" role="dialog" aria-labelledby="SucessesLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example2ModalLabel">Complete order?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to complete order
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cancel
                </button>
                <a class="btn btn-primary" href="function.php?UD=<?php echo $ListID; ?>">Complete</a>
            </div>
        </div>
    </div>
</div>


<!--   DeleteModal-->

<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="SucessesLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example2ModalLabel">Delete order?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete order
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cancel
                </button>
                <a class="btn btn-danger" href="deleteOrder.php?UD=<?php echo $ListID; ?>">Delete</a>
            </div>
        </div>
    </div>
</div>


<!-- <form name="pushFormz" action="pusherNotification.php" method="POST" id="pushForm"> -->
<form name="myForm" id="myForm" target="_myFrame" action="Componets/pusherNotification.php" method="POST">
    <input name="username" type="hidden" id="username" />
    <input name="Date" type="hidden" id="Date" />
    <input name="newOrder" type="hidden" id="newOrder" />
    <input name="num" type="hidden" id="num" value="1" />
    <input class="btn-hidden" type="submit" name="btnsubmit" value="Submit" id="subHid" />


</form>


<script type="text/javascript">
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('e5fe60b6bb6d56b8b93e', {
        cluster: 'us2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', async function  (data) {
                var notification = JSON.stringify(data);
                // alert(notification);
                let shopLoc = "<?php echo $_SESSION['shopname'] ?>";
                console.log(data.shop);
                console.log(data.name);
                console.log(shopLoc);
                var newOrder = data.message;
                var SelectedShop = data.shop;
                var name = data.name;
                var orderday = data.Orderdate;
                var loggedShop = shopLoc;
                let shopLocation = SelectedShop.substring(3);
                // localStorage.setItem("newOrder", newOrder);
                // localStorage.setItem("SelectedShop", SelectedShop);
                // localStorage.setItem("name", name);
                // localStorage.setItem("orderday", orderday);
                // localStorage.setItem("num", 0);
                if (loggedShop.includes(shopLocation)) {
                    // const Nameinput = document.getElementById("username");
                    // const dayinput = document.getElementById("Date");
                    // const newOrder = document.getElementById("newOrder");
                    // const num = document.getElementById("num");
                    // console.log(orderday);
                    // Nameinput.value = data.name;
                    // dayinput.value = orderday;
                    // newOrder.value = newOrder;
                    // num.value = 1;

                    await axios.post('Componets/pusherNotification.php', {
                        action: 'submit',
                        name: name ,
                        Orderday: orderday,
                        NewOrder: newOrder
                    }).then(res => {
                            console.log("axios")
                        })

                        // document.forms["myForm"].submit();
                        // console.log("hello");
                        // $messageArray = array();
                        // array_push($messageArray, {})

                        // $_SESSION["notification"] = $messageArray?>

                        // $ch = curl_init();

                        // curl_setopt($ch, CURLOPT_URL, "https://private-anon-8b5436ce56-tookanapi.apiary-mock.com/v2/create_task");
                        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        // curl_setopt($ch, CURLOPT_HEADER, FALSE);
                        // curl_setopt($ch, CURLOPT_POST, TRUE);
                        // curl_setopt($ch, CURLOPT_POSTFIELDS, "{
                        //   "newOrde": "newOrder",
                        //   "SelectedShop": "SelectedShop",
                        //    "name": "name",
                        //      "orderday": "orderday",
                        //      "num": 0

                        // }");






                        // var existingEntries = JSON.parse(localStorage.getItem("allEntries"));
                        // if (existingEntries == null) existingEntries = [];
                        // var entry = {
                        //   "newOrde": newOrder,
                        //   "SelectedShop": SelectedShop,
                        //   "name": name,
                        //   "orderday": orderday,
                        //   "num": 0
                        // };
                        // localStorage.setItem("entry", JSON.stringify(entry));
                        // existingEntries.push(entry);

                        // localStorage.setItem("allEntries", JSON.stringify(existingEntries));

                        // for (var i = 0; i < localStorage.length; i++) {
                        //   $('body').append(localStorage.getItem(localStorage.key(i)));

                        //   document.getElementById("notifyMsg").append(localStorage.getItem(localStorage.key("newOrder")));
                        //   document.getElementById("notifyday").append(localStorage.getItem(localStorage.key("orderday")));
                        //   document.getElementById("notifytype").append(localStorage.getItem(localStorage.key("name")));
                        //   document.getElementById("notifynum").append(localStorage.getItem(localStorage.key(i)));
                        // }

                        // document.getElementById("notifyMsg").innerHTML = localStorage.getItem("newOrder");
                        // document.getElementById("notifyday").innerHTML = localStorage.getItem("orderday");
                        // document.getElementById("notifytype").innerHTML = localStorage.getItem("name");
                        // document.getElementById("notifynum").innerHTML = localStorage.getItem("num") + 1;

                        // field.addEventListener("change", function() {
                        // // And save the results into the session storage object
                        // document.getElementById("notifyMsg").innerHTML = sessionStorage.getItem("newOrder");
                        // document.getElementById("notifyday").innerHTML = sessionStorage.getItem("orderday");
                        // document.getElementById("notifytype").innerHTML = sessionStorage.getItem("name");
                        // document.getElementById("notifynum").innerHTML = sessionStorage.getItem("num") + 1;
                        // });
                        // sessionStorage.setItem("lastname", "Smith");
                        // window.location.reload();
                    }
                });
</script>



<!-- Pusher -->
<!-- <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('e5fe60b6bb6d56b8b93e', {
        cluster: 'us2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        alert(JSON.stringify(data));
    });
</script> -->



<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js"></script>
</body>

</html>