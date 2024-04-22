<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- "Montserrat" fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <!-- "Source Serif 4" fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
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
                <button class="menu-btn"><a href="main.php">MAIN</a></button>
                <button class="menu-btn"><a href="music.php">MUSIC</a></button>
                <button class="menu-btn"><a href="concerts.php">CONCERTS</a></button>
                <button class="menu-btn"><a href="merch.php">MERCH</a></button>
                <button class="menu-btn"><a href="form.php">MAILING LIST</a></button>
            </div>
            <div class="menu">
                <!-- Izvēlnes ir savādākas, ja lietotājs ir reģistrējies, vai nav reģistrējies -->
               <?php
                if (isset($_SESSION["user"])) {
                ?>
                      <button class="menu-btn"><a href="cart.php">YOUR CART</a></button>
                      <button class="menu-btn"><a href="index.php">YOUR ACCOUNT</a>
                      <button class="menu-btn"><a href="logout.php">LOGOUT</a>
                <?php }if (!isset($_SESSION["user"])){ ?>
                      <button class="menu-btn"><a href="cart.php">YOUR CART</a></button>
                      <button class="menu-btn"><a href="login.php">LOGIN</a></button>
                      <button class="menu-btn"><a href="register.php">REGISTER</a></button>
                <?php } ?>
            </div>
            <div class="cart">
                <div style="clear: both"></div>
                <h3 class="title2">Your Cart</h3>
                <!-- Groza tabula -->
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
                                    <!-- Izvada datus par grozā ievietotajam precēm (no merch.php lapas) -->
                                    <td><?php echo $value["item_name"]; ?></td>
                                    <td><?php echo $value["item_quantity"]; ?></td>
                                    <td>$ <?php echo $value["product_price"]; ?></td>
                                    <td>
                                        $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                                    <td><a href="merch.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                                class="text-danger">Remove Item</span></a></td>

                                    </tr>
                                    <?php
                                    # Saskaita kopsummu
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
                <!-- Kad lietotājs nospiež pogu "Submit" tad lietotājs tiek novirzīts uz pasūtījuma formu. -->
                <div class="submit">
                     <input type="submit" onclick="document.location = 'order.php'" value="Order Now" name="order">
                </div>
                </div>
            </div>
        </main>
        <footer>
            <p>&copy Agnis Vanags 2023</p>
        </footer>
    </body>
</html>