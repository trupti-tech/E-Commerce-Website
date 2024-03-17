<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
    <link rel="shortcut icon" href="uploads/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="goback">
        <a href="./index.php">&DoubleLongLeftArrow; Go back to home page</a>
    </div>
    <div class="container">
        <div class="blueBG">
            <div class="box signin">
                <h2>Already Have an Account ?</h2>
                <a href="#"><button class="signinBtn">Sign in</button></a>
            </div>
            <div class="box signup">
                <h2>Don't Have an Account ?</h2>
                <a href="#"><button class="signupBtn">Sign up</button></a>
            </div>
        </div>
        <div class="formBx">
            <div class="form signinform">
                <form action="verification.php" method="POST">
                    <h3>Sign In</h3>
                    <label for="email" title="Enter your email">Email : <span style="color: red;"><sup>*</sup></span></label>
                    <br>
                    <input type="email" placeholder="Email Address" id="email" name="email" required>
                    <label for="password" title="Enter your password">Password : <span style="color: red;"><sup>*</sup></span></label>
                    <br>
                    <input type="password" placeholder="Password" id="password" name="pwd" required>
                    <input type="submit" name="login" value="Login">
                    <a href="#" class="forgot">Forgot Password</a>
                </form>
            </div>
            <div class="form signupform">
                <form action="verification.php" method="POST">
                    <h3>Sign Up</h3>
                    <label for="name" title="Enter your name">Name : <span style="color: red;"><sup>*</sup></span></label>
                    <br>
                    <input type="text" placeholder="Full Name" id="name" name="name" required>
                    <label for="email" title="Enter your email">Email : <span style="color: red;"><sup>*</sup></span></label>
                    <br>
                    <input type="email" placeholder="Email Address" id="email" name="email" required>
                    <label for="password" title="Enter your password">Password : <span style="color: red;"><sup>*</sup></span></label>
                    <br>
                    <input type="password" placeholder="Password" id="password" name="pwd" required>
                    <label for="conf" title="Confirm your Password">Confirm Password : <span style="color: red;"><sup>*</sup></span></label>
                    <br>
                    <input type="password" placeholder="Confirm Password" id="conf" name="conf_pwd" required>
                    <input type="submit" name="register" value="Register">
                </form>
            </div>
        </div>
    </div>
    <script>
        const signinBtn = document.querySelector('.signinBtn');
        const signupBtn = document.querySelector('.signupBtn');
        const formBx = document.querySelector('.formBx');
        const body = document.querySelector('body');

        signupBtn.onclick = function(){
            formBx.classList.add('active');
            body.classList.add('active');
        }
        signinBtn.onclick = function(){
            formBx.classList.remove('active');
            body.classList.remove('active');
        }
    </script>
</body>
</html>