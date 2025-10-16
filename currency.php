<?php
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];

    if (is_numeric($amount) && $amount > 0) {
        // Example exchange rates
        $rate_usd = 0.018;
        $rate_eur = 0.017;
        $rate_jpy = 2.69;

        switch ($currency) {
            case "USD":
                $converted = $amount * $rate_usd;
                break;
            case "EUR":
                $converted = $amount * $rate_eur;
                break;
            case "JPY":
                $converted = $amount * $rate_jpy;
                break;
            default:
                $converted = 0;
                break;
        }

        $result = "₱" . number_format($amount, 2) . " = " . number_format($converted, 2) . " " . $currency;
    } else {
        $result = "Please enter a valid amount.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Currency Converter</title>
<style>
    body {
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        font-family: 'Poppins', sans-serif;
        animation: gradientShift 10s infinite alternate ease-in-out;
        background: linear-gradient(45deg, #00c853, #a000ea, #932a32, #dde10b);
        background-size: 300% 300%;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Floating Currency Symbols */
    .floating {
        position: absolute;
        font-size: 35px;
        color: rgba(255,255,255,0.7);
        animation: floatSymbols 12s linear infinite;
    }

    @keyframes floatSymbols {
        0% { transform: translateY(100vh) rotate(0deg); opacity: 1; }
        100% { transform: translateY(-10vh) rotate(360deg); opacity: 0; }
    }

    /* Wallet-Shaped Converter Box */
    .converter {
        position: relative;
        background: linear-gradient(145deg, rgba(50, 25, 25, 0.95), rgba(121, 60, 60, 0.85));
        width: 400px;
        padding: 60px 40px 50px;
        text-align: center;
        border-radius: 20px 20px 80px 80px; /* curved bottom corners */
        box-shadow: 0 0 50px rgba(255, 255, 255, 0.25);
        border: 2px solid gold;
        backdrop-filter: blur(10px);
        z-index: 10;
        overflow: hidden;
    }

    /* Wallet Flap */
    .converter::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 50px;
        background: linear-gradient(to bottom, rgba(255, 215, 0, 0.8), rgba(121, 60, 60, 0.8));
        border-bottom: 2px solid gold;
        border-radius: 20px 20px 0 0;
        animation: shineFlap 4s ease-in-out infinite alternate;
    }

    @keyframes shineFlap {
        0% { filter: brightness(1); }
        100% { filter: brightness(1.3); }
    }

    h1 {
        color: #fff;
        margin-bottom: 20px;
        text-shadow: 0 0 10px #f9f9f9;
    }

    label {
        color: #fff;
        display: block;
        margin: 10px 0 5px;
        font-weight: 500;
    }

    input, select {
        width: 80%;
        padding: 10px;
        border-radius: 10px;
        border: none;
        outline: none;
        margin-bottom: 15px;
        background: rgba(255,255,255,0.2);
        color: #fff;
        text-align: center;
        font-size: 16px;
    }

    option {
        color: #333;
    }

    input::placeholder {
        color: rgba(255,255,255,0.8);
    }

    button {
        background: linear-gradient(135deg, #00c853, #00e676);
        border: none;
        padding: 10px 25px;
        border-radius: 15px;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        transform: scale(1.05);
        box-shadow: 0 0 15px #00ff88;
    }

    .result {
        margin-top: 20px;
        color: #fff;
        font-size: 18px;
        font-weight: 600;
        text-shadow: 0 0 8px white;
    }
</style>
</head>
<body>

<!-- Floating Currency Icons -->
<span class="floating" style="left:5%; animation-delay: 0s;">💵</span>
<span class="floating" style="left:20%; animation-delay: 2s;">💶</span>
<span class="floating" style="left:35%; animation-delay: 4s;">💴</span>
<span class="floating" style="left:50%; animation-delay: 6s;">💰</span>
<span class="floating" style="left:70%; animation-delay: 3s;">💸</span>
<span class="floating" style="left:85%; animation-delay: 5s;">🪙</span>

<div class="converter">
    <h1>💱 Currency Converter</h1>
    <form method="post">
        <label>Enter Amount (PHP):</label>
        <input type="text" name="amount" placeholder="Enter amount in ₱">
        
        <label>Convert To:</label>
        <select name="currency">
            <option value="USD">US Dollar (USD)</option>
            <option value="EUR">Euro (EUR)</option>
            <option value="JPY">Japanese Yen (JPY)</option>
        </select>

        <button type="submit">Convert</button>
    </form>

    <div class="result"><?php echo $result; ?></div>
</div>

</body>
</html>
