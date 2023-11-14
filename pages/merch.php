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
               <?php
                if (isset($_SESSION["user"])) {
                ?>
                      <button class="menu-btn"><a href="cart.php">Your cart</a></button>
                      <button class="menu-btn"><a href="index.php">Your account</a>
                      <button class="menu-btn"><a href="logout.php">Logout</a>
                      <button class="menu-btn"><a href="add.php">Add products</a></button>
                <?php }if (!isset($_SESSION["user"])){ ?>
                      <button class="menu-btn"><a href="cart.php">Your cart</a></button>
                      <button class="menu-btn"><a href="login.php">Login</a></button>
                      <button class="menu-btn"><a href="register.php">Register</a></button>
                <?php } ?>
            </div>
            <div class="name">
                <h1>AV MERCH</h1>
            </div>
            <div class="container" style="width: 65%">
                <?php
                    require_once "database.php";
                    $query = "SELECT * FROM products2 ORDER BY ID ASC ";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                        <div class="col-md-3">

                            <form method="post" action="merch.php?action=add&id=<?php echo $row["ID"]; ?>">

                                <div class="product">
                                    <img src="<?php echo $row["Image"]; ?>" class="img-responsive" style="width:250px">
                                    <h5 class="text-info"><?php echo $row["Title"]; ?></h5>
                                    <h5 class="text-danger"><?php echo $row["Price"]; ?></h5>
                                    <input type="text" name="Quantity" class="form-control" value="1">
                                    <input type="hidden" name="hidden_title" value="<?php echo $row["Title"]; ?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
                                    <input type="submit" name="add" style="margin-top: 5px;" class="btn-btn success"
                                                value="Add To Cart">
                                </div>
                           </form>
                        </div>
                    <?php
                        }                            
                    }
                 ?>
                        

                        
            <!--
            <div class="catalog">
                <div class="item1">
                  <img src="Darklight_artwork.jpg" alt="'Darklight' artwork" width="150" height="150">
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
                  <img src="Colors_EP.jpg" alt="'Colors EP' artwork" width="150" height="150">
                  <h2 class="title">Colors EP</h2>
                  <p class="price">EUR 6,99</p>
                  <button class="c-btn">Add to cart</button>
                </div>
            </div>
                -->
        </main>
        <footer>
            <p>&copy Agnis Vanags 2023</p>
        </footer>
    </body>
</html>