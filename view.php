<?php
// view.php - Pahina para sa pag-download ng Coco Souvenir Photo sa High Quality
$photo = isset($_GET['photo']) ? basename($_GET['photo']) : '';
$file_path = "uploads/" . $photo;

if (empty($photo) || !file_exists($file_path)) {
    echo "<h2 style='text-align:center; font-family:monospace; margin-top:50px; color:red;'>Photo not found or expired!</h2>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITD & BSD - Coco Souvenir Photo</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            background-color: #0d0202;
            color: #ffcc00;
            font-family: 'Courier New', Courier, monospace;
            text-align: center;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 650px;
            width: 100%;
            margin: auto;
            border: 4px solid #ff9900;
            background: #000;
            padding: 25px 20px;
            border-radius: 12px;
            box-shadow: 0 0 40px rgba(255, 153, 0, 0.6);
        }
        h2 {
            color: #ff3333;
            margin-bottom: 8px;
            text-shadow: 0 0 10px #ff0000;
            font-size: 24px;
        }
        p {
            color: #fff;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .photo-frame {
            width: 100%;
            height: auto;
            border-radius: 8px;
            border: 3px solid #ffcc00;
            margin-bottom: 25px;
            box-shadow: 0 0 20px rgba(255, 204, 0, 0.5);
            display: block;
        }
        .btn-download {
            display: inline-block;
            background: linear-gradient(45deg, #00ff41, #009926);
            color: #000;
            padding: 15px 35px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 8px;
            box-shadow: 0 0 20px #00ff41;
            font-family: inherit;
            transition: 0.2s;
        }
        .btn-download:hover {
            transform: scale(1.05);
            box-shadow: 0 0 30px #00ff41;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>?? YOUR COCO SOUVENIR PHOTO ??</h2>
    <p>IT Department & Banking Solutions Department</p>
    
    <!-- Ipinapakita ang HD image nang buo at malinaw -->
    <img src="<?php echo htmlspecialchars($file_path); ?>" alt="Coco Souvenir" class="photo-frame">
    
    <br>
    <!-- Ginamit ang attribute na download para i-save ang original file -->
    <a href="<?php echo htmlspecialchars($file_path); ?>" download="Coco_Souvenir_HD.jpg" class="btn-download">
        ?? DOWNLOAD HD PHOTO
    </a>
</div>

</body>
</html>