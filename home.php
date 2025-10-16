<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP Activity Home</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Poppins:wght@400;600&display=swap');

/* === GENERAL STYLES === */
body {
  margin: 0;
  padding: 0;
  height: 100vh;
  font-family: "Poppins", sans-serif;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background: radial-gradient(circle at 20% 20%, #6a11cb, #831089ff, #ce1d78ff);
  background-size: 200% 200%;
  animation: moveBg 12s ease-in-out infinite;
  overflow: hidden;
  position: relative;
}

@keyframes moveBg {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

/* === GRID LINES BACKGROUND (Enhanced Visibility) === */
.grid {
  position: absolute;
  width: 200%;
  height: 200%;
  background: repeating-linear-gradient(
    90deg,
    rgba(255,255,255,0.12) 0,
    rgba(255,255,255,0.12) 2px,
    transparent 2px,
    transparent 100px
  ),
  repeating-linear-gradient(
    0deg,
    rgba(255,255,255,0.12) 0,
    rgba(255,255,255,0.12) 2px,
    transparent 2px,
    transparent 100px
  );
  filter: drop-shadow(0 0 6px rgba(255,255,255,0.15));
  animation: rotateGrid 120s linear infinite;
  z-index: 0;
  opacity: 0.6;
}

@keyframes rotateGrid {
  from { transform: rotate(0deg) scale(1); }
  to { transform: rotate(360deg) scale(1.1); }
}

/* === GLOWING ORBS === */
.orb {
  position: absolute;
  width: 180px;
  height: 180px;
  border-radius: 50%;
  filter: blur(70px);
  opacity: 0.5;
  animation: moveOrb 18s ease-in-out infinite alternate;
  z-index: 0;
}

.orb1 { background: #ff66c4; top: 10%; left: 5%; animation-delay: 0s; }
.orb2 { background: #00ffff; bottom: 15%; right: 10%; animation-delay: 2s; }
.orb3 { background: #ffd700; top: 60%; left: 25%; animation-delay: 4s; }
.orb4 { background: #ff7f50; top: 30%; right: 25%; animation-delay: 6s; }
.orb5 { background: #00ff88; bottom: 25%; left: 10%; animation-delay: 3s; }

@keyframes moveOrb {
  0% { transform: translate(0, 0) scale(1); }
  50% { transform: translate(60px, -60px) scale(1.3); }
  100% { transform: translate(-60px, 60px) scale(1); }
}

/* === FLOATING ICONS === */
.floating {
  position: absolute;
  font-size: 2.5rem;
  opacity: 0.25;
  animation: float 7s ease-in-out infinite;
}

@keyframes float {
  0%, 100% { transform: translateY(0) rotate(0); }
  50% { transform: translateY(-25px) rotate(15deg); }
}

.f1 { top: 10%; left: 8%; animation-delay: 0s; color: #ff66c4; }
.f2 { top: 20%; right: 12%; animation-delay: 2s; color: #00ffff; }
.f3 { bottom: 15%; left: 25%; animation-delay: 3s; color: #ffd700; }
.f4 { bottom: 10%; right: 20%; animation-delay: 4s; color: #ff7f50; }
.f5 { top: 40%; left: 45%; animation-delay: 5s; color: #00ff88; }

/* === SHOOTING STARS === */
.shooting-star {
  position: absolute;
  width: 100px;
  height: 3px;
  background: linear-gradient(90deg, #fff, transparent);
  opacity: 0.9;
  transform: rotate(45deg);
  animation: shoot 6s linear infinite;
  z-index: 1;
}

@keyframes shoot {
  0% {
    transform: translateX(-200px) translateY(-200px) rotate(45deg);
    opacity: 0;
  }
  10% { opacity: 1; }
  100% {
    transform: translateX(100vw) translateY(100vh) rotate(45deg);
    opacity: 0;
  }
}

.s1 { top: 10%; left: -10%; animation-delay: 0s; }
.s2 { top: 40%; left: -15%; animation-delay: 3s; }
.s3 { top: 70%; left: -25%; animation-delay: 6s; }

/* === FLOATING BUBBLES === */
.bubble {
  position: absolute;
  bottom: -100px;
  border-radius: 50%;
  background: rgba(255,255,255,0.4);
  animation: rise 14s infinite ease-in;
  z-index: 0;
}

@keyframes rise {
  0% { transform: translateY(0) scale(0.5); opacity: 0.5; }
  50% { opacity: 0.9; }
  100% { transform: translateY(-120vh) scale(1.4); opacity: 0; }
}

.b1 { left: 10%; width: 35px; height: 35px; animation-delay: 0s; }
.b2 { left: 40%; width: 25px; height: 25px; animation-delay: 2s; }
.b3 { left: 70%; width: 30px; height: 30px; animation-delay: 4s; }
.b4 { left: 85%; width: 40px; height: 40px; animation-delay: 6s; }
.b5 { left: 55%; width: 20px; height: 20px; animation-delay: 8s; }

/* === TITLE === */
h1 {
  color: #070606ff;
  text-shadow: 0 0 20px rgba(255,255,255,0.8);
  font-family: 'Orbitron', sans-serif;
  letter-spacing: 2px;
  font-size: 2.8em;
  margin-bottom: 45px;
  animation: fadeSlide 2s ease;
  z-index: 2;
}

@keyframes fadeSlide {
  from { opacity: 0; transform: translateY(-30px); }
  to { opacity: 1; transform: translateY(0); }
}

/* === CONTAINER === */
.container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 25px;
  width: 85%;
  max-width: 950px;
  text-align: center;
  z-index: 2;
}

/* === CARDS === */
.card {
  background: rgba(128, 100, 193, 0.81);
  backdrop-filter: blur(12px);
  border-radius: 25px;
  padding: 28px;
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  font-size: 1.05em;
  transition: 0.4s ease;
  box-shadow: 0 0 15px rgba(255,255,255,0.2);
  position: relative;
  overflow: hidden;
  z-index: 2;
}

.card::before {
  content: "";
  position: absolute;
  top: -2px;
  left: -2px;
  right: -2px;
  bottom: -2px;
  background: linear-gradient(45deg, #00ffff, #ff66c4, #c471ed, #ffd700);
  background-size: 300% 300%;
  z-index: -1;
  filter: blur(15px);
  opacity: 0;
  transition: opacity 0.4s;
  border-radius: 25px;
}

.card:hover::before {
  opacity: 1;
  animation: glow 4s linear infinite;
}

@keyframes glow {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

.card:hover {
  transform: translateY(-10px) scale(1.05);
  background: rgba(255,255,255,0.25);
  box-shadow: 0 0 25px rgba(255,255,255,0.6);
}

/* === FOOTER === */
footer {
  position: absolute;
  bottom: 10px;
  color: #fff;
  font-size: 0.9em;
  opacity: 0.7;
  letter-spacing: 1px;
  animation: fadeSlide 2s ease-in-out;
  z-index: 2;
}
</style>
</head>

<body>

<!-- Enhanced Grid Background -->
<div class="grid"></div>

<!-- Orbs -->
<div class="orb orb1"></div>
<div class="orb orb2"></div>
<div class="orb orb3"></div>
<div class="orb orb4"></div>
<div class="orb orb5"></div>

<!-- Floating Decorations -->
<div class="floating f1">💻</div>
<div class="floating f2">📘</div>
<div class="floating f3">🧮</div>
<div class="floating f4">💡</div>
<div class="floating f5">⚙️</div>

<!-- Shooting Stars -->
<div class="shooting-star s1"></div>
<div class="shooting-star s2"></div>
<div class="shooting-star s3"></div>

<!-- Floating Bubbles -->
<div class="bubble b1"></div>
<div class="bubble b2"></div>
<div class="bubble b3"></div>
<div class="bubble b4"></div>
<div class="bubble b5"></div>

<h1>CIT17 PHP Exercises</h1>

<div class="container">
  <a href="intro.php" class="card">Introduction</a>
  <a href="simplemath.php" class="card">Simple Math</a>
  <a href="areaandperimeter.php" class="card">Area & Perimeter</a>
  <a href="temp.php" class="card">Temperature Converter</a>
  <a href="swapvariables.php" class="card">Swap Variables</a>
  <a href="salarycalcu.php" class="card">Salary Calculator</a>
  <a href="BMIcalcu.php" class="card">BMI Calculator</a>
  <a href="string.php" class="card">String Manipulation</a>
  <a href="bankacc.php" class="card">Bank Account Simulation</a>
  <a href="gradingsystem.php" class="card">Grading System</a>
  <a href="currency.php" class="card">Currency Converter</a>
  <a href="travelcost.php" class="card">Travel Cost Estimator</a>
</div>


</body>
</html>
