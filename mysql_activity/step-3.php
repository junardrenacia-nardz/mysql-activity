<?php
require 'sql-connection/connection.php';

$firstName = $lastName = $birthday = $contact =
    $zip = $street = $barangay = $city =
    $email = $password = '';

if (isset($_POST['submit-2'])) {
    $firstName = htmlentities(trim($_POST['firstName']));
    $lastName = htmlentities(trim($_POST['lastName']));
    $birthday = trim($_POST['birthday']);
    $contact = trim($_POST['contact']);
    $zip = trim($_POST['zip']);
    $street = htmlentities(trim($_POST['street']));
    $barangay = htmlentities(trim($_POST['barangay']));
    $city = htmlentities(trim($_POST['city']));
    $email = htmlentities(trim($_POST['email']));
    $password = htmlentities(trim($_POST['password']));
}



if (
    isset($_GET['firstName']) &&
    isset($_GET['lastName']) &&
    isset($_GET['birthday']) &&
    isset($_GET['contact']) &&
    isset($_GET['zip']) &&
    isset($_GET['street']) &&
    isset($_GET['barangay']) &&
    isset($_GET['city']) &&
    isset($_GET['email']) &&
    isset($_GET['password'])
) {
    $firstName = htmlentities(trim($_GET['firstName']));
    $lastName = htmlentities(trim($_GET['lastName']));
    $birthday = trim($_GET['birthday']);
    $contact = trim($_GET['contact']);
    $zip = trim($_GET['zip']);
    $street = htmlentities(trim($_GET['street']));
    $barangay = htmlentities(trim($_GET['barangay']));
    $city = htmlentities(trim($_GET['city']));
    $email = htmlentities(trim($_GET['email']));
    $password = htmlentities(trim($_GET['password']));
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootswatch.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net">
    <link rel="stylesheet" href="css/style.css">
    <title>Create Account</title>
</head>

<body>
    <main class="container-fluid d-flex flex-column justify-content-center align-items-center">
        <h1>ACCOUNT CREATION</h1>
        <div class="d-flex creation-container">
            <div class="steps row">
                <div class="step-1 col-sm-12 col-md-12 col-lg-1" style="background-color:rgba(5, 4, 4, 0.7); ">
                    <h1 class="text-center text-white">1</h1>
                </div>
                <div class="step-2 col-sm-12 col-md-12 col-lg-1" style="background-color: rgba(5, 4, 4, 0.5); ">
                    <h1 class="text-center text-white">2</h1>
                </div>
                <div class="step-3 col-sm-10">
                    <h2>STEP 3 - Seting an Email and Password</h2>
                    <div class="mt-5 ">
                        <form action="preview.php" id="step-3-form" method="POST" class="flex-grow-1">
                            <input type="hidden" name="firstName" value="<?php echo $firstName ?>">
                            <input type="hidden" name="lastName" value="<?php echo $lastName ?>">
                            <input type="hidden" name="birthday" value="<?php echo $birthday ?>">
                            <input type="hidden" name="contact" value="<?php echo $contact ?>">
                            <input type="hidden" name="zip" value="<?php echo $zip ?>">
                            <input type="hidden" name="street" value="<?php echo $street ?>">
                            <input type="hidden" name="barangay" value="<?php echo $barangay ?>">
                            <input type="hidden" name="city" value="<?php echo $city ?>">
                            <div class="form d-flex flex-column justify-content-between">
                                <div class="fields">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 mt-2">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" name="email" id="email" class="form-control"
                                                value="<?php echo $email ?>">
                                            <span id="errorEmail"></span>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 mt-2">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                value="<?php echo $password ?>">
                                            <span id="errorPassword"></span>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 mt-2">
                                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                                            <input type="password" name="confirmPassword" id="confirmPassword"
                                                class="form-control" value="<?php echo $password ?>">
                                            <span id="errorConfirmPassword"></span>
                                        </div>
                                    </div>


                                </div>

                                <div class="buttons d-flex justify-content-between">
                                    <a class="back btn btn-outline-dark" href="step-2.php?
                                        firstName=<?php echo $firstName ?> & 
                                        lastName=<?php echo $lastName ?> &
                                        birthday=<?php echo $birthday ?> &
                                        contact=<?php echo $contact ?> &
                                        zip=<?php echo $zip ?> &
                                        street=<?php echo $street ?> &
                                        barangay=<?php echo $barangay ?> &
                                        city=<?php echo $city ?> &
                                        email=<?php echo $email ?> &
                                        password=<?php echo $password ?>
                                        ">
                                        Back</a>
                                    <button class="btn btn-dark" type="submit" name="preview"
                                        id="preview">Preview</button>
                                </div>
                            </div>


                        </form>
                    </div>


                </div>


            </div>

        </div>


    </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>
<script src="js/validation.js"></script>
<script>
    step3.addEventListener("input", validate3);
    window.addEventListener("load", validate3);
</script>

</html>