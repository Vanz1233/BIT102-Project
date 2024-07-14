transaction.js 




// Initialize Bootstrap toast
var congratsToast = new bootstrap.Toast(document.getElementById('congratsToast'));

// Show the toast
congratsToast.show();

// Delay dismissal of the toast to make it stay longer
setTimeout(function () {
    congratsToast.hide();
}, 8000); // Adjust duration in milliseconds (8000ms = 8 seconds)