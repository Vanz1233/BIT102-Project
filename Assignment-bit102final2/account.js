// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function validateForm() {
    var password = document.getElementsByName('psw')[0].value;
    if (password.length < 6) {
        alert('Password must be at least 6 characters long.');
        return false;
    }
    // Add more validation checks as needed
    return true;
}
