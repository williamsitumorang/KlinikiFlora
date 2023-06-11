<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Halaman Login</title>
        <link rel="stylesheet" href={{ asset('css/login.css')}}>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body style="background-color: #9DB2BF">
        <div class="box">
          <form method="post" action="/login">
            @csrf
            <div class="form">
            <h2>Sign In</h2>

            @error('email')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror

            @if (session()->has('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('error') }}
              </div>
            @endif

                <div class="inputBox">
                    <input type="text" required="required" name="email" id="email" @error('email') is-invalid @enderror" id="email">
                    <span>Email</span>
                    <i></i>
                </div>
                
                <div class="inputBox">
                    <input type="password" required="required" name="password" id="password" @error('password') is-invalid @enderror" id="email">
                    <span>Password</span>
                    <i></i>
                </div>
                <div class="links">
                    <a href="/forgot-password">Forgot Password</a>
                </div>
                <input type="submit" value="Login">
            </div>
          </form>
        </div>
    </body>
</html>