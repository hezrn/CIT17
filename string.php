<?php
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sentence = $_POST['sentence'];

    if (!empty($sentence)) {
        $numChars = strlen($sentence);
        $numWords = str_word_count($sentence);
        $upper = strtoupper($sentence);
        $lower = strtolower($sentence);

        $result = "
        <div class='output-box'>
            <p><strong>Number of Characters:</strong> $numChars</p>
            <p><strong>Number of Words:</strong> $numWords</p>
            <p><strong>Uppercase:</strong> $upper</p>
            <p><strong>Lowercase:</strong> $lower</p>
        </div>";
    } else {
        $result = "<div class='output-box'><p>Please enter a sentence!</p></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>String Manipulation</title>

<style>
/* General Setup */
body {
    margin: 0;
    height: 100vh;
    background: radial-gradient(circle at center, #2a1e8d, #701969ff, #7f1c51ff, #8825d3ff);
    background-size: 400% 400%;
    animation: gradientShift 15s ease infinite;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Poppins", sans-serif;
    overflow: hidden;
}
@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Floating glowing particles */
@keyframes floatParticle {
    0% { transform: translateY(0px); opacity: 0.7; }
    50% { transform: translateY(-25px); opacity: 1; }
    100% { transform: translateY(0px); opacity: 0.7; }
}
.particle {
    position: absolute;
    border-radius: 50%;
    background: rgba(253, 255, 254, 0.93);
    animation: floatParticle 6s ease-in-out infinite;
}
.particle:nth-child(1) { width: 10px; height: 10px; top: 10%; left: 20%; animation-delay: 0s; }
.particle:nth-child(2) { width: 15px; height: 15px; top: 30%; left: 80%; animation-delay: 1s; }
.particle:nth-child(3) { width: 8px; height: 8px; bottom: 20%; right: 15%; animation-delay: 2s; }
.particle:nth-child(4) { width: 12px; height: 12px; top: 70%; left: 40%; animation-delay: 3s; }
.particle:nth-child(5) { width: 18px; height: 18px; bottom: 10%; left: 25%; animation-delay: 1.5s; }

/* Floating symbols */
.symbol {
    position: absolute;
    font-size: 2.2em;
    color: rgba(248, 239, 239, 0.94);
    font-weight: bold;
    user-select: none;
    animation: floatSymbols 10s infinite ease-in-out;
}
.symbol:nth-child(6) { top: 10%; left: 20%; animation-delay: 0s; }
.symbol:nth-child(7) { top: 20%; right: 15%; animation-delay: 2s; }
.symbol:nth-child(8) { bottom: 15%; left: 10%; animation-delay: 3s; }
.symbol:nth-child(9) { bottom: 10%; right: 25%; animation-delay: 4s; }

@keyframes floatSymbols {
    0% { transform: translateY(0) rotate(0deg); opacity: 0.4; }
    50% { transform: translateY(-20px) rotate(15deg); opacity: 0.8; }
    100% { transform: translateY(0) rotate(0deg); opacity: 0.4; }
}

/* Ribbon Banner Container */
.container {
    width: 520px;
    padding: 40px 20px;
    background: rgba(255,255,255,0.28);
    clip-path: polygon(10% 0%, 90% 0%, 100% 50%, 90% 100%, 10% 100%, 0% 50%);
    backdrop-filter: blur(12px);
    box-shadow: 0 0 50px rgba(160,132,220,0.6);
    text-align: center;
    position: relative;
    animation: floatCard 3s ease-in-out infinite alternate;
}
@keyframes floatCard {
    from { transform: translateY(0); }
    to { transform: translateY(-10px); }
}

/* Heading */
h1 {
    color: #fff;
    font-size: 1.9em;
    margin-bottom: 10px;
    margin-top: 0;
}
p {
    color: #1c1c1c;
    font-size: 0.95em;
    margin-bottom: 20px;
}

/* Input field */
input[type="text"] {
    width: 80%;
    padding: 12px;
    border-radius: 25px;
    border: 2px solid #b084cc;
    background: rgba(255, 255, 255, 0.9);
    font-size: 1em;
    text-align: center;
    outline: none;
    position: relative;
    z-index: 2;
    transition: 0.3s;
}
input[type="text"]:focus {
    box-shadow: 0 0 10px #caa8f5;
    border-color: #a084dc;
}

/* Button style */
button {
    margin-top: 15px;
    padding: 10px 30px;
    border: none;
    border-radius: 25px;
    background: linear-gradient(135deg, #a084dc, #caa8f5);
    color: white;
    font-size: 1em;
    cursor: pointer;
    transition: 0.3s;
}
button:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px rgba(192, 155, 255, 0.7);
}

/* Output box */
.output-box {
    margin-top: 15px;
    padding: 10px;
    background: rgba(255, 255, 255, 0.85);
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(144, 92, 200, 0.3);
    color: #333;
    animation: fadeIn 1s ease;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
</head>
<body>

<!-- Floating Particles -->
<div class="particle"></div>
<div class="particle"></div>
<div class="particle"></div>
<div class="particle"></div>
<div class="particle"></div>

<!-- Floating symbols -->
<div class="symbol">@</div>
<div class="symbol">{}</div>
<div class="symbol">$</div>
<div class="symbol">#</div>

<!-- Ribbon Container -->
<div class="container">
    <h1>String Manipulation ✨</h1>
    <p>Enter a sentence to see its character count, word count, and case conversions.</p>

    <form method="POST">
        <input type="text" name="sentence" placeholder="Type your sentence here..." required><br>
        <button type="submit">Process</button>
    </form>

    <?= $result; ?>
</div>

</body>
</html>
