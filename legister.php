<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
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

    --z-index-header: 1000;
    --z-index-modal: 1050;
    --z-index-tooltip: 1100;
    
    
    --breakpoint-sm: 480px;
    --breakpoint-md: 768px;
    --breakpoint-lg: 1024px;
    --breakpoint-xl: 1200px;
    
    --opacity-light: 0.5;
    --opacity-medium: 0.7;
    --opacity-dark: 0.9;
    
    --gradient-main: linear-gradient(45deg, #3498db, #2ecc71);
    --gradient-accent: linear-gradient(90deg, #f39c12, #e74c3c);
  }
    
    
    
        form {
            background-color: #ffffff4a;
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            height: fit-content;
            margin: 100px;
            text-align: center;
        }

    .reg{
        background: var(--primary-color) ;
        display: flex;
    }
    .reg img{
        z-index: 0;
    }
        fieldset {
            border: 2px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }


        legend {
            font-size: 1.5em;
            font-weight: bold;
            color: #333;
        }

        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            text-align: center;
            outline: none;
        }
input:focus{
    border: 1px solid chocolate;
    box-shadow: 0 0 5px chocolate;
}
        
        button {
            background-color: rgb(94, 41, 3);
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: rgb(193, 84, 7);
        }

    
        @media (max-width: 600px) {
            form {
                width: 90%;
            }
        }
        ul{
    list-style-type: none;
  }
  a{
    text-decoration: none;
  }
  
  header .navbar{
    display: flex;
    padding: 20px;
    align-items:center;
    justify-content: space-between;
  }
  .navbar .nav-menu{
    display: flex;
    gap: 10px;
  }
  .section-content{
    padding: 0 20px;
    margin: 0 auto;
  }
header{
    width:100%;
    background: var(--primary-color) ;

}
.navbar .nav-logo .logo-text{
    font-size: 30px;
    font-weight: var(--font-weight-medium);
    color: white;
}
.navbar .nav-menu .nav-link
 {
    color: white;
    padding: 10px 18px;
    border-radius:20px; 
    font-size: var(--font-size-base);
    transition: 0,3s ease; 
}
.navbar .nav-menu .nav-link:hover{
    color: white;
    background: var(--secondary-color);
}
.hero-section{
    background-color: var(--primary-color);
    min-height: 100vh ;
}
.hero-section .section-content{
    display: flex;
    align-items: center;
    min-height: 100vh;
    color: white;
    justify-content: space-between;
}
.hero-section .hero-details .title{
    font-size: larger;
    color: var(--secondary-color);
    font-family: cursive;
}
.hero-section .hero-details .subtitle{
    font-size: var(--font-size-large);
    font-weight: var(--font-weight-medium);
    margin-top: 8px;
    max-width: 70%;
}
.hero-section .hero-details .buttons{
    display: flex;
    gap: 23px;
}
.hero-section .hero-details .button:hover{
    background: transparent;
    border-color: white;
    color: white;
}
.hero-section .hero-details .button{
    transition: 0.3 ease;
    padding: 10px 26px;
    border: 2px solid transparent;
    border-radius: 20px;
    color: var(--primary-color);
    background: var(--secondary-color);
    font-weight: var(--font-weight-medium);

}
.hero-section .hero-details .description{
    max-width: 70%;
    margin: 24px 0 40px;
    font-size: var(--font-size-base);
}
.hero-section .hero-image-wrapper{
    max-width: 500px;
    margin-right: 30px;
}
@media screen and (max-width:900px) {

    :root{

    --font-family: 'Arial', sans-serif;
    --font-size-m: 1rem;
    --font-size-base: 1rem;
    --font-size-small: 1.5rem;
    --font-size-large: 1.3rem;
    --line-height: 1.6;
    
    }

    .navbar .nav-menu{
        display: block;
        position: fixed;
        left: 0;
        top: 0;
        flex-direction: column;
        align-items: center;
        padding-top: 100px;
        width: 300px;
        height: 100%;
        background: white;
    }
    .navbar .nav-menu .nav-link{
        margin-top: 17px;
        display: block;
        color: black;
        font-size: var(--font-size-large);
    }
}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
</head>
<body>
    <header>
        <nav class="navbar section-content">
            <a href="" class="nav-logo">
                <h2 class="logo-text">☕ Coffee</h2>
            </a>
           <ul class="nav-menu">
            <li class="nav-item">
                <a href="hht.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="about us.php" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="menu.php" class="nav-link">Menu</a>
            </li>
            <li class="nav-item">
                <a href="teeti.php" class="nav-link">Testimonials</a>
            </li>
            <li class="nav-item">
                <a href="image.php" class="nav-link" >Gallery</a>
            </li>
            <li class="nav-item">
                <a href="contact.php" class="nav-link">Contact</a>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">login</a>
                </li>
            </li>
           </ul>
        </nav>
    </header>

    <div class="reg">
        <img src="coffeecup.png" alt="coffe cup" class="hero-image">
        <form action="legister.php" method="post">
    <legend>Register</legend>

    <label for="firstname">First Name:</label><br>
    <input type="text" name="firstname" placeholder="Enter your first name" required><br>

    <label for="secondname">Second Name:</label><br>
    <input type="text" name="secondname" placeholder="Enter your second name" required><br>

    <label for="email">Email:</label><br>
    <input type="email" name="email" placeholder="Enter your email" required><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" placeholder="Enter your password" required><br>

    <label for="confirmpassword">Confirm Password:</label><br>
    <input type="password" name="confirmpassword" placeholder="Confirm your password" required><br>

    <button type="submit" name="register">Register</button>
</form>

    </div>
    <script type="module" src="script.js"></script>
</body>
</html>
    <?php
  $conn = new mysqli("localhost", "root", "", "legister form");

if($conn){
    echo "Connected successfully";
    
}
else{
    echo"failed to connect";
}

if (isset($_POST["register"])) {
    $firstname = $_POST["firstname"];
    $secondname = $_POST["secondname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];


    if ($password == $confirmpassword) {
 $query=mysqli_query($conn,"INSERT INTO legister  (firstname,secondname,email,password) VALUES('$firstname','$secondname','$email','$password')");

        if($query){
            echo "Registration successful";
            
        }
         
    } 
    else 
    {
        echo"password doent match";
     
        }

 
}




?>

