<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Menu</title>
    
    <!-- Firebase Scripts -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>

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
            line-height: 1.6;
        }

        header {
            background-color: rgb(63, 27, 0);
            color: white;
            padding: 20px 0;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 2rem;
            font-weight: bold;
        }

        header nav ul {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
        }

        header nav ul li {
            margin-right: 15px;
            margin-bottom: 10px;
        }

        header nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        header nav ul li a:hover {
            color: #f39c12;
        }
        #checkout-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }

        .checkout-container {
            background-color: white;
            width: 90%;
            max-width: 600px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .checkout-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .checkout-close {
            font-size: 24px;
            cursor: pointer;
            background: none;
            border: none;
        }

        .checkout-items {
            max-height: 400px;
            overflow-y: auto;
        }

        .checkout-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .checkout-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-right: 15px;
            border-radius: 5px;
        }

        .checkout-item-details {
            flex-grow: 1;
        }

        .checkout-total {
            text-align: right;
            margin-top: 20px;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .final-checkout-btn {
            width: 100%;
            padding: 12px;
            background-color: #f39c12;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .final-checkout-btn:hover {
            background-color: #e67e22;
        }
        .search-container {
            display: flex;
            justify-content: center;
            padding: 20px 15px;
        }

        #search {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .menu {
            padding: 40px 0;
            background-color: #ffffff;
        }

        .menu-category h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            background-color: rgb(94, 41, 3);
            text-transform: uppercase;
            color: white;
            text-align: center;
            padding: 10px;
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
            height: 300px;
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
            display: block;
            margin-bottom: 10px;
        }

        .buy-btn {
            background-color: #f39c12;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 100%;
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

        /* Cart Sidebar Styles */
        #cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100%;
            background-color: white;
            box-shadow: -2px 0 5px rgba(0,0,0,0.1);
            transition: right 0.3s ease;
            z-index: 1000;
            padding: 20px;
            overflow-y: auto;
        }

        #cart-sidebar.show-sidebar {
            right: 0;
        }

        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .cart-item-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cart-item-controls button {
            background: none;
            border: 1px solid #ddd;
            padding: 2px 6px;
            cursor: pointer;
        }

        #empty-cart-message {
            text-align: center;
            color: #888;
            margin-top: 50px;
        }

        #checkout-btn {
            width: 100%;
            padding: 10px;
            background-color: #f39c12;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
        }

        #checkout-btn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        #cart-close-btn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        #logout-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 15px;
            margin-left: 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #logout-btn:hover {
            background-color: #c0392b;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            #cart-sidebar {
                width: 100%;
            }

            .menu-item {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Coffee Shop Menu</h1>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#" id="cart-icon" onclick="showSidebar()">🛒 Cart (<span id="cart-count">0</span>)</a></li>
                    <li><button id="logout-btn" onclick="logout()">Logout</button></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <div class="search-container">
        <input type="text" id="search" placeholder="Search for products..." onkeyup="filterProducts()">
    </div>
    
    <section class="menu">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 40px;">Our Delicious Menu</h2>

            <div class="menu-category">
                <h3>Coffee</h3>
                <div class="menu-items">
                    <div class="menu-item" id="espresso">
                        <img src="Espresso.jpg" alt="Espresso">
                        <div class="menu-description">
                            <h4>Espresso</h4>
                            <p>A strong, rich shot of espresso served in a small cup.</p>
                            <span class="price">$3.00</span>
                            <button class="buy-btn" onclick="orderNow('Espresso', 3.00)">Order Now</button>
                        </div>
                    </div>
                    <div class="menu-item" id="cappuccino">
                        <img src="Cappuccino.jpg" alt="Cappuccino">
                        <div class="menu-description">
                            <h4>Cappuccino</h4>
                            <p>Espresso topped with steamed milk and foam.</p>
                            <span class="price">$4.00</span>
                            <button class="buy-btn" onclick="orderNow('Cappuccino', 4.00)">Order Now</button>
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
                            <button class="buy-btn" onclick="orderNow('Green Tea', 2.50)">Order Now</button>
                        </div>
                    </div>
                    <div class="menu-item" id="chai-latte">
                        <img src="Chai Latte.jpg" alt="Chai Latte">
                        <div class="menu-description">
                            <h4>Chai Latte</h4>
                            <p>A spiced tea latte with a rich blend of flavors.</p>
                            <span class="price">$4.50</span>
                            <button class="buy-btn" onclick="orderNow('Chai Latte', 4.50)">Order Now</button>
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
                            <button class="buy-btn" onclick="orderNow('Croissant', 2.00)">Order Now</button>
                        </div>
                    </div>
                    <div class="menu-item" id="chocolate-muffin">
                        <img src="Chocolate Muffin.jpg" alt="Chocolate Muffin">
                        <div class="menu-description">
                            <h4>Chocolate Muffin</h4>
                            <p>Rich chocolate muffin for a sweet treat.</p>
                            <span class="price">$2.50</span>
                            <button class="buy-btn" onclick="orderNow('Chocolate Muffin', 2.50)">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Sidebar -->
    <div id="cart-sidebar">
        <div class="cart-header">
            <h2>Your Cart</h2>
            <button id="cart-close-btn" onclick="hideSidebar()">×</button>
        </div>
        
        <div id="cart-items"></div>
        
        <p id="empty-cart-message" style="display: none;">Your cart is empty</p>
        
        <div class="cart-summary">
            <p>Total: <span id="cart-total">$0.00</span></p>
            <button id="checkout-btn" onclick="checkout()" disabled>Checkout</button>
        </div>
    </div>

    <div id="checkout-overlay">
        <div class="checkout-container">
            <div class="checkout-header">
                <h2>Checkout</h2>
                <button class="checkout-close" onclick="closeCheckoutOverlay()">×</button>
            </div>
            <div class="checkout-items" id="checkout-items"></div>
            <div class="checkout-total">
                Total: <span id="checkout-total-amount">$0.00</span>
            </div>
            <button class="final-checkout-btn" onclick="processPayment()">Proceed to Payment</button>
        </div>
    </div>


    <footer>
        <p>&copy; 2025 Coffee Shop. All Rights Reserved.</p>
    </footer>
    
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

        // Check Authentication State on Page Load
        firebase.auth().onAuthStateChanged((user) => {
            if (!user) {
                // If no user is logged in, redirect to login page
                window.location.href = 'legister.php';
            }
        });

        // Logout Function
        function logout() {
            firebase.auth().signOut().then(() => {
                // Sign-out successful.
                alert('You have been logged out successfully');
                // Redirect to login page
                window.location.href = 'legister.php';
            }).catch((error) => {
                // An error happened.
                console.error('Logout Error:', error);
                alert('An error occurred during logout. Please try again.');
            });
        }

        // Cart functionality
        let cart = [];

        // Function to add item to cart
        function addToCart(itemName, price) {
            const cartItem = cart.find(item => item.name === itemName);
            
            if (cartItem) {
                cartItem.quantity += 1;
            } else {
                cart.push({
                    name: itemName,
                    price: price,
                    quantity: 1
                });
            }

            updateCartDisplay();
            showSidebar();
        }

        // Update cart display
        function updateCartDisplay() {
            const cartContainer = document.getElementById('cart-items');
            const cartCountElement = document.getElementById('cart-count');
            const cartTotalElement = document.getElementById('cart-total');
            
            // Clear existing cart items
            cartContainer.innerHTML = '';
            
            // Calculate total items and total price
            let totalItems = 0;
            let totalPrice = 0;

            // Populate cart items
            cart.forEach(item => {
                totalItems += item.quantity;
                totalPrice += item.price * item.quantity;

                const cartItemElement = document.createElement('div');
                cartItemElement.classList.add('cart-item');
                cartItemElement.innerHTML = `
                    <span>${item.name}</span>
                    <div class="cart-item-controls">
                        <button onclick="changeQuantity('${item.name}', -1)">-</button>
                        <span>${item.quantity}</span>
                        <button onclick="changeQuantity('${item.name}', 1)">+</button>
                        <span>$${(item.price * item.quantity).toFixed(2)}</span>
                        <button onclick="removeFromCart('${item.name}')">🗑️</button>
                    </div>
                `;
                cartContainer.appendChild(cartItemElement);
            });

            // Update cart count and total
            cartCountElement.textContent = totalItems;
            cartTotalElement.textContent = `$${totalPrice.toFixed(2)}`;

            // Show/hide cart based on items
            const emptyCartMessage = document.getElementById('empty-cart-message');
            const checkoutButton = document.getElementById('checkout-btn');
            if (cart.length === 0) {
                emptyCartMessage.style.display = 'block';
                checkoutButton.disabled = true;
            } else {
                emptyCartMessage.style.display = 'none';
                checkoutButton.disabled = false;
            }
        }

        // Change quantity of an item in cart
        function changeQuantity(itemName, change) {
            const cartItem = cart.find(item => item.name === itemName);
            
            if (cartItem) {
                cartItem.quantity += change;
                
                if (cartItem.quantity <= 0) {
                    cart = cart.filter(item => item.name !== itemName);
                }
                
                updateCartDisplay();
            }
        }

        // Remove item from cart
        function removeFromCart(itemName) {
            cart = cart.filter(item => item.name !== itemName);
            updateCartDisplay();
        }

        // Show sidebar cart
        function showSidebar() {
            document.getElementById('cart-sidebar').classList.add('show-sidebar');
        }

        // Hide sidebar cart
        function hideSidebar() {
            document.getElementById('cart-sidebar').classList.remove('show-sidebar');
        }

        // Checkout function
        function checkout() {
            if (cart.length === 0) {
                alert('Your cart is empty!');
                return;
            }

            // Here you would typically integrate with a payment gateway or backend
            alert('Checkout functionality will be implemented soon!');
            
            // Clear cart after checkout (in a real app, this would happen after successful payment)
            cart = [];
            updateCartDisplay();
            hideSidebar();
        }

        // Product filtering
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

        // Modify existing orderNow function to use addToCart
        function orderNow(itemName, price) {
            addToCart(itemName, price);
        }
        
    </script>
</body>
</html>