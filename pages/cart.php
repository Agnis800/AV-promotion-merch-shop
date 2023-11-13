<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="css/cart.css">
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
               <?php
                if (isset($_SESSION["user"])) {
                ?>
                      <button class="menu-btn"><a href="cart.php">Your cart</a></button>
                      <button class="menu-btn"><a href="index.php">Your account</a>
                      <button class="menu-btn"><a href="logout.php">Logout</a>
                <?php }if (!isset($_SESSION["user"])){ ?>
                      <button class="menu-btn"><a href="cart.php">Your cart</a></button>
                      <button class="menu-btn"><a href="login.php">Login</a></button>
                      <button class="menu-btn"><a href="register.php">Register</a></button>
                <?php } ?>
            </div>
            <div class="cart">
                 <h1>Your cart:</h1>
            </div>
        </main>
        <footer>
            <p>&copy Agnis Vanags 2023</p>
        </footer>
    </body>
</html>