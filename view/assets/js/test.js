async function submitForm(event) {
    event.preventDefault();

    let form = document.getElementById('registrationForm');
    let formData = new FormData(form);

    try {
        let response = await fetch('', {
            method: 'POST',
            body: formData
        });

        let result = await response.json();

        if (result.status === 'success') {
            alert(result.message); // This will show a popup with the success message
            window.location.href = 'product.php'; // Redirect to product.php
        } else {
            let messageContainer = document.getElementById('message');
            messageContainer.innerHTML = '<p class="error">' + result.message + '</p>';
        }
    } catch (error) {
        console.error('Error:', error);
    }
}
