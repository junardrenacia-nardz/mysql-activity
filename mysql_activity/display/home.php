<?php
require '../sql-connection/connection.php';
require 'editValidation.php';

$firstName = $lastName = $birthday = $contact =
    $zip = $street = $barangay = $city =
    $email = $password = '';

$isValid = true;

// Update User
if (isset($_POST['update_user'])) {
    $personalId = htmlentities(trim($_POST['personalId']));
    $addressId = htmlentities(trim($_POST['addressId']));
    $userId = htmlentities(trim($_POST['userId']));
    $firstName = htmlentities(trim($_POST['firstName']));
    $lastName = htmlentities(trim($_POST['lastName']));
    $birthday = trim($_POST['birthday']);
    $contact = trim($_POST['contact']);
    $zip = trim($_POST['zip']);
    $street = htmlentities(trim($_POST['street']));
    $barangay = htmlentities(trim($_POST['barangay']));
    $city = htmlentities(trim($_POST['city']));
    $email = htmlentities(trim($_POST['email']));

    $firstNameValidate = validateName($firstName);
    $lastNameValidate = validateName($lastName);
    $birthdayValidate = validateBirthday($birthday);
    $contactValidate = validateContact($contact);
    $zipValidate = validateZip($zip);
    $streetValidate = validateStreet($street);
    $barangayValidate = validateBgCity($barangay);
    $cityValidate = validateBgCity($city);
    $emailValidate = validateEmail($email);

    if (
        $emailValidate["stmt"] == false ||
        $firstNameValidate["stmt"] == false ||
        $lastNameValidate["stmt"] == false ||
        $birthdayValidate["stmt"] == false ||
        $contactValidate["stmt"] == false ||
        $zipValidate["stmt"] == false ||
        $streetValidate["stmt"] == false ||
        $barangayValidate["stmt"] == false ||
        $cityValidate["stmt"] == false
    ) {
        $isValid = false;
    } else {
        $isValid = true;
    }


    $editAddress_sql = "UPDATE address SET 
            zip_code = '$zip', 
            street = '$street', 
            barangay = '$barangay', 
            city = '$city' 
        WHERE address_id = $addressId";

    $editPersonal_sql = "UPDATE personal_details SET 
            first_name = '$firstName',
            last_name = '$lastName',
            birthdate = '$birthday',
            contact_number = $contact
        WHERE id = $personalId";

    $editUser_sql = "UPDATE users SET
            email = '$email'
        WHERE user_id = $userId";

    $personalDetails = mysqli_query($conn, $editPersonal_sql);
    $userDetails = mysqli_query($conn, $editUser_sql);
    $addressDetails = mysqli_query($conn, $editAddress_sql);

    if ($personalDetails && $userDetails && $addressDetails && $isValid = true) {
        echo "<script>alert('Row is Updated')</script>";
    } else {
    }
}

