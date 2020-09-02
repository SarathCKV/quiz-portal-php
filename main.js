const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const conatiner = document.getElementById('container');

signUpButton.addEventListener('click', () =>  
conatiner.classList.add('right-panel-active')
);

signInButton.addEventListener('click', () =>  
conatiner.classList.remove('right-panel-active')
);