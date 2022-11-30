<!DOCTYPE html>
<html lang="en">

<?php
    $dblnk = mysqli_connect("localhost", "root", "", "teashop");
    if(isset($_POST['onLogin'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $loginQuery = mysqli_query($dblnk, "SELECT `username`, 'password' from users where `username` = '$login' and password = '$password'");

        while($x = mysqli_fetch_row($loginQuery)) {
            if($x[0] != null || $x[1] != null) {
                $login = $x[0];
                $password = $x[1];
                setcookie("username", $login, time() + (86400 * 30), "/");

                $emailQuery = mysqli_query($dblnk, 'SELECT email from users where username = "$login"');

                // while($email = mysqli_fetch_row($emailQuery)) {
                // echo "XAXAXA";
                // }

                mysqli_close($dblnk);
                echo "<script>window.open('index.php', '_self')</script>";
            }
        }
    } 

//}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&family=Sono:wght@300&display=swap"
        rel="stylesheet">
    <title>Sklep Internetowy</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/login.css">
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
                <button onclick="location.href='./login.php'">Login</button>
            </div>
        </header>
        <div class="content">
            <div style="text-align: center; width: 80%; display: flex; justify-content: flex-end;">
                <p> Regulamin: </br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt suscipit nunc sit amet
                    varius. In eu nisl tincidunt, dictum turpis quis, fringilla turpis. Phasellus vel magna nec lectus
                    hendrerit sollicitudin. Curabitur in justo sapien. Maecenas erat eros, porttitor et iaculis nec,
                    dapibus sed sapien. Donec ultrices orci sed magna varius, a porta quam volutpat. Aliquam id orci
                    eget arcu convallis mattis.

                    Maecenas ultrices lectus ac enim bibendum, at vestibulum enim gravida. Vivamus tempor dapibus est,
                    non bibendum justo lobortis vel. Duis augue ipsum, luctus at porta quis, imperdiet a est. Sed
                    bibendum molestie turpis et gravida. Maecenas mollis facilisis mollis. Praesent pharetra egestas
                    malesuada. Curabitur porttitor, nunc eu ultrices venenatis, enim nibh lacinia nibh, vel bibendum
                    dolor mi ac velit. Aliquam ornare ipsum leo, id egestas leo ultrices in. Quisque ac magna id elit
                    posuere mollis at vitae nibh. Nam sem dui, sagittis at congue ut, vestibulum venenatis purus.
                    Pellentesque ac purus et urna laoreet dictum condimentum sed lectus. Nullam rhoncus augue ac
                    condimentum sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Duis odio velit, interdum in aliquam et, scelerisque vel diam.
                </p>
            </div>

            <form class="form login" method="post" action="login.php">
                <p class="tittle">Login</p>
                <input name="login" type="text" placeholder="Login" class="login__text">
                <br />
                <input name="password" type="password" placeholder="Password" class="password__text">
                <br />
                <button name="onLogin">Login</button>
                <br />
                <a href="register.php">I don't have an account</a>

            </form>
        </div>
    </div>
</body>

</html>


