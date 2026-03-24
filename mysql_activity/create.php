<?php

require 'validation/validate.php';

$firstName = $lastName = $birthday = $contact =
    $zip = $street = $barangay = $city =
    $email = $password = '';


require 'get_post.php';



if (isset($_POST['submit-1'])) {
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

    $firstNameValidate = validateName($firstName);
    $lastNameValidate = validateName($lastName);
    $birthdayValidate = validateBirthday($birthday);
    $contactValidate = validateContact($contact);

    if (
        $firstNameValidate["stmt"] == true &&
        $lastNameValidate["stmt"] == true &&
        $birthdayValidate["stmt"] == true &&
        $contactValidate["stmt"] == true
    ) {
        echo "<script>window.location.href = 'step-2.php?"
            . "firstName=" . urlencode($firstName) . "&"
            . "lastName=" . urlencode($lastName) . "&"
            . "birthday=" . urlencode($birthday) . "&"
            . "contact=" . urlencode($contact) . "&"
            . "zip=" . urlencode($zip) . "&"
            . "street=" . urlencode($street) . "&"
            . "barangay=" . urlencode($barangay) . "&"
            . "city=" . urlencode($city) . "&"
            . "email=" . urlencode($email) . "&"
            . "password=" . urlencode($password)
            . "';</script>";
    }
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
                        <form action="create.php" method="POST" id="form1" class="">
                            <input type="hidden" name="zip" value="<?php echo $zip ?? '' ?>">
                            <input type="hidden" name="street" value="<?php echo $street ?? '' ?>">
                            <input type="hidden" name="barangay" value="<?php echo $barangay ?? '' ?>">
                            <input type="hidden" name="city" value="<?php echo $city ?? '' ?>">
                            <input type="hidden" name="email" value="<?php echo $email ?? '' ?>">
                            <input type="hidden" name="password" value="<?php echo $password ?? '' ?>">
                            <div class="form d-flex flex-column justify-content-between">
                                <div class="fields">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5 mt-2">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input type="text" name="firstName" id="firstName" class="form-control 
                                                <?php
                                                if (isset($_POST['submit-1'])) {
                                                    echo $firstNameValidate['stmt'] ? "is-valid" : "is-invalid";
                                                }
                                                ?>" value="<?php echo $firstName ?>" required>
                                            <span id="errorFirstName"
                                                class="text-danger fw-bold"><?php echo $firstNameValidate['error'] ?? ""; ?></span>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5 mt-2">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input type="text" name="lastName" id="lastName" class="form-control 
                                                <?php
                                                if (isset($_POST['submit-1'])) {
                                                    echo $lastNameValidate['stmt'] ? "is-valid" : "is-invalid";
                                                }
                                                ?>" value="<?php echo $lastName ?>" required>
                                            <span id="errorLastName"
                                                class="text-danger fw-bold"><?php echo $lastNameValidate['error'] ?? ""; ?></span>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2 mt-2">
                                            <label for="birthday" class="form-label">Birthday</label>
                                            <input type="date" name="birthday" id="birthday" class="form-control 
                                            <?php
                                            if (isset($_POST['submit-1'])) {
                                                echo $birthdayValidate['stmt'] ? "is-valid" : "is-invalid";
                                            }
                                            ?>" value="<?php echo $birthday ?>" required>
                                            <span id="errorBirthday"
                                                class="text-danger fw-bold"><?php echo $birthdayValidate['error'] ?? ""; ?></span>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="contact" class="form-label">Contact Number</label>
                                            <input type="tel" name="contact" id="contact" class="form-control 
                                                <?php
                                                if (isset($_POST['submit-1'])) {
                                                    echo $contactValidate['stmt'] ? "is-valid" : "is-invalid";
                                                }
                                                ?>" value="<?php echo $contact ?>" required>
                                            <span id="errorContact"
                                                class="text-danger fw-bold"><?php echo $contactValidate['error'] ?? ""; ?></span>
                                        </div>
                                    </div>
                                    <div class="row">

                                    </div>
                                </div>

                                <div class="buttons d-flex justify-content-between">
                                    <a href="index.php" class="btn btn-outline-dark">Go back to
                                        Login</a>
                                    <button class="btn btn-dark" type="submit" id="submit-1"
                                        name="submit-1">Next</button>
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
<script src="js/validation.js"></script>
<script>
    step1.addEventListener("input", (e) => {
        if (validation(form1Arr)) {
            submit1.disabled = false;
        } else {
            submit1.disabled = true;
        }
    });
</script>



</html>