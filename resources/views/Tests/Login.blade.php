<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="index.css">
  <title>Login</title>
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="{{route('login')}}" method="POST">
                @csrf
                    <h2>Login</h2>

                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="email" required>
                        <label for="">Email</label>

                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="pwd" required>
                        <label for="">Password</label>

                    </div>

                    <div class="forget">

                        <label for=""><input type="checkbox">Remember Me  <a href="#">Forget Password</a></label>

                    </div>
                    <button type="submit"  name="login">Log in</button>
                    <div class="register">
                        <p>Don't have a account <a href="#">Register</a></p>
                    </div>
                     </form>
            </div>
        </div>
    </section>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
