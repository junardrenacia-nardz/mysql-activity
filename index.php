<?php
// 1️⃣ Connect to database
$conn = mysqli_connect("localhost", "root", "", "test_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ----------------------------
// 2️⃣ CREATE (INSERT)
// ----------------------------
$name_to_insert = "O'Reilly";

$stmt = mysqli_prepare($conn, "INSERT INTO users (name) VALUES (?)");
mysqli_stmt_bind_param($stmt, "s", $name_to_insert); // "s" = string
mysqli_stmt_execute($stmt);

echo "Inserted rows: " . mysqli_stmt_affected_rows($stmt) . "<br>";
mysqli_stmt_close($stmt);

// ----------------------------
// 3️⃣ READ (SELECT)
// ----------------------------
$id_to_select = 1;

$stmt = mysqli_prepare($conn, "SELECT id, name FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id_to_select); // "i" = integer
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt); // Get result set
while ($row = mysqli_fetch_assoc($result)) {
    echo "ID: " . $row['id'] . ", Name: " . $row['name'] . "<br>";
}

mysqli_free_result($result);
mysqli_stmt_close($stmt);

// ----------------------------
// 4️⃣ UPDATE
// ----------------------------
$id_to_update = 1;
$new_name = "John Doe";

$stmt = mysqli_prepare($conn, "UPDATE users SET name = ? WHERE id = ?");
mysqli_stmt_bind_param($stmt, "si", $new_name, $id_to_update);
mysqli_stmt_execute($stmt);

echo "Updated rows: " . mysqli_stmt_affected_rows($stmt) . "<br>";
mysqli_stmt_close($stmt);

// ----------------------------
// 5️⃣ DELETE
// ----------------------------
$id_to_delete = 2;

$stmt = mysqli_prepare($conn, "DELETE FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id_to_delete);
mysqli_stmt_execute($stmt);

echo "Deleted rows: " . mysqli_stmt_affected_rows($stmt) . "<br>";
mysqli_stmt_close($stmt);

// ----------------------------
// 6️⃣ Close connection
// ----------------------------
mysqli_close($conn);
?>


<?php
// 1️⃣ Connect to database
$conn = mysqli_connect("localhost", "root", "", "test_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ----------------------------
// 2️⃣ CREATE (INSERT)
// ----------------------------
$name_input = "O'Reilly";

// Escape the input
$safe_name = mysqli_real_escape_string($conn, $name_input);

$sql = "INSERT INTO users (name) VALUES ('$safe_name')";
if (mysqli_query($conn, $sql)) {
    echo "Inserted rows: " . mysqli_affected_rows($conn) . "<br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}

// ----------------------------
// 3️⃣ READ (SELECT)
// ----------------------------
$sql = "SELECT id, name FROM users";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['id'] . ", Name: " . $row['name'] . "<br>";
    }
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}

// ----------------------------
// 4️⃣ UPDATE
// ----------------------------
$id_to_update = 1;
$new_name = "John Doe";

// Escape user input
$safe_name = mysqli_real_escape_string($conn, $new_name);

$sql = "UPDATE users SET name='$safe_name' WHERE id=$id_to_update";
if (mysqli_query($conn, $sql)) {
    echo "Updated rows: " . mysqli_affected_rows($conn) . "<br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}

// ----------------------------
// 5️⃣ DELETE
// ----------------------------
$id_to_delete = 2;

$sql = "DELETE FROM users WHERE id=$id_to_delete";
if (mysqli_query($conn, $sql)) {
    echo "Deleted rows: " . mysqli_affected_rows($conn) . "<br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}

// ----------------------------
// 6️⃣ Close connection
// ----------------------------
mysqli_close($conn);
?>