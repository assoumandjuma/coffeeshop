<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script src="contact.js"></script>
    <style type="text/css">
        

        h2 {
            text-align: center;
            color: rgb(94, 41, 3);
            margin-bottom: 15px;
        }
     
.logo-text{
    color: #f4f4f4;
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
        }

        ul {
            list-style-type: none;
        }

        a {
            text-decoration: none;
        }

        header .navbar {
            display: flex;
            padding: 20px;
            align-items: center;
            justify-content: space-between;
        }

        .navbar .nav-menu {
            display: flex;
            gap: 10px;
        }

        header {
            width: 100%;
            z-index: 5;
            margin-top: -10px;
            background: var(--primary-color);
        }

        .navbar .nav-menu .nav-link {
            color: white;
            padding: 10px 18px;
            border-radius: 20px;
            font-size: var(--font-size-base);
            transition: 0,3s ease;
        }

        .navbar .nav-menu .nav-link:hover {
            color: white;
            background: var(--secondary-color);
        }

        .hero-section {
            background-color: var(--primary-color);
            min-height: 100vh;
        }

        .hero-section .section-content {
            display: flex;
            align-items: center;
            min-height: 100vh;
            color: white;
            justify-content: space-between;
        }

        @media screen and (max-width: 100px) {
            .navbar .nav-menu {
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
            .navbar .nav-menu .nav-link {
                margin-top: 17px;
                display: block;
                color: black;
                font-size: var(--font-size-large);
            }
        }
    </style> 
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <header>
        <nav class="navbar section-content">
            <a href="#" class="nav-logo">
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
                    <a href="image.php" class="nav-link">Gallery</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="contact-container">
        <div class="contact-header">
            <h1>Get in Touch</h1>
            <p>We'd love to hear from you! Drop us a message below.</p>
        </div>
        
        <form id="contactForm" onsubmit="return false;">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required placeholder="Your name">
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="your@email.com">
            </div>
            
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required placeholder="What's this about?">
            </div>
            
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" required placeholder="Your message here..."></textarea>
            </div>
            
            <button type="submit">Send Message</button>
        </form>
        
        <div class="contact-info">
            <p>☕ Visit us at: 123 Coffee Street, City</p>
            <p>📞 Call us: (555) 123-4567</p>
            <p>⏰ Hours: Mon-Sat 7AM-8PM, Sun 8AM-6PM</p>
        </div>
    </div>

</body>
</html>
