var senha = document.getElementById("senha"), 
confirmar_senha = document.getElementById("confsenha");

function validatePassword() {
    if (senha.value != confirmar_senha.value) {
        confirmar_senha.setCustomValidity("Senhas diferentes!");
    } else {
        confirmar_senha.setCustomValidity('');
    }
}
senha.onchange = validatePassword;
confirmar_senha.onkeyup = validatePassword;	