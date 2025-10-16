<?php
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $celsius = floatval($_POST['celsius']);
    $fahrenheit = ($celsius * 9/5) + 32;
    $result = "$celsius °C = $fahrenheit °F";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Temperature Converter</title>
<style>
    * {
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        margin: 0;
        height: 100vh;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        background: radial-gradient(circle at 20% 30%, #2b1a3d, #110d1f 80%);
        color: #fff;
        position: relative;
    }

    /* Background moving gradient wave */
    .wave {
        position: absolute;
        width: 200%;
        height: 200%;
        background: conic-gradient(from 90deg, rgba(162, 107, 255, 0.2), rgba(255, 90, 90, 0.15), rgba(173, 140, 255, 0.2));
        animation: rotateWave 20s linear infinite;
        z-index: 0;
    }

    @keyframes rotateWave {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Soft glowing ring effect */
    .ring {
        position: absolute;
        width: 400px;
        height: 400px;
        border-radius: 50%;
        border: 2px solid rgba(255, 99, 99, 0.4);
        filter: blur(3px);
        animation: pulse 4s ease-in-out infinite alternate;
    }

    .ring:nth-child(2) {
        width: 600px;
        height: 600px;
        border-color: rgba(162, 107, 255, 0.3);
        animation-delay: 2s;
    }

    @keyframes pulse {
        0% { transform: scale(1); opacity: 0.6; }
        100% { transform: scale(1.1); opacity: 0.3; }
    }

    /* Floating glowing dots */
    .dot {
        position: absolute;
        width: 10px;
        height: 10px;
        background: radial-gradient(circle, rgba(255, 100, 100, 0.9), transparent);
        border-radius: 50%;
        animation: moveDot 8s ease-in-out infinite alternate;
    }

    .dot:nth-child(3) { top: 15%; left: 20%; animation-delay: 1s; }
    .dot:nth-child(4) { bottom: 10%; right: 25%; animation-delay: 2.5s; }
    .dot:nth-child(5) { top: 60%; left: 70%; animation-delay: 3.5s; }

    @keyframes moveDot {
        0% { transform: translateY(0); opacity: 0.8; }
        100% { transform: translateY(-25px); opacity: 0.4; }
    }

    /* Main container */
    .container {
        position: relative;
        z-index: 5;
        background: rgba(30, 30, 60, 0.8);
        border-radius: 25px;
        border: 2px solid rgba(255, 100, 100, 0.4);
        box-shadow: 0 0 25px rgba(162, 107, 255, 0.4), 0 0 30px rgba(255, 99, 99, 0.3);
        padding: 40px;
        width: 380px;
        text-align: center;
        animation: floatCard 3s ease-in-out infinite alternate;
    }

    @keyframes floatCard {
        0% { transform: translateY(0); }
        100% { transform: translateY(-10px); }
    }

    h1 {
        color: #e0d1ff;
        font-size: 1.7em;
        margin-bottom: 10px;
        letter-spacing: 1px;
    }

    p {
        color: #b8a8d6;
        font-size: 0.95em;
        margin-bottom: 20px;
    }

    input {
        width: 80%;
        padding: 10px;
        margin: 8px 0;
        border-radius: 10px;
        border: 2px solid #9575cd;
        text-align: center;
        background-color: rgba(255,255,255,0.08);
        color: #fff;
        font-size: 1em;
        outline: none;
        transition: 0.3s;
    }

    input:focus {
        border-color: #ff7070;
        box-shadow: 0 0 10px #ff7070;
    }

    button {
        margin-top: 10px;
        background: linear-gradient(135deg, #b388ff, #ff7070);
        border: none;
        color: white;
        padding: 10px 25px;
        border-radius: 25px;
        font-size: 1em;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        transform: scale(1.05);
        box-shadow: 0 0 15px #b388ff, 0 0 20px #ff7070;
    }

    .result {
        margin-top: 20px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 15px;
        box-shadow: 0 0 15px rgba(255, 100, 100, 0.3);
        animation: fadeIn 1s ease forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
</head>
<body>

    <!-- Background animations -->
    <div class="wave"></div>
    <div class="ring"></div>
    <div class="ring"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>

    <!-- Converter card -->
    <div class="container">
        <h1>🌡 Temperature Converter</h1>
        <p>Convert <b>Celsius</b> to <b>Fahrenheit</b></p>

        <form method="POST">
            <input type="number" name="celsius" placeholder="Enter Celsius °C" step="any" required><br>
            <button type="submit">Convert</button>
        </form>

        <?php if ($result): ?>
        <div class="result">
            <h3>✨ Result</h3>
            <p><?= $result; ?></p>
        </div>
        <?php endif; ?>
    </div>

</body>
</html>
