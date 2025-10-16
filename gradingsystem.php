<?php
$result = "";
$average = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $math = $_POST['math'];
    $english = $_POST['english'];
    $science = $_POST['science'];

    $average = ($math + $english + $science) / 3;

    if ($average >= 90) {
        $grade = "A";
    } elseif ($average >= 80) {
        $grade = "B";
    } elseif ($average >= 70) {
        $grade = "C";
    } elseif ($average >= 60) {
        $grade = "D";
    } elseif ($average >= 50) {
        $grade = "E";
    } else {
        $grade = "F";
    }

    $result = "Your average is <b>" . number_format($average, 2) . "</b> and your grade is <b>$grade</b>.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Grading System</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kalam:wght@400;700&family=Poppins:wght@400;600&display=swap');

        /* === Body and Background === */
        body {
            margin: 0;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
            background: linear-gradient(135deg, #4b0082, #7a5f45ff, #49064aff, #9c27b0);
            background-size: 300% 300%;
            animation: gradientMove 15s ease infinite;
        }

        /* Animated Gradient Background */
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Floating Letters (A-F) */
        .letter {
            position: absolute;
            font-size: 2.5em;
            font-weight: bold;
            color: rgba(255, 255, 255, 0.15);
            animation: floatLetters 10s ease-in-out infinite;
            user-select: none;
        }

        @keyframes floatLetters {
            0% { transform: translateY(0px) rotate(0deg); opacity: 0.6; }
            50% { transform: translateY(-40px) rotate(20deg); opacity: 1; }
            100% { transform: translateY(0px) rotate(0deg); opacity: 0.6; }
        }

        /* Floating School-related Icons */
        .floating {
            position: absolute;
            color: rgba(255, 255, 255, 0.75);
            font-size: 24px;
            animation: float 12s ease-in-out infinite;
            user-select: none;
        }

        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); opacity: 0.7; }
            50% { transform: translateY(-60px) rotate(180deg); opacity: 1; }
            100% { transform: translateY(0) rotate(360deg); opacity: 0.7; }
        }

        /* Notebook Design */
        .notebook {
            background: #bb9f89ff;
            width: 420px;
            padding: 40px;
            border-radius: 25px 10px 10px 25px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.35);
            position: relative;
            overflow: hidden;
            animation: floatCard 3s ease-in-out infinite alternate;
            z-index: 2;
        }

        @keyframes floatCard {
            0% { transform: translateY(0); }
            100% { transform: translateY(-8px); }
        }

        /* Spiral Binding */
        .notebook::before {
            content: "";
            position: absolute;
            top: 0;
            left: 15px;
            height: 100%;
            width: 8px;
            background: repeating-linear-gradient(
                to bottom,
                #b084cc,
                #591b81ff 15px,
                transparent 15px,
                transparent 30px
            );
            border-radius: 5px;
        }

        /* Notebook Lines */
        .notebook::after {
            content: "";
            position: absolute;
            top: 0;
            left: 40px;
            right: 0;
            height: 100%;
            background: repeating-linear-gradient(
                to bottom,
                #e8eaf6,
                #e8eaf6 2px,
                transparent 30px,
                transparent 32px
            );
            z-index: 0;
        }

        h1 {
            font-family: 'Kalam', cursive;
            color: #0b0a0cff;
            font-size: 35px;
            text-align: center;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }

        label {
            display: block;
            margin: 12px 0 5px;
            color: #4a148c;
            font-weight: 600;
            position: relative;
            z-index: 2;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 2px solid #d1c4e9;
            border-radius: 10px;
            text-align: center;
            font-size: 16px;
            font-family: 'Poppins';
            background: #fafafa;
            transition: 0.3s;
            position: relative;
            z-index: 2;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: #7e57c2;
            background: #fff;
        }

        button {
            margin-top: 25px;
            background: linear-gradient(45deg, #7b1fa2, #ab47bc);
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            position: relative;
            z-index: 2;
            font-weight: 600;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px #ab47bc;
        }

        .result {
            margin-top: 20px;
            color: #311b92;
            font-weight: 600;
            font-size: 18px;
            animation: fadeIn 1s ease-in-out;
            position: relative;
            z-index: 2;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

    </style>
</head>

<body>

    <!-- Floating Letters (A-F) -->
    <div class="letter" style="top:5%; left:10%; animation-delay: 0s;">A</div>
    <div class="letter" style="top:20%; left:80%; animation-delay: 1s;">B</div>
    <div class="letter" style="top:40%; left:15%; animation-delay: 2s;">C</div>
    <div class="letter" style="top:60%; left:70%; animation-delay: 3s;">D</div>
    <div class="letter" style="top:75%; left:25%; animation-delay: 4s;">E</div>
    <div class="letter" style="top:85%; left:50%; animation-delay: 5s;">F</div>

    <!-- Floating School Items -->
    <div class="floating" style="top:10%; left:20%; animation-delay: 0s;">📘</div>
    <div class="floating" style="top:60%; left:10%; animation-delay: 1s;">✏️</div>
    <div class="floating" style="top:30%; left:80%; animation-delay: 2s;">📄</div>
    <div class="floating" style="top:70%; left:70%; animation-delay: 3s;">🧮</div>
    <div class="floating" style="top:40%; left:50%; animation-delay: 4s;">A+</div>
    <div class="floating" style="top:20%; left:60%; animation-delay: 5s;">B</div>
    <div class="floating" style="top:80%; left:40%; animation-delay: 6s;">C</div>
    <div class="floating" style="top:15%; left:75%; animation-delay: 7s;">✂️</div>

    <!-- Notebook Container -->
    <div class="notebook">
        <h1>Simple Grading System</h1>

        <form method="post" action="">
            <label for="math">Math Score:</label>
            <input type="number" name="math" id="math" required>

            <label for="english">English Score:</label>
            <input type="number" name="english" id="english" required>

            <label for="science">Science Score:</label>
            <input type="number" name="science" id="science" required>

            <button type="submit">Compute Grade</button>
        </form>

        <div class="result">
            <?php echo $result; ?>
        </div>
    </div>

</body>
</html>
