<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>⚠️ ระบบทวงหนี้ระดับพระกาฬ 9,000,000 IQ ⚠️</title>
    <style>
        /* ตัวอักษร Matrix พื้นหลัง */
        @keyframes matrix {
            0% { background-position: 0% 0%; }
            100% { background-position: 0% 1000%; }
        }
        
        body {
            background: black url('https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExNHJmZzh4M3R6eGZ6eGZ6eGZ6eGZ6eGZ6eGZ6eGZ6eGZ6eGZ6JmVwPXYxX2ludGVybmFsX2dpZl9ieV9pZCZjdD1n/3o7TKMGpxxXFNTG532/giphy.gif');
            color: #0f0;
            font-family: "Comic Sans MS", "Arial Black", cursive;
            cursor: url('https://cur.cursors-4u.net/memes/mem-1/mem12.cur'), auto;
            overflow-x: hidden;
        }

        /* หัวข้อเด้งไปมา */
        .header-meme {
            font-size: 80px;
            text-align: center;
            animation: bounce 0.5s infinite alternate, colorchange 1s infinite;
            text-shadow: 5px 5px #ff0000, -5px -5px #0000ff;
        }

        @keyframes bounce {
            from { transform: scale(1) rotate(-5deg); }
            to { transform: scale(1.2) rotate(5deg); }
        }

        @keyframes colorchange {
            0% { color: yellow; }
            50% { color: #ff00ff; }
            100% { color: #00ffff; }
        }

        /* ตารางสไตล์เว็บขยะยุค 90s */
        table {
            background: rgba(255, 255, 255, 0.9);
            border: 10px groove gold;
            color: #000;
            transform: skew(-2deg);
            margin: 50px auto;
            box-shadow: 50px 50px 0px rgba(255, 0, 255, 0.5);
        }

        th {
            background: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);
            color: white;
            font-size: 30px;
            padding: 20px;
        }

        tr:nth-child(even) { background: #f0f0f0; }
        tr:nth-child(odd) { background: #e0e0e0; }

        tr:hover {
            background: black !important;
            color: #0f0 !important;
            cursor: help;
        }

        /* ปุ่มหลอกลวง */
        .btn-scam {
            display: block;
            width: 300px;
            height: 100px;
            margin: 20px auto;
            background: red;
            color: white;
            font-size: 30px;
            font-weight: bold;
            border: 10px outset #fff;
            cursor: pointer;
            animation: shake 0.1s infinite;
        }

        @keyframes shake {
            0% { margin-left: 0px; }
            50% { margin-left: 10px; }
            100% { margin-left: 0px; }
        }

        /* รูปหมาลอยไปมา */
        .floating-doge {
            position: fixed;
            width: 150px;
            z-index: 999;
            pointer-events: none;
            animation: fly 3s linear infinite;
        }

        @keyframes fly {
            0% { left: -200px; top: 10%; transform: rotate(0deg); }
            100% { left: 110%; top: 80%; transform: rotate(1000deg); }
        }
    </style>
</head>
<body onclick="playMusic()">

<img src="https://www.pngmart.com/files/11/Doge-Meme-PNG-Transparent.png" class="floating-doge">

<div class="header-meme">💸 จ่ายหนี้มาซะดีๆ 💸</div>

<marquee scrollamount="20" style="background: yellow; color: red; font-size: 40px; font-weight: bold;"> 
    ⚠️ ตรวจพบคนไม่ยอมจ่ายหนี้! ⚠️ ตรวจพบคนไม่ยอมจ่ายหนี้! ⚠️ ตรวจพบคนไม่ยอมจ่ายหนี้! ⚠️ 
</marquee>

<button class="btn-scam" onclick="alert('ฝันไปเถอะว่าจะลบให้! จ่ายมาเดี๋ยวนี้!!!'); window.location.href='https://www.youtube.com/watch?v=dQw4w9WgXcQ';">
    CLICK TO DELETE DEBT! <br> (ลบหนี้คลิกที่นี่)
</button>

<?php
require "connect.php";
$sql = "SELECT * FROM customer";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table width="900">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Birthdate</th>
            <th>Email</th>
            <th>Country</th>
            <th>Debt</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td align="center"><b><?php echo $result["CustomerID"]; ?></b></td>
            <td><marquee behavior="slide" direction="left"><?php echo $result["Name"]; ?></marquee></td>
            <td align="center"><?php echo $result["Birthdate"]; ?></td>
            <td><u><?php echo $result["Email"]; ?></u></td>
            <td align="center"><?php echo $result["CountryCode"]; ?></td>
            <td align="right" style="background: yellow; font-size: 25px;">
                <b><?php echo number_format($result["OutstandingDebt"], 2); ?></b>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script>
function playMusic() {
    var audio = new Audio('https://www.soundboard.com/handler/Downloadaudio.ashx?id=612547'); // เพลงปั่นๆ
    audio.play();
}
</script>

<div style="text-align:center;">
    <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExNHJmZzh4M3R6eGZ6eGZ6eGZ6eGZ6eGZ6eGZ6eGZ6eGZ6eGZ6JmVwPXYxX2ludGVybmFsX2dpZl9ieV9pZCZjdD1n/10vXSmTzvg25Yk/giphy.gif" width="300">
    <p style="font-size: 50px;">WOW! SUCH DATABASE! VERY SQL!</p>
</div>

</body>
</html>