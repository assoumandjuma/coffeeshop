<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <style>
  
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
}

header {
    background-color: rgb(75, 32, 2);
  color: #fff;
  padding: 10px 0;
  text-align: center;
}

header .logo h1 {
  margin: 0;
  font-size: 2em;
}
.mg

nav ul {
  list-style-type: none;
  padding: 0;
}

nav ul li {
  display: inline;
  margin: 0 15px;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
  font-size: 1.2em;
}

nav ul li a:hover {
  text-decoration: underline;
}

.about {
  padding: 50px 20px;
  text-align: center;
}

.about h2 {
  font-size: 2.5em;
  color: chocolate;
}

.about p {
  font-size: 1.2em;
  color: #581d0331;
  max-width: 800px;
  margin: 20px auto;
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


.team {
  display: flex;
  justify-content: center;
  gap: 30px;
  margin-top: 50px;
  flex-wrap: wrap;
  animation: scaleUpDown 2s ease-in-out infinite;
}


.team-member {
  text-align: center;
}

.team-member img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  object-fit: cover;
}

.team-member h3 {
  margin-top: 10px;
  font-size: 1.5em;
}

.team-member p {
  color: #777;
}

header {
    background-color: rgb(75, 32, 2);
  color: #fff;
  text-align: center;
  padding: 10px 0;
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
 

  <section class="about">
    <h2>About Us</h2>
    <p>We are a team of passionate individuals committed to providing top-quality services to our clients. Our mission is to deliver exceptional value and create lasting relationships with our customers.</p>
    <div class="team">
      <div class="team-member">
        <img src="dd.jpg">
        <h3>ish pop</h3>
        <p>Founder & CEO</p>
      </div>
      <div class="team-member">
        <img src="sz.jpg">
        <h3>casemiro</h3>
        <p>Co-Founder & COO</p>
      </div>
      <div class="team-member">
        <img src="king.jpg">
        <h3>king</h3>
        <p>Lead Developer</p>
      </div>
    </div>
  </section>

  <header>
    <p>&copy; 2025 Company Name. All rights reserved.</p>
  </header>

</body>
</html>
