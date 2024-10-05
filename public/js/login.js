
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

function login(event) {
  event.preventDefault(); // Prevent form submission

  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  console.log('Data:', { email, password });

  const xhr = new XMLHttpRequest();
  xhr.open('GET', 'http://127.0.0.1:8000/api/categories', true);
  xhr.setRequestHeader('Content-Type', 'application/json');

  // Handle the response
  xhr.onload = function () {
      if (xhr.status >= 200 && xhr.status < 300) {
          console.log('Response:', JSON.parse(xhr.responseText));
      } else {
          console.error('Error:', xhr.statusText);
      }
  };

  // Handle network errors
  xhr.onerror = function () {
      console.error('Request failed');
  };

  // Send the request
  xhr.send();
}



// const form = document.getElementById('login-btn');
// form.addEventListener('click', login);
