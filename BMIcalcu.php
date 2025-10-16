<?php
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    if (is_numeric($weight) && is_numeric($height) && $height > 0) {
        $bmi = $weight / ($height * $height);
        $result = "Your BMI is " . number_format($bmi, 2);
    } else {
        $result = "Please enter valid numbers!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BMI Calculator</title>

<style>
/* Wavy gradient background */
body {
    margin: 0;
    height: 100vh;
    background: linear-gradient(120deg, #264fbfff, #701173ff);
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Poppins", sans-serif;
    position: relative;
}

/* Floating text units (kg, m, cm, ft) */
.unit {
    position: absolute;
    font-size: 2em;
    font-weight: bold;
    color: rgba(241, 238, 238, 1);
    user-select: none;
    animation: floatUnits 10s infinite ease-in-out;
}

/* Top left (cm, ft) */
.unit.cm { top: 8%; left: 10%; animation-delay: 0s; }
.unit.ft { top: 18%; left: 15%; animation-delay: 2s; }

/* Top right (kg, m) */
.unit.kg { top: 10%; right: 15%; animation-delay: 1s; }
.unit.m { top: 20%; right: 10%; animation-delay: 3s; }

@keyframes floatUnits {
    0% { transform: translateY(0) rotate(0deg); opacity: 0.4; }
    50% { transform: translateY(-20px) rotate(10deg); opacity: 0.8; }
    100% { transform: translateY(0) rotate(0deg); opacity: 0.4; }
}

/* Floating wave animation */
.wave {
    position: absolute;
    bottom: 0;
    width: 200%;
    height: 300px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 100%;
    animation: waveMove 8s infinite linear;
}
.wave:nth-child(1) { animation-delay: 0s; }
.wave:nth-child(2) { animation-delay: 2s; opacity: 0.5; }
.wave:nth-child(3) { animation-delay: 4s; opacity: 0.3; }

@keyframes waveMove {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

/* Main circular card */
.container {
    position: relative;
    z-index: 2;
    width: 400px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(20px);
    border-radius: 50%;
    padding: 60px 40px;
    text-align: center;
    box-shadow: 0 0 30px rgba(140, 82, 255, 0.4);
    animation: floatUp 3s ease-in-out infinite alternate;
}
@keyframes floatUp {
    from { transform: translateY(0); }
    to { transform: translateY(-10px); }
}

h1 {
    color: #f6f4f8ff;
    font-size: 1.8em;
    margin-bottom: 8px;
}
p {
    color: #2e2e2e;
    margin-bottom: 20px;
    font-size: 14px;
}

/* Input design */
input {
    width: 80%;
    padding: 10px;
    margin: 8px 0;
    border-radius: 25px;
    border: 2px solid #ba68c8;
    outline: none;
    text-align: center;
    font-size: 1em;
    background: rgba(255, 255, 255, 0.85);
    transition: 0.3s;
}
input:focus {
    border-color: #8e24aa;
    box-shadow: 0 0 10px #ba68c8;
}

/* Button with soft gradient */
button {
    margin-top: 15px;
    padding: 12px 40px;
    border: none;
    border-radius: 30px;
    background: linear-gradient(135deg, #7b1fa2, #ce93d8);
    color: white;
    cursor: pointer;
    font-size: 1em;
    transition: all 0.3s ease;
}
button:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px rgba(155, 89, 182, 0.6);
}

/* Result box */
.result {
    margin-top: 15px;
    background: rgba(255, 255, 255, 0.85);
    border-radius: 20px;
    padding: 10px;
    box-shadow: 0 0 10px rgba(123, 31, 162, 0.3);
    animation: fadeIn 1s ease;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
</head>
<body>

<!-- Floating measurement units -->
<div class="unit cm">cm</div>
<div class="unit ft">ft</div>
<div class="unit kg">kg</div>
<div class="unit m">m</div>

<!-- Background Waves -->
<div class="wave"></div>
<div class="wave"></div>
<div class="wave"></div>

<!-- BMI Calculator -->
<div class="container">
    <h1>BMI Calculator</h1>
    <p>Enter your weight and height below to calculate your BMI.</p>

    <form method="POST">
        <input type="text" name="weight" placeholder="Weight (kg)" required><br>
        <input type="text" name="height" placeholder="Height (m)" required><br>
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
