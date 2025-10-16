<?php
// Simple Math PHP Task (user enters values)
$sum = $difference = $product = $quotient = null;
$error = null;
$val1 = $val2 = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST['reset'])) {
    // Reset values when Try Again is clicked
    $val1 = $val2 = "";
  } else {
    $val1 = isset($_POST['num1']) ? trim($_POST['num1']) : "";
    $val2 = isset($_POST['num2']) ? trim($_POST['num2']) : "";

    if ($val1 === "" || $val2 === "") {
      $error = "Please enter values in both fields.";
    } elseif (!is_numeric($val1) || !is_numeric($val2)) {
      $error = "Please enter valid numeric values.";
    } else {
      $a = (float)$val1;
      $b = (float)$val2;
      $sum = $a + $b;
      $difference = $a - $b;
      $product = $a * $b;
      $quotient = ($b != 0) ? ($a / $b) : "Undefined (division by zero)";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simple Math Calculator</title>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
  * {margin:0; padding:0; box-sizing:border-box;}

  body {
    font-family: 'Poppins', sans-serif;
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    background: radial-gradient(circle at top left, #5052c675, #5c128c 90%);
    overflow:hidden;
  }

  /* Floating orbs */
  .bg-orb {
    position:absolute;
    width:240px; height:240px;
    border-radius:50%;
    background: radial-gradient(circle, rgba(218, 26, 26, 0.74), transparent 70%);
    filter: blur(70px);
    animation: float 10s ease-in-out infinite alternate;
  }
  .bg-orb:nth-child(1){ top:5%; left:10%; animation-delay:7s;}
  .bg-orb:nth-child(2){ bottom:20%; right:10%; animation-delay:3s;}
  .bg-orb:nth-child(3){ top:70%; left:40%; animation-delay:6s;}
  @keyframes float {
    0% { transform:translateY(0) scale(1);}
    100% { transform:translateY(-25px) scale(1.05);}
  }

  /* Floating numbers and operators */
  .float-item {
    position: absolute;
    color: rgba(1, 0, 0, 0.97);
    font-size: 5rem;
    animation: floatNum 12s linear infinite;
    user-select: none;
  }
  @keyframes floatNum {
    0% {transform: translateY(100vh) rotate(0deg); opacity:0;}
    10% {opacity:0.8;}
    100% {transform: translateY(-100vh) rotate(360deg); opacity:0;}
  }
  .float-item:nth-child(7){ left:10%; animation-delay:0s;}
  .float-item:nth-child(8){ left:25%; animation-delay:2s;}
  .float-item:nth-child(9){ left:10%; animation-delay:0s;}
  .float-item:nth-child(10){ left:70%; animation-delay:6s;}
  .float-item:nth-child(11){ left:85%; animation-delay:8s;}

  /* Card */
  .card {
    position:relative;
    z-index:10;
    width:90%;
    max-width:700px;
    background:rgba(255,255,255,0.2);
    border-radius:20px;
    padding:40px;
    border:2px solid transparent;
    background-clip:padding-box;
    box-shadow:0 0 30px rgba(255,255,255,0.6);
    backdrop-filter:blur(15px);
    animation: fadeIn 1s ease forwards;
  }
  @keyframes fadeIn {
    from {opacity:0; transform:translateY(40px);}
    to {opacity:1; transform:translateY(0);}
  }

  .card::before {
    content:'';
    position:absolute;
    inset:0;
    border-radius:20px;
    padding:2px;
    background:linear-gradient(135deg, #1b3fb7ff, #c25e5eff, #a12f87ff, #5a189a);
    background-size:400% 400%;
    z-index:-1;
    animation: borderGlow 6s ease infinite;
  }
  @keyframes borderGlow {
    0% {background-position:0% 50%;}
    50% {background-position:100% 50%;}
    100% {background-position:0% 50%;}
  }

  h1 {
    text-align:center;
    color:white;
    font-weight:700;
    letter-spacing:1px;
    margin-bottom:10px;
    text-shadow:0 0 15px rgba(255,255,255,0.8);
  }

  p {
    text-align:center;
    color:black;
    margin-bottom:25px;
  }

  form {
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:15px;
  }

  input {
    width:60%;
    max-width:260px;
    padding:12px;
    border-radius:10px;
    border:none;
    outline:none;
    background:rgba(255,255,255,0.9);
    color:black;
    text-align:center;
    font-size:1rem;
    transition:0.3s ease;
  }

  input:focus {
    background:white;
    box-shadow:0 0 15px rgba(7, 7, 7, 0.86);
    transform:scale(1.03);
  }

  button {
    background:linear-gradient(135deg, #c23c3cff, #5438c2ff);
    color:#fff;
    font-weight:600;
    border:none;
    border-radius:12px;
    padding:12px 24px;
    margin-top:10px;
    cursor:pointer;
    box-shadow:0 0 20px rgba(150,70,255,0.4);
    transition:all 0.3s ease;
    animation:pulse 2s infinite alternate;
  }

  button:hover {
    transform:scale(1.07);
    box-shadow:0 0 35px rgba(180,100,255,0.7);
  }

  @keyframes pulse {
    0% {box-shadow:0 0 10px rgba(170,120,255,0.3);}
    100% {box-shadow:0 0 25px rgba(180,100,255,0.6);}
  }

  .results {
    width:100%;
    margin-top:25px;
    background:rgba(255,255,255,0.9);
    border-radius:15px;
    padding:15px 20px;
    display:flex;
    flex-direction:column;
    gap:8px;
    color:black;
    animation: fadeUp 0.6s ease;
  }

  @keyframes fadeUp {
    from {opacity:0; transform:translateY(20px);}
    to {opacity:1; transform:translateY(0);}
  }

  .res-row {
    display:flex;
    justify-content:space-between;
    font-weight:600;
  }
  .res-row .label {color:#2b0c3b;}
  .res-row .value {color:#000;}

  .error {
    color:#ff4081;
    background:rgba(255,120,160,0.1);
    border:1px solid rgba(255,120,160,0.3);
    padding:8px 10px;
    border-radius:8px;
    margin-top:10px;
    font-size:0.95rem;
    text-align:center;
  }

  .try-again {
    background:linear-gradient(135deg, #5c1dbd, #a048f2);
    color:white;
    border:none;
    border-radius:10px;
    padding:10px 20px;
    margin-top:15px;
    cursor:pointer;
    font-weight:600;
    box-shadow:0 0 20px rgba(150,70,255,0.4);
    transition:0.3s ease;
  }
  .try-again:hover {
    transform:scale(1.05);
    background:linear-gradient(135deg, #9b2fe6, #6827b3);
  }
</style>
</head>
<body>
  <!-- Background Decorations -->
  <div class="bg-orb"></div>
  <div class="bg-orb"></div>
  <div class="bg-orb"></div>

  <!-- Floating Numbers and MDAS Symbols -->
  <div class="float-item">+</div>
  <div class="float-item">-</div>
  <div class="float-item">×</div>
  <div class="float-item">÷</div>
  <div class="float-item">=</div>

  <div class="card">
    <h1>Simple Math Calculator 💜</h1>
    <p>Enter two numbers below and see their results instantly.</p>

    <form method="POST">
      <?php if ($sum === null): ?>
        <input type="number" name="num1" step="any" placeholder="Enter first number" value="<?php echo htmlspecialchars($val1); ?>">
        <input type="number" name="num2" step="any" placeholder="Enter second number" value="<?php echo htmlspecialchars($val2); ?>">
        <button type="submit">Calculate</button>
      <?php endif; ?>

      <?php if ($error): ?>
        <div class="error"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>

      <?php if ($sum !== null): ?>
        <div class="results">
          <div class="res-row"><span class="label">Sum:</span><span class="value"><?php echo $sum; ?></span></div>
          <div class="res-row"><span class="label">Difference:</span><span class="value"><?php echo $difference; ?></span></div>
          <div class="res-row"><span class="label">Product:</span><span class="value"><?php echo $product; ?></span></div>
          <div class="res-row"><span class="label">Quotient:</span><span class="value"><?php echo (is_numeric($quotient)?$quotient:$quotient); ?></span></div>
        </div>

        <button type="submit" name="reset" class="try-again">Try Again</button>
      <?php endif; ?>
    </form>
  </div>
</body>
</html>
