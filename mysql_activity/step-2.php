<?php

$firstName = $lastName = $birthday = $contact =
    $zip = $street = $barangay = $city = '';

if (isset($_POST['submit-1'])) {
    $firstName = htmlentities($_POST['firstName']);
    $lastName = htmlentities($_POST['lastName']);
    $birthday = trim($_POST['birthday']);
    $contact = trim($_POST['contact']);
    $zip = trim($_POST['zip']);
    $street = htmlentities($_POST['street']);
    $barangay = htmlentities($_POST['barangay']);
    $city = htmlentities($_POST['city']);
}

if (
    isset($_GET['firstName']) &&
    isset($_GET['lastName']) &&
    isset($_GET['birthday']) &&
    isset($_GET['contact']) &&
    isset($_GET['zip']) &&
    isset($_GET['street']) &&
    isset($_GET['barangay']) &&
    isset($_GET['city'])
) {
    $firstName = htmlentities($_GET['firstName']);
    $lastName = htmlentities($_GET['lastName']);
    $birthday = trim($_GET['birthday']);
    $contact = htmlentities($_GET['contact']);
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
                <div class="step-1 col-sm-12 col-md-12 col-lg-1" style="background-color: rgba(5, 4, 4, 0.5); ">
                    <h1 class="text-center text-white">1</h1>
                </div>
                <div class="step-2 col-sm-10">
                    <h2>STEP 2 - Address</h2>
                    <div class="mt-5 ">
                        <form id="step-2-form" action="step-3.php" method="POST" class="">
                            <input type="hidden" name="firstName" value="<?php echo $firstName ?>">
                            <input type="hidden" name="lastName" value="<?php echo $lastName ?>">
                            <input type="hidden" name="birthday" value="<?php echo $birthday ?>">
                            <input type="hidden" name="contact" value="<?php echo $contact ?>">
                            <div class="form d-flex flex-column justify-content-between">
                                <div class="fields">
                                    <div class="row">
                                        <div class="col-md-3 mt-2">
                                            <label for="zip" class="form-label">Zip Code</label>
                                            <input type="number" name="zip" id="" class="form-control"
                                                value="<?php echo $zip ?>">
                                        </div>
                                        <div class="col-md-9 mt-2">
                                            <label for="street" class="form-label">Street</label>
                                            <input type="text" name="street" id="" class="form-control"
                                                value="<?php echo $street ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <label for="barangay" class="form-label">Barangay</label>
                                            <input type="text" name="barangay" id="" class="form-control"
                                                value="<?php echo $barangay ?>">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" name="city" id="" class="form-control"
                                                value="<?php echo $city ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="buttons d-flex justify-content-between">
                                    <a class="back btn btn-outline-dark" name="back-to-1" href="create.php?
                                        firstName=<?php echo $firstName ?> & 
                                        lastName=<?php echo $lastName ?> &
                                        birthday=<?php echo $birthday ?> &
                                        contact=<?php echo $contact ?> &
                                        zip=<?php echo $zip ?> &
                                        street=<?php echo $street ?> &
                                        barangay=<?php echo $barangay ?> &
                                        city=<?php echo $city ?>">
                                        Back
                                    </a>
                                    <button class=" btn btn-dark" type="submit-2" name="submit-2">Next</button>
                                </div>
                            </div>


                        </form>
                    </div>


                </div>

                <div class="step-3 col-sm-12 col-md-12 col-lg-1" style="background-color: rgba(5, 4, 4, 0.5); ">
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