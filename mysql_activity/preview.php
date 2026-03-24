<?php
require 'sql-connection/connection.php';

require 'get_post.php';


if (isset($_POST['register'])) {
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

    $address_sql = "INSERT INTO address (street, barangay, city, zip_code) VALUES ('$street', '$barangay', '$city', '$zip')";
    if (mysqli_query($conn, $address_sql)) {
        echo "Inserted rows: " . mysqli_affected_rows($conn) . "<br>";

        $address_id_new = mysqli_insert_id($conn);

        $details_sql = "INSERT INTO personal_details(first_name, last_name, birthdate, contact_number, address_id, stage) 
        VALUES ('$firstName', '$lastName', '$birthday', '$contact', $address_id_new, 'Pending')";

        if (mysqli_query($conn, $details_sql)) {
            $details_id_new = mysqli_insert_id($conn);
            $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

            $user_sql = "INSERT INTO users (personal_detail_id, email, password) VALUES ($details_id_new, '$email', '$hashed_pass')";
            mysqli_query($conn, $user_sql);
        } else {
            echo "Personal Details not added";
        }

        echo "<script>alert('Registration Successful')</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "Address Not added";
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
    <title>Preview Details</title>

    <style>
        input[type=text].form-control,
        input[type=date].form-control,
        input[type=password].form-control,
        input[type=number].form-control,
        input[type=tel].form-control {
            background-color: transparent;
            border: 1px solid black;
            font-weight: bolder;
        }

        .form-preview {
            height: 70vh;
        }

        .fields {
            height: 60vh;
            overflow-y: auto;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #b2b2b2;
            border-radius: 20px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #6b6b6b;
        }
    </style>
</head>



<body>
    <main class="container-fluid d-flex flex-column justify-content-center align-items-center">
        <h1>Preview Details</h1>
        <div class="d-flex creation-container">
            <div class="steps">
                <div class="m-5 flex-grow-1">
                    <form action="" method="POST" id="form1">
                        <div class="form-preview d-flex flex-column justify-content-between">
                            <div class="fields">
                                <div class="row">
                                    <h2>Basic Information</h2>
                                    <div class="col-md-6 col-lg-3 col-xl-3 mt-2 ">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" name="firstName" id="firstName" class="form-control"
                                            value="<?php echo $firstName ?>" readonly>
                                        <span id="errorFirstName"></span>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3 mt-2">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" name="lastName" id="lastName" class="form-control"
                                            value="<?php echo $lastName ?>" readonly>
                                        <span id="errorLastName"></span>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3 mt-2">
                                        <label for="birthday" class="form-label">Birthday</label>
                                        <input type="date" name="birthday" id="birthday" class="form-control"
                                            value="<?php echo $birthday ?>" readonly>
                                        <span id="errorBirthday"></span>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3 mt-2">
                                        <label for="contact" class="form-label">Contact Number</label>
                                        <input type="tel" name="contact" id="contact" class="form-control"
                                            value="<?php echo $contact ?>" readonly>
                                        <span id="errorContact"></span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <h2>Address</h2>
                                    <div class="row">
                                        <div class="col-md-3 mt-2">
                                            <label for="zip" class="form-label">Zip Code</label>
                                            <input type="text" inputmode="numeric" name="zip" id="zip"
                                                class="form-control" value="<?php echo $zip ?>" readonly>
                                            <span id="errorZip"></span>
                                        </div>
                                        <div class="col-md-9 mt-2">
                                            <label for="street" class="form-label">Street</label>
                                            <input type="text" name="street" id="street" class="form-control"
                                                value="<?php echo $street ?>" readonly>
                                            <span id="errorStreet"></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <label for="barangay" class="form-label">Barangay</label>
                                            <input type="text" name="barangay" id="barangay" class="form-control"
                                                value="<?php echo $barangay ?>" readonly>
                                            <span id="errorBarangay"></span>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" name="city" id="city" class="form-control"
                                                value="<?php echo $city ?>" readonly>
                                            <span id="errorCity"></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-4">
                                    <h2>Account Details</h2>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mt-2">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" name="email" id="email" class="form-control"
                                                value="<?php echo $email ?>" readonly>
                                            <span id="errorEmail"></span>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mt-2">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                value="<?php echo $password ?>" readonly>
                                            <span id="errorPassword"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="buttons d-flex justify-content-between">
                                <a class="back btn btn-outline-dark" href="step-3.php?
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
                                <button class="btn btn-dark" type="button" data-bs-toggle='modal'
                                    data-bs-target='#confirmRegistration'>Register</button>
                            </div>
                        </div>


                    </form>

                </div>
            </div>

        </div>


    </main>



    <!-- Confirm Registration Modal -->
    <div class="modal fade" id="confirmRegistration" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title">Confirm Registration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <span>Are you sure you want to proceed with your registration? </span> <br>
                    <span>Please review your information before continuing</span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST">
                        <input type="hidden" name="firstName" value="<?php echo $firstName ?>">
                        <input type="hidden" name="lastName" value="<?php echo $lastName ?>">
                        <input type="hidden" name="birthday" value="<?php echo $birthday ?>">
                        <input type="hidden" name="contact" value="<?php echo $contact ?>">
                        <input type="hidden" name="zip" value="<?php echo $zip ?>">
                        <input type="hidden" name="street" value="<?php echo $street ?>">
                        <input type="hidden" name="barangay" value="<?php echo $barangay ?>">
                        <input type="hidden" name="city" value="<?php echo $city ?>">
                        <input type="hidden" name="email" value="<?php echo $email ?>">
                        <input type="hidden" name="password" value="<?php echo $password ?>">
                        <button class="btn btn-success" type="submit" id="register" name="register">Yes</button>
                    </form>

                </div>
            </div>
        </div>
    </div>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>

</html>