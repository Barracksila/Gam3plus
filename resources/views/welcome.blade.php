<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        /* Footer Section */
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

    <!-- Hero Section -->
    <div class="hero-section">
        <h1> The best Modern gaming  experience. </h1>
        <p>Explore the latest PlayStation games and discover new adventures.</p>
        <button class="cta-button">Browse Games</button>
    </div>

    <!-- Featured Games Section -->
    <div class="games-section">
        <div class="game-card">
            <img src="https://via.placeholder.com/300x200" alt="Game 1">
            <h3>Game Title 1</h3>
            <p>Discover the action-packed world of Game 1. Join the adventure today!</p>
        </div>
        <div class="game-card">
            <img src="https://via.placeholder.com/300x200" alt="Game 2">
            <h3>Game Title 2</h3>
            <p>Embark on an epic journey with Game 2. Experience stunning visuals and gameplay.</p>
        </div>
        <div class="game-card">
            <img src="https://via.placeholder.com/300x200" alt="Game 3">
            <h3>Game Title 3</h3>
            <p>Game 3 offers thrilling combat and an engaging story. Are you ready for the challenge?</p>
        </div>
        <!-- Add more game cards as necessary -->
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 PlayStation Games | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </footer>

</body>
</html>
