// register.js
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const verifyPasswordInput = document.getElementById('verifyPassword');
    const passwordIcon = document.querySelector('.input-box .bx-low-vision');
    const verifyPasswordIcon = document.querySelector('.input-box-verify .bxs-low-vision'); // Changed icon class

    passwordIcon.addEventListener('click', function() {
        togglePasswordVisibility(passwordInput, passwordIcon);
    });

    verifyPasswordIcon.addEventListener('click', function() {
        togglePasswordVisibility(verifyPasswordInput, verifyPasswordIcon);
    });

    function togglePasswordVisibility(input, icon) {
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bx-low-vision');
            icon.classList.add('bx-show');
        } else {
            input.type = 'password';
            icon.classList.remove('bx-show');
            icon.classList.add('bx-low-vision');
        }
    }
});
