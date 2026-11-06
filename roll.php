<?php
include 'db.php';
date_default_timezone_set('Asia/Manila');

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit();
}

$visitor_name = trim($_POST['visitor_name']);
$department = trim($_POST['department']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROLL A DICE - IT & BSD DEPT</title>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            background-color: #050505;
            color: #00ff41;
            font-family: 'Courier New', Courier, monospace;
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
            overflow: hidden;
            position: relative;
        }
        .marquee-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #1a0000;
            border-bottom: 2px solid #ff0000;
            color: #ff9900;
            padding: 12px 0;
            font-size: 16px;
            font-weight: bold;
            z-index: 1000;
            box-shadow: 0 0 15px #ff0000;
        }
        .kiosk-card {
            border: 4px solid #ffcc00;
            padding: 50px 60px;
            background-color: #000;
            box-shadow: 0 0 50px #ff9900;
            width: 92vw;
            height: 88vh;
            max-width: 1400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            border-radius: 12px;
            margin-top: 30px;
        }
        h1 {
            font-size: 42px;
            margin-bottom: 15px;
            color: #ffcc00;
            text-shadow: 0 0 20px #ff9900;
            letter-spacing: 3px;
        }
        p.welcome-user {
            font-size: 24px;
            color: #ffffff;
            margin-bottom: 40px;
            font-weight: bold;
            text-shadow: 0 0 10px rgba(255,255,255,0.4);
        }

        .dice-container {
            perspective: 600px;
            margin: 30px auto;
            width: 140px;
            height: 140px;
        }
        .dice {
            width: 140px;
            height: 140px;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 1.5s cubic-bezier(0.15, 0.85, 0.35, 1.2);
        }
        .dice-face {
            position: absolute;
            width: 140px;
            height: 140px;
            background: #fff;
            border: 5px solid #ff0000;
            border-radius: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 50px;
            font-weight: bold;
            color: #000;
            box-shadow: inset 0 0 20px rgba(0,0,0,0.3);
        }

        /* 6 sides ng 3D cube na naka-assign ang 2, 3, at 4 */
        .face-front  { transform: rotateY(0deg) translateZ(70px); }
        .face-back   { transform: rotateY(180deg) translateZ(70px); }
        .face-right  { transform: rotateY(90deg) translateZ(70px); }
        .face-left   { transform: rotateY(-90deg) translateZ(70px); }
        .face-top    { transform: rotateX(90deg) translateZ(70px); }
        .face-bottom { transform: rotateX(-90deg) translateZ(70px); }

        .btn-roll {
            background: linear-gradient(45deg, #00ff41, #009926);
            color: #000;
            border: none;
            padding: 20px 45px;
            font-family: inherit;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 0 30px #00ff41;
            transition: 0.2s;
            border-radius: 8px;
            letter-spacing: 2px;
            margin-top: 20px;
        }
        .btn-roll:hover { transform: scale(1.05); box-shadow: 0 0 40px #00ff41; }

        .dice-result-text {
            font-size: 32px;
            color: #00ff41;
            font-weight: bold;
            margin-top: 30px;
            text-shadow: 0 0 15px #00ff41;
            min-height: 45px;
        }
    </style>
</head>
<body>

<div class="marquee-container">
    <marquee behavior="scroll" direction="left" scrollamount="7">
        &#127875; Happy Halloween from IT Department and BSD Department! &#127875; &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; 
        Looking for a custom software solution for your business, or know someone who is? Whether you need a small-scale system or tailored software development, JDTech Software Solutions is here to help. Reach out to us at: jdtechsolutions0526@gmail.com
    </marquee>
</div>

<audio id="clapAudio" src="clap.mp3" preload="auto"></audio>

<div class="kiosk-card">
    <h1>&#127922; CANDY REWARD ROLLER &#127922;</h1>
    <p class="welcome-user">WELCOME, <?php echo htmlspecialchars(strtoupper($visitor_name)); ?> (<?php echo htmlspecialchars(strtoupper($department)); ?>)!</p>

    <div class="dice-container">
        <div class="dice" id="cube">
            <div class="dice-face face-front">2</div>
            <div class="dice-face face-back">3</div>
            <div class="dice-face face-right">4</div>
            <div class="dice-face face-left">2</div>
            <div class="dice-face face-top">3</div>
            <div class="dice-face face-bottom">4</div>
        </div>
    </div>

    <button class="btn-roll" id="rollBtn" onclick="startRolling()">&#127922; TAP TO ROLL A DICE &#127922;</button>

    <div class="dice-result-text" id="diceResultText"></div>

    <form id="finalForm" action="process.php" method="POST">
        <input type="hidden" name="visitor_name" value="<?php echo htmlspecialchars($visitor_name); ?>">
        <input type="hidden" name="department" value="<?php echo htmlspecialchars($department); ?>">
        <input type="hidden" name="dice_roll" id="dice_roll_input" value="">
    </form>
</div>

<script>
function startRolling() {
    const rollBtn = document.getElementById('rollBtn');
    rollBtn.style.display = 'none'; 

    const cube = document.getElementById('cube');
    const resultText = document.getElementById('diceResultText');
    const clapSound = document.getElementById('clapAudio');
    
    resultText.innerText = "Rolling the magic dice...";

    const possibleNumbers = [2, 3, 4];
    const rolledNumber = possibleNumbers[Math.floor(Math.random() * possibleNumbers.length)];
    
    document.getElementById('dice_roll_input').value = rolledNumber;

    let xRand = 360 * 4; 
    let yRand = 360 * 4;

    switch (rolledNumber) {
        case 2: xRand += 0; yRand += 0; break;     // Babagsak sa 2 (front)
        case 3: xRand += 0; yRand += 180; break;   // Babagsak sa 3 (back)
        case 4: xRand += 0; yRand += -90; break;   // Babagsak sa 4 (right)
    }

    cube.style.transform = `rotateX(${xRand}deg) rotateY(${yRand}deg)`;

    setTimeout(() => {
        resultText.innerHTML = `&#127881; YOU ROLLED A ${rolledNumber}! (${rolledNumber} pcs of Mixed Candies)`;
        
        clapSound.currentTime = 0; 
        clapSound.play().catch(e => console.log("Audio play blocked by browser policy:", e));

        confetti({
            particleCount: 180,
            spread: 110,
            origin: { y: 0.6 }
        });

        setTimeout(() => {
            document.getElementById('finalForm').submit();
        }, 4500);

    }, 1600);
}
</script>

</body>
</html>