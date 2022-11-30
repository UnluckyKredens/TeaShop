<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&family=Sono:wght@300&display=swap"
        rel="stylesheet">
    <title>Sklep Internetowy</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/products.css">
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
                $dblnk = mysqli_connect("localhost", "root", "", "teashop");

                $getitems = mysqli_query($dblnk, "SELECT item_name, categories.category_name, item_price, item_desc, item_image, item_id from items, categories where item_category = categories.category_id");
            
                echo " <div class='content'>";

                while($item = mysqli_fetch_row($getitems))
                {
                    echo '
                        <div class="card" aria-label="'.$item[3].'">
                        <img src="'.$item[4].'" class="item__img">
                        <p class="item__tittle">'.$item[0].'</p>
                        <p>Type: '.$item[1].'</p>
                        <p class="item__price">'.$item[2].'.00$</p>
                        <button onclick="location.href=`payment.php?id='.$item[5].'`">Buy</button>
                    </div>
                    
                    ';
                }
                echo "</div>";
            ?>
        
    </div>
</body>

</html>