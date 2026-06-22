<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Favorite Colors</title>
    <style>
        :root {
            color-scheme: light;
            --bg-start: #fff0f6;
            --bg-end: #ffe6f2;
            --card: rgba(255, 247, 251, 0.95);
            --text: #3b122b;
            --muted: #7a2a50;
            --accent: #e83e8c;
            --accent-dark: #c81d6f;
            --border: #f4d7e8;
        }


        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;
            min-height: 100vh;
            font-family: Georgia, "Times New Roman", serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(232, 62, 140, 0.12), transparent 34%),
                radial-gradient(circle at bottom right, rgba(255, 82, 147, 0.14), transparent 30%),
                linear-gradient(135deg, var(--bg-start), var(--bg-end));
            display: grid;
            place-items: center;
            padding: 32px 16px;
        }


        .card {
            width: min(100%, 520px);
            background: var(--card);
            border: 1px solid rgba(244, 215, 232, 0.95);
            border-radius: 24px;
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.12);
            backdrop-filter: blur(10px);
            padding: 32px;
        }


        .eyebrow {
            margin: 0 0 8px;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--accent);
        }


        h2 {
            margin: 0 0 10px;
            font-size: clamp(1.7rem, 3vw, 2.2rem);
            line-height: 1.1;
        }


        .description {
            margin: 0 0 24px;
            color: var(--muted);
            line-height: 1.6;
        }


        form {
            display: grid;
            gap: 12px;
        }


        .field {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 14px 16px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.92);
            color: var(--text);
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        }


        .field::placeholder {
            color: #8a94ad;
        }


        .field:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(232, 62, 140, 0.12);
            transform: translateY(-1px);
        }


        .actions {
            margin-top: 6px;
        }


        .button {
            width: 100%;
            border: none;
            border-radius: 14px;
            padding: 14px 18px;
            font-size: 1rem;
            font-weight: 700;
            color: white;
            background: linear-gradient(135deg, var(--accent), var(--accent-dark));
            box-shadow: 0 14px 28px rgba(232, 62, 140, 0.28);
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }


        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 34px rgba(232, 62, 140, 0.32);
        }


        .button:active {
            transform: translateY(0);
        }


        @media (max-width: 520px) {
            .card {
                padding: 24px;
                border-radius: 20px;
            }
        }
    </style>
</head>
<body>


<main class="card">
    <p class="eyebrow">Act 5 · Session</p>
    <h2>Select Your Favorite Colors</h2>
    <p class="description">Enter five colors and submit them to store the values in a session.</p>


    <form method="post" action="num3_result.php">
        <input class="field" type="text" name="color1" placeholder="Color 1">
        <input class="field" type="text" name="color2" placeholder="Color 2">
        <input class="field" type="text" name="color3" placeholder="Color 3">
        <input class="field" type="text" name="color4" placeholder="Color 4">
        <input class="field" type="text" name="color5" placeholder="Color 5">


        <div class="actions">
            <input class="button" type="submit" value="Send Colors">
        </div>
    </form>
</main>


</body>
</html>
