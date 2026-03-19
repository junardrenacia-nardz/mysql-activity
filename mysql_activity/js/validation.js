// Form and Submit Buttons
let step1 = document.getElementById("form1");
let step2 = document.getElementById("step-2-form");
let step3 = document.getElementById("step-3-form");
let submit1 = document.getElementById("submit-1");
let submit2 = document.getElementById("submit-2");
let previewBtn = document.getElementById("preview");

// Fields
let first = document.getElementById("firstName");
let last = document.getElementById("lastName");
let birthday = document.getElementById("birthday");
let contact = document.getElementById("contact");
let zip = document.getElementById("zip");
let street = document.getElementById("street");
let barangay = document.getElementById("barangay");
let city = document.getElementById("city");
let email = document.getElementById("email");
let password = document.getElementById("password");
let confirmPassword = document.getElementById("confirmPassword");

// Error Messages
let errorFirstName = document.getElementById("errorFirstName");
let errorLastName = document.getElementById("errorLastName");
let errorBirthday = document.getElementById("errorBirthday");
let errorContact = document.getElementById("errorContact");
let errorZip = document.getElementById("errorZip");
let errorStreet = document.getElementById("errorStreet");
let errorBarangay = document.getElementById("errorBarangay");
let errorCity = document.getElementById("errorCity");
let errorEmail = document.getElementById("errorEmail");
let errorPassword = document.getElementById("errorPassword");
let errorConfirmPassword = document.getElementById("errorConfirmPassword");

