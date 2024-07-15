function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  document.addEventListener('DOMContentLoaded', () => {
    const editProfileForm = document.getElementById('editProfileForm');
    const editPassword = document.getElementById('editPassword');
    const editConfirmPassword = document.getElementById('editConfirmPassword');
    const passwordMismatchFeedback = document.getElementById('passwordMismatchFeedback');

    editProfileForm.addEventListener('submit', (event) => {
        event.preventDefault();  // Prevent form submission
        const password = editPassword.value;
        const confirmPassword = editConfirmPassword.value;

        if (password === confirmPassword) {
            passwordMismatchFeedback.style.display = 'none';
            editProfileForm.submit(); // Submit the form programmatically if passwords match
        } else {
            passwordMismatchFeedback.style.display = 'block';
        }
    });
});
        document.getElementById('editProfileForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const email = document.getElementById('editEmail').value;
            const password = document.getElementById('editPassword').value;
            const confirmPassword = document.getElementById('editConfirmPassword').value;

            if (password !== confirmPassword) {
                document.getElementById('passwordMismatchFeedback').style.display = 'block';
                return;
            } else {
                document.getElementById('passwordMismatchFeedback').style.display = 'none';
            }

            alert('Profile updated successfully!');
            var myModalEl = document.getElementById('editProfileModal');
            var modal = bootstrap.Modal.getInstance(myModalEl);
            modal.hide();
        });

        document.getElementById('editAddressForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const country = document.getElementById('editCountry').value;
            const buildingName = document.getElementById('editBuildingName').value;
            const addressLine1 = document.getElementById('editAddressLine1').value;
            const addressLine2 = document.getElementById('editAddressLine2').value;
            const city = document.getElementById('editCity').value;
            const province = document.getElementById('editProvince').value;
            const postalCode = document.getElementById('editPostalCode').value;

            // Simulate a save to the address book
            console.log('Address Saved:', {
                country,
                buildingName,
                addressLine1,
                addressLine2,
                city,
                province,
                postalCode
            });

            alert('Address updated successfully!');
            var myModalEl = document.getElementById('editAddressModal');
            var modal = bootstrap.Modal.getInstance(myModalEl);
            modal.hide();
        });
   