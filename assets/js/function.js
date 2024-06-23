
function submitForm(idForm) {
    const form = document.getElementById(idForm);
    const formData = new FormData(form);
    console.log("insert resto")
    fetch('controller/insertResto.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Process the response from the PHP script
            alert('Form submitted successfully!');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while submitting the form.');
        });
}