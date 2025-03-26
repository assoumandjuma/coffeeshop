<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Menu</title>
    <style>
        
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
.search-container {
    width: 80%;
    justify-items: center;
    max-width: 400px;
    margin: 20px 340px;
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
 input {
    width: 50%;
    padding: 10px;
    margin: 10px 350px; 
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input:focus{
    border: 1px solid #e67e22;
    box-shadow:0 0 5px 2px #f39c12;
    outline: none;
}
::placeholder{
    color: #e67e22;
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

header .container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    display: inline-flex;
    justify-content: space-between;
    align-items: center;
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

    </style>
</head>
<body>
    
    <header>
        <div class="container">
            <h1>Coffee Shop Menu</h1>
            <nav>
            <ul>
                    <li><a href="hht.php">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="about us.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="teeti.php">Testimonials</a></li>
                    <li><a href="image.php">Gallery</a></li>
                    <li><a href="product.php" id="cart-icon">🛒 Cart (<span id="cart-count">0</span>)</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <input type="text" id="search" placeholder="Search for products..." onkeyup="filterProducts()">
    
    <section class="menu">
        <div class="container">
            <h2>Our Delicious Menu</h2>

            <div class="menu-category">
                <h3>Coffee</h3>
                <div class="menu-items">
                    <div class="menu-item" id="espresso">
                        <img src="Espresso.jpg" alt="Espresso">
                        <div class="menu-description">
                            <h4>Espresso</h4>
                            <p>A strong, rich shot of espresso served in a small cup.</p>
                            <span class="price">$3.00</span>
                            <button class="buy-btn" onclick="location.href='login.php'">Order Now</button>
                        </div>
                    </div>
                    <div class="menu-item" id="cappuccino">
                        <img src="Cappuccino.jpg" alt="Cappuccino">
                        <div class="menu-description">
                            <h4>Cappuccino</h4>
                            <p>Espresso topped with steamed milk and foam.</p>
                            <span class="price">$4.00</span>
                            <button class="buy-btn" onclick="location.href='login.php'">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="menu-category">
                <h3>Tea</h3>
                <div class="menu-items">
                    <div class="menu-item" id="green-tea">
                        <img src="Green Tea.jpg" alt="Green Tea">
                        <div class="menu-description">
                            <h4>Green Tea</h4>
                            <p>Freshly brewed green tea with subtle flavors.</p>
                            <span class="price">$2.50</span>
                            <button class="buy-btn" onclick="location.href='login.php'">Order Now</button>
                        </div>
                    </div>
                    <div class="menu-item" id="chai-latte">
                        <img src="Chai Latte.jpg" alt="Chai Latte">
                        <div class="menu-description">
                            <h4>Chai Latte</h4>
                            <p>A spiced tea latte with a rich blend of flavors.</p>
                            <span class="price">$4.50</span>
                            <button class="buy-btn" onclick="location.href='login.php'">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="menu-category">
                <h3>Pastries</h3>
                <div class="menu-items">
                    <div class="menu-item" id="croissant">
                        <img src="Croissant.jpg" alt="Croissant">
                        <div class="menu-description">
                            <h4>Croissant</h4>
                            <p>Flaky, buttery pastry perfect with any drink.</p>
                            <span class="price">$2.00</span>
                            <button class="buy-btn" onclick="location.href='login.php'">Order Now</button>
                        </div>
                    </div>
                    <div class="menu-item" id="chocolate-muffin">
                        <img src="Chocolate Muffin.jpg" alt="Chocolate Muffin">
                        <div class="menu-description">
                            <h4>Chocolate Muffin</h4>
                            <p>Rich chocolate muffin for a sweet treat.</p>
                            <span class="price">$2.50</span>
                            <button class="buy-btn" onclick="location.href='login.php'">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Coffee Shop. All Rights Reserved.</p>
    </footer>
    
    <script>
        function filterProducts() {
            const searchQuery = document.getElementById('search').value.toLowerCase();
            const menuItems = document.querySelectorAll('.menu-item');

            menuItems.forEach(item => {
                const productName = item.querySelector('h4').textContent.toLowerCase();
                if (productName.includes(searchQuery)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>