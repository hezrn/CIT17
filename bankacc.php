<?php
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $balance = floatval($_POST['balance']);
    $deposit = floatval($_POST['deposit']);
    $withdraw = floatval($_POST['withdraw']);

    $balance = $balance + $deposit - $withdraw;

    $result = "
    <div class='output-box'>
        <p><strong>Updated Balance:</strong> ₱" . number_format($balance, 2) . "</p>
        <p><strong>Deposit:</strong> ₱" . number_format($deposit, 2) . "</p>
        <p><strong>Withdraw:</strong> ₱" . number_format($withdraw, 2) . "</p>
    </div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bank Account Simulation</title>

<style>
body {
    margin: 0;
    height: 100vh;
    background: radial-gradient(circle at center, #1a0a3d, #240b54, #350f74, #4e1da0);
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Poppins", sans-serif;
    color: white;
}

/* Matrix Number Rain */
canvas {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: transparent;
    z-index: 0;
}

/* Vault-shaped container */
.container {
    position: relative;
    width: 520px;
    padding: 50px 30px;
    background: rgba(255, 255, 255, 0.18);
    border-radius: 50% 10% 50% 10% / 10% 50% 10% 50%;
    backdrop-filter: blur(12px);
    box-shadow: 0 0 50px rgba(160, 132, 220, 0.6);
    text-align: center;
    z-index: 2;
    animation: floatCard 3s ease-in-out infinite alternate;
}
@keyframes floatCard {
    from { transform: translateY(0); }
    to { transform: translateY(-10px); }
}

/* Heading */
h1 {
    font-size: 2em;
    margin-bottom: 10px;
    color: #ffffff;
    text-shadow: 0 0 8px #f0159cff;
}
p {
    font-size: 1em;
    margin-bottom: 20px;
    color: #0b0a0eff;
}

/* Inputs */
input[type="number"] {
    width: 70%;
    padding: 12px;
    margin: 8px 0;
    border: 2px solid #b084cc;
    border-radius: 25px;
    background: rgba(255, 255, 255, 0.9);
    text-align: center;
    font-size: 1em;
    outline: none;
    transition: 0.3s;
}
input[type="number"]:focus {
    box-shadow: 0 0 10px #caa8f5;
    border-color: #a084dc;
}

/* Button */
button {
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
    box-shadow: 0 0 15px rgba(192,155,255,0.7);
}

/* Output Box */
.output-box {
    margin-top: 15px;
    padding: 15px;
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

<!-- Matrix Rain Canvas -->
<canvas id="matrixCanvas"></canvas>

<!-- Main Vault Container -->
<div class="container">
    <h1>Bank Account Simulation</h1>
    <p>Enter your balance, deposit, and withdrawal amount.</p>

    <form method="POST">
        <input type="number" name="balance" placeholder="Initial Balance" required><br>
        <input type="number" name="deposit" placeholder="Deposit Amount" required><br>
        <input type="number" name="withdraw" placeholder="Withdraw Amount" required><br>
        <button type="submit">Update Balance</button>
    </form>

    <?= $result; ?>
</div>

<script>
// MATRIX NUMBER RAIN EFFECT
const canvas = document.getElementById("matrixCanvas");
const ctx = canvas.getContext("2d");

// Set canvas full screen
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// Characters to use (0-9)
const chars = "0123456789";
const fontSize = 18;
const columns = canvas.width / fontSize; // Number of columns
const drops = [];

// Initialize drop positions
for (let x = 0; x < columns; x++) {
  drops[x] = Math.random() * canvas.height;
}

function draw() {
  // Background fade effect
  ctx.fillStyle = "rgba(26, 10, 61, 0.1)";
  ctx.fillRect(0, 0, canvas.width, canvas.height);

  // Text color and style
  ctx.fillStyle = "#caa8f5"; // light purple numbers
  ctx.font = fontSize + "px monospace";

  // Draw the numbers
  for (let i = 0; i < drops.length; i++) {
    const text = chars[Math.floor(Math.random() * chars.length)];
    ctx.fillText(text, i * fontSize, drops[i] * fontSize);

    // Move drop down
    if (drops[i] * fontSize > canvas.height && Math.random() > 0.975)
      drops[i] = 0;

    drops[i]++;
  }
}

// Animation loop
setInterval(draw, 50);

// Adjust canvas on resize
window.addEventListener("resize", () => {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
});
</script>

</body>
</html>
