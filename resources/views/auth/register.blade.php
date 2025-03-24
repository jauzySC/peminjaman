<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap');
            
            body {
                background-color: #1a1a1a;
                color: white;
                font-family: "Lexend", sans-serif;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                align-content: center;
                height: 100vh; /* Center the form vertically */
            }
            .auth-container{
                background-color: #2222;
                padding: 40px;
            }
            h2{
                text-align: center;
            }
            .register{
                background-color: #222; /* Red color */
                color: white;
                border: none;
                padding: 8px 16px;
                cursor: pointer;
                border-radius: 5px;
                transition: all 0.3s ease;
                font-family: "Lexend", sans-serif;
                position: relative;
                left: 50%;
                transform: translateX(-50%);
            }
            .register:hover{
                background-color: white;
                color: black;
            }
           a{
            color:white;
            text-decoration: none;
           position: relative;
           left: 10%;
           }
           .form-group{
            margin: 10px 0; 
            align-items: center;
           }

           input {
            width: 100%
           }
       </style>
</head>
<body>
    <div class="auth-container">
        <h2>Register</h2>
        
        <!-- Display error messages -->
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            

            <div class="form-group">
                <label>Name</label>
                <br>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <br>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <br>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <br>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="register">Register</button>
        </form>

        <div class="auth-links">
            <a href="{{ route('login') }}">Already have an account? Login</a>
        </div>
    </div>
</body>
</html>