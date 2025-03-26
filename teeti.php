
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
 

 * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

header {
    background-color: #2c3e50;
    color: white;
    padding: 20px;
    text-align: center;
}

h1 {
    font-size: 2.5rem;
    font-weight: bold;
}

.testimonials {
    padding: 50px 0;
    background-color: #fff;
    text-align: center;
}

.testimonials h2 {
    font-size: 2.2rem;
    color: #2c3e50;
    margin-bottom: 40px;
}


.testimonial-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    justify-items: center;
}

.testimonial-item {
    background-color: #ffffff;
    padding: 20px;
    width: 100%;
    max-width: 300px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease;
}

.testimonial-item:hover {
    transform: translateY(-10px);
}

.profile-img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 20px;
    object-fit: cover;
    transition: 0.5s ease;
}
.profile-img:hover{
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.34);
    width: 200px;
    height: 200px;
    z-index: 999;
    border-radius: 5px;
    margin-bottom: 20px;
    object-fit: cover;
}
.rating {
    color: #f39c12;
    font-size: 1.5rem;
    margin: 10px 0;
}

h4 {
    font-size: 1.2rem;
    color: #2c3e50;
    margin-top: 10px;
}

footer {
    background-color: #2c3e50;
    color: white;
    text-align: center;
    padding: 20px;
    margin-top: 40px;
}

footer p {
    font-size: 1rem;
}

@media (max-width: 768px) {
    .testimonial-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width: 480px) {
    .testimonial-grid {
        grid-template-columns: 1fr;
    }

    h2 {
        font-size: 1.8rem;
    }

    h1 {
        font-size: 2rem;
    }
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
    background-color: chocolate;
    width:100%;


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
li{
    list-style-type: none;
}
a{
    text-decoration: none;
}
   
a:hover{
    text-decoration: underline;
    background: transparent;
}

    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Testimonials - Design 3</title>
    <link rel="stylesheet" href="testimonials.css">
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
                <a href="#" class="nav-link">Testimonials</a>
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
    
    <header>
        <div class="container">
            <h1>Coffee Shop Testimonials</h1>
        </div>
    </header>

    <section class="testimonials">
        <div class="container">
            <h2>What Our Customers Say</h2>
            <div class="testimonial-grid">
                
                <div class="testimonial-item">
                    <img src="sz.jpg" alt="Customer 3" class="profile-img">
                    <p>"The coffee is perfect every time. I recommend it to all my friends!"</p>
                    <div class="rating">
                        &#9733; &#9733; &#9733; &#9733; &#9734;
                    </div>
                    <h4>pogba el casemiro</h4>
                    <p>Austin, TX</p>
                </div>

            
                <div class="testimonial-item">
                    <img src="dd.jpg" alt="Customer 3" class="profile-img">
                    <p>"Such a lovely spot to hang out. I always look forward to my next visit!"</p>
                    <div class="rating">
                        &#9733; &#9733; &#9733; &#9733; &#9733;
                    </div>
                    <h4>ish pop</h4>
                    <p>Boston, MA</p>
                </div>

                
                <div class="testimonial-item">
                    <img src="king.jpg" alt="Customer 3" class="profile-img">
                    <p>"Fantastic atmosphere, delicious coffee, and great people. A must-try!"</p>
                    <div class="rating">
                        &#9733; &#9733; &#9733; &#9733; &#9734;
                    </div>
                    <h4>king</h4>
                    <p>San Diego, CA</p>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonials">
        <div class="container">
            <div class="testimonial-grid">
            
                <div class="testimonial-item">
                    <img src="cf.jpg" alt="Customer 3" class="profile-img">
                    <p>"The coffee is perfect every time. I recommend it to all my friends!"</p>
                    <div class="rating">
                        &#9733; &#9733; &#9733; &#9733; &#9733;
                    </div>
                    <h4>m.keffa</h4>
                    <p>Austin, TX</p>
                </div>

            
                <div class="testimonial-item">
                    <img src="waq.jpg" alt="Customer 3" class="profile-img">
                    <p>"Such a lovely spot to hang out. I always look forward to my next visit!"</p>
                    <div class="rating">
                        &#9733; &#9733; &#9733; &#9733; &#9733;
                    </div>
                    <h4>happy bonheur</h4>
                    <p>Boston, MA</p>
                </div>

                
                <div class="testimonial-item">
                    <img src="xa.jpg" alt="Customer 3" class="profile-img">
                    <p>"Fantastic atmosphere, delicious coffee, and great people. A must-try!"</p>
                    <div class="rating">
                        &#9733; &#9733; &#9733; &#9733; &#9734;
                    </div>
                    <h4>bukungu rapper</h4>
                    <p>San Diego, CA</p>
                </div>
            </div>
        </div>
    </section>
    
    <footer>
        <p>&copy; 2025 Coffee Shop. All Rights Reserved.</p>
    </footer>
</body>
</html>
