<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gam3Plus+</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    /* Global Styles */
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #121212;
      color: white;
    }

    h1, h2 {
      margin: 0;
      padding: 0;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    /* Top Right Auth Buttons */
    .auth-buttons {
      position: absolute;
      top: 20px;
      right: 30px;
      display: flex;
      gap: 15px;
      z-index: 1000;
    }

    .auth-buttons a {
      background-color: #0077ff;
      color: white;
      padding: 10px 20px;
      font-size: 1rem;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .auth-buttons a:hover {
      background-color: #005bb5;
    }

    /* Hero Section */
    .hero-section {
      background: url('https://via.placeholder.com/1600x900') no-repeat center center;
      background-size: cover;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      position: relative;
    }

    .hero-section h1 {
      font-size: 4rem;
      font-weight: 600;
      color: white;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    .hero-section p {
      font-size: 1.5rem;
      font-weight: 300;
      color: white;
      margin-top: 15px;
    }

    .cta-button {
      background-color: #0077ff;
      color: #fff;
      padding: 12px 35px;
      font-size: 1.2rem;
      margin-top: 25px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .cta-button:hover {
      background-color: #005bb5;
    }

    /* Video Feature Section */
    .video-feature {
      padding: 50px 20px;
      background-color: #1e1e1e;
    }

    .video-container {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      align-items: flex-start;
      justify-content: center;
    }

    .video-container video {
      width: 640px;
      max-width: 100%;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    }

    .video-description {
      max-width: 400px;
      color: #ccc;
      font-size: 1.1rem;
      line-height: 1.6;
    }

    .video-description h2 {
      margin-top: 0;
      color: #fff;
    }

    /* Game Cards Section */
    .games-section {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 20px;
      padding: 50px 20px;
      background-color: #1e1e1e;
    }

    .game-card {
      background-color: #333;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s;
      cursor: pointer;
    }

    .game-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-bottom: 2px solid #444;
    }

    .game-card h3 {
      padding: 15px;
      font-size: 1.5rem;
      color: #fff;
    }

    .game-card p {
      padding: 0 15px 15px;
      font-size: 1rem;
      color: #bbb;
    }

    .game-card:hover {
      transform: scale(1.05);
    }

    /* Carousel Section */
    .carousel-container {
      overflow: hidden;
      white-space: nowrap;
      box-sizing: border-box;
      padding: 40px 0;
      background-color: #1e1e1e;
    }

    .carousel-track {
      display: inline-block;
      animation: scroll 25s linear infinite;
    }

    .carousel-item {
      display: inline-block;
      margin: 0 40px;
      vertical-align: middle;
    }

    .carousel-item img {
      height: 60px;
      filter: brightness(0) invert(1);
      transition: transform 0.3s;
    }

    .carousel-item img:hover {
      transform: scale(1.1);
    }

    @keyframes scroll {
      0% { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }

    @media (max-width: 600px) {
      .carousel-item {
        margin: 0 20px;
      }

      .carousel-item img {
        height: 40px;
      }

      .video-container {
        flex-direction: column;
        align-items: center;
      }
    }

    /* Footer */
    footer {
      text-align: center;
      padding: 30px;
      background-color: #1a1a1a;
      color: #fff;
    }

    footer a {
      color: #0077ff;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <!-- Top Right Login & Sign Up -->
  <div class="auth-buttons">
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Sign Up</a>
  </div>

  <!-- Hero Section -->
  <div class="hero-section">
    <h1>The best Modern gaming experience.</h1>
    <p>Explore the latest PlayStation, Meta games and discover new adventures.</p>
    <button class="cta-button">Browse Games</button>
  </div>

  <!-- 🎥 Video Feature Section -->
  <div class="video-feature">
    <div class="video-container">
      <video controls>
        <source src="your-video.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <div class="video-description">
        <h2>Behind the Game</h2>
        <p>Watch this behind-the-scenes look into how our latest game was created. Featuring interviews with developers, game mechanics breakdowns, and exclusive previews.</p>
      </div>
    </div>
  </div>

  <!-- Featured Games Section -->
  <div class="games-section">
    <div class="game-card">
      <img src="https://via.placeholder.com/300x200" alt="Game 1">
      <h3>Game Title 1</h3>
      <p>Discover the action-packed world of Game 1. Join the adventure today!</p>
    </div>
    <div class="game-card">
      <img src="{{ asset('assets/images/image1.jpg') }}" alt="Game 2">
      <h3>Game Title 2</h3>
      <p>Embark on an epic journey with Game 2. Experience stunning visuals and gameplay.</p>
    </div>
    <div class="game-card">
      <img src="https://via.placeholder.com/300x200" alt="Game 3">
      <h3>Game Title 3</h3>
      <p>Game 3 offers thrilling combat and an engaging story. Are you ready for the challenge?</p>
    </div>
  </div>

  <!-- Company Logo Carousel -->
  <div class="carousel-container">
    <div class="carousel-track">
      <div class="carousel-item"><img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft"></div>
      <div class="carousel-item"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon"></div>
      <div class="carousel-item"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Google.png" alt="Google"></div>
      <div class="carousel-item"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple
 <!-- Duplicate for infinite effect -->
      <div class="carousel-item"><img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft"></div>
      <div class="carousel-item"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon"></div>
      <div class="carousel-item"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Google.png" alt="Google"></div>
      <div class="carousel-item"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple"></div>
      <div class="carousel-item"><img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Meta_Platforms_Inc._logo.svg" alt="Meta"></div>
      <div class="carousel-item"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6f/PlayStation_logo
