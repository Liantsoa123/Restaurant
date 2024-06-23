
function upForm(idForm) {
    let form = document.getElementById(idForm);
    form.classList.add('upForm');
}

function downForm(idForm) {
    let form = document.getElementById(idForm);
    form.classList.remove('upForm');
}