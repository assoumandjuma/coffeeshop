<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="coflog.jpg">

    
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Playwrite+PL:wght@100..400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Playwrite+IN:wght@100..400&family=Playwrite+PL:wght@100..400&display=swap');

*{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: "Kanit", serif;
}

:root {
    /* Color Palette */
    --primary-color: #430303;
    --secondary-color: orange;
    --accent-color: #f39c12;
    --background-color: #f4f4f4;
    --text-color: #333333;
    --link-color: #2980b9;
    
    /* Typography */
    --font-family: 'Arial', sans-serif;
    --font-size-base: 16px;
    --font-size-small: 14px;
    --font-size-large: 18px;
    --line-height: 1.6;
    
    /* Spacing */
    --space-xs: 8px;
    --space-sm: 16px;
    --space-md: 24px;
    --space-lg: 32px;
    --space-xl: 40px;
    
    /* Border Radius */
    --border-radius-small: 4px;
    --border-radius-medium: 8px;
    --border-radius-large: 12px;
    
    /* Shadows */
    --box-shadow-light: 0 2px 5px rgba(0, 0, 0, 0.1);
    --box-shadow-medium: 0 4px 10px rgba(0, 0, 0, 0.2);
    --box-shadow-dark: 0 6px 15px rgba(0, 0, 0, 0.3);
    
    /* Transitions */
    --transition-fast: 0.2s ease-in-out;
    --transition-medium: 0.4s ease-in-out;
    --transition-slow: 0.6s ease-in-out;
    
    /* Z-Index */
    --z-index-header: 1000;
    --z-index-modal: 1050;
    --z-index-tooltip: 1100;
    
    /* Media Queries (Responsive Breakpoints) */
    --breakpoint-sm: 480px;
    --breakpoint-md: 768px;
    --breakpoint-lg: 1024px;
    --breakpoint-xl: 1200px;
    
    /* Opacities */
    --opacity-light: 0.5;
    --opacity-medium: 0.7;
    --opacity-dark: 0.9;
    
    /* Gradients */
    --gradient-main: linear-gradient(45deg, #3498db, #2ecc71);
    --gradient-accent: linear-gradient(90deg, #f39c12, #e74c3c);
  }
  
  ul{
    list-style-type: none;
  }
  a{
    text-decoration: none;
  }
  button{
    cursor: pointer;
    background: none;
    border: none;
  }
  img{
    width: 100%;
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
    position: fixed;
    width:100%;
    z-index: 5;

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
            /* Typography */
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
.button{
    animation: scaleUpDown 4s linear infinite;
}
    @keyframes scaleUpDown {
        0% {
          transform: scale(0.8);
        }
        50% {
          transform: scale(1.2);
        }
        100% {
          transform: scale(1);
        }
      }
    </style>
    
</head>
<body>
    <header>
        <nav class="navbar section-content">
            <a href="#" class="nav-logo">
                <h2 class="logo-text">☕ Coffee</h2>
            </a>
           <ul class="nav-menu">
            <button id="menu-close-button"><i class="fas fa-times"></i></button>
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
                    <a href="legister.php" class="nav-link">register</a>
                   
                </li>
            </li>
           </ul>
        </nav>
    </header>

    <main>
        <section class="hero-section">
        <div class="section-content">
            <div class="hero-details">
                <h2 class="title">Best Coffee</h2>
                <h3 class="subtitle">Make your day great with our special coffee!</h3>
                <p class="description">Welcome to our coffee paradise, where every bean tells a story and every cup sparks joy.</p>
                <div class="buttons">
                    <a href="menu.php" class="button order-now">Order Now</a>
                    <a href="contact.php" class="button contact-us"> Contact Us</a>
                </div>
            </div>
            <div class="hero-image-wrapper">
                <img src="coffeecup.png" alt="coffe cup" class="hero-image">
            </div>
        </div>
        </section>
    </main>
</body>
</html>