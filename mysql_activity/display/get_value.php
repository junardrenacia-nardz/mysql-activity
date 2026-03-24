<?php
require '../sql-connection/connection.php';


if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $editSql = "SELECT p.id, p.first_name, p.last_name, p.birthdate, p.contact_number, p.stage, p.created_at, p.updated_at, p.address_id,
        a.zip_code, a.street, a.barangay, a.city, u.email, u.password, u.user_id
            FROM personal_details p
            INNER JOIN users u
            ON p.id = u.personal_detail_id
            LEFT JOIN address a
            ON p.address_id = a.address_id
            WHERE p.id = $id";


    $result = mysqli_query($conn, $editSql);
    if (!$result) {
        die("SQL ERROR: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}
