<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Coffee Shop</title>
    
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/9.22.1/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.1/firebase-auth-compat.js"></script>
    
    <style>
        :root {
            --primary-color: #430303;
            --secondary-color: orange;
            --accent-color: #f39c12;
            --background-color: #f4f4f4;
            --text-color: #333333;
            --link-color: #2980b9;

            --font-family: 'Arial', sans-serif;
            --font-size-base: 16px;
            --font-size-small: 14px;
            --font-size-large: 18px;
            --line-height: 1.6;

            --space-xs: 8px;
            --space-sm: 16px;
            --space-md: 24px;
            --space-lg: 32px;
            --space-xl: 40px;
            
            --border-radius-small: 4px;
            --border-radius-medium: 8px;
            --border-radius-large: 12px;

            --box-shadow-light: 0 2px 5px rgba(0, 0, 0, 0.1);
            --box-shadow-medium: 0 4px 10px rgba(0, 0, 0, 0.2);
            --box-shadow-dark: 0 6px 15px rgba(0, 0, 0, 0.3);
            
            --transition-fast: 0.2s ease-in-out;
            --transition-medium: 0.4s ease-in-out;
            --transition-slow: 0.6s ease-in-out;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-family);
            line-height: var(--line-height);
            background-color: var(--background-color);
        }

        header {
            width: 100%;
            background: var(--primary-color);
        }

        .navbar {
            display: flex;
            padding: 20px;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }

        .navbar .nav-logo .logo-text {
            font-size: 30px;
            color: white;
        }

        .navbar .nav-menu {
            display: flex;
            gap: 10px;
            list-style-type: none;
        }

        .navbar .nav-menu .nav-link {
            color: white;
            padding: 10px 18px;
            border-radius: 20px;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .navbar .nav-menu .nav-link:hover {
            background: var(--secondary-color);
        }

        .reg {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 80px);
            background-color: var(--primary-color);
        }

        .reg img {
            max-width: 50%;
            height: auto;
            object-fit: contain;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 8px;
            box-shadow: var(--box-shadow-medium);
            width: 400px;
            text-align: center;
        }

        .login-form h2 {
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            transition: var(--transition-fast);
        }

        input:focus {
            border-color: chocolate;
            box-shadow: 0 0 5px chocolate;
        }

        button {
            background-color: rgb(94, 41, 3);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: var(--transition-fast);
        }

        button:hover {
            background-color: rgb(193, 84, 7);
        }

        #error-message {
            color: red;
            margin-bottom: 15px;
        }

        /* Hamburger Menu */
        .hamburger-menu {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .hamburger-menu .bar {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 3px 0;
            transition: 0.4s;
        }

        @media screen and (max-width: 900px) {
            .navbar .nav-menu {
                display: none;
                position: fixed;
                left: 0;
                top: 0;
                flex-direction: column;
                align-items: center;
                padding-top: 100px;
                width: 300px;
                height: 100%;
                background: white;
                z-index: 1000;
                transition: transform 0.3s ease-in-out;
            }

            .navbar .nav-menu.active {
                display: flex;
            }

            .navbar .nav-menu .nav-link {
                color: black;
                margin: 10px 0;
                width: 100%;
                text-align: center;
            }

            .hamburger-menu {
                display: flex;
            }

            .reg {
                flex-direction: column;
                padding: 20px;
            }

            .reg img {
                max-width: 100%;
                margin-bottom: 20px;
            }

            form {
                width: 90%;
                max-width: 400px;
            }
        }

        @media screen and (max-width: 480px) {
            form {
                width: 95%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="#" class="nav-logo">
                <h2 class="logo-text">☕ Coffee</h2>
            </a>
            
            <div class="hamburger-menu" onclick="toggleMenu()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>

            <ul class="nav-menu">
                <li class="nav-item"><a href="hht.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="about us.php" class="nav-link">About</a></li>
                <li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
                <li class="nav-item"><a href="teeti.php" class="nav-link">Testimonials</a></li>
                <li class="nav-item"><a href="image.php" class="nav-link">Gallery</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="legister.php" class="nav-link">Register</a></li>
            </ul>
        </nav>
    </header>

    <div class="reg">
        <img src="coffeecup.png" alt="coffee cup">
        <form id="loginForm">
            <div class="login-form">
                <h2>Coffee Shop Admin</h2>
                <div id="error-message"></div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="button" onclick="login()">Login</button>
            </div>
        </form>
    </div>

    <script>
    // Firebase configuration
    const firebaseConfig = {
        apiKey: "AIzaSyDAHOslEKeBFHlFXBspti_k5O1pZ8hozIQ",
        authDomain: "coffeeshop-39b4e.firebaseapp.com",
        projectId: "coffeeshop-39b4e",
        messagingSenderId: "38590993143",
        appId: "1:38590993143:web:c78c366696ea69537db9f2",
        measurementId: "G-ZWBNVE51FV"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    // Toggle mobile menu
    function toggleMenu() {
        const menu = document.querySelector('.nav-menu');
        menu.classList.toggle('active');
    }

    function login() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const errorMessageElement = document.getElementById('error-message');

        // Clear previous error messages
        errorMessageElement.textContent = '';

        // Validate inputs
        if (!email || !password) {
            errorMessageElement.textContent = 'Please enter both email and password';
            return;
        }

        // Firebase authentication
        firebase.auth().signInWithEmailAndPassword(email, password)
            .then((userCredential) => {
                // Successful login
                const user = userCredential.user;
                
                // Check if user is verified
                if (user.emailVerified) {
                    // Redirect to menu page
                    window.location.href = 'menu.php';
                } else {
                    errorMessageElement.textContent = 'Please verify your email before logging in';
                    // Optional: Send verification email
                    user.sendEmailVerification();
                }
            })
            .catch((error) => {
                // Handle Errors here
                const errorCode = error.code;
                const errorMessage = error.message;

                // Provide user-friendly error messages
                switch(errorCode) {
                    case 'auth/wrong-password':
                        errorMessageElement.textContent = 'Incorrect password. Please try again.';
                        break;
                    case 'auth/user-not-found':
                        errorMessageElement.textContent = 'No user found with this email.';
                        break;
                    case 'auth/invalid-email':
                        errorMessageElement.textContent = 'Invalid email address.';
                        break;
                    case 'auth/too-many-requests':
                        errorMessageElement.textContent = 'Too many login attempts. Please try again later.';
                        break;
                    default:
                        errorMessageElement.textContent = 'Login failed. Please try again.';
                }
            });
    }

    // Optional: Check if user is already logged in
    firebase.auth().onAuthStateChanged((user) => {
        if (user) {
            // User is signed in, redirect to menu
            window.location.href = 'menu.php';
        }
    });
    </script>
</body>
</html>