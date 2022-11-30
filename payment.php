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
    <link rel="stylesheet" href="./styles/payment.css">
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

        <div class="content">

        <?php

        if(isset($_COOKIE['username']) && isset($_GET['id'])) {
            $dblnk = mysqli_connect("localhost", "root", "", "teashop");
            $item_id = $_GET['id'];
            $username = $_COOKIE['username'];

            $getItemInfo = mysqli_query($dblnk, "select item_name, categories.category_name, item_price, item_desc, item_image from items, categories where item_id = ".$item_id." and items.item_category = categories.category_id");
            
            while($item = mysqli_fetch_row($getItemInfo)) {
                echo '
                <div class="item" aria-label="'.$item[3].'">
                <img src="'.$item[4].'" class="item__img">
                <h2 class="item__tittle">'.$item[0].'</h2>
                <p class="item__category">Type: '.$item[1].'</p>
                <p class="item__description">'.$item[3].'</p>
                <p class="item__price">Price: '.$item[2].'.00$</p>
                <br/>
                <h2>Payment by: </h2>
                <div class="item__payment">
                <img onclick="location.href=`success.php?id='.$item_id.'&type=bank`" class="item__payment--img" src="./assets/payments/bank.png">
                <img onclick="location.href=`success.php?id='.$item_id.'&type=blik`" class="item__payment--img" src="./assets/payments/blik.png">
                <img onclick="location.href=`success.php?id='.$item_id.'&type=paypal`" class="item__payment--img" src="./assets/payments/paypal.png">
                </div>
            </div>
                ';
            }
        }
        else {
            echo '<h2 style="margin-top: 5%;">You must login first</h2> 
            <br>
            <button onclick="location.href=`login.php`">Login</button>
            ';

        }
           
            

?>

        </div>
    </div>
</body>
</html>