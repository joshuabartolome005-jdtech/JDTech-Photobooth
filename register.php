<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT & BSD - HALLOWEEN REGISTRATION</title>
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
            border: 4px solid #00ff41;
            padding: 50px 60px;
            background-color: #000;
            box-shadow: 0 0 50px #00ff41;
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
            color: #ff0000;
            text-shadow: 0 0 20px #ff0000;
            letter-spacing: 3px;
        }
        p.subtitle {
            font-size: 18px;
            margin-bottom: 35px;
            color: #cccccc;
            letter-spacing: 1.5px;
        }
        form {
            width: 100%;
            max-width: 800px;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }
        .form-group {
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 18px;
            color: #00ff41;
            letter-spacing: 1px;
        }
        input, select {
            width: 100%;
            padding: 18px 20px;
            background: #111;
            border: 3px solid #00ff41;
            color: #00ff41;
            font-family: inherit;
            font-size: 20px;
            outline: none;
            border-radius: 6px;
        }
        input:focus, select:focus {
            box-shadow: 0 0 20px #00ff41;
            background: #0a0a0a;
        }
        button {
            width: 100%;
            padding: 20px;
            background: #ff0000;
            color: #fff;
            border: none;
            font-family: inherit;
            font-size: 22px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 0 25px #ff0000;
            transition: 0.2s;
            letter-spacing: 2px;
            border-radius: 6px;
            margin-top: 10px;
        }
        button:hover {
            background: #cc0000;
            box-shadow: 0 0 35px #ff0000;
        }
        .kiosk-footer {
            border-top: 2px dashed #00ff41;
            padding-top: 20px;
            margin-top: 30px;
            width: 100%;
            max-width: 800px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }
        .kiosk-footer img { width: 45px; height: 45px; object-fit: contain; }
        .kiosk-footer span { font-size: 15px; color: #ffffff; font-weight: bold; letter-spacing: 1.5px; }
    </style>
</head>
<body>

<div class="marquee-container">
    <marquee behavior="scroll" direction="left" scrollamount="7">
        🎃 Happy Halloween from IT Department and BSD Department! 🎃 &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; 
        Looking for a custom software solution for your business, or know someone who is? Whether you need a small-scale system or tailored software development, JDTech Software Solutions is here to help. Reach out to us at: jdtechsolutions0526@gmail.com
    </marquee>
</div>

<div class="kiosk-card">
    <h1>⚠️ IT & BSD ENTRY ⚠️</h1>
    <p class="subtitle">[ SYSTEM RESTRICTED: PLEASE ENTER YOUR CREDENTIALS ]</p>
    
    <form action="roll.php" method="POST">
        <div class="form-group">
            <label>VISITOR / EMPLOYEE NAME:</label>
            <input type="text" name="visitor_name" required placeholder="Enter full name..." autocomplete="off">
        </div>

        <div class="form-group">
            <label>GROUP / DEPARTMENT:</label>
            <select name="department" required>
                <option value="">-- Select Department --</option>
                <option value="ITD">Information Technology Department</option>
                <option value="BSD">Banking Solutions Department</option>
                <option value="AFG">Accounting Finance Group</option>
                <option value="HRD">Human Resources Department</option>
                <option value="ASG">Admin Support Group</option>
                <option value="CMG">Credit Management Group</option>
                <option value="LD">Lending Department</option>
                <option value="RCD">Risk and Compliance Department</option>
                <option value="IAD">Internal Audit Department</option>
                <option value="Guest">External Guest / Client</option>
            </select>
        </div>

        <button type="submit">ENTER & PROCEED ➔</button>
    </form>

    <div class="kiosk-footer">
        <img src="jdlogo.png" alt="JDTech Logo">
        <span>POWERED BY JDTECH SOFTWARE SOLUTIONS</span>
    </div>
</div>

</body>
</html>