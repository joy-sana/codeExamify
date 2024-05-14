
const passwordToggle1 = document.getElementById('password-toggle1');
const passwordToggle2 = document.getElementById('password-toggle2');
const myPassword = document.getElementById('mypwd');
const conPassword = document.getElementById('conpwd');
const lockIcon = '<img src="svg/lock-outline.svg" alt="Lock icon">';
const unlockIcon = '<img src="/svg/lock-open-outline.svg" alt="Unlock icon">';

// Add click event listener to password toggle button
passwordToggle1.addEventListener('click', function() {
    if (myPassword.type === 'password') {
        myPassword.type = 'text';
        passwordToggle1.innerHTML ='<img src="svg/lock-open-right-outline.svg" alt="Lock open icon">';
    } else {
        myPassword.type = 'password';
        passwordToggle1.innerHTML = '<img src="svg/lock-outline.svg" alt="Lock icon">'; 
    }
});

passwordToggle2.addEventListener('click', function() {
    if (conPassword.type === 'password') {
        conPassword.type = 'text';
        passwordToggle2.innerHTML = '<img src="svg/lock-open-right-outline.svg" alt="Lock open icon">';
    } else {
        conPassword.type = 'password';
        passwordToggle2.innerHTML = '<img src="svg/lock-outline.svg" alt="Lock icon">';      
    }
});

