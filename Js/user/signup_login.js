const container = document.getElementById('container');
const signupBtn = document.getElementById('signup');
const loginBtn = document.getElementById('login');

signupBtn.addEventListener('click', () => {
  container.classList.add('active');
});

loginBtn.addEventListener('click', () => {
  container.classList.remove('active');
});
