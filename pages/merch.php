<?php
  session_start();
  # Izveido masīvu groza pievienošanas sistēmai
  if (isset($_POST["add"])){
      if (isset($_SESSION["cart"])){
          $item_array_id = array_column($_SESSION["cart"], "product_id");
          if (!in_array($_GET["id"],$item_array_id)){
              $count = count($_SESSION["cart"]);
              $item_array = array(
                  'product_id' => $_GET["id"],
                  'item_name' => $_POST["hidden_title"],
                  'product_price' => $_POST["hidden_price"],
                  'item_quantity' => $_POST["quantity"],
              );
              $_SESSION["cart"][$count] = $item_array;
              # Pievieno preci grozam
              echo '<script>window.location="cart.php"</script>';
          }else{
            # Izvada paziņojumu, ka produkts ir jau grozā, un nosūta lietotāju atpakaļ uz veikala lapu
              echo '<script>alert("Product is already added to cart")</script>';
              echo '<script>window.location="merch.php"</script>';
          }
      }else{
          $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_title"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
          );
          $_SESSION["cart"][0] = $item_array;

      }
    }
   # Noņem preci no groza, ja lietotājs nospiež pogu "Delete"
   if (isset($_GET["action"])){
      if ($_GET["action"] == "delete"){
         foreach ($_SESSION["cart"] as $keys => $value){
            if ($value["product_id"] == $_GET["id"]){
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been Removed...!")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
         }
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- 'Montserrat' fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <!-- 'Source Serif' fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="css/merch.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Agnis Vanags</title>
    </head>
    <body>
        <main>
            <!-- Galvenā izvēlne -->
            <div class="menu">
                <button class="menu-btn"><a href="main.php">MAIN</a></button>
                <button class="menu-btn"><a href="music.php">MUSIC</a></button>
                <button class="menu-btn"><a href="concerts.php">CONCERTS</a></button>
                <button class="menu-btn"><a href="merch.php">MERCH</a></button>
                <button class="menu-btn"><a href="form.php">MAILING LIST</a></button>
            </div>
            <div class="menu">
                <!-- Izvēlnes ir savādākas, ja lietotājs ir ielogojies, vai nav ielogojies. -->
               <?php
                if (isset($_SESSION["user"])) {
                ?>
                      <button class="menu-btn"><a href="cart.php">YOUR CART</a></button>
                      <button class="menu-btn"><a href="index.php">YOUR ACCOUNT</a>
                      <button class="menu-btn"><a href="logout.php">LOGOUT</a>
                      <button class="menu-btn"><a href="add.php">ADD PRODUCTS</a></button>
                <?php }if (!isset($_SESSION["user"])){ ?>
                      <button class="menu-btn"><a href="cart.php">YOUR CART</a></button>
                      <button class="menu-btn"><a href="login.php">LOGIN</a></button>
                      <button class="menu-btn"><a href="register.php">REGISTER</a></button>
                <?php } ?>
            </div>
            <div class="name">
                <h1>AV MERCH</h1>
            </div>
            <div class="container" style="width: 25%">
                <!-- PHP kods izvada info par visām precēm no datubāzes. -->
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
                                    <input type="text" name="quantity" class="form-control" value="1">
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

            </div>
        </main>
        <footer>
            <p>&copy Agnis Vanags 2023</p>
        </footer>
    </body>
</html>

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