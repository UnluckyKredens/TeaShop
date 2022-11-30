<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&family=Sono:wght@300&display=swap"
        rel="stylesheet">
    <title>Sklep Internetowy</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/index.css">
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
            <div class="presentation">
                <div>
                    <img class="item__image" src="./assets/tea.jpg">
                </div>
                <div class="text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed ultricies erat. Morbi vehicula
                        tellus turpis, eget tincidunt velit condimentum a. Morbi auctor odio sit amet cursus luctus.
                        Aenean quis laoreet sapien, eu tincidunt tortor. Pellentesque ut risus sed diam tincidunt
                        ullamcorper. Ut consectetur in dui at euismod. Curabitur commodo lacinia odio nec fringilla.
                        Nunc ex tellus, finibus varius malesuada vel, tincidunt at orci. Curabitur sit amet vulputate
                        ex, nec ullamcorper quam. Curabitur commodo viverra quam, eu porta lorem convallis sit amet.
                        Integer et vulputate enim. Praesent at mauris sed nulla porta bibendum. Quisque tellus enim,
                        semper eget purus nec, bibendum convallis massa.

                        Maecenas lacinia rhoncus nibh,
                        <br />
                        <br />
                        quis scelerisque felis facilisis nec. Nullam posuere vestibulum sapien, non iaculis arcu viverra
                        et. Integer scelerisque risus eros, vel consequat libero commodo non. Etiam interdum lectus
                        tempor, tempor arcu at, condimentum orci. Morbi in nisi dolor. Etiam pharetra porttitor est, sed
                        sagittis enim dapibus ut. Ut in placerat nibh, id venenatis tellus. Proin ullamcorper eu quam
                        eget condimentum. Sed odio urna, volutpat vel venenatis id, imperdiet a metus. Aliquam rhoncus
                        vel urna at cursus. Phasellus elementum, sem eu luctus ultrices, turpis velit tempus nibh, at
                        hendrerit mauris dolor eget sapien. Donec posuere porta neque at condimentum.

                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus est, pulvinar a semper nec,
                        viverra nec mauris. Morbi ipsum nulla, lobortis sit amet neque nec, tincidunt dapibus ipsum. In
                        eget mi ut odio luctus condimentum sit amet ut eros. Nulla a lectus ultrices, fermentum nulla
                        vitae, consequat urna. Nunc elementum sagittis euismod. Suspendisse elementum, lorem ut
                        dignissim rutrum, est ex congue nisi, vitae pretium nunc nisi eu urna. Suspendisse elementum
                        blandit porttitor. Morbi accumsan leo mi, quis blandit ante blandit nec. Nulla massa leo,
                        facilisis sit amet diam nec, laoreet vulputate ex. Duis vitae tempor nulla. Donec suscipit lacus
                        eu aliquam eleifend. Nam tempus ipsum eget felis luctus mollis. Aliquam erat volutpat.


                    </p>
                </div>
            </div>
            <div class="section__one">
                <p class="section__tittle">Healthy tea</p>
                <div class="section__content--one">
                    <img class="section__img" src="https://images.indianexpress.com/2020/09/tea-bags-3836347_1280.jpg">
                <p class="section__text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed ultricies erat. Morbi vehicula
                    tellus turpis, eget tincidunt velit condimentum a. Morbi auctor odio sit amet cursus luctus. Aenean
                    quis laoreet sapien, eu tincidunt tortor. Pellentesque ut risus sed diam tincidunt ullamcorper. Ut
                    consectetur in dui at euismod. Curabitur commodo lacinia odio nec fringilla. Nunc ex tellus, finibus
                    varius malesuada vel, tincidunt at orci. Curabitur sit amet vulputate ex, nec ullamcorper quam.
                    Curabitur commodo viverra quam, eu porta lorem convallis sit amet. Integer et vulputate enim.
                    Praesent at mauris sed nulla porta bibendum.
                    Quisque tellus enim, semper eget purus nec, bibendum convallis massa.
                </p>
                </div>


                <hr class="section__end">
            </div>

            <div class="section__two">
                <p class="section__tittle">More about our products</p>
                <div class="section__content--two">
                <p class="section__text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed ultricies erat. Morbi vehicula
                    tellus turpis, eget tincidunt velit condimentum a. Morbi auctor odio sit amet cursus luctus. Aenean
                    quis laoreet sapien, eu tincidunt tortor. Pellentesque ut risus sed diam tincidunt ullamcorper. Ut
                    consectetur in dui at euismod. Curabitur commodo lacinia odio nec fringilla. Nunc ex tellus, finibus
                    varius malesuada vel, tincidunt at orci. Curabitur sit amet vulputate ex, nec ullamcorper quam.
                    Curabitur commodo viverra quam, eu porta lorem convallis sit amet. Integer et vulputate enim.
                    Praesent at mauris sed nulla porta bibendum.
                    Quisque tellus enim, semper eget purus nec, bibendum convallis massa.
                </p>
                <img class="section__img" src="https://img.emedihealth.com/wp-content/uploads/2021/12/not-throw-away-used-green-or-white-tea-bags-feat.jpg">
                </div>
                <hr class="section__end">
            </div>

            <div class="items">
            <?php
                $dblnk = mysqli_connect("localhost", "root", "", "teashop");

                $getitems = mysqli_query($dblnk, "SELECT item_name, categories.category_name, item_price, item_desc, item_image, item_id from items, categories where item_category = categories.category_id");
            
                for($x = 0; $x < 5; $x++){
                $item = mysqli_fetch_row($getitems);
                
                    echo '
                        <div class="card" aria-label="'.$item[3].'">
                        <img src="'.$item[4].'" class="item__img">
                        <p class="item__tittle">'.$item[0].'</p>
                        <p>'.$item[1].'</p>
                        <p class="item__price">'.$item[2].'</p>
                        <button onclick="location.href=`payment.php?id='.$item[5].'`">Buy</button>
                    </div>
                    ';
                }
            ?>
            </div>
        </div>
    </div>
    <footer class="footer">

    </footer>
</body>

</html>