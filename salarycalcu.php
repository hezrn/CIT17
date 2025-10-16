<?php
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $basic_salary = $_POST['basic_salary'];
    $allowance = $_POST['allowance'];
    $deduction = $_POST['deduction'];

    if (is_numeric($basic_salary) && is_numeric($allowance) && is_numeric($deduction)) {
        $net_salary = $basic_salary + $allowance - $deduction;
        $result = "Your Net Salary is ₱" . number_format($net_salary, 2);
    } else {
        $result = "Please enter valid numeric values!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Salary Calculator</title>

<style>
/* Gradient animated background with subtle purple */
body {
    margin: 0;
    height: 100vh;
    background: linear-gradient(135deg, #700c52ff, #007f80, #8b0aa1ff, #b96e31ff);
    background-size: 400% 400%;
    animation: bgMove 10s ease infinite;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    font-family: "Poppins", sans-serif;
    color: #222;
}
@keyframes bgMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Floating money symbols */
.symbol {
    position: absolute;
    font-size: 2.5em;
    opacity: 0.15;
    animation: floatMoney 8s linear infinite;
    user-select: none;
}
@keyframes floatMoney {
    0% { transform: translateY(0) rotate(0deg); opacity: 0.3; }
    50% { transform: translateY(-50px) rotate(20deg); opacity: 0.7; }
    100% { transform: translateY(0) rotate(0deg); opacity: 0.3; }
}
.symbol:nth-child(3n) { animation-duration: 12s; color: #ffffff44; }
.symbol:nth-child(2n) { color: #a56eff55; }

/* Polygon container with purple glow */
.container {
    position: relative;
    z-index: 2;
    background: rgba(255, 255, 255, 0.15);
    clip-path: polygon(10% 0%, 90% 0%, 100% 50%, 90% 100%, 10% 100%, 0% 50%);
    padding: 50px 40px;
    text-align: center;
    box-shadow: 0 0 35px rgba(163, 101, 240, 0.3);
    backdrop-filter: blur(15px);
    animation: floatCard 3s ease-in-out infinite alternate;
    width: 420px;
}
@keyframes floatCard {
    0% { transform: translateY(0px) rotate(0deg); }
    100% { transform: translateY(-10px) rotate(0.5deg); }
}

h1 {
    color: #ffffff;
    font-size: 1.9em;
    margin-bottom: 10px;
    text-shadow: 0 0 10px rgba(163, 101, 240, 0.6);
}
p {
    color: #0c0b0bff;
    font-size: 14px;
    margin-bottom: 25px;
}

/* Input design with soft purple glow */
input {
    width: 80%;
    padding: 10px;
    margin: 10px 0;
    border: 2px solid #f4d03f;
    border-radius: 10px;
    outline: none;
    text-align: center;
    font-size: 1em;
    background: rgba(255, 255, 255, 0.85);
    color: #1b3b38;
    transition: 0.3s;
}
input:focus {
    border-color: #a56eff;
    box-shadow: 0 0 10px rgba(165, 110, 255, 0.6);
}

/* Curved button with green-gold base + purple accent hover */
button {
    position: relative;
    background: linear-gradient(135deg, #f4d03f, #00bfa5);
    border: none;
    padding: 12px 45px;
    color: white;
    cursor: pointer;
    font-size: 1em;
    transition: 0.3s;
    border-top-left-radius: 50px;
    border-bottom-right-radius: 50px;
    box-shadow: 0 4px 15px rgba(0, 191, 165, 0.4);
}
button:hover {
    transform: scale(1.05);
    background: linear-gradient(135deg, #a56eff, #00a896);
    box-shadow: 0 0 15px rgba(165, 110, 255, 0.6);
}
button::after {
    content: "→";
    position: absolute;
    right: 18px;
    top: 9px;
    font-size: 1.3em;
    opacity: 0;
    transition: 0.3s;
}
button:hover::after {
    opacity: 1;
    right: 15px;
}

/* Result box with faint purple border */
.result {
    margin-top: 15px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 20px;
    padding: 10px;
    box-shadow: 0 0 15px rgba(165, 110, 255, 0.4);
    border: 2px solid rgba(165, 110, 255, 0.3);
    animation: fadeIn 1s ease forwards;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
</head>
<body>

<!-- Floating symbols -->
<div class="symbol" style="top: 10%; left: 15%;">₱</div>
<div class="symbol" style="top: 30%; left: 75%;">💰</div>
<div class="symbol" style="top: 80%; left: 40%;">💵</div>
<div class="symbol" style="top: 60%; left: 20%;">₱</div>
<div class="symbol" style="top: 50%; left: 85%;">💰</div>

<!-- Main Calculator -->
<div class="container">
    <h1>Salary Calculator</h1>
    <p>Compute your Net Salary below.</p>

    <form method="POST">
        <input type="text" name="basic_salary" placeholder="Enter Basic Salary" required><br>
        <input type="text" name="allowance" placeholder="Enter Allowance" required><br>
        <input type="text" name="deduction" placeholder="Enter Deduction" required><br>
        <button type="submit">Calculate</button>
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
