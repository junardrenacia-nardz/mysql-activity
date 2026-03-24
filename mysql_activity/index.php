<?php

session_start();

require 'sql-connection/connection.php';

$error = ['errorEmail' => '', 'errorPassword' => ''];

$email = $password = "";

if (isset($_POST['loginBtn'])) {
    $email = htmlentities(trim($_POST['email']));
    $password = htmlentities(trim($_POST['password']));

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $error = ['errorEmail' => ''];
        if (password_verify($password, $row['password'])) {

            $_SESSION['user_id'] = htmlentities(trim($row['user_id']));

            header("Location: display/home.php");
        } else {
            $error['errorPassword'] = 'Incorrect password';
        }
    } else {
        $error['errorEmail'] = "Email not found";
    }
} else {
}

mysqli_close($conn);




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootswatch.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body>
    <main class=" main-login container-xl d-flex justify-content-center align-items-center">
        <div class="login card col-md-4 py-5 d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="user-icon bi bi-person-circle"
                viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                <path fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
            </svg>
            <h1 class="text-center">Login</h1>

            <form action="index.php" method="POST">
                <div class="col-md-12 mb-4">
                    <div class="col mb-4">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="" class="input form-control mb-1"
                            value="<?php echo $email; ?>">
                        <span id="errorEmail" class="text-danger fw-bold">
                            <?php
                            if (isset($_POST['loginBtn'])) {
                                echo $error['errorEmail'];
                            }
                            ?>
                        </span>
                    </div>
                    <div class="col">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="input form-control mb-1"
                            value="<?php echo $password; ?>">
                        <button class="btn btn-sm" id="toggle" type="button" onclick="togglePassword()">Show
                            Password</button>
                        <span id="errorPassword"
                            class="text-danger fw-bold"><?php echo $error['errorPassword'] ?? ""; ?></span>
                    </div>

                </div>
                <button type="submit" name="loginBtn" class="log-btn btn btn-dark form-control">Login</button>

            </form>

            <div class="mt-3">
                <p>No Account? <a class="create-acc" href="create.php">Create One</a></p>
            </div>
        </div>
    </main>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>

<script>
const password = document.getElementById('password');
let toggle = document.getElementById('toggle')

function togglePassword() {
    if (password.type == "password") {
        password.type = "text";
        toggle.textContent = "Hide Password";
    } else {
        password.type = "password";
        toggle.textContent = "Show Password";
    }
}
</script>

</html>