
var current = null;


document.querySelector('#email').addEventListener('focus', function(e) {
  if (current) current.pause();
  current = anime({
    targets: 'path',
    strokeDashoffset: {
      value: 0,
      duration: 700,
      easing: 'easeOutQuart'
    },
    strokeDasharray: {
      value: '240 1386',
      duration: 700,
      easing: 'easeOutQuart'
    }
  });
});
document.querySelector('#password').addEventListener('focus', function(e) {
  if (current) current.pause();
  current = anime({
    targets: 'path',
    strokeDashoffset: {
      value: -336,
      duration: 700,
      easing: 'easeOutQuart'
    },
    strokeDasharray: {
      value: '240 1386',
      duration: 700,
      easing: 'easeOutQuart'
    }
  });
});


// backend call

async function  login () {
  console.log("Login function called");
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  console.log('Data:', { email, password });

  const data = {
    email: email,
    password: password
  };

  console.log('Before fetch',data);

  
}


const form = document.getElementById('login-btn')
form.addEventListener('click',login);
