{{-- <!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  
  <style>
      body{
          background: #d3d3d3;
      }
      .main {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .form {
          background: #fff;
          padding: 50px 30px;
          width: 500px;
      }
  </style>

  <body>
    <div class="main">
        <div class="form">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $errors)
                        <li>
                            {{ $errors }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if(session()->has('status'))
                <div class="alert alert-sucess">
                    {{ session()->get('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ request() -> token }}">
                <input type="hidden" name="email" value="{{ request() -> email }}">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                <input type="password" class="form-control" name="password_confirmation">
                <input type="submit" value="Update Password" class="btn btn-primary w-100 mt-3">
            </form>
        </div>
    </div>
  </body>

</html> --}}

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Reset Password</title>
        <link rel="stylesheet" href={{ asset('css/login.css')}}>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        
    </head>
    
    <body style="background-color: #9DB2BF">
        <div class="box">
            <form method="POST" action="{{ route('password.update') }}">
              @csrf
              
              <div class="form">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert" >
                    @foreach ($errors->all() as $errors )

                    <i class="fas fa-times-circle me-3">
                        {{ $errors }}
                    </i>
                    
                    @endforeach
                </div>
            @endif

            @if(session()->has('status'))

                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert" >
                    <i class="fas fa-times-circle me-3">
                        {{ session()->get('status') }}
                    </i>
                </div>
            @endif


            <h2></h2>
                <div class="inputBox">
                    {{-- <input type="email" required="required" name="email" id="email">
                    <span>Email</span>
                    <i></i> --}}

                    <input type="hidden" name="token" value="{{ request() -> token }}">
                    <input type="hidden" name="email" value="{{ request() -> email }}">

                    <div class="inputBox">
                        <input type="password" required="required" name="password" id="password">
                        <span>Password</span>
                        <i></i>    
                    </div>

                    <div class="inputBox">
                        <input type="password" required="required" name="password_confirmation" id="confirmation">
                        <span>Password Confirmation</span>
                        <i></i>
                    </div>

                    {{-- <input type="submit" value="Update Password" class="btn btn-primary w-100 mt-3"> --}}
                </div>
                    <input type="submit" value="Update" class="mt-5">
              </div>
        </div>
    </body>
</html>
