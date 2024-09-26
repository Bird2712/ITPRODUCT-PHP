<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหาชื่อและนามสกุล</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Roboto', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .search-container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 400px; /* ปรับขนาดตามที่ต้องการ */
            max-width: 80%; /* ให้เป็น Responsive */
            text-align: center;
        }

        .search-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .search-container .search-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .search-container label {
            text-align: left;
            margin-bottom: 5px;
            color: #555;
        }

        .search-container input[type="text"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%; /* ให้เต็มความกว้างของพาเรนท์ */
            box-sizing: border-box;
            outline: none;
        }

        .search-container button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            outline: none;
            width: 100%; /* ให้เต็มความกว้างของพาเรนท์ */
            box-sizing: border-box;
        }

        .search-container button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="search-container">
        <h2>กรอกชื่อของคุณ</h2>
        <form method="GET" action="search_proname.php" class="search-form">
            <input type="text" id="search" name="search" placeholder="กรอกชื่อและนามสกุล" required>
            <button type="submit">ไปต่อ</button>
        </form>
    </div>

</body>
</html>
