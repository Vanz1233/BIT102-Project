// Get references to the HTML elements
const registrationForm = document.getElementById("registrationForm");
const firstNameInput = document.getElementById("first-name");
const lastNameInput = document.getElementById("last-name");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirm-password");
const birthDateInput = document.getElementById("date");
const checkboxInput = document.getElementById("terms-checkbox"); // Get the checkbox input
const message = document.createElement("div"); // Create a div for displaying messages
registrationForm.appendChild(message); // Append the message div to the form

// Password validation regex patterns
const lowercasePattern = /[a-z]/;
const uppercasePattern = /[A-Z]/;
const specialCharOrNumberPattern = /[!@#$%^&*(),.?":{}|<>0-9]/;

// Function to check if the user is at least 20 years old
function isAtLeast20YearsOld(birthDate) {
    const today = new Date();
    const birthDateObj = new Date(birthDate);
    const age = today.getFullYear() - birthDateObj.getFullYear();
    const monthDifference = today.getMonth() - birthDateObj.getMonth();
    const dayDifference = today.getDate() - birthDateObj.getDate();
    return age > 20 || (age === 20 && (monthDifference > 0 || (monthDifference === 0 && dayDifference >= 0)));
}

// Add submit event listener to the form
registrationForm.addEventListener("submit", function(e) {
    e.preventDefault(); // Prevent the form from submitting by default

    // Validate form input
    const firstName = firstNameInput.value.trim();
    const lastName = lastNameInput.value.trim();
    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();
    const confirmPassword = confirmPasswordInput.value.trim();
    const birthDate = birthDateInput.value.trim();
    const isCheckboxChecked = checkboxInput.checked; // Check if the checkbox is ticked

    // Check for empty fields
    if (!firstName || !lastName || !email || !password || !confirmPassword || !birthDate) {
        message.textContent = "Please fill out all fields.";
        message.style.color = "red";
        message.style.display = "block";
        return;
    }

    // Check password length
    if (password.length < 8) {
        message.textContent = "Password must be at least 8 characters.";
        message.style.color = "red";
        message.style.display = "block";
        return;
    }

    // Check for at least one lowercase letter
    if (!lowercasePattern.test(password)) {
        message.textContent = "Password must contain at least one lowercase letter.";
        message.style.color = "red";
        message.style.display = "block";
        return;
    }

    // Check for at least one uppercase letter
    if (!uppercasePattern.test(password)) {
        message.textContent = "Password must contain at least one uppercase letter.";
        message.style.color = "red";
        message.style.display = "block";
        return;
    }

    // Check for at least one special character or number
    if (!specialCharOrNumberPattern.test(password)) {
        message.textContent = "Password must contain at least one special character or number.";
        message.style.color = "red";
        message.style.display = "block";
        return;
    }

    // Check if password and confirm password match
    if (password !== confirmPassword) {
        message.textContent = "Password and Confirm Password do not match.";
        message.style.color = "red";
        message.style.display = "block";
        return;
    }

    // Check if the user is at least 20 years old
    if (!isAtLeast20YearsOld(birthDate)) {
        message.textContent = "You must be at least 20 years old to register.";
        message.style.color = "red";
        message.style.display = "block";
        return;
    }

    // Check if the checkbox is ticked
    if (!isCheckboxChecked) {
        message.textContent = "You must agree to the terms of V4NZ services.";
        message.style.color = "red";
        message.style.display = "block";
        return;
    }

    // If all checks pass, submit the form
    registrationForm.submit();
});

// Add a mouseover event listener to the email input
emailInput.addEventListener("mouseover", function() {
    emailInput.style.backgroundColor = "red"; // Change the text color to red
});

// Add a mouseout event listener to reset the color when the mouse leaves the input
emailInput.addEventListener("mouseout", function() {
    emailInput.style.backgroundColor = ""; // Reset to the default color
});
