
const login = async(e)=> {
    console.log("Login function called");
   e.preventDefault()
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
  
    console.log('Data:', { email, password });
  
    const data = {
      email: email,
      password: password
    };
  
    console.log('Before fetch');
    axios.post('http://127.0.0.1:8000/api/login', data, {
        headers: {
            'Content-Type': 'application/json',
        }
    })
    .then(response => {
        console.log('Success:', response.data);

    })
    .catch(error => {
        if (error.response) {
            
            console.error('Error data:', error.response.data);
            console.error('Error status:', error.response.status);
            console.log('errrr')
        } else if (error.request) {
            
            console.error('No response received:', error.request);
            
        } else {
            
            console.error('Error:', error.message);
            
        }
    });

    
  }
    
  
  
  const form = document.getElementById('register-form')
  form.addEventListener('submit',function(e){
    e.preventDefault()
    login(e)
  });
  