<?php

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

function postValues($data) {
    if (isset($data)) {
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
}
