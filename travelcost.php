<?php
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $distance = floatval($_POST['distance']);
    $fuel_consumption = floatval($_POST['fuel_consumption']);
    $fuel_price = floatval($_POST['fuel_price']);

    if ($fuel_consumption > 0) {
        $fuel_needed = $distance / $fuel_consumption;
        $cost = $fuel_needed * $fuel_price;
        $result = "Estimated Travel Cost: ₱" . number_format($cost, 2);
    } else {
        $result = "Fuel consumption must be greater than 0.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Travel Cost Estimator</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        height: 100vh;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        animation: skyGradient 10s infinite alternate;
        background: linear-gradient(120deg, #5b2cff, #9d50bb, #0b8945ff);
        background-size: 400% 400%;
    }

    @keyframes skyGradient {
        0% { background: linear-gradient(120deg, #5b2cff, #9d50bb, #2575fc); }
        50% { background: linear-gradient(120deg, #4b2ca6, #ff7eb3, #23a6d5); }
        100% { background: linear-gradient(120deg, #5b2cff, #9d50bb, #2575fc); }
    }

    /* Ticket / Luggage style card */
    .container {
        position: relative;
        width: 440px;
        padding: 30px;
        border-radius: 25px 25px 60px 25px;
        background: linear-gradient(135deg, rgba(127, 29, 159, 0.3), rgba(156, 60, 60, 0.77));
        backdrop-filter: blur(15px);
        box-shadow: 0 0 40px rgba(255,255,255,0.3);
        border: 3px dashed rgba(62, 5, 194, 0.9);
        text-align: center;
        z-index: 2;
        animation: floatCard 4s ease-in-out infinite alternate;
    }

    /* Decorative luggage straps */
    .container::before, .container::after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        width: 15px;
        background: rgba(255,255,255,0.6);
        border-radius: 5px;
        animation: strapMove 3s ease-in-out infinite alternate;
    }

    .container::before { left: 20px; }
    .container::after { right: 20px; }

    @keyframes strapMove {
        0% { transform: translateY(0); opacity: 0.8; }
        100% { transform: translateY(-10px); opacity: 1; }
    }

    @keyframes floatCard {
        0% { transform: translateY(0); }
        100% { transform: translateY(-15px); }
    }

    h1 {
        color: #0f0e0eff;
        margin-bottom: 20px;
        font-size: 1.8em;
        text-shadow: 0 0 10px rgba(248, 241, 241, 0.96);
    }

    input {
        width: 80%;
        padding: 10px;
        margin: 10px;
        border: none;
        border-radius: 10px;
        text-align: center;
        font-size: 1em;
        background: rgba(255,255,255,0.85);
    }

    button {
        background-color: #5b2cff;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 10px;
        cursor: pointer;
        margin-top: 15px;
        transition: 0.3s;
    }

    button:hover {
        background-color: #8b2eff;
        transform: scale(1.05);
    }

    .result {
        margin-top: 20px;
        font-size: 1.3em;
        color: #131111ff;
        text-shadow: 0 0 8px rgba(239, 231, 231, 0.95);
    }

    /* Floating travel icons */
    .floating {
        position: absolute;
        opacity: 0.95;
        z-index: 1;
        animation: moveAcross 35s linear infinite;
        filter: drop-shadow(0 0 10px rgba(255,255,255,0.8));
    }

    @keyframes moveAcross {
        0% { transform: translateY(0) rotate(0deg); opacity: 1; }
        50% { transform: translateY(-40px) rotate(10deg); opacity: 0.9; }
        100% { transform: translateY(0) rotate(-10deg); opacity: 1; }
    }

    /* Scatter positions and sizes */
    .icon1 { top: 10%; left: 5%; width: 100px; animation-delay: 0s; }
    .icon2 { top: 25%; left: 80%; width: 90px; animation-delay: 3s; }
    .icon3 { top: 50%; left: 60%; width: 120px; animation-delay: 6s; }
    .icon4 { top: 70%; left: 15%; width: 110px; animation-delay: 9s; }
    .icon5 { top: 85%; left: 75%; width: 95px; animation-delay: 12s; }
    .icon6 { top: 40%; left: 35%; width: 130px; animation-delay: 15s; }

</style>
</head>
<body>
    <!-- Floating travel elements (larger, scattered, visible) -->
    <img src="https://cdn-icons-png.flaticon.com/512/414/414927.png" class="floating icon1" alt="cloud">
    <img src="https://cdn-icons-png.flaticon.com/512/744/744465.png" class="floating icon2" alt="plane">
    <img src="https://cdn-icons-png.flaticon.com/512/1470/1470926.png" class="floating icon3" alt="car">
    <img src="https://cdn-icons-png.flaticon.com/512/3202/3202926.png" class="floating icon4" alt="bus">
    <img src="https://cdn-icons-png.flaticon.com/512/684/684908.png" class="floating icon5" alt="map pin">
    <img src="https://cdn-icons-png.flaticon.com/512/2331/2331970.png" class="floating icon6" alt="suitcase">

    <div class="container">
        <h1>🚗 Travel Cost Estimator</h1>
        <form method="post">
            <input type="number" name="distance" step="0.01" placeholder="Enter Distance (km)" required><br>
            <input type="number" name="fuel_consumption" step="0.01" placeholder="Fuel Consumption (km/L)" required><br>
            <input type="number" name="fuel_price" step="0.01" placeholder="Fuel Price (₱/L)" required><br>
            <button type="submit">Estimate</button>
        </form>
        <div class="result"><?php echo $result; ?></div>
    </div>
</body>
</html>
