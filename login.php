<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            background-image: url('login.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        img {
            width: 130px;
            margin-top: 60px;
            margin-left: 50px;
        }

        .use {
            position: relative;
            margin-bottom: 20px;
        }

        .use input {
            width: 310px;
            padding: 10px;
            border: none;
            border-bottom: 2px solid #ccc;
            outline: none;
            font-size: 13px;
            background: transparent;
            color: white;
            transition: border-color 0.3s, transform 0.2s;
        }

        .use input:focus {
            border-color: #007bff;
            transform: scale(1.05);
        }

        .forgot-password {
            color: grey;
            margin-left: 170px;
            position: absolute;
        }

        .forgot-password a {
            text-decoration: none;
            color: #007bff;
        }

        .login-button {
            background-color: transparent;
            color: white;
            border: 2px solid white;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.4s ease;
            margin-left: 150px;
            margin-top: 30px;
            border-radius: 5px;
        }

        .login-button:hover {
            background: linear-gradient(45deg, #ff4b2b, #ff416c);
            box-shadow: 0px 0px 20px rgba(255, 75, 43, 0.8);
            transform: scale(1.1);
        }

        .part1 {
            margin-left: 890px;
            margin-top: 70px;
            width: 500px;
            height: 500px;
            background: transparent;
            box-shadow: 0 .1875rem .4375rem 0 rgba(0, 0, 0, .13), 0 .0625rem .125rem 0 rgba(0, 0, 0, .11);
            padding: 20px;
            border-radius: 10px;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeIn 1s forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h3 {
            margin-left: 150px;
            margin-top: 40px;
            font-size: 26px;
            color: #ccc;
            transition: color 0.3s;
        }

        h3:hover {
            color: #007bff;
        }

    </style>
</head>
<body>
    <div class="part1">
        <h3>Login In</h3>
        <form action="login_process.php" method="POST">
        <div class="use">
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="use">
            <input id="password" name="password" type="password" placeholder="Password" required>
        </div>
        
        <p style="color: white; margin-left: 60px; margin-top: 50px;">
            No Account? <a href="signup.php">Create One!</a>
        </p>
        <button class="login-button">LOGIN</button>
    </div>
</body>
</html>


