<?php
include 'db.php';
date_default_timezone_set('Asia/Manila');

// Handle pag-save ng photo mula sa tablet photobooth
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'save_photo') {
    $webcam_image = $_POST['webcam_image'];
    if (!empty($webcam_image)) {
        $image_parts = explode(";base64,", $webcam_image);
        if (count($image_parts) == 2) {
            $image_base64 = base64_decode($image_parts[1]);
            $photo_filename = "coco_souvenir_" . time() . "_" . rand(100, 999) . ".jpg";
            $file_path = "uploads/" . $photo_filename;

            if (!is_dir('uploads')) {
                mkdir('uploads', 0777, true);
            }
            file_put_contents($file_path, $image_base64);

            $stmt = $conn->prepare("INSERT INTO visitor_logs (ticket_number, visitor_name, department, curse_assigned, photo) VALUES ('COCO-PHOTO', 'TABLET GUEST', 'PHOTOBOOTH', 'Coco Souvenir Photo', ?)");
            $stmt->bind_param("s", $photo_filename);
            $stmt->execute();
            $stmt->close();

            echo json_encode(["status" => "success", "photo" => $photo_filename]);
            exit();
        }
    }
    echo json_encode(["status" => "error"]);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COCO THEMED PHOTOBOOTH - IT & BSD</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            background-color: #0d0202;
            color: #ffcc00;
            font-family: 'Courier New', Courier, monospace;
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px;
            overflow: hidden;
        }
        .booth-container {
            border: 4px solid #ff9900;
            background: #000;
            width: 99vw;
            height: 98vh;
            max-width: 1900px;
            padding: 15px 25px;
            text-align: center;
            box-shadow: 0 0 50px rgba(255, 153, 0, 0.6);
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }
        h1 { font-size: 34px; color: #ff3333; margin-bottom: 2px; text-shadow: 0 0 15px #ff0000; letter-spacing: 2px; }
        p.sub { font-size: 14px; color: #fff; margin-bottom: 10px; letter-spacing: 1px; }

        .btn-coco {
            background: linear-gradient(45deg, #ff3333, #ff9900);
            color: #fff;
            border: none;
            padding: 16px 40px;
            font-size: 20px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 0 25px rgba(255, 153, 0, 0.8);
            transition: 0.2s;
            font-family: inherit;
            margin-top: 10px;
        }
        .btn-coco:hover { transform: scale(1.05); }

        /* Video Container */
        #start-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            flex-grow: 1;
        }
        #start-section video {
            width: 95vw;
            max-width: 1300px;
            height: 70vh;
            object-fit: cover;
            background: #111;
            border-radius: 12px;
            border: 4px solid #ff3333;
            box-shadow: 0 0 40px rgba(255,51,51,0.7);
        }

        /* Frame Wrapper */
        .frame-wrapper {
            position: relative;
            display: inline-block;
            border: 5px solid #ffcc00;
            border-radius: 10px;
            overflow: hidden;
            background: #111;
            box-shadow: 0 0 40px rgba(255, 204, 0, 0.7);
            width: 96vw;
            max-width: 1650px;
        }
        #webcam-preview {
            width: 100%;
            height: 78vh;
            object-fit: cover;
            display: block;
        }
        .overlay-frame-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            object-fit: fill;
            z-index: 10;
        }

        #camera-section, #qr-section { display: none; width: 100%; align-items: center; flex-direction: column; justify-content: center; flex-grow: 1; }
        
        .qr-box {
            background: #fff;
            padding: 12px;
            display: inline-block;
            border-radius: 8px;
            margin-top: 8px;
        }
        .btn-print {
            background: #ff9900;
            color: #000;
            border: none;
            padding: 12px 25px;
            font-weight: bold;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 8px;
            box-shadow: 0 0 15px #ff9900;
        }
        .btn-reset {
            display: inline-block;
            margin-top: 8px;
            background: #00ff41;
            color: #000;
            padding: 12px 25px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
            font-size: 16px;
        }

        .print-only-text {
            display: none;
        }

        /* PRINT STYLES - Pinalitan para pumatok sa Thermal Ticket Printer */
        @media print {
            body { 
                background: #fff !important; 
                color: #000 !important; 
                padding: 0 !important; 
                margin: 0 !important;
                height: auto !important; 
                overflow: visible !important; 
            }
            .booth-container { 
                border: none !important; 
                box-shadow: none !important; 
                width: 100% !important; 
                height: auto !important; 
                max-width: 58mm !important; /* Pinaliliit ang print boundary */
                padding: 0 !important; 
                background: #fff !important; 
                justify-content: center !important;
            }
            h1, p.sub, #start-section, #camera-section, .btn-print, .btn-reset, .print-hide { 
                display: none !important; 
            }
            #qr-section { 
                display: flex !important; 
                flex-direction: column; 
                align-items: center; 
                color: #000 !important; 
            }
            .print-only-text {
                display: block !important;
                font-size: 11px;
                font-weight: bold;
                text-align: center;
                color: #000 !important;
                margin-bottom: 4px;
                text-transform: uppercase;
            }
            .qr-box { 
                background: #fff !important; 
                padding: 2px !important; 
                border: none !important;
            }
            .qr-box img {
                width: 110px !important; /* Pinaliliit ang mismong QR code image sa print */
                height: 110px !important;
                margin: 0 auto;
            }
        }
    </style>
