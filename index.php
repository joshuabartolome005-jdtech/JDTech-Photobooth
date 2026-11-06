<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT & BSD HELPDESK - COCO EDITION</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            background-color: #000;
            font-family: 'Courier New', Courier, monospace;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        /* Marquee Header Banner */
        .marquee-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #1a0000;
            border-bottom: 2px solid #ff0000;
            color: #ff9900;
            padding: 10px 0;
            font-size: 15px;
            font-weight: bold;
            z-index: 1000;
            box-shadow: 0 0 15px #ff0000;
        }

        .coco-card {
            margin-top: 0px;
            width: 100vw;
            height: 100vh;
            background: url('coco.jpg') no-repeat center center / 100% 100%; 
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            padding-bottom: 40px;
            position: relative;
        }
        .coco-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 40%;
            background: linear-gradient(to top, rgba(0,0,0,0.85), transparent);
            z-index: 1;
        }

       .action-area {
            position: relative;
            z-index: 2;
            text-align: center;
            margin-bottom: 25px; 
        }

        .welcome-title {
            color: #ffcc00;
            font-size: 60px;
            font-weight: bold;
            text-shadow: 0 0 15px #ff9900, 2px 2px 5px #000;
            margin-bottom: 5px;
            letter-spacing: 2px;
        }

        a.btn-enter {
            display: inline-block;
            padding: 16px 36px;
            background: #ff3300;
            color: #ffffff;
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
            border: 3px solid #ffcc00;
            border-radius: 50px;
            box-shadow: 0 0 25px #ff3300;
            transition: all 0.3s ease;
            animation: pulse 1.5s infinite;
            margin-top: 10px;
            margin-bottom: 15px; 
        }

        a.btn-enter:hover {
            background: #ffcc00;
            color: #000;
            border-color: #ff3300;
            transform: scale(1.08);
            box-shadow: 0 0 35px #ffcc00;
        }

        @keyframes pulse {
            0% { transform: scale(1); box-shadow: 0 0 20px #ff3300; }
            50% { transform: scale(1.05); box-shadow: 0 0 30px #ff9900; }
            100% { transform: scale(1); box-shadow: 0 0 20px #ff3300; }
        }

        .footer-brand {
            position: absolute;
            bottom: 12px; 
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(0, 0, 0, 0.8);
            padding: 6px 5px;
            border-radius: 20px;
            border: 1px solid #ff9900;
        }
        .footer-brand img {
            width: 25px;
            height: 25px;
            object-fit: contain;
        }
        .footer-brand span {
            color: #fff;
            font-size: 11px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<audio id="bgm" src="coco_song.mp3" loop preload="auto"></audio>

<div class="marquee-container">
    <marquee behavior="scroll" direction="left" scrollamount="7">
        🌼 WELCOME TO IT & BSD DEPARTMENT — COCO HALLOWEEN EDITION! 🌼 &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; 
        Looking for a custom software solution for your business, or know someone who is? Whether you need a small-scale system or tailored software development, JDTech Software Solutions is here to help. Reach out to us at: jdtechsolutions0526@gmail.com
    </marquee>
</div>

<div class="coco-card">
    <div class="action-area">
        <div class="welcome-title">🌼 BIENVENIDOS A IT & BSD DEPT! 🌼</div>
        <a href="register.php" class="btn-enter">🎸 CLICK TO REGISTER & ENTER 🎸</a>
    </div>

    <div class="footer-brand">
        <img src="jdlogo.png" alt="JDTech Logo">
        <span>POWERED BY JDTECH SOFTWARE SOLUTIONS</span>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var bgm = document.getElementById("bgm");
        bgm.play().catch(function(error) {

            document.addEventListener("click", function() {
                bgm.play();
            }, { once: true });
        });
    });
</script>

</body>
</html>