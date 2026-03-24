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

form1Arr = [
  { field: first, error: errorFirstName },
  { field: last, error: errorLastName },
  { field: birthday, error: errorBirthday },
  { field: contact, error: errorContact },
];

form2Arr = [
  { field: zip, error: errorZip },
  { field: street, error: errorStreet },
  { field: barangay, error: errorBarangay },
  { field: city, error: errorCity },
];

form3Arr = [
  { field: email, error: errorEmail },
  { field: password, error: errorPassword },
  { field: confirmPassword, error: errorConfirmPassword },
];

function validation(fields) {
  let isValid = true;
  fields.forEach(({ field, error }) => {
    if (field.value.trim() === "") {
      error.textContent = "Input Something";
      isValid = false;
    } else {
      error.textContent = "";
      isValid = true;
    }
  });

  return isValid;
}

// Password
const regexPassword = /[^A-Za-z\d@$!%*?&-]/;

let passwordRequirement = document.getElementById("requirement");
let passwordLength = document.getElementById("length");
let passwordLowCase = document.getElementById("lowCase");
let passwordUpCase = document.getElementById("upCase");
let passwordSpecialChars = document.getElementById("specialChars");
let passwordNumbers = document.getElementById("nums");
let passwordInvalid = document.getElementById("invalid");

function validatePassword() {
  let passwordVal = password.value;
  passwordRequirement.textContent = "Password Requirement:";

  if (regexPassword.test(passwordVal)) {
    passwordInvalid.style.display = "block";
    passwordInvalid.innerHTML = "<li>Password input is invalid</li>";
    passwordInvalid.style.color = "red";
    passwordLength.style.display = "none";
    passwordLowCase.style.display = "none";
    passwordUpCase.style.display = "none";
    passwordNumbers.style.display = "none";
    passwordSpecialChars.style.display = "none";
  } else {
    passwordInvalid.style.display = "none";
    passwordLength.style.display = "block";
    passwordLowCase.style.display = "block";
    passwordUpCase.style.display = "block";
    passwordNumbers.style.display = "block";
    passwordSpecialChars.style.display = "block";
  }

  if (passwordVal.length < 8) {
    passwordLength.innerHTML =
      "<li>Password must have at least 8 character</li>";
    passwordLength.style.color = "red";
  } else {
    passwordLength.innerHTML =
      "<li>Password must have at least 8 character</li>";
    passwordLength.style.color = "green";
  }

  if (!/^(?=.*[a-z])[A-Za-z\d@$!%*?&-]+$/.test(passwordVal)) {
    passwordLowCase.innerHTML =
      "<li>Password must contain a lower cased letter</li>";
    passwordLowCase.style.color = "red";
  } else {
    passwordLowCase.innerHTML =
      "<li>Password must contain a lower cased letter</li>";
    passwordLowCase.style.color = "green";
  }

  if (!/^(?=.*[A-Z])[A-Za-z\d@$!%*?&-]+$/.test(passwordVal)) {
    passwordUpCase.innerHTML =
      "<li>Password must contain a upper cased letter</li>";
    passwordUpCase.style.color = "red";
  } else {
    passwordUpCase.innerHTML =
      "<li>Password must contain a upper cased letter</li>";
    passwordUpCase.style.color = "green";
  }

  if (!/^(?=.*\d)[A-Za-z\d@$!%*?&-]+$/.test(passwordVal)) {
    passwordNumbers.innerHTML = "<li>Password must contain a number</li>";
    passwordNumbers.style.color = "red";
  } else {
    passwordNumbers.innerHTML = "<li>Password must contain a number</li>";
    passwordNumbers.style.color = "green";
  }

  if (!/^(?=.*[@$!%*?&-])[A-Za-z\d@$!%*?&-]+$/.test(passwordVal)) {
    passwordSpecialChars.innerHTML =
      "<li>Password must contain a special character</li>";
    passwordSpecialChars.style.color = "red";
  } else {
    passwordSpecialChars.innerHTML =
      "<li>Password must contain a special character</li>";
    passwordSpecialChars.style.color = "green";
  }
}
