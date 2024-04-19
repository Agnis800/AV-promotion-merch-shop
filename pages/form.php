<!DOCTYPE html>
<html lang="en">
    <head>
        <!--"Montserrat" fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <!-- "Source Serif 4" fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Indie+Flower&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="css/form.css">
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
            <div class="mailing-form">
                 <h1>SIGN UP FOR MAILING LIST:</h1>
                 <form action="/action_page.php">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name"><br>

                    <label for="email">E-mail:</label><br>
                    <input type="text" id="email" name="email"><br><br>
                    
                    <input type="submit" value="Submit">
                  </form> 
            </div>
        </main>
        <footer>
            <p>&copy Agnis Vanags 2023</p>
        </footer>
    </body>
</html>