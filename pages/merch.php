<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="css/merch.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Agnis Vanags</title>
    </head>
    <body>
        <main>
            <div class="menu">
                <button class="menu-btn"><a href="main.html">Main</a></button>
                <button class="menu-btn"><a href="music.html">Music</a></button>
                <button class="menu-btn"><a href="concerts.html">Concerts</a></button>
                <button class="menu-btn"><a href="merch.php">Merch</a></button>
                <button class="menu-btn"><a href="form.html">Mailing list</a></button>
            </div>
            <div class="menu">
               <button class="menu-btn"><a href="cart.html">Your cart</a></button>
               <?php
                if (isset($_SESSION["user"])) {
                ?>
                      <button class="menu-btn"><a href="index.php">Your account</a>
                      <button class="menu-btn"><a href="logout.php">Logout</a>
                <?php }if (!isset($_SESSION["user"])){ ?>
                      <button class="menu-btn"><a href="login.php">Login</a></button>
                      <button class="menu-btn"><a href="register.php">Register</a></button>
                <?php } ?>
            </div>
            <div class="name">
                <h1>AV MERCH</h1>
            </div>
            <div class="catalog">
                <div class="item1">
                  <img src="20230930_153537.jpg" alt="'Darklight' artwork" width="150" height="150">
                  <h2 class="title">DARKLIGHT Pre-order</h2>
                  <p class="price">EUR 14,99</p>
                  <button class="c-btn">Add to cart</button>
                </div>
                <div class="item2">
                  <img src="https://www.hudsonwellesley.com/cdn/shop/products/Black_Tee_Front_1024x1024@2x.png?v=1582411399" alt="'Darklight' shirt" width="150" height="150">
                  <h2 class="title">DARKLIGHT Shirt</h2>
                  <p class="price">EUR 29,99</p>
                  <button class="c-btn">Add to cart</button>
                </div>
                <div class="item3">
                  <img src="IMG_20230902_195516_260.jpg" alt="'Colors EP' artwork" width="150" height="150">
                  <h2 class="title">Colors EP</h2>
                  <p class="price">EUR 6,99</p>
                  <button class="c-btn">Add to cart</button>
                </div>
            </div>
        </main>
        <footer>
            <p>&copy Agnis Vanags 2023</p>
        </footer>
    </body>
</html>