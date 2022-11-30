<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&family=Sono:wght@300&display=swap" rel="stylesheet">
    <title>Sklep Internetowy</title>
    <link rel="stylesheet" href="./styles/global.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <img src="./assets/logo.png" onclick="location.href='./index.php'">
                <p>Tea Shop</p>
            </div>
            <div class="navigation">
                <button onclick="location.href='./products.php'">More products</button>
                <button onclick="location.href='./contact.php'">Contact</button>
                <?php
    if(isset($_COOKIE['username'])) {
        echo "<button onclick='location.href=`edit.php`'>$_COOKIE[username]</button>";
        echo "<button onclick='document.cookie = `username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`; location.reload();'>Log out</button>";
      } else {
       echo "<button onclick='location.href=`login.php`'>Login</button>";
      }
      ?>
            </div>
        </header>

        <?php
        if(isset($_GET['id']) && isset($_GET['type'])) {
            $dblnk = mysqli_connect("localhost", "root", "", "teashop");
            $item_id = $_GET['id'];
            $payment_type = $_GET['type'];
            $username = $_COOKIE['username'];

            $getUserId = mysqli_query($dblnk, "SELECT user_id from users where users.username = '".$username."'");

            while($user = mysqli_fetch_row($getUserId)) {
                $payment_success = mysqli_query($dblnk, "INSERT INTO cart VALUES ($user[0],$item_id,1,'$payment_type')");
            }
        }

?>
        <div class="content">
            <h1>Success!</h1>
            <h2>your product has been purchased and is on its on way to you </h2>
            <br>
            <button onclick='location.href=`index.php`'>Back to main page</button>
        </div>
    </div>
</body>
</html>