<?php ob_start(); ?>
<?php include  './config/functions.php'; ?>
<?php include  './config/db.php'; ?>
<?php session_start(); ?>

<?php

if (!isset($_SESSION['user_role'])) {
  header("Location: ./index.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>TOMOCA Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <!-- Pusher  -->
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script type="text/javascript">
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('e5fe60b6bb6d56b8b93e', {
      cluster: 'us2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
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

        axios.post('Componets/pusherNotification.php', {
          action: 'submit',
          name: "hello",
          // Orderday: orderday,
          // NewOrder: newOrder
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

</head>