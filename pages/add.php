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
            <div class="container">
               <?php
               if (isset($_POST["submit"]) && isset($_FILES['myImage'])) {
                  
                  $title = $_POST["Title"];
                  $description = $_POST["Description"];
                  $price = $_POST["Price"];
                  $image = $_POST["Image"];

                  require_once "database.php";
                  $sql = "SELECT * FROM products";
                  $result = mysqli_query($conn, $sql);
                  $rowCount = mysqli_num_rows($result);

                  $sql = "INSERT INTO products (Title, Description, Price, Image) VALUES (?, ?, ?, ?)";
                  $stmt = mysqli_stmt_init($conn);
                  $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                  if ($prepareStmt) {
                  mysqli_stmt_bind_param($stmt, "ssss", $title, $description, $price, $image);
                  mysqli_stmt_execute($stmt);
                  echo "Product added succesfully.";
               } else {
                die("Something went wrong");
               }
            }
               ?>
               <form action="add.php" method="post" style="border:1px solid #ccc">
               <h1>ADD PRODUCTS</h1>
               <hr>
               <label for="title"><b>Title</b></label>
               <input type="text" class="input" placeholder="Title" name="Title">

               <label for="description"><b>Description</b></label>
               <input type="text" class="input" placeholder="Description" name="Description">

               <label for="price"><b>Price</b></label>
               <input type="text" class="input" placeholder="Price" name="Price">

               <label for="image"><b>Image</b></label>
               <input type="file" id="myFile" name="myImage">

               <div class="clearfix">
                  <input type="submit" value="Add" name="submit">
            </div>
        </main>
        <footer>
            <p>&copy Agnis Vanags 2023</p>
        </footer>
    </body>
</html>