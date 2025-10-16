<?php
// PHP Introduction Variables
$name = "Hezreen Jay Abellera";
$age = 20;
$fav_color = "purple";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Introduction</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&family=Poppins:wght@300;500;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      height: 100vh;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      background: radial-gradient(circle at center, #1b1135, #0e0920, #0a0514);
      position: relative;
      color: white;
      font-family: 'Quicksand', sans-serif;
    }

    /* Grid Background */
    .grid {
      position: absolute;
      width: 100%;
      height: 100%;
      background-image: linear-gradient(rgba(255,255,255,0.05) 1px, transparent 1px),
                        linear-gradient(90deg, rgba(255,255,255,0.05) 1px, transparent 1px);
      background-size: 50px 50px;
      animation: moveGrid 15s linear infinite;
      z-index: 0;
    }

    @keyframes moveGrid {
      from { background-position: 0 0, 0 0; }
      to { background-position: 50px 50px, 50px 50px; }
    }

    /* Floating Binary Animation */
    .binary {
      position: absolute;
      font-size: 14px;
      color: rgba(255, 255, 255, 0.15);
      animation: floatBinary linear infinite;
      z-index: 1;
    }

    @keyframes floatBinary {
      0% { transform: translateY(100vh) scale(1); opacity: 0; }
      50% { opacity: 1; }
      100% { transform: translateY(-10vh) scale(1.5); opacity: 0; }
    }

    /* Floating Particles */
    .particle {
      position: absolute;
      width: 6px;
      height: 6px;
      background: rgba(173, 129, 255, 0.8);
      border-radius: 50%;
      animation: floatParticle linear infinite;
      filter: blur(2px);
      z-index: 2;
    }

    @keyframes floatParticle {
      0% { transform: translateY(100vh) translateX(0); opacity: 0; }
      50% { opacity: 1; }
      100% { transform: translateY(-10vh) translateX(20px); opacity: 0; }
    }

    /* Floating gradient orbs for depth */
    .orb {
      position: absolute;
      width: 200px;
      height: 200px;
      background: radial-gradient(circle, rgba(140,82,255,0.4), transparent 70%);
      border-radius: 50%;
      filter: blur(50px);
      animation: floatOrb 12s ease-in-out infinite alternate;
      z-index: 1;
    }

    @keyframes floatOrb {
      0% { transform: translate(0, 0) scale(1); }
      100% { transform: translate(50px, -50px) scale(1.1); }
    }

    /* ✨ Twinkling Stars */
    .star {
      position: absolute;
      width: 4px;
      height: 4px;
      background: white;
      border-radius: 50%;
      animation: twinkle 2s infinite ease-in-out alternate;
      z-index: 0;
      opacity: 0.6;
    }

    @keyframes twinkle {
      from { opacity: 0.3; transform: scale(0.8); }
      to { opacity: 1; transform: scale(1.2); }
    }

    /* 🌙 Rotating Rings */
    .ring {
      position: absolute;
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 50%;
      animation: rotateRing 30s linear infinite;
      z-index: 0;
    }

    .ring:nth-child(1) { width: 500px; height: 500px; top: -100px; left: -100px; }
    .ring:nth-child(2) { width: 700px; height: 700px; bottom: -150px; right: -150px; animation-duration: 40s; }

    @keyframes rotateRing {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* 💫 Floating Geometric Shapes */
    .shape {
      position: absolute;
      opacity: 0.7;
      animation: floatShape linear infinite;
      z-index: 1;
    }

    @keyframes floatShape {
      0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
      20% { opacity: 1; }
      100% { transform: translateY(-10vh) rotate(360deg); opacity: 0; }
    }

    .triangle {
      width: 0;
      height: 0;
      border-left: 20px solid transparent;
      border-right: 20px solid transparent;
      border-bottom: 35px solid rgba(239, 234, 234, 0.96);
    }

    .square {
      width: 25px;
      height: 25px;
      background: rgba(208, 24, 174, 0.4);
      border-radius: 5px;
    }

    .circle {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background: rgba(207, 16, 149, 0.5);
    }

    /* Main Introduction Box */
    .intro-box {
      position: relative;
      z-index: 10;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      padding: 60px 80px;
      border-radius: 20px;
      backdrop-filter: blur(15px);
      box-shadow: 0 0 50px rgba(150, 100, 255, 0.3);
      text-align: center;
      animation: fadeIn 2s ease forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(50px) scale(0.95); }
      to { opacity: 1; transform: translateY(0) scale(1); }
    }

    .intro-box h1 {
      font-size: 2.8rem;
      margin-bottom: 20px;
      color: #cbb4ff;
      letter-spacing: 1px;
    }

    .intro-box p {
      font-size: 1.3rem;
      color: #e5deff;
      margin-bottom: 10px;
      letter-spacing: 0.5px;
    }

    .highlight {
      color: #a58bff;
      font-weight: 700;
    }

    /* Glowing rotating border */
    .intro-box::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: 20px;
      padding: 2px;
      background: linear-gradient(45deg, #a58bff, #8be0ff, #fcb0ff, #a58bff);
      -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
      -webkit-mask-composite: xor;
      mask-composite: exclude;
      animation: rotateGlow 6s linear infinite;
    }

    @keyframes rotateGlow {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

  </style>
</head>
<body>

  <div class="grid"></div>
  <div class="ring"></div>
  <div class="ring"></div>

  <div class="orb" style="top: 10%; left: 10%; background: radial-gradient(circle, rgba(147,83,255,0.4), transparent 70%);"></div>
  <div class="orb" style="bottom: 15%; right: 15%; background: radial-gradient(circle, rgba(95,170,255,0.4), transparent 70%);"></div>

  <!-- PHP Introduction -->
  <div class="intro-box">
    <p style="font-size:1.2rem;">👋 Hi there!</p>
    <h1>I'm <span class="highlight"><?php echo $name; ?></span></h1>
    <p>I’m <span class="highlight"><?php echo $age; ?></span> years old.</p>
    <p>My favorite color is <span class="highlight"><?php echo $fav_color; ?></span>.</p>
  </div>

  <script>
    // Floating binary numbers
    const binaryCount = 40;
    for (let i = 0; i < binaryCount; i++) {
      const binary = document.createElement('div');
      binary.classList.add('binary');
      binary.textContent = Math.random() > 0.5 ? '0' : '1';
      binary.style.left = Math.random() * 100 + 'vw';
      binary.style.animationDuration = 6 + Math.random() * 10 + 's';
      binary.style.animationDelay = Math.random() * 5 + 's';
      document.body.appendChild(binary);
    }

    // Floating particles
    const particleCount = 50;
    for (let i = 0; i < particleCount; i++) {
      const particle = document.createElement('div');
      particle.classList.add('particle');
      particle.style.left = Math.random() * 100 + 'vw';
      particle.style.animationDuration = 7 + Math.random() * 8 + 's';
      particle.style.animationDelay = Math.random() * 5 + 's';
      document.body.appendChild(particle);
    }

    // Twinkling stars
    const starCount = 40;
    for (let i = 0; i < starCount; i++) {
      const star = document.createElement('div');
      star.classList.add('star');
      star.style.left = Math.random() * 100 + 'vw';
      star.style.top = Math.random() * 100 + 'vh';
      star.style.animationDuration = 1 + Math.random() * 3 + 's';
      document.body.appendChild(star);
    }

    // Floating shapes
    const shapeTypes = ['triangle', 'square', 'circle'];
    for (let i = 0; i < 10; i++) {
      const shape = document.createElement('div');
      const type = shapeTypes[Math.floor(Math.random() * shapeTypes.length)];
      shape.classList.add('shape', type);
      shape.style.left = Math.random() * 100 + 'vw';
      shape.style.animationDuration = 10 + Math.random() * 15 + 's';
      shape.style.animationDelay = Math.random() * 5 + 's';
      document.body.appendChild(shape);
    }
  </script>
</body>
</html>