// Delete User
if (isset($_POST['delete_user'])) {
    $deleteId = $_POST['delete_user_id'];


    $deleteSql = "DELETE FROM address WHERE address_id = $deleteId";

    if (mysqli_query($conn, $deleteSql)) {
        echo "<script>alert('Row is Deleted')</script>";
    } else {
        echo "<script>alert('Row is not Deleted')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootswatch.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com">
    <title>Home Page</title>


    <style>
        button {
            border: none;
        }

        .details {
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <main>
        <div class="container-fluid p-5 d-flex flex-column align-items-center">
            <div class="header">
                <h2 class="text-center">Home </h2>
            </div>

            <div class="details">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Full Name</th>
                            <th>Birthday</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                            <th>Stage</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT p.id, CONCAT(p.first_name, ' ' , p.last_name) AS full_name, p.birthdate, u.email, p.contact_number, a.city, p.stage, p.created_at, p.updated_at
                        FROM personal_details p
                        INNER JOIN users u
                        ON p.id = u.personal_detail_id
                        LEFT JOIN address a
                        ON p.address_id = a.address_id";
                        $result = mysqli_query($conn, $sql);

                        if ($result):
                            while ($row = mysqli_fetch_assoc($result)): ?>

                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['full_name'] ?></td>
                                    <td><?php echo $row['birthdate'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['contact_number'] ?></td>
                                    <td><?php echo $row['city'] ?></td>
                                    <td><?php echo $row['stage'] ?></td>
                                    <td><?php echo $row['created_at'] ?></td>
                                    <td><?php echo $row['updated_at'] ?></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a class="text-success btn btn-sm editUserBtn" href="#" id=""
                                                data-id='<?php echo $row['id'] ?>' data-bs-toggle='modal'
                                                data-bs-target='#editUserModal'><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a class="text-primary btn btn-sm deleteUserBtn" href="#"
                                                data-id='<?php echo $row['id'] ?>' data-bs-toggle='modal'
                                                data-bs-target='#deleteUserModal'><i class=" fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            endwhile;
                        endif; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </main>



    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="personalId" id="personalId" value="">
                    <input type="hidden" name="userId" id="userId" value="">
                    <input type="hidden" name="addressId" id="addressId" value="">
                    <h2>Basic Information</h2>
                    <div class="row">
                        <div class="col-md-6 mt-2 ">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" name="firstName" id="firstName" class="form-control"
                                value="<?php echo $firstName ?>" required>
                            <span id="errorFirstName"></span>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" name="lastName" id="lastName" class="form-control"
                                value="<?php echo $lastName ?>" required>
                            <span id="errorLastName"></span>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 col-lg-5 col-xl-5 mt-2">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" name="birthday" id="birthday" class="form-control"
                                value="<?php echo $birthday ?>" required>
                            <span id="errorBirthday"></span>
                        </div>
                        <div class="col-md-6 col-lg-7 col-xl-7 mt-2">
                            <label for="contact" class="form-label">Contact Number</label>
                            <input type="number" name="contact" id="contact" class="form-control"
                                value="<?php echo $contact ?>" required>
                            <span id="errorContact"></span>
                        </div>
                    </div>

                    <h2 class="mt-4">Address</h2>
                    <div class="row">
                        <div class="col-md-3 mt-2">
                            <label for="zip" class="form-label">Zip Code</label>
                            <input type="number" name="zip" id="zip" class="form-control" value="<?php echo $zip ?>"
                                required>
                            <span id="errorZip"></span>
                        </div>
                        <div class="col-md-9 mt-2">
                            <label for="street" class="form-label">Street</label>
                            <input type="text" name="street" id="street" class="form-control"
                                value="<?php echo $street ?>" required>
                            <span id="errorStreet"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <label for="barangay" class="form-label">Barangay</label>
                            <input type="text" name="barangay" id="barangay" class="form-control"
                                value="<?php echo $barangay ?>" required>
                            <span id="errorBarangay"></span>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" id="city" class="form-control" value="<?php echo $city ?>"
                                required>
                            <span id="errorCity"></span>
                        </div>
                    </div>



                    <div class="row mt-4">
                        <h2>Account Details</h2>
                        <div class="row">
                            <div class="col-sm-12 mt-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    value="<?php echo $email ?>" required>
                                <span id="errorEmail"></span>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="update_user" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to Delete User <strong id="deleteUserName"></strong>?
                    <input type="hidden" name="delete_user_id" id="deleteUserId">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="delete_user" class="btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php if ($isValid = false) : ?>
            var myModal = new bootstrap.Modal(document.getElementById('editUserModal'));
            myModal.show();
        <?php endif; ?>
    });

    $(document).ready(function() {
        $('.editUserBtn').on('click', function() {
            let userId = $(this).data('id');

            $.ajax({
                url: 'get_value.php',
                type: 'POST',
                data: {
                    id: userId
                },
                success: function(response) {
                    console.log("Raw", response)
                    let data = JSON.parse(response);

                    $('#personalId').val(data.id);
                    $('#addressId').val(data.address_id);
                    $('#userId').val(data.user_id);
                    $('#firstName').val(data.first_name);
                    $('#lastName').val(data.last_name);
                    $('#birthday').val(data.birthdate);
                    $('#contact').val(data.contact_number);
                    $('#zip').val(data.zip_code);
                    $('#street').val(data.street);
                    $('#barangay').val(data.barangay);
                    $('#city').val(data.city);
                    $('#email').val(data.email);


                }
            })
        });

        $('.deleteUserBtn').on("click", function() {
            let userId = $(this).data('id');

            $.ajax({
                url: 'get_value.php',
                type: 'POST',
                data: {
                    id: userId
                },
                success: function(response) {

                    let data = JSON.parse(response);

                    $('#deleteUserId').val(data.address_id);
                    console.log(data)
                }
            })
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>

</html>