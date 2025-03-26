<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> <!-- Ensures compatibility with older versions of IE -->
    <title>Product Page</title>
    <style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.product-gallery {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    margin-top: 30px;
    gap: 20px;
    padding: 0 10px;
}

.product-card {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 250px;
    text-align: center;
    margin-bottom: 30px;
}

.product-image {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.product-title {
    font-size: 1.5em;
    margin-top: 10px;
}

.product-description {
    font-size: 1em;
    color: #555;
    margin: 10px 0;
}

.product-price {
    font-size: 1.2em;
    font-weight: bold;
    color: #27ae60;
}

.add-to-cart {
    background-color: #27ae60;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 1em;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.add-to-cart:hover {
    background-color: #2ecc71;
}

.cart-message {
    position: absolute;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    padding: 10px 20px;
    background-color: #2ecc71;
    color: white;
    border-radius: 5px;
    font-size: 1.2em;
    visibility: hidden;
}

.footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px;
    margin-top: auto;
}

.footer p {
    font-size: 0.9em;
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    overflow:visible;
}


header {
    background-color: rgb(63, 27, 0);
    color: white;
    display: flex;
    padding: 20px 0;
}


.product-list {
    list-style-type: none;
    padding: 0;
}
.product-list li {
    padding: 10px;
    border-bottom: 1px solid #ccc;
}
.product-list li:last-child {
    border-bottom: none;
}



header h1 {
    font-size: 2.5rem;
    font-weight: bold;
}

header nav ul {
    list-style: none;
    display: flex;
}

header nav ul li {
    margin-right: 20px;
}

header nav ul li a {
    text-decoration: none;
    color: white;
    font-size: 1rem;
    transition: color 0.3s ease;
}

header nav ul li a:hover {
    color: #f39c12;
}

.menu {
    padding: 40px 0;
    background-color: #ffffff;
}

.menu .container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}

.menu h2 {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 40px;
}

.menu-category {
    margin-bottom: 40px;
}

.menu-category h3 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    background-color: rgb(94, 41, 3);
    text-transform: uppercase;
    color: white;
    text-align: center;
}

.menu-items {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.menu-item {
    width: 48%;
    margin-bottom: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.menu-item:hover {
    transform: scale(1.05);
}

.menu-item img {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.menu-description {
    padding: 20px;
    text-align: center;
}

.menu-description h4 {
    font-size: 1.2rem;
    margin-bottom: 10px;
}

.menu-description p {
    margin-bottom: 10px;
    color: #7f8c8d;
}

.price {
    font-size: 1.2rem;
    color: #f39c12;
}

.buy-btn {
    background-color: #f39c12;
    border: none;
    color: white;
    padding: 10px 20px;
    font-size: 1rem;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

.buy-btn:hover {
    background-color: #e67e22;
}


footer {
    background-color: rgb(94, 41, 3);
    color: white;
    text-align: center;
    padding: 20px;
}

footer p {
    font-size: 1rem;
}
.n{
    text-align: center;
    font-size: 1.2rem;
    margin-bottom: 10px;
    color: #7f8c8d;
}
.n{
    margin-bottom: 15%;
}

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
    z-index: 5;
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
                <a href="contact .php" class="nav-link">Contact</a>               
                </li>
           </ul>
        </nav>
    </header>

  
    <div class="product-gallery">
        <div class="product-card">
            <img src="https://via.placeholder.com/200" alt="Product Image" class="product-image">
            <h2 class="product-title">Awesome Product</h2>
            <p class="product-description">This is an amazing product that solves all your problems!</p>
            <p class="product-price">$29.99</p>
            <button class="add-to-cart" onclick="addToCart()">Add to Cart</button>
        </div>
        
        <div class="product-card">
            <img src="https://via.placeholder.com/200" alt="Product Image" class="product-image">
            <h2 class="product-title">Another Product</h2>
            <p class="product-description">This is another product description.</p>
            <p class="product-price">$19.99</p>
            <button class="add-to-cart" onclick="addToCart()">Add to Cart</button>
        </div>
        <div class="product-card">
            <img src="https://via.placeholder.com/200" alt="Product Image" class="product-image">
            <h2 class="product-title">Yet Another Product</h2>
            <p class="product-description">This product is yet another amazing item.</p>
            <p class="product-price">$39.99</p>
            <button class="add-to-cart" onclick="addToCart()">Add to Cart</button>
        </div>
    </div>


    <div id="cart-message" class="cart-message" style="display: none;">
        Product added to cart!
    </div>

    
    <footer class="footer">
        <p>&copy; 2025 Your Company Name. coffee shop.</p>
        <p>Contact us: nizeyimanaassouman9@gmail.com</p>
    </footer>

    
    <script src="script.js"></script>
</body>
</html>

