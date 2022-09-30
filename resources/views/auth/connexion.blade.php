<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <!-- <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css"> -->
  <!-- <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="assets#/css/login.css"> -->
  <!-- Styles -->
  <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">

  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
      <div class="container">
          <div class="card login-card">
              <div class="row no-gutters">
                  <div class="col-md-5">
                      <img src="{{ asset('assets/img/login.jpg') }}" alt="login" class="login-card-img">
                  </div>
                  <div class="col-md-7">
                      <div class="card-body">
                          <div class="brand-wrapper d-flex justify-content-center">
                              <a href="{{ route('products.index') }}">
                                  <img src="{{ asset('assets/img/online-logo.png') }}" alt="logo" class="logo">
                              </a>
                          </div>
                          <p class="login-card-description text-center">Espace client</p>
                          <form method="POST" action="{{ route('login') }}">
                              @csrf
                              <div style="text-align: center">
                                  <p>Connectez vous</p>
                              </div>

                              <div class="form-group">
                    <label for="pseudo" class="sr-only">{{ __('Adresse e-mail') }}</label>
                    <!-- <input type="text" name="pseudoconnect" id="pseudo" class="form-control" placeholder="Entrez votre Identifiant"> -->
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Adresse e-mail" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">{{ __('Mot de passe') }}</label>
                    <!-- <input type="password" name="mdpconnect" id="password" class="form-control" placeholder="Entrez votre mot de passe"> -->
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe" required autocomplete="current-password">

                      @error('password')
                      <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                              <input class="btn btn-block login-btn mb-4" type="submit" value="Se connecter">
                          </form>
                          <a href="#!" class="forgot-password-link">Mot de passe oublié?</a>
                          <hr>
                          <div class="d-flex flex-column justify-content-center align-items-center">
                              <p class="text-center">Pas encore de compte ?</p>
                              <a href="{{ route('register') }}" class="btn btn-outline-secondary">
                                  Créer un compte
                              </a>
                          </div>
                          <!-- <button class="btn btn-primary">Quitter l'espace admin</button></a> -->
                          {{--                <nav class="login-card-footer-nav">--}}
                          {{--                  <a href="#!">Terms of use.</a>--}}
                          {{--                  <a href="#!">Privacy policy</a>--}}
                          {{--                </nav>--}}
                      </div>
                  </div>
              </div>
          </div>
          <!-- <div class="card login-card">
            <img src="assets/images/login.jpg" alt="login" class="login-card-img">
            <div class="card-body">
              <h2 class="login-card-title">Login</h2>
              <p class="login-card-description">Sign in to your account to continue.</p>
              <form action="#!">
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-prompt-wrapper">
                  <div class="custom-control custom-checkbox login-card-check-box">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                  </div>
                  <a href="#!" class="text-reset">Forgot password?</a>
                </div>
                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
              </form>
              <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
            </div>
          </div> -->
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
