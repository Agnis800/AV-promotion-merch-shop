<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="css/register.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Sign Up</title>
    </head>
    <body>
        <main>
            <div class="container">
                <?php
                    if (isset($_POST["submit"])) {
                        $username = $_POST["username"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $passwordConfirm = $_POST["conf-password"];

                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                        $errors = array();

                        if (empty($username) OR empty($email) OR empty($password) OR empty($passwordConfirm)) {
                           array_push($errors,"All fields are required");
                          }
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            array_push($errors, "Email is not valid");
                        }
                        if (strlen($password)<8) {
                            array_push($errors,"Password must be at least 8 characters long");
                        }
                        if ($password!==$passwordConfirm) {
                            array_push($errors,"Password does not match");
                        }
                        require_once "database.php";
                        $sql = "SELECT * FROM users WHERE email = '$email'";
                        $result = mysqli_query($conn, $sql);
                        $rowCount = mysqli_num_rows($result);
                        if ($rowCount>0) {
                            array_push($errors,"Email already exists!");
                        }
                        if (count($errors)>0) {
                            foreach ($errors as $error) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        }else{

                           $sql = "INSERT INTO users (username, email, password) VALUES ( ?, ?, ? )";
                           $stmt = mysqli_stmt_init($conn);
                           $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                           if ($prepareStmt) {
                            mysqli_stmt_bind_param($stmt,"sss",$username, $email, $passwordHash);
                            mysqli_stmt_execute($stmt);
                            echo "<div class='alert alert-success'>You are registered successfully.</div>";
                           }else{
                                die("Something went wrong");
                           }
                        }
                    }
                ?>
                <form action="register.php" method="post" style="border:1px solid #ccc">
                <h1>Sign Up</h1>
                <hr>

                <label for="username"><b>Username</b></label>
                <input type="text" class="input" placeholder="Username" name="username">

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Email" name="email">

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Password" name="password">

                <label for="password"><b>Confirm password</b></label>
                <input type="password" placeholder="Confirm password" name="conf-password">

                <div class="clearfix">
                    <!-- <button type="submit" class="signupbtn">Sign Up</button> -->
                    <input type="submit" value="Register" name="submit">
                </div>

            </div>
        </form>
    </main>
 </body>
</html>