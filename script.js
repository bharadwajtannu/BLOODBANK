document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('visitorForm');

    form.addEventListener('submit', function(event) {
        let valid = true;

        // Clear previous error messages
        document.querySelectorAll('.error').forEach(error => error.remove());

        // Name validation
        const name = document.getElementById('name');
        if (name.value.trim() === '') {
            showError(name, 'Name is required.');
            valid = false;
        }

        // Email validation
        const email = document.getElementById('email');
        if (email.value.trim() === '') {
            showError(email, 'Email is required.');
            valid = false;
        } else if (!validateEmail(email.value.trim())) {
            showError(email, 'Invalid email format.');
            valid = false;
        }

        // Phone validation
        const phone = document.getElementById('phone');
        if (phone.value.trim() === '') {
            showError(phone, 'Phone number is required.');
            valid = false;
        } else if (!validatePhone(phone.value.trim())) {
            showError(phone, 'Invalid phone number format.');
            valid = false;
        }

        // Reason for visit validation
        const reason = document.getElementById('reason');
        if (reason.value.trim() === '') {
            showError(reason, 'Reason for visit is required.');
            valid = false;
        }

        if (!valid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });

    function showError(input, message) {
        const error = document.createElement('div');
        error.classList.add('error');
        error.textContent = message;
        input.parentElement.insertBefore(error, input.nextSibling);
    }

    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
    }

    function validatePhone(phone) {
        const re = /^\d{10}$/; // Adjust this regex according to the expected phone number format
        return re.test(phone);
    }
});
