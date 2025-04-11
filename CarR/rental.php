<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Car Rental</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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
            transition: all 0.3s ease;
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
        .rental-section {
            padding: 80px 60px;
            text-align: center;
            background: linear-gradient(135deg, #1c1c1c, #000000);
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 70px);
        }
        .rental-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            max-width: 1300px;
            width: 100%;
            padding: 20px;
            animation: fadeInSlide 0.9s ease-in-out forwards;
        }
        .car-preview {
            width: 450px;
            height: 500px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            transition: transform 0.4s ease-in-out, box-shadow 0.4s ease-in-out;
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            position: relative;
            overflow: hidden;
            border: 1px solid transparent;
            background: linear-gradient(#0a0a0a, #0a0a0a) padding-box,
                        linear-gradient(135deg, #ffcc00, #ff6600) border-box;
        }
        .car-preview:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(255, 204, 0, 0.4), 0 5px 20px rgba(255, 204, 0, 0.2);
            background: linear-gradient(#0a0a0a, #0a0a0a) padding-box,
                        linear-gradient(135deg, #ff9900, #ff3300) border-box;
        }
        .car-preview img {
            width: 100%;
            height: 320px;
            border-radius: 15px;
            transition: transform 0.5s ease-in-out;
            object-fit: cover;
            position: relative;
            z-index: 1;
        }
        .car-preview:hover img {
            transform: scale(1.08);
        }
        .car-preview::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 320px;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), transparent);
            z-index: 2;
            border-radius: 15px 15px 0 0;
        }
        .car-preview h2 {
            font-size: 26px;
            margin: 20px 0 10px;
            color: #ffcc00;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            position: relative;
            z-index: 3;
        }
        .car-preview p {
            font-size: 18px;
            color: #e0e0e0;
            font-weight: 500;
            position: relative;
            z-index: 3;
        }
        .car-preview::after {
            content: 'LUXURY';
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 12px;
            font-weight: 700;
            color: #ffcc00;
            background: rgba(0, 0, 0, 0.7);
            padding: 5px 10px;
            border-radius: 5px;
            z-index: 3;
        }
        .form-box {
            width: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            transition: transform 0.4s ease-in-out, box-shadow 0.4s ease-in-out;
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            animation: fadeInSlide 0.9s ease-in-out forwards;
        }
        .form-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 30px rgba(255, 204, 0, 0.5), 0 0 50px rgba(255, 204, 0, 0.3);
        }
        .form-box h2 {
            font-size: 28px;
            color: #ffcc00;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-size: 16px;
            color: #fff;
            font-weight: 500;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            transition: border 0.3s ease-in-out;
        }
        .form-group input:focus {
            border: 2px solid #ffcc00;
            outline: none;
        }
        .form-group input:read-only {
            background: rgba(255, 255, 255, 0.03);
            color: #ccc;
        }
        .form-group .amount-note {
            font-size: 14px;
            color: #ff6666;
            margin-top: 5px;
        }
        button {
            background: linear-gradient(135deg, #ffcc00, #ff6600);
            color: white;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 5px 20px rgba(255, 102, 0, 0.3);
        }
        button:hover {
            transform: scale(1.1);
            background: linear-gradient(135deg, #ff9900, #ff3300);
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
        @media (max-width: 768px) {
            .rental-container {
                flex-direction: column;
                gap: 20px;
            }
            .car-preview, .form-box {
                width: 100%;
                max-width: 450px;
            }
            .car-preview {
                height: auto;
                padding: 20px;
            }
            .car-preview img {
                height: 280px;
            }
            .car-preview::before {
                height: 280px;
            }
        }
        /* Custom Side-Sliding Popup Styles */
        .custom-popup {
            display: none;
            position: fixed;
            top: 20px;
            right: -400px; /* Start off-screen */
            width: 350px;
            background: rgba(231, 76, 60, 0.9); /* Red for errors */
            color: white;
            padding: 20px;
            border-radius: 10px 0 0 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            animation: slideIn 0.5s forwards, slideOut 0.5s forwards 3s;
        }
        .custom-popup.success {
            background: rgba(39, 174, 96, 0.9); /* Green for success */
        }
        .custom-popup .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
            color: #ccc;
        }
        .custom-popup .close-btn:hover {
            color: #fff;
        }
        @keyframes slideIn {
            from { right: -400px; }
            to { right: 20px; }
        }
        @keyframes slideOut {
            from { right: 20px; }
            to { right: -400px; }
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">RentalX</div>
    <div>
        <a href="dashboard.php">Home</a>
        <a href="dashboard.php#cars-section">Cars</a>
        <a href="payment.php">Pay Now</a>
        <a href="login.php" style="color: red;">Logout</a>
    </div>
</div>

<div class="rental-section">
    <div class="rental-container">
        <div class="car-preview">
            <img id="car-image" src="" alt="Car Image">
            <h2 id="car-title">Luxury Car Rental</h2>
            <p>Price Per Hour: <span id="car-price"></span> Rupees</p>
        </div>
        <div class="form-box">
            <h2>Book Your Ride</h2>
            <form id="rental-form" method="POST" action="bookings.php">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="hidden" name="car_name" id="car_name">
                <input type="hidden" name="car_id" id="car_id">
                <input type="hidden" name="total_amount" id="total_amount">

                <div class="form-group">
                    <label for="pickup">Pickup Date & Time</label>
                    <input type="text" id="pickup" name="pickup_datetime" placeholder="Select pickup time" required>
                </div>

                <div class="form-group">
                    <label for="dropoff">Drop-off Date & Time</label>
                    <input type="text" id="dropoff" name="dropoff_datetime" placeholder="Select drop-off time" required>
                </div>

                <div class="form-group">
                    <label for="amount">Total Amount (₹)</label>
                    <input type="text" id="amount" readonly>
                    <p class="amount-note">50% advance payment required at booking</p>
                </div>

                <button type="submit">Book Now</button>
            </form>
        </div>
    </div>
</div>

<!-- Custom Popup -->
<div class="custom-popup" id="customPopup">
    <span class="close-btn" onclick="closePopup()">×</span>
    <p id="popupMessage"></p>
</div>

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const carName = urlParams.get('car');

    const cars = {
        "Toyota Fortuner": { id: 1, image: "for1.jpeg", price: 90 },
        "Mahindra XUV700": { id: 2, image: "xu2.jpeg", price: 100 },
        "Tata Safari": { id: 3, image: "tata1.jpeg", price: 120 },
        "Honda City Hybrid": { id: 4, image: "city1.jpg", price: 130 },
        "Hyundai i20 N Line": { id: 5, image: "nline1.jpeg", price: 110 },
        "Volkswagen Polo GT": { id: 6, image: "gt1.jpg", price: 115 },
        "Ford Endeavour": { id: 7, image: "end2.jpg", price: 125 },
        "MG Gloster": { id: 8, image: "mg1.jpeg", price: 135 }
    };

    if (cars[carName]) {
        document.getElementById("car-title").innerText = carName;
        document.getElementById("car-image").src = cars[carName].image;
        document.getElementById("car-price").innerText = cars[carName].price;
        document.getElementById("car_id").value = cars[carName].id;
        document.getElementById("car_name").value = carName;
    } else {
        showPopup("Invalid car selection. Returning to homepage.", true);
        setTimeout(() => { window.location.href = "dashboard.php"; }, 3000);
    }

    // Initialize Flatpickr for Pickup
    flatpickr("#pickup", {
        enableTime: true,
        minDate: "today",
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
        onChange: function() {
            validateDates();
            calculateAmount();
        }
    });

    // Initialize Flatpickr for Dropoff
    flatpickr("#dropoff", {
        enableTime: true,
        minDate: "today",
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
        onChange: function() {
            validateDates();
            calculateAmount();
        }
    });

    function validateDates() {
        let pickup = document.getElementById("pickup").value;
        let dropoff = document.getElementById("dropoff").value;
        let now = new Date();

        if (!pickup || !dropoff) {
            showPopup("Please select both pickup and drop-off dates.", true);
            document.getElementById("amount").value = "";
            return false;
        }

        let pickupDate = new Date(pickup);
        let dropoffDate = new Date(dropoff);

        if (isNaN(pickupDate.getTime()) || pickupDate <= now) {
            showPopup("Pickup date must be in the future.", true);
            document.getElementById("pickup").value = "";
            document.getElementById("amount").value = "";
            return false;
        }

        if (isNaN(dropoffDate.getTime()) || dropoffDate <= pickupDate) {
            showPopup("Drop-off must be after pickup.", true);
            document.getElementById("dropoff").value = "";
            document.getElementById("amount").value = "";
            return false;
        }

        return true;
    }

    function calculateAmount() {
        let pickup = new Date(document.getElementById("pickup").value);
        let dropoff = new Date(document.getElementById("dropoff").value);

        if (pickup && dropoff && dropoff > pickup && cars[carName]) {
            let hours = (dropoff - pickup) / (1000 * 60 * 60);
            if (hours > 0) {
                let total = (hours * cars[carName].price).toFixed(2);
                document.getElementById("amount").value = total;
                document.getElementById("total_amount").value = total;
            }
        } else if (!validateDates()) {
            document.getElementById("amount").value = "";
            document.getElementById("total_amount").value = "";
        }
    }

    // Form submission validation
    document.getElementById("rental-form").addEventListener("submit", function(event) {
        if (!validateDates() || !document.getElementById("amount").value) {
            event.preventDefault();
            showPopup("Please fill all fields and ensure dates are valid.", true);
        }
    });

    function showPopup(message, isError = false) {
        const popup = document.getElementById('customPopup');
        const popupMessage = document.getElementById('popupMessage');
        popupMessage.textContent = message;
        popup.className = 'custom-popup' + (isError ? '' : ' success');
        popup.style.display = 'block';
        // Reset animation by toggling display
        setTimeout(() => {
            popup.style.display = 'none';
        }, 3000); // Hide after 3 seconds
    }

    function closePopup() {
        const popup = document.getElementById('customPopup');
        popup.style.display = 'none';
    }
</script>

</body>
</html>