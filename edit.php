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
    <link rel="stylesheet" href="./styles/edit.css">
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
         if(isset($_COOKIE['username'])) {
        $username = $_COOKIE['username'];
        $email = '';
        $password = '';

        $dblnk = mysqli_connect("localhost", "root", "", "teashop");

        $getInfoQuery = mysqli_query($dblnk, "SELECT username, email, password from users where username = '$username'");
        
            while($info = mysqli_fetch_row($getInfoQuery)) {
                $username = $info[0];
                $email = $info[1];
                $password = $info[2];

                if(empty($_POST['editEmail'])) {
                    $editEmail = $info[1];
                 }else
                 {
                    $editEmail = $_POST['editEmail'];
                 }
                  if(empty($_POST['editPassword'])) {
                    $editPassword = $info[2];
                    }else {
                        $editPassword = $_POST['editPassword'];
                    }
                                                           
                mysqli_query($dblnk, "UPDATE users SET email = '$editEmail', password= '$editPassword' WHERE username = '$username'"); 
            }
            
        }   else  {
            $username = "";
            $email = "";        
        }
?>

        <div class="content">
            <form class="edit__form" method="post">
                <h2>Edit Account:</h2>
                <p>Username:</p>
                <?php echo "<input placeholder='$username' disabled class='formfield' name='editUsername'>"?>
                <p>Email</p>
                <?php echo "<input placeholder='$email' class='formfield' name='editEmail'>"?>
                <p>Password</p>
                <?php echo "<input type='password' placeholder='Password' class='formfield' name='editPassword'>"?>
                <br />
                <button>Change settings</button>
            </form>
        </div>
        <hr>

        <div class="cart">
            <h2>Purachement History:</h2>
            <table class="purachement">
                <tr>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Ammount</td>
                    <td>Total</td>
                </tr>
                <?php
                    if(isset($_COOKIE['username'])) {
                        $getUserId = mysqli_query($dblnk, "SELECT user_id from users where username = '".$username."'");
                        
                        while($user = mysqli_fetch_row($getUserId)) {
                            $getBoughtItems = mysqli_query($dblnk, "SELECT items.item_name, items.item_price, cart.cart_item_ammount from items, users, cart where cart.cart_user_id = users.user_id and items.item_id = cart.cart_item_id and users.user_id = ".$user[0]."");
                            while($items = mysqli_fetch_row($getBoughtItems)) {
                                $total = (int)$items[1] * (int)$items[2];
                                echo '
                                    <tr>
                                        <td>'.$items[0].'</td>
                                        <td>'.$items[1].'</td>
                                        <td>'.$items[2].'</td>
                                        <td>'.$total.'</td>
                                    </tr>
                                ';
                            }
                        }
                    } 
                    else {
                        echo "<h2>Cannot get User id</h2>";
                    }
?>
                </table>
        </div>
    </div>
</body>

</html>