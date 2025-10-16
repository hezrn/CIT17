<?php
$area = $perimeter = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $length = floatval($_POST['length']);
    $width = floatval($_POST['width']);

    if ($length > 0 && $width > 0) {
        $area = $length * $width;
        $perimeter = 2 * ($length + $width);
    } else {
        $error = "⚠️ Please enter valid positive numbers.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rectangle Area & Perimeter</title>
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
        background: radial-gradient(circle at center, #1a1a2e 0%, #0d0d1a 100%);
        position: relative;
        color: #fff;
    }

    /* Subtle moving gradient */
    .animated-bg {
        position: absolute;
        width: 200%;
        height: 200%;
        background: linear-gradient(120deg, rgba(139, 92, 246, 0.25), rgba(255, 99, 99, 0.2), rgba(72, 61, 139, 0.25));
        animation: moveGradient 12s infinite alternate ease-in-out;
        z-index: 0;
    }

    @keyframes moveGradient {
        0% { transform: translate(-15%, -10%) rotate(0deg); }
        100% { transform: translate(15%, 10%) rotate(360deg); }
    }

    /* Animated tech grid background */
    .grid {
        position: absolute;
        width: 100%;
        height: 100%;
        background-image: 
            linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 40px 40px;
        animation: moveGrid 10s linear infinite;
        z-index: 0;
    }

    @keyframes moveGrid {
        0% { background-position: 0 0; }
        100% { background-position: 40px 40px; }
    }

    /* Moving light lines */
    .glow-line {
        position: absolute;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, rgba(255,99,99,0.6), transparent);
        animation: moveLine 7s linear infinite;
        opacity: 0.4;
        z-index: 1;
    }

    .line1 { top: 25%; animation-delay: 0s; }
    .line2 { top: 55%; animation-delay: 2s; }
    .line3 { top: 85%; animation-delay: 4s; }

    @keyframes moveLine {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* Floating orbs */
    .orb {
        position: absolute;
        width: 50px;
        height: 50px;
        background: radial-gradient(circle, rgba(255, 100, 100, 0.7), rgba(0,0,0,0));
        border-radius: 50%;
        animation: floatOrb 10s ease-in-out infinite alternate;
        mix-blend-mode: screen;
        z-index: 1;
    }

    .orb1 { top: 10%; left: 8%; animation-delay: 0s; }
    .orb2 { bottom: 15%; right: 10%; animation-delay: 2s; }
    .orb3 { top: 50%; left: 70%; animation-delay: 3s; }

    @keyframes floatOrb {
        0% { transform: translateY(0) scale(1); opacity: 0.9; }
        100% { transform: translateY(-30px) scale(1.2); opacity: 0.5; }
    }

    /* Floating card container */
    .card {
        position: relative;
        z-index: 3;
        background: rgba(25, 25, 50, 0.75);
        border: 2px solid rgba(187, 134, 252, 0.5);
        backdrop-filter: blur(15px);
        padding: 40px;
        border-radius: 25px;
        width: 380px;
        box-shadow: 0 0 30px rgba(179, 157, 219, 0.5), 0 0 50px rgba(255, 100, 100, 0.2);
        animation: floatCard 4s ease-in-out infinite alternate;
        text-align: center;
    }

    @keyframes floatCard {
        0% { transform: translateY(0px); }
        100% { transform: translateY(-10px); }
    }

    h1 {
        font-size: 1.8em;
        color: #e6ccff;
        margin-bottom: 10px;
        letter-spacing: 1px;
    }

    p {
        color: #b0a7cf;
        font-size: 0.95em;
        margin-bottom: 20px;
    }

    input {
        width: 80%;
        padding: 10px;
        margin: 8px 0;
        border: 2px solid #9575cd;
        border-radius: 10px;
        text-align: center;
        background-color: rgba(255,255,255,0.08);
        color: #fff;
        font-size: 1em;
        outline: none;
        transition: 0.3s;
    }

    input:focus {
        border-color: #ff6f6f;
        box-shadow: 0 0 10px #ff6f6f;
    }

    button {
        margin-top: 10px;
        background: linear-gradient(135deg, #a86fff, #ff6f6f);
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
        box-shadow: 0 0 15px #ff6f6f, 0 0 20px #b388ff;
    }

    .result {
        margin-top: 25px;
        background: rgba(255, 255, 255, 0.1);
        padding: 15px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(255, 99, 99, 0.4);
        animation: fadeIn 1s ease forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .error {
        color: #ff8080;
        margin-top: 10px;
        font-weight: bold;
    }
</style>
</head>
<body>

    <!-- Animated elements -->
    <div class="animated-bg"></div>
    <div class="grid"></div>
    <div class="glow-line line1"></div>
    <div class="glow-line line2"></div>
    <div class="glow-line line3"></div>
    <div class="orb orb1"></div>
    <div class="orb orb2"></div>
    <div class="orb orb3"></div>

    <!-- Main content card -->
    <div class="card">
        <h1>Area and Perimeter of a Rectangle</h1>
        <p>Enter the <b>length</b> and <b>width</b> below to compute the area and perimeter.</p>

        <form method="POST">
            <input type="number" name="length" placeholder="Enter Length" step="any" required><br>
            <input type="number" name="width" placeholder="Enter Width" step="any" required><br>
            <button type="submit">Calculate</button>
        </form>

        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>

        <?php if ($area && $perimeter): ?>
        <div class="result">
            <h3>✨ Results</h3>
            <p><strong>Area:</strong> <?= $area; ?></p>
            <p><strong>Perimeter:</strong> <?= $perimeter; ?></p>
        </div>
        <?php endif; ?>
    </div>

</body>
</html>
