<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- "Source Serif 4" fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="css/order.css">
        <title>Order</title>
    </head>
    <body>
        <main>
           <h1>ORDER</h1>
           <div class="form">
               <form action="success.php" method="post">
                  <h3>Your shipping details</h3>
                  <label for="address"><b>Address<b></label>
                  <input type="text" placeholder="Address" name="Address">

                  <label for="city"><b>City<b></label>
                  <input type="text" placeholder="City" name="City">

                  <label for="country"><b>Country<b></label>
                  <input type="text" placeholder="Country" name="Country">
                  <hr>
                  <h3>Your contact information</h3>
                  <label for="first_name"><b>First Name</b></label>
                  <input type="text" placeholder="First Name" name="first_name">

                  <label for="last_name"><b>Last Name</b></label>
                  <input type="text" placeholder="Last Name" name="last_name">

                  <label for="e_mail"><b>E-mail</b></label>
                  <input type="text" placeholder="E-mail" name="e_mail">

                  <hr>

                  <h3>Your credit card details</h3>

                  <label for="ccnum">Credit card number</label>
                  <input type="text" placeholder="Credit card number" name="credit_card_number">

                  <label for="exp_date">Expiration date</label>
                  <input type="text" placeholder="Expiration date" name="expiration_date">

                  <label for="cvv">CVV</label>
                  <input type="text" placeholder="CVV" name="cvv">

                  <input type="submit" value="Continue" name="submit">

               </form>
           </div>
        </main>
        <footer>
            <p>&copy Agnis Vanags 2023</p>
        </footer>
    </body>
</html>