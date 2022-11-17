<?php

require "config.php";
require "user.php";

session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $uname = $_POST['username'];
    $upass = $_POST['password'];
    $user_id = 1;

    $korisnik = new User($user_id, $uname, $upass);
    
    $odg = User::logInUser($korisnik, $conn);

    if ($odg->num_rows == 1) {
        echo `
        <script>
        console.log("Uspesno ste se ulogovali");
        </script>
        `;
        $_SESSION['user_id'] = $korisnik->id;
        header('Location: home.php');
        exit();
    } else {
        echo `
        <script>
        console.log("Niste se ulogovali");
        </script>
        `;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>FON: Zakazivanje kolokvijuma</title>
</head>
<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <div class="container">
                    <h2>Korisnik</label>
                    <input type="text" name="username" class="form-control" required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <button type="submit" class="btn btn-primary" name="submit">Prijavi se</button>
                    <button type="signup" class="btn btn-primary" name="signup">Napravi nalog</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>