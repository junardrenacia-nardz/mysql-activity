<?php

$firstName = $lastName = $birthday = $contact =
    $zip = $street = $barangay = $city = '';

if (
    isset($_GET['firstName']) &&
    isset($_GET['lastName']) &&
    isset($_GET['birthday']) &&
    isset($_GET['contact'])
) {
    $firstName = htmlentities($_GET['firstName']);
    $lastName = htmlentities($_GET['lastName']);
    $birthday = trim($_GET['birthday']);
    $contact = trim($_GET['contact']);
    $zip = trim($_GET['zip']);
    $street = htmlentities($_GET['street']);
    $barangay = htmlentities($_GET['barangay']);
    $city = htmlentities($_GET['city']);
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
                <div class="step-1 col-sm-10">
                    <h2>STEP 1 - Basic Information</h2>
                    <div class="mt-5 ">
                        <form action="step-2.php" method="POST" class="needs-validation">
                            <input type="hidden" name="zip" value="<?php echo $zip ?? '' ?>">
                            <input type="hidden" name="street" value="<?php echo $street ?? '' ?>">
                            <input type="hidden" name="barangay" value="<?php echo $barangay ?? '' ?>">
                            <input type="hidden" name="city" value="<?php echo $city ?? '' ?>">
                            <div class="form d-flex flex-column justify-content-between">
                                <div class="fields">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5 mt-2">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input type="text" name="firstName" id="" class="form-control"
                                                value="<?php echo $firstName ?>">
                                            <div class="valid-feedback"></div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5 mt-2">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input type="text" name="lastName" id="" class="form-control"
                                                value="<?php echo $lastName ?>">
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2 mt-2">
                                            <label for="birthday" class="form-label">Birthday</label>
                                            <input type="date" name="birthday" id="" class="form-control"
                                                value="<?php echo $birthday ?>">
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="contact" class="form-label">Contact Number</label>
                                            <input type="number" name="contact" id="" class="form-control"
                                                value="<?php echo $contact ?>">
                                        </div>
                                    </div>
                                    <div class="row">

                                    </div>
                                </div>

                                <div class="buttons d-flex justify-content-between">
                                    <a href="index.php" class="btn btn-outline-dark">Go back to
                                        Login</a>
                                    <button class="btn btn-dark" type="submit" name="submit-1">Next</button>
                                </div>
                            </div>


                        </form>
                    </div>


                </div>
                <div class="step-2 col-sm-12 col-md-12 col-lg-1" style="background-color: rgba(5, 4, 4, 0.5); ">
                    <h1 class="text-center text-white">2</h1>
                </div>
                <div class="step-3 col-sm-12 col-md-12 col-lg-1" style="background-color: rgba(5, 4, 4, 0.7); ">
                    <h1 class="text-center text-white">3</h1>
                </div>
            </div>

        </div>


    </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>

</html>