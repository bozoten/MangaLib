function confirmDelete() {
    return confirm('Are you sure you want to delete this?');
}

function comparePasswords() {
    let password1 = document.getElementById('password').value;
    let password2 = document.getElementById('confirm').value;
    let pwMsg = document.getElementById('passwordMessage');

    if (password1 != password2) {
        passwordMessage.innerText = 'Passwords do not match';
        return false;
    }
    else {
        passwordMessage.innerHTML = '';
        return true;
    }
}