// Regex Pattern
const regexName = /^[a-z\- \p{L}]+$/u;
const regexContact = /^09\d{9}$/;
const regexZip = /^\d{4}$/;
const regexStreet = /^[a-z\-'@,.\\/ \p{L}\d]+$/u;
const regexBarangay = /^[a-z\-' \p{L}]+$/u;
const regexEmail = /^[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*@[a-zA-Z-0-9]+(\.[a-z]+)+$/;
const regexPassword =
  /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&-])[A-Za-z\d@$!%*?&-]{8,}$/;

// STEP 1
function validateFirst() {
  let firstVal = first.value;
  if (firstVal === "") {
    errorFirstName.textContent = "Input Something";
    errorFirstName.style.color = "red";
    return false;
  } else if (firstVal.length < 5) {
    errorFirstName.textContent = "First name must be at least 5 characters";
    errorFirstName.style.color = "red";
    return false;
  } else if (!regexName.test(firstVal)) {
    errorFirstName.textContent = "Letters are only accepted";
    errorFirstName.style.color = "red";
    return false;
  } else {
    errorFirstName.textContent = "";
    return true;
  }
}

function validateLast() {
  let lastVal = last.value;
  if (lastVal === "") {
    errorLastName.textContent = "Input Something";
    errorLastName.style.color = "red";
    return false;
  } else if (!regexName.test(lastVal)) {
    errorLastName.textContent = "Letters are only accepted";
    errorLastName.style.color = "red";
    return false;
  } else {
    errorLastName.textContent = "";
    return true;
  }
}

function validateBirthday() {
  let birthdayVal = birthday.value;
  if (birthdayVal == "") {
    errorBirthday.textContent = "Input Something";
    errorBirthday.style.color = "red";
    return false;
  } else {
    errorBirthday.textContent = "";
    return true;
  }
}

function validateContact() {
  let contactVal = contact.value;
  if (contactVal == "") {
    errorContact.textContent = "Input Something";
    errorContact.style.color = "red";
    return false;
  } else if (!/^09/.test(contactVal)) {
    errorContact.textContent = 'Must start to "09"';
    errorContact.style.color = "red";
    return false;
  } else if (!regexContact.test(contactVal)) {
    errorContact.textContent = "Must have the length of 11 digits";
    errorContact.style.color = "red";
    return false;
  } else {
    errorContact.textContent = "";
    return true;
  }
}

// STEP 2
function validateZip() {
  let zipVal = zip.value;
  if (zipVal === "") {
    errorZip.textContent = "Input Something";
    errorZip.style.color = "red";
    return false;
  } else if (!regexZip.test(zipVal)) {
    errorZip.textContent = "Zip must have the length of 4 digits";
    errorZip.style.color = "red";
    return false;
  } else {
    errorZip.textContent = "";
    return true;
  }
}

function validateStreet() {
  let streetVal = street.value;
  if (streetVal === "") {
    errorStreet.textContent = "Input Something";
    errorStreet.style.color = "red";
    return false;
  } else if (!regexStreet.test(streetVal)) {
    errorStreet.textContent = "The input is not valid";
    errorStreet.style.color = "red";
    return false;
  } else {
    errorStreet.textContent = "";
    return true;
  }
}

function validateBarangay() {
  let barangayVal = barangay.value;
  if (barangayVal === "") {
    errorBarangay.textContent = "Input Something";
    errorBarangay.style.color = "red";
    return false;
  } else if (!regexBarangay.test(barangayVal)) {
    errorBarangay.textContent = "The input is not valid";
    errorBarangay.style.color = "red";
    return false;
  } else {
    errorBarangay.textContent = "";
    return true;
  }
}

function validateCity() {
  let cityVal = city.value;
  if (cityVal === "") {
    errorCity.textContent = "Input Something";
    errorCity.style.color = "red";
    return false;
  } else if (!regexBarangay.test(cityVal)) {
    errorCity.textContent = "The input is not valid";
    errorCity.style.color = "red";
    return false;
  } else {
    errorCity.textContent = "";
    return true;
  }
}

// STEP 3
function validateEmail() {
  let emailVal = email.value;
  if (emailVal === "") {
    errorEmail.textContent = "Input Something";
    errorEmail.style.color = "red";
    return false;
  } else if (!regexEmail.test(emailVal)) {
    errorEmail.textContent = "The input is not valid";
    errorEmail.style.color = "red";
    return false;
  } else {
    errorEmail.textContent = "";
    return true;
  }
}

function validatePassword() {
  let passwordVal = password.value;
  if (passwordVal === "") {
    errorPassword.textContent = "Input Something";
    errorPassword.style.color = "red";
    return false;
  } else if (passwordVal.length < 8) {
    errorPassword.textContent = "Password must have at least 8 character";
    errorPassword.style.color = "red";
    return false;
  } else if (!regexPassword.test(passwordVal)) {
    errorPassword.textContent =
      "Password must be the combination of Letters, Numbers, and Special Characters";
    errorPassword.style.color = "red";
    return false;
  } else {
    errorPassword.textContent = "";
    return true;
  }
}

function validateConfirmPassword() {
  let confirmPasswordVal = confirmPassword.value;
  let passwordVal = password.value;
  if (confirmPasswordVal === "") {
    errorConfirmPassword.textContent = "";
    return false;
  } else if (confirmPasswordVal !== passwordVal) {
    errorConfirmPassword.textContent = "Password is not matched";
    errorConfirmPassword.style.color = "red";
    return false;
  } else {
    errorConfirmPassword.textContent = "";
    return true;
  }
}

// Button/s Disabling
function validate1() {
  validateFirst();
  validateLast();
  validateBirthday();
  validateContact();
  if (
    validateFirst() == true &&
    validateLast() == true &&
    validateBirthday() == true &&
    validateContact() == true
  ) {
    submit1.disabled = false;
  } else {
    submit1.disabled = true;
  }
}

function validate2() {
  validateZip();
  validateBarangay();
  validateStreet();
  validateCity();
  if (
    validateZip() == true &&
    validateBarangay() == true &&
    validateStreet() == true &&
    validateCity() == true
  ) {
    submit2.disabled = false;
  } else {
    submit2.disabled = true;
  }
}

function validate3() {
  validateEmail();
  validatePassword();
  validateConfirmPassword();
  if (
    validateEmail() == true &&
    validatePassword() == true &&
    validateConfirmPassword() == true
  ) {
    previewBtn.disabled = false;
  } else {
    previewBtn.disabled = true;
  }
}
