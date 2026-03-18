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
        <div class="login card col-md-4 p-3 py-5 d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="user-icon bi bi-person-circle"
                viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                <path fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
            </svg>
            <h1 class="text-center">Login</h1>

            <form action="home.php" method="POST">
                <div class="col-md-12 mb-4">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="" class="input form-control mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="" id="" class="input form-control">
                </div>
                <button type="submit" class="log-btn btn btn-dark form-control">Login</button>

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

</html>