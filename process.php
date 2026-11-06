<?php
include 'db.php';
date_default_timezone_set('Asia/Manila');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $visitor_name = trim($_POST['visitor_name']);
    $department = trim($_POST['department']);

    $dice_number = isset($_POST['dice_roll']) ? intval($_POST['dice_roll']) : 1;

    switch ($dice_number) {
        case 2:
            $random_curse = "2 pcs of Mixed Candies";
            break;
        case 3:
            $random_curse = "3 pcs of Mixed Candies";
            break;
        case 4:
            $random_curse = "4 pcs of Mixed Candies";
            break;
        default:
            $random_curse = "3 pcs of Mixed Candies";
            break;
    }

    $ticket_number = "1984-" . rand(1000, 9999);

    $stmt = $conn->prepare("INSERT INTO visitor_logs (ticket_number, visitor_name, department, curse_assigned) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $ticket_number, $visitor_name, $department, $random_curse);
    $stmt->execute();
    $stmt->close();
} else {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CANDY REWARD - IT & BSD DEPT</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            background-color: #110000;
            color: #ff3333;
            font-family: 'Courier New', Courier, monospace;
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
            overflow: hidden;
        }
        .ticket {
            border: 4px dashed #ff0000;
            padding: 50px 60px;
            background: #000;
            width: 92vw;
            height: 88vh;
            max-width: 1400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            box-shadow: 0 0 60px #ff0000;
            border-radius: 12px;
        }
        h2 { 
            margin-bottom: 20px; 
            color: #fff; 
            font-size: 42px; 
            letter-spacing: 3px; 
            text-shadow: 0 0 15px rgba(255,255,255,0.4);
        }
        .visitor-greeting {
            font-size: 26px;
            color: #00ff41;
            margin-bottom: 25px;
            font-weight: bold;
            text-shadow: 0 0 12px rgba(0,255,65,0.5);
        }
        .curse-box {
            background-color: #2a0000;
            border: 4px solid #ff9900;
            padding: 40px;
            margin: 20px 0;
            border-radius: 12px;
            box-shadow: 0 0 35px #ff9900;
            width: 100%;
            max-width: 900px;
        }
        .curse-title { 
            font-size: 24px; 
            color: #ffcc00; 
            font-weight: bold; 
            margin-bottom: 15px; 
            letter-spacing: 2px;
        }
        .curse-content { 
            font-size: 45px; 
            font-weight: bold; 
            color: #ffffff; 
            text-shadow: 0 0 20px rgba(255,255,255,0.7);
        }
        a.btn-next {
            display: inline-block;
            margin-top: 30px;
            color: #ffffff;
            text-decoration: none;
            border: 3px solid #ffffff;
            padding: 16px 45px;
            font-weight: bold;
            font-size: 22px;
            border-radius: 8px;
            transition: 0.2s;
        }
        a.btn-next:hover { background: #fff; color: #000; box-shadow: 0 0 20px #fff; }
    </style>
</head>
<body>

<div class="ticket">
    <h2>Happy Halloween from ITD & BSD</h2>
    <div class="visitor-greeting">CONGRATULATIONS, <?php echo htmlspecialchars(strtoupper($visitor_name)); ?>!</div>
    
    <div class="curse-box">
        <div class="curse-title">YOUR ASSIGNED CANDY REWARD IS:</div>
        <div class="curse-content"><?php echo htmlspecialchars($random_curse); ?></div>
    </div>
    
    <a href="index.php" class="btn-next">[ NEXT VISITOR ]</a>
</div>

<script>
    setTimeout(function() {
        window.location.href = "index.php";
    }, 5000);
</script>

</body>
</html>