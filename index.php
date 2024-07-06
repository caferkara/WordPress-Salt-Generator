<!DOCTYPE html>
<html>
<head>
    <title>WordPress Salt Generator</title>
    <style>
        body {
            background-color: #f4f2ef;
            font-family: 'Lato', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        .result-box {
            border: 1px solid #000;
            padding: 20px;
            margin-top: 20px;
            background-color: #fff;
            display: inline-block;
            text-align: left; /* Aligning text to the left */
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>WordPress Salt Generator</h1>
        <form method="post">
            <button type="submit" name="generate">Generate</button>
        </form>
        <?php
        if (isset($_POST['generate'])) {
            echo '<div class="result-box">';
            generateSalts();
            echo '</div>';
        }

        function generateSalts() {
            $salts = array(
                'AUTH_KEY',
                'SECURE_AUTH_KEY',
                'LOGGED_IN_KEY',
                'NONCE_KEY',
                'AUTH_SALT',
                'SECURE_AUTH_SALT',
                'LOGGED_IN_SALT',
                'NONCE_SALT'
            );

            foreach ($salts as $salt) {
                echo '<p>define(\'' . $salt . '\', \'' . generateSalt() . '\');</p>';
            }
        }

        function generateSalt() {
            return bin2hex(random_bytes(32));
        }
        ?>
    </div>
</body>
</html>