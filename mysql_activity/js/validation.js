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
    if (field.value === "") {
      error.textContent = "Input Something";
      isValid = false;
    } else {
      error.textContent = "";
      isValid = true;
    }
  });

  return isValid;
}
