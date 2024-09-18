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
// document.querySelector('#submit').addEventListener('focus', function(e) {
//   if (current) current.pause();
//   current = anime({
//     targets: 'path',
//     strokeDashoffset: {
//       value: -730,
//       duration: 700,
//       easing: 'easeOutQuart'
//     },
//     strokeDasharray: {
//       value: '530 1386',
//       duration: 700,
//       easing: 'easeOutQuart'
//     }
//   });
// });

// backend call

function login(e){
  e.preventDefault();
  console.log("Login function called");
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  const data = {
    email:email,
    password:password
  };

  fetch('http://127.0.0.1:8000/api/login',{
    method:'POST',
    headers: {
      'Content-Type':'application/json',
    },
    body:JSON.stringify(data)
  }).then(
    response => {
      if(!response.ok){
        throw new Error('Network probblème login')
      }
      return response.json();
    }
  )
  .then(data => {
    console.log('Success:' , data);
  })
  .catch((error)=>{
    console.error( 'error' , error)
  })
}
document.getElementById('loginForm').addEventListener('submit',login);
