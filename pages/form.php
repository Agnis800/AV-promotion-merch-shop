<!DOCTYPE html>
<html lang="en">
    <head>
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
                <button class="menu-btn"><a href="main.php">Main</a></button>
                <button class="menu-btn"><a href="music.php">Music</a></button>
                <button class="menu-btn"><a href="concerts.php">Concerts</a></button>
                <button class="menu-btn"><a href="merch.php">Merch</a></button>
                <button class="menu-btn"><a href="form.php">Mailing list</a></button>
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