<?php
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST['a'];
    $b = $_POST['b'];

    $temp = $a;
    $a = $b;
    $b = $temp;

    $result = "A = $a, B = $b";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Swapping Variables</title>

<style>
/* Animated gradient background */
body {
    margin: 0;
    height: 100vh;
    background: linear-gradient(135deg, #5c5c6cff, #500d50ff, #2a3874ff);
    background-size: 400% 400%;
    animation: gradientMove 10s ease infinite;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    font-family: "Poppins", sans-serif;
    color: #333;
}
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Waves */
.wave {
    position: absolute;
    width: 200%;
    height: 200px;
    background: rgba(173, 216, 230, 0.4);
    top: 0;
    left: -50%;
    border-radius: 50%;
    animation: waveMove 8s linear infinite;
    filter: blur(60px);
}
.wave:nth-child(2) {
    animation-delay: 3s;
    background: rgba(155, 155, 255, 0.3);
}
@keyframes waveMove {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Floating arrows */
.arrow {
    position: absolute;
    font-size: 2.5em;
    color: rgba(255, 255, 255, 0.25);
    animation: moveArrow 8s linear infinite;
    user-select: none;
}
@keyframes moveArrow {
    0% { transform: translateY(0) rotate(0deg); opacity: 0.8; }
    50% { transform: translateY(-50px) rotate(20deg); opacity: 0.4; }
    100% { transform: translateY(0) rotate(0deg); opacity: 0.8; }
}
.arrow:nth-child(3n) { color: rgba(150, 120, 255, 0.3); animation-duration: 10s; }

/* Floating binary numbers */
.binary {
    position: absolute;
    color: rgba(255, 255, 255, 0.15);
    font-size: 1.2em;
    animation: floatBinary 6s linear infinite;
    user-select: none;
}
@keyframes floatBinary {
    0% { transform: translateY(0); opacity: 0.8; }
    100% { transform: translateY(-150px); opacity: 0; }
}
.binary:nth-child(even) { animation-delay: 2s; color: rgba(200, 150, 255, 0.2); }

/* Rotating tech icons (code, settings, lightning) */
.icon {
    position: absolute;
    font-size: 2em;
    opacity: 0.15;
    color: white;
    animation: spinIcon 12s linear infinite;
}
@keyframes spinIcon {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
.icon:nth-child(odd) { color: rgba(255, 255, 255, 0.2); }

/* Container Card */
.container {
    position: relative;
    z-index: 2;
    background: rgba(59, 26, 71, 0.8);
    padding: 40px;
    border-radius: 20px;
    backdrop-filter: blur(12px);
    box-shadow: 0 0 25px rgba(0, 150, 136, 0.2);
    width: 380px;
    text-align: center;
    animation: floatCard 3s ease-in-out infinite alternate;
}
@keyframes floatCard {
    0% { transform: translateY(0px); }
    100% { transform: translateY(-10px); }
}

h1 {
    font-size: 1.8em;
    color: #ecf2f2ff;
    margin-bottom: 5px;
}
p {
    color: #0c0a0aff;
    font-size: 14px;
}

input {
    width: 80%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 10px;
    border: 2px solid #80cbc4;
    outline: none;
    text-align: center;
    font-size: 1em;
    background: rgba(255, 255, 255, 0.8);
    color: #0b0a0aff;
    transition: 0.3s;
}
input:focus {
    border-color: #26a69a;
    box-shadow: 0 0 8px rgba(38, 166, 154, 0.5);
}
button {
    background: linear-gradient(135deg, #26a69a, #9575cd);
    border: none;
    padding: 10px 25px;
    border-radius: 25px;
    color: white;
    cursor: pointer;
    font-size: 1em;
    transition: 0.3s;
}
button:hover {
    background: linear-gradient(135deg, #00796b, #7e57c2);
    transform: scale(1.05);
}

/* Swap animation */
.swap-animation {
    margin: 20px auto;
    width: 60px;
    height: 60px;
    position: relative;
    animation: rotateSwap 3s linear infinite;
}
.swap-animation::before, .swap-animation::after {
    content: "⇆";
    position: absolute;
    font-size: 5em;
    color: #0e136bff;
    left: 0;
    right: 0;
    text-align: center;
    opacity: 0.6;
}
.swap-animation::after {
    color: #9575cd;
    transform: rotate(180deg);
}
@keyframes rotateSwap {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Result box */
.result {
    margin-top: 20px;
    background: rgba(239, 240, 244, 0.95);
    border-radius: 15px;
    padding: 15px;
    box-shadow: 0 0 10px rgba(38, 166, 154, 0.3);
    animation: fadeIn 1s ease forwards;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
</head>
<body>

<!-- Waves -->
<div class="wave"></div>
<div class="wave"></div>

<!-- Arrows floating -->
<div class="arrow" style="top:10%; left:20%;">➤</div>
<div class="arrow" style="top:50%; left:10%;">➣</div>
<div class="arrow" style="top:80%; left:75%;">➤</div>
<div class="arrow" style="top:30%; left:60%;">➦</div>

<!-- Binary floating -->
<div class="binary" style="top:80%; left:30%;">101</div>
<div class="binary" style="top:60%; left:50%;">010</div>
<div class="binary" style="top:70%; left:70%;">001</div>
<div class="binary" style="top:50%; left:20%;">111</div>

<!-- Rotating icons -->
<div class="icon" style="top:15%; left:80%;">⚙️</div>
<div class="icon" style="top:70%; left:15%;">💻</div>
<div class="icon" style="top:40%; left:85%;">⚡</div>

<!-- Main Container -->
<div class="container">
    <h1>Swapping Variables</h1>
    <p>Enter values for A and B to swap them using a temporary variable.</p>

    <div class="swap-animation"></div>

    <form method="POST">
        <input type="text" name="a" placeholder="Enter value for A" required><br>
        <input type="text" name="b" placeholder="Enter value for B" required><br>
        <button type="submit">Swap</button>
    </form>

    <?php if ($result !== ""): ?>
    <div class="result">
        <h3>Result:</h3>
        <p><?= $result; ?></p>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
