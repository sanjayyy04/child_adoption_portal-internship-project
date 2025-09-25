<?php include('includes/db.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>ChildCare Adoption Center</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style2.css">
</head>
<body>

<header>
  <div class="logo">ChildCare</div>
  <nav>
    <a href="index.php">Home</a>
    <a href="register.php">Register</a>
    <a href="login.php">User Login</a>
    <a href="login.php">Admin Login</a>
    <button id="modeToggle">🌙</button>
  </nav>
</header>


<section class="hero">
  <div class="hero-text">
    <h1>Give a Child a Loving Family</h1>
    <p>Your kindness can change a life. Join our adoption family today!</p>
    <a href="#inquiry-form" class="cta">Submit Inquiry</a>
  </div>
</section>

<section class="about scroll-fade">
  <h2>About Our Center</h2>
  <p>We are dedicated to building families and securing brighter futures for children in need. Our center ensures every adoption process is transparent, ethical, and deeply compassionate. Visit our profiles, inquire, and take the first step toward making a difference.</p>
</section>

<section class="gallery scroll-fade">
  <h2>Our Happy Families & Kids</h2>
  <div class="gallery-grid">
    <img src="assets/images/smile.jpg" alt="Adopted child smiling">
    <img src="assets/images/family.jpg" alt="Family with child">
    <img src="assets/images/playing.jpg" alt="Child playing">
    <img src="assets/images/car.jpg" alt="Caring moment">
  </div>
</section>

<section class="process scroll-fade">
      <h2>How Adoption Works</h2>
  <div class="process-steps">
    <div class="step">
      <h3>1. Browse Profiles</h3>
      <p>Meet the children ready for adoption and find your future family member.</p>
    </div>
    <div class="step">
      <h3>2. Submit Inquiry</h3>
      <p>Send us your preferences and details via the inquiry form below.</p>
    </div>
    <div class="step">
      <h3>3. Meet & Connect</h3>
      <p>Our admin will contact you for an appointment to meet the child.</p>
    </div>
    <div class="step">
      <h3>4. Complete Process</h3>
      <p>Formalize the adoption and welcome your new family member home!</p>
    </div>
  </div>
</section>

<section class="team scroll-fade">
      <h2>Meet Our Admin & Caretakers</h2>
  <div class="team-grid">
    <div class="member">
      <img src="assets/images/admin1.jpg" alt="Admin 1">
      <h4>Sumit Verma</h4>
      <p>Adoption Coordinator</p>
    </div>
    <div class="member">
      <img src="assets/images/admin2.jpg" alt="Admin 2">
      <h4>Rajesh Kumar</h4>
      <p>Childcare Supervisor</p>
    </div>
    <div class="member">
      <img src="assets/images/admin3.jpg" alt="Admin 3">
      <h4>Pooja Sharma</h4>
      <p>Social Worker</p>
    </div>
  </div>
</section>

<section id="inquiry-form" class="form-section scroll-fade">
  <h2>Adoption Inquiry contect</h2>
  <form method="POST" action="pages/user_inquiry.php">
    <input type="text" name="name" placeholder="Your Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="contact" placeholder="Contact Number" required>
    <textarea name="message" placeholder="Your message or preferences" required></textarea>
    <button type="submit">Submit Inquiry</button>
  </form>
</section>

<footer>
  <p>&copy; 2025 ChildCare Adoption Center. All rights reserved.</p>
</footer>

<script>
  const faders = document.querySelectorAll('.scroll-fade');

  const appearOptions = {
    threshold: 0.2
  };

  const appearOnScroll = new IntersectionObserver(function(entries, observer) {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('visible');
      observer.unobserve(entry.target);
    });
  }, appearOptions);

  faders.forEach(fade => {
    appearOnScroll.observe(fade);
  });

   const header = document.querySelector("header");
  window.addEventListener("scroll", () => {
    if (window.scrollY > 30) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }
  });

   const modeToggle = document.getElementById("modeToggle");
  const body = document.body;

  modeToggle.addEventListener("click", () => {
    body.classList.toggle("dark-mode");
    if (body.classList.contains("dark-mode")) {
      modeToggle.textContent = "☀️";
    } else {
      modeToggle.textContent = "🌙";
    }
  });
</script>

</body>
</html>
