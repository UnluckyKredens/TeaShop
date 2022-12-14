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
    <link rel="stylesheet" href="./styles/contact.css">
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

        <form class="content" method="post" action="contact-success.php">
                <h2>Have you got problem?<br>Call us!</h2>
                <?php
                    if(isset($_COOKIE['username'])) {
                        echo '
                        <input class="formfield username" value="'.$_COOKIE['username'].'" placeholder="Your name" type="text" name="contact_name">
                        <input class="formfield text" type="text" name="contact_info">
                        </br>
                        <button class="send">Send</button>
                        ';
                    }else {
                        echo '
                        <input class="formfield username" placeholder="Your name" type="text" name="contact_name">
                        <input class="formfield text" type="text" name="contact_info">
                        </br>
                        <button class="send">Send</button>
                        '; 
                    }

?>
            </form>
    </div>
</body>
</html>