<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Admin - Register</title>
    <style>
        :root {
            --primary-color: #5C3D2E;
            --primary-light: #B85C38;
            --secondary-color: #E0C097;
            --light-color: #F9EFE2;
            --dark-color: #362222;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --gray-light: #f5f5f5;
            --gray: #e0e0e0;
            --gray-dark: #777;
            --box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--primary-light), var(--primary-color));
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-container {
            background-color: white;
            border-radius: 8px;
            padding: 40px;
            width: 400px;
            max-width: 90%;
            box-shadow: var(--box-shadow);
        }

        .register-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-logo img {
            width: 80px;
            height: 80px;
        }

        .register-title {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 20px;
        }

        .error-message {
            background-color: rgba(231, 76, 60, 0.2);
            color: var(--danger-color);
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            display: none;
        }

        .success-message {
            background-color: rgba(46, 204, 113, 0.2);
            color: var(--success-color);
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            display: none;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark-color);
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--gray);
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .register-btn {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .register-btn:hover {
            background-color: var(--primary-light);
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            color: var(--gray-dark);
        }

        .form-footer a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2 class="register-title">Create an Account</h2>
        <div id="errorMessage" class="error-message"></div>
        <div id="successMessage" class="success-message"></div>
        <form id="registerForm">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required autocomplete="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required autocomplete="new-password">
            </div>
            <button type="submit" class="register-btn">Register</button>
        </form>
        <p class="form-footer">Already have an account? <a href="login.php">Login here</a></p>
    </div>

    <script>
        // Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyDAHOslEKeBFHlFXBspti_k5O1pZ8hozIQ",
            authDomain: "coffeeshop-39b4e.firebaseapp.com",
            projectId: "coffeeshop-39b4e",
            storageBucket: "coffeeshop-39b4e.appspot.com",
            messagingSenderId: "38590993143",
            appId: "1:38590993143:web:c78c366696ea69537db9f2",
            measurementId: "G-ZWBNVE51FV"
        };

        // Initialize Firebase
        const app = firebase.initializeApp(firebaseConfig);
        const auth = firebase.auth();

        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            const errorMessage = document.getElementById('errorMessage');
            const successMessage = document.getElementById('successMessage');
            
            errorMessage.style.display = 'none';
            successMessage.style.display = 'none';

            if (password !== confirmPassword) {
                errorMessage.style.display = 'block';
                errorMessage.textContent = 'Passwords do not match.';
                return;
            }

            auth.createUserWithEmailAndPassword(username + '@example.com', password)
                .then((userCredential) => {
                    // Registration successful
                    successMessage.style.display = 'block';
                    successMessage.textContent = 'Registration successful! You can now log in.';
                    document.getElementById('registerForm').reset();
                })
                .catch((error) => {
                    // Handle Errors here.
                    const errorCode = error.code;
                    const errorMessageText = error.message;
                    errorMessage.style.display = 'block';
                    errorMessage.textContent = errorMessageText;
                });
        });
    </script>
</body>
</html>