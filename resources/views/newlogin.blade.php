<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="{{asset("css/newlogin.css")}}">
	<title>
		Login
	</title>
</head>

<body>

	<div id="container" class="container">
		<!-- FORM SECTION -->
		<div class="row">
			<!-- SIGN UP -->
			<div class="col align-items-center flex-col sign-up">

				<div class="form-wrapper align-items-center">
					<div class="form sign-up">
                        <form action="{{route('signup')}}" method="post">
                    @csrf
						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="text" placeholder="Nom" name="nom" required>
						</div>
                        <div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="text" placeholder="Prenom" name="prenom" required>
						</div>
						<div class="input-group">
							<i class='bx bx-mail-send'></i>
							<input type="email" placeholder="Email" name="email" required>
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" placeholder="Mot de passe" name="mdp" required>
						</div>
						<button type="submit" name="signup">
							S’inscrire
						</button>
                    </form>
						<p>
							<span>
								Vous avez déjà un compte?
							</span>
							<b onclick="toggle()" class="pointer">
								Se connecter
							</b>
						</p>
					</div>
				</div>
			</div>
			<!-- END SIGN UP -->
			<!-- SIGN IN -->
			<div class="col align-items-center flex-col sign-in">
				<div class="form-wrapper align-items-center">
					<div class="form sign-in">
                        <form action="{{route('login')}}" method="post">
                            @csrf
						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="text" name="email" placeholder="Email" required>
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" name="pwd" placeholder="Mot de passe" required>
						</div>
						<button type="submit" name="login">
							Se connecter
						</button>
                    </form>
						{{-- <p>
							<b>
								Forgot password?
							</b>
						</p> --}}
						<p>
							<span>
								Vous n’avez pas de compte ?
							</span>
							<b onclick="toggle()" class="pointer">
								Inscrivez-vous ici
							</b>
						</p>
					</div>
				</div>
			</div>
			<!-- END SIGN IN -->
		</div>
		<!-- END FORM SECTION -->
		<!-- CONTENT SECTION -->
		<div class="row content-row">
			<!-- SIGN IN CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="text sign-in">
					<h2>
						{{-- Bienvenue --}}
					</h2>
					<p>
						{{-- Sur notre plateforme de gestion de tâches personnelles et de suivi de projets ! Avec notre application, vous pouvez facilement organiser vos tâches et suivre votre progression pour chaque projet. De plus, grâce à la fonctionnalité du modèle OpenAI intégrée à notre application, vous pouvez obtenir des suggestions pour les actions à entreprendre pour un projet donné. Vous pouvez également obtenir des questions et des réponses suggérées pour vous aider à démarrer de nouveaux projets. Avec cette fonctionnalité, vous pouvez prendre des décisions plus éclairées et améliorer votre productivité. Connectez-vous maintenant pour commencer à utiliser cette fonctionnalité de pointe ! --}}
					</p>
				</div>
				<div class="img sign-in">
					<img src="login.png" style="width:600px;" alt="welcome">
				</div>
			</div>
			<!-- END SIGN IN CONTENT -->
			<!-- SIGN UP CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="img sign-up">
					<img src="assets/undraw_creative_team_r90h.svg" alt="welcome">
				</div>
				<div class="text sign-up">
					<h2>

					</h2>
					<p>

					</p>
				</div>
			</div>
			<!-- END SIGN UP CONTENT -->
		</div>
		<!-- END CONTENT SECTION -->
	</div>

	<script src="{{asset('js/login.js')}}"></script>
</body>

</html>
