const users_div = document.getElementById('users_div')

async function getUsers(e){
    console.log('start') 
    const response = await axios.get('http://127.0.0.1:8000/api/users',{
        headers: {  
            'Content-Type': 'application/json'
          },}
     )
    console.log('end') 
     console.log(response);
}
