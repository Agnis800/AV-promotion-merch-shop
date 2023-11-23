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
                <div style="clear: both"></div>
                <h3 class="title2">Shopping Cart Details</h3>
                <div class="table-responsive">
                   <table class="table table-bordered">
                    <tr>
                        <th width="30%">Product Name</th>
                        <th width="10%">Quantity</th>
                        <th width="13%">Price Details</th>
                        <th width="10%">Total Price</th>
                        <th width="17%">Remove Item</th>
                    </tr>

                    <?php
                        if(!empty($_SESSION["cart"])){
                            $total = 0;
                            foreach ($_SESSION["cart"] as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $value["item_name"]; ?></td>
                                    <td><?php echo $value["item_quantity"]; ?></td>
                                    <td>$ <?php echo $value["product_price"]; ?></td>
                                    <td>
                                        $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                                    <td><a href="merch.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                                class="text-danger">Remove Item</span></a></td>

                                    </tr>
                                    <?php
                                    $total = $total + ($value["item_quantity"] * $value["product_price"]);
                            }
                                    ?>
                                    <tr>
                                        <td colspan="3" align="right">Total</td>
                                        <th align="right">$ <?php echo number_format($total, 2); ?></th>
                                        <td></td>
                                    </tr>
                                    <?php

                            }
                        ?>
                    </table>
                </div>
            </div>
        </main>
        <footer>
            <p>&copy Agnis Vanags 2023</p>
        </footer>
    </body>
</html>