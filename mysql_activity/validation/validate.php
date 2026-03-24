<?php
function validateName($data) {
    if (empty($data)) {
        return [
            "error" => "The Name field cannot be empty",
            "stmt" => false
        ];
    } else if (!preg_match('/^[a-z\- \p{L}]+$/u', $data)) {
        return [
            "error" => "The field only accepts letters",
            "stmt" => false
        ];
    } else {
        return [
            "error" => '',
            "stmt" => true
        ];
    }
}

function validateBirthday($data) {
    if (empty($data)) {
        return [
            "error" => "The Birthday field cannot be empty",
            "stmt" => false
        ];
    } else {
        return [
            "error" => '',
            "stmt" => true
        ];
    }
}

function validateContact($data) {
    if (empty($data)) {
        return [
            "error" => "The Contact field cannot be empty",
            "stmt" => false
        ];
    } else if (!preg_match('/^09/', $data)) {
        return [
            "error" => 'Must start with"09"',
            "stmt" => false
        ];
    } else if (!preg_match('/^09\d{9}$/', $data)) {
        return [
            "error" => "Must have the length of 11 digits",
            "stmt" => false
        ];
    } else {
        return [
            "error" => '',
            "stmt" => true
        ];
    }
}

function validateZip($data) {
    if (empty($data)) {
        return [
            "error" => "The Zip field cannot be empty",
            "stmt" => false
        ];
    } else if (!preg_match('/^\d{4}$/', $data)) {
        return [
            "error" => "Zip must have the length of 4 digits",
            "stmt" => false
        ];
    } else {
        return [
            "error" => '',
            "stmt" => true
        ];
    }
}

function validateStreet($data) {
    if (empty($data)) {
        return [
            "error" => "The Street field cannot be empty",
            "stmt" => false
        ];
    } else {
        return [
            "error" => '',
            "stmt" => true
        ];
    }
}

function validateBgCity($data) {
    if (empty($data)) {
        return [
            "error" => "The field cannot be empty",
            "stmt" => false
        ];
    } else if (!preg_match('/^[a-z\-\' \p{L}]+$/u', $data)) {
        return [
            "error" => "The input is not valid",
            "stmt" => false
        ];
    } else {
        return [
            "error" => '',
            "stmt" => true
        ];
    }
}

function validateEmail($data) {
    if (empty($data)) {
        return [
            "error" => "The Email field cannot be empty",
            "stmt" => false
        ];
    } else if (!preg_match('/^[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*@[a-zA-Z-0-9]+(\.[a-z]+)+$/', $data)) {
        return [
            "error" => "The input is not valid",
            "stmt" => false
        ];
    } else {
        return [
            "error" => '',
            "stmt" => true
        ];
    }
}

function validatePassword($data) {
    if (empty($data)) {
        return [
            "error" => "The Password field cannot be empty",
            "stmt" => false
        ];
    } else if (strlen($data) < 8) {
        return [
            "error" => "Password must have at least 8 character",
            "stmt" => false
        ];
    } else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&-])[A-Za-z\d@$!%*?&-]{8,}$/', $data)) {
        return [
            "error" => "Password must be the combination of Letters, Numbers, and Special Characters",
            "stmt" => false
        ];
    } else {
        return [
            "error" => '',
            "stmt" => true
        ];
    }
}

function validateConfirmPassword($password, $confirmPass) {
    if ($confirmPass !== $password) {
        return [
            "error" => "Password is not matched",
            "stmt" => false
        ];
    } else {
        return [
            "error" => '',
            "stmt" => true
        ];
    }
}
