<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Car Rentals</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Your existing CSS remains unchanged */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        body {
            background: #0a0a0a;
            color: #fff;
            overflow-x: hidden;
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.8);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            margin: 0 15px;
            transition: 0.3s;
        }
        .navbar a:hover {
            color: #ffcc00;
            transform: scale(1.1);
        }
        .navbar .logo {
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        .hero {
            background: url('luxury-car.jpg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        .hero h1 {
            font-size: 50px;
            text-transform: uppercase;
            margin-bottom: 15px;
            z-index: 10;
            position: relative;
        }
        .hero p {
            font-size: 20px;
            margin-bottom: 25px;
            z-index: 10;
            position: relative;
        }
        .explore-btn {
            background: linear-gradient(135deg, #ffcc00, #ff6600);
            color: white;
            padding: 15px 40px;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 5px 20px rgba(255, 102, 0, 0.3);
            z-index: 10;
            position: relative;
        }
        .explore-btn:hover {
            transform: scale(1.1);
            background: linear-gradient(135deg, #ff9900, #ff3300);
        }
        .cars-section {
            padding: 60px;
            text-align: center;
            background: linear-gradient(135deg, #1c1c1c, #000000);
        }
        .cars-section h2 {
            font-size: 42px;
            margin-bottom: 30px;
            color: #ffcc00;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 2px;
        }
        .cars-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 40px;
            justify-content: center;
            padding: 20px;
        }
        .car-box {
            width: 320px;
            height: 400px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            transition: transform 0.4s ease-in-out, box-shadow 0.4s ease-in-out;
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.2);
            cursor: pointer;
            backdrop-filter: blur(15px);
            position: relative;
            overflow: hidden;
        }
        .car-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 30px rgba(255, 204, 0, 0.5), 0 0 50px rgba(255, 204, 0, 0.3);
        }
        .car-box img {
            width: 100%;
            height: 220px;
            border-radius: 15px;
            transition: transform 0.4s ease-in-out;
        }
        .car-box:hover img {
            transform: scale(1.1);
        }
        .car-box h2 {
            font-size: 24px;
            margin: 15px 0;
            color: #ffcc00;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .car-box p {
            font-size: 18px;
            color: #ddd;
            font-weight: 500;
        }
        @keyframes fadeInSlide {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        .car-box {
            animation: fadeInSlide 0.9s ease-in-out forwards;
            opacity: 0;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">RentalX</div>
    <div>
        <a href="#">Home</a>
        <a href="#cars-section">Cars</a>
        <a class="btn btn-mybookings" onclick="window.location.href='mybookings.php'">My Bookings</a>        <a href="login.php" style="color: red;">Logout</a>
    </div>
</div>
<div class="hero">
    <h1>Luxury Car Rentals</h1>
    <p>Find the best cars at affordable rental prices.</p>
    <p>Enjoy your ride with our premium selection.</p>
    <a style="text-decoration: none;" href="#cars-section" class="explore-btn">Explore Cars</a>
</div>

<div class="cars-section" id="cars-section">
    <h2>Available Cars</h2>
    <div class="cars-container">
        <div class="car-box" onclick="redirectToPage('Toyota Fortuner')">
            <img src="for1.jpeg">
            <h2>Fortuner</h2>
            <p>Per Hour: 90 Rupees</p>
        </div>
        <div class="car-box" onclick="redirectToPage('Mahindra XUV700')">
            <img src="xu2.jpeg">
            <h2>XUV700</h2>
            <p>Per Hour: 100 Rupees</p>
        </div>
        <div class="car-box" onclick="redirectToPage('Tata Safari')">
            <img src="tata1.jpeg">
            <h2>Safari</h2>
            <p>Per Hour: 120 Rupees</p>
        </div>
        <div class="car-box" onclick="redirectToPage('Honda City Hybrid')">
            <img src="city1.jpg">
            <h2>City Hybrid</h2>
            <p>Per Hour: 130 Rupees</p>
        </div>
        <div class="car-box" onclick="redirectToPage('Hyundai i20 N Line')">
            <img src="nline1.jpeg">
            <h2>i20 N Line</h2>
            <p>Per Hour: 110 Rupees</p>
        </div>
        <div class="car-box" onclick="redirectToPage('Volkswagen Polo GT')">
            <img src="gt1.jpg">
            <h2>Polo GT</h2>
            <p>Per Hour: 115 Rupees</p>
        </div>
        <div class="car-box" onclick="redirectToPage('Ford Endeavour')">
            <img src="end2.jpg">
            <h2>Endeavour</h2>
            <p>Per Hour: 125 Rupees</p>
        </div>
        <div class="car-box" onclick="redirectToPage('MG Gloster')">
            <img src="mg1.jpeg">
            <h2>Gloster</h2>
            <p>Per Hour: 135 Rupees</p>
        </div>
    </div>
</div>
<script>
    function redirectToPage(car) {
        window.location.href = "rental.php?car=" + encodeURIComponent(car);
    }
</script>

</body>
</html>