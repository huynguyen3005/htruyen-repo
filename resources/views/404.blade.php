<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Not Found</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea, #170f1f);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            text-align: center;
            animation: fadeIn 2s ease-in-out;
        }

        h1 {
            font-size: 8rem;
            font-weight: 700;
            margin: 0;
            color: #ffd700;
            text-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            animation: bounce 1.5s infinite;
        }

        p {
            font-size: 1.5rem;
            margin: 1rem 0;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 600;
            color: #667eea;
            background: #fff;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background 0.3s, transform 0.2s;
        }

        a:hover {
            background: #f4f4f4;
            transform: translateY(-3px);
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>404</h1>
        <p>Oops! The page you are looking for doesn't exist.</p>
        <a href="/">Go Back Home</a>
    </div>
</body>

</html>