</head>
<body>

<div class="booth-container">
    <div>
        <h1>🎸 COCO SOUVENIR PHOTO BOOTH 🎸</h1>
        <p class="sub">IT Department & Banking Solutions Department</p>
    </div>

    <!-- Initial Start Screen -->
    <div id="start-section">
        <video id="introVideo" autoplay loop playsinline>
            <source src="coco_trailer.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <button class="btn-coco" onclick="startBooth()">📸 CLICK HERE FOR COCO GROUPIE / SELFIE</button>
    </div>

    <!-- Live Camera with image3.png Frame Overlay -->
    <div id="camera-section">
        <div class="frame-wrapper">
            <video id="webcam-preview" autoplay playsinline muted></video>
            <img src="image5.png" alt="Coco Frame" class="overlay-frame-img">
        </div>
        <canvas id="canvas" style="display:none;"></canvas>
        <button class="btn-coco" onclick="takeSnapshot()">✨ SNAP & GET QR CODE ✨</button>
    </div>

    <!-- QR Code Result Section -->
    <div id="qr-section">
        <h3 style="color: #00ff41; margin-bottom: 8px;" class="print-hide">🎉 Awesome! Your Coco Souvenir is Ready!</h3>
        <p style="font-size: 14px; color: #ccc;" class="print-hide">Scan this QR code using your phone camera to download your photo:</p>
        
        <!-- Printable Custom Text Header -->
        <div class="print-only-text" style="font-size: 8px;">🎃 Happy Halloween from ITD and BSD 🎃</div>
        <div style="font-size: 10px; font-weight: bold; margin-bottom: 4px; display: none;" class="print-show">COCO SOUVENIR PHOTO</div>
        
        <div id="qrcode" class="qr-box"></div>
        
        <div style="font-size: 9px; margin-top: 4px; font-weight: bold;" class="print-show">Scan to Download Photo</div>
        
        <button class="btn-print print-hide" onclick="window.print()">🖨️ PRINT QR SOUVENIR TICKET</button>
        <a href="photobooth.php" class="btn-reset print-hide">🔄 TAKE ANOTHER PHOTO</a>
    </div>
</div>

<script>
    let mediaStream = null;

    window.addEventListener('DOMContentLoaded', () => {
        const video = document.getElementById('introVideo');
        video.muted = false; 
        video.play().catch(error => {
            console.log("Autoplay with sound blocked. Waiting for user interaction...");
            document.body.addEventListener('click', () => {
                video.muted = false;
                video.play();
            }, { once: true });
        });
    });

    function startBooth() {
        const videoElement = document.getElementById('introVideo');
        videoElement.pause();

        document.getElementById('start-section').style.display = 'none';
        document.getElementById('camera-section').style.display = 'flex';

        navigator.mediaDevices.getUserMedia({ video: { width: 1280, height: 720 }, audio: false })
            .then(stream => {
                mediaStream = stream;
                document.getElementById('webcam-preview').srcObject = stream;
            })
            .catch(err => {
                alert("Cannot access tablet camera. Please check DroidCam USB connection.");
                location.reload();
            });
    }

    function takeSnapshot() {
        const video = document.getElementById('webcam-preview');
        const canvas = document.getElementById('canvas');
        canvas.width = 1280;
        canvas.height = 720;
        const ctx = canvas.getContext('2d');

        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

        const frameImg = new Image();
        frameImg.src = 'image5.png';
        frameImg.onload = function() {
            ctx.drawImage(frameImg, 0, 0, canvas.width, canvas.height);

            const imageData = canvas.toDataURL('image/jpeg', 0.9);

            if (mediaStream) {
                mediaStream.getTracks().forEach(track => track.stop());
            }

            fetch('photobooth.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `action=save_photo&webcam_image=` + encodeURIComponent(imageData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('camera-section').style.display = 'none';
                    
                    let photoUrl = window.location.origin + window.location.pathname.replace('photobooth.php', '') + "view.php?photo=" + data.photo;
                    document.getElementById("qrcode").innerHTML = "";
                    new QRCode(document.getElementById("qrcode"), {
                        text: photoUrl,
                        width: 140,
                        height: 140
                    });
                    
                    document.getElementById('qr-section').style.display = 'flex';

                    setTimeout(() => {
                        window.print();
                    }, 500);
                }
            })
            .catch(err => {
                console.error(err);
                alert("Error saving photo. Please try again.");
                location.reload();
            });
        };
        
        frameImg.onerror = function() {
            const imageData = canvas.toDataURL('image/jpeg', 0.9);
            if (mediaStream) {
                mediaStream.getTracks().forEach(track => track.stop());
            }
        };
    }
</script>

</body>
</html>