<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/login1.css')}}"/>
    <!-- bootstrap icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Bootsrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../css/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script src="../css/bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../css/bootstrap-5.3.3-dist/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="post" action='login'>
                @csrf
				<div class="login__field">
                    <i class="login__icon bi bi-person-fill"></i>
					<input type="text" class="login__input" name="email" placeholder=" Email">
				@error('email')
                    <p class="error"> {{$message}} </p>
                @enderror
                </div>
				<div class="login__field">
                    <i class="login__icon bi bi-lock-fill"></i>
					<input type="password" class="login__input" name="password" placeholder="Password" id="password">
                    @error('password')
                    <p class="error"> {{$message}} </p>
                    @enderror
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="togglePassword" onclick="togglePasswordVisibility()">
                    <label class="form-check-label" for="togglePassword" style="font-weight: 600; font-size:14px">Afficher le mot de passe</label>
                </div>
				<button class="button login__submit">
					<span class="button__text">Se Connecter </span>
                    <i class="button__icon bi bi-chevron-right"></i>
				</button>				
			</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
<script>
    function togglePasswordVisibility(){
        const password = document.getElementById('password');
        const Show = document.getElementById('togglePassword');
        password.type = Show.checked ?  'text' : 'password'
    }
</script>
</body>
</html>