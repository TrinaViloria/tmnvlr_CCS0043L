<?php
session_start();


$_SESSION['colors'] = [
    $_POST['color1'],
    $_POST['color2'],
    $_POST['color3'],
    $_POST['color4'],
    $_POST['color5']
];


function get_safe_color_value($color)
{
    $color = trim((string) $color);


    if ($color === '') {
        return '#edf4ff';
    }


    if (preg_match('/^#(?:[0-9a-fA-F]{3}){1,2}$/', $color)) {
        return $color;
    }


    if (preg_match('/^[a-zA-Z][a-zA-Z\s-]*$/', $color)) {
        return $color;
    }


    return '#edf4ff';
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Your Favorite Colors</title>
    <style>
        :root {
            color-scheme: light;
            --bg-start: #fff0f6;
            --bg-end: #ffe6f2;
            --card: rgba(255, 247, 251, 0.95);
            --text: #3b122b;
            --muted: #7a2a50;
            --accent: #ffb2e4;
            --accent-dark: #d81d8a;
            --border: #f4d7e8;
        }


        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(232,62,140,0.10), transparent 34%),
                radial-gradient(circle at bottom right, rgba(255,82,147,0.12), transparent 30%),
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


        .hero-image {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 18px;
            margin-bottom: 20px;
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


        .colors {
            display: grid;
            gap: 12px;
        }


        .color-item {
            padding: 14px 16px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background:
                linear-gradient(rgba(255, 255, 255, 0.62), rgba(255, 255, 255, 0.62)),
                var(--row-color, #edf4ff);
            display: flex;
            justify-content: space-between;
            gap: 16px;
            align-items: center;
            color: var(--text);
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.28);
        }


        .label {
            font-weight: 700;
            color: inherit;
        }


        .value {
            color: inherit;
            font-weight: 700;
            word-break: break-word;
            text-align: right;
        }


        @media (max-width: 520px) {
            .card {
                padding: 24px;
                border-radius: 20px;
            }


            .color-item {
                flex-direction: column;
                align-items: flex-start;
            }


            .value {
                text-align: left;
            }
        }
    </style>
</head>
<body>


<main class="card">
    <p class="eyebrow">Num 3 - Result</p>
    <h2>Top 5 Favorite Colors</h2>


    <div class="colors">
        <?php
        $index = 1;
        foreach ($_SESSION['colors'] as $color) {
            $safeColor = htmlspecialchars($color ?? '', ENT_QUOTES, 'UTF-8');
            $backgroundColor = htmlspecialchars(get_safe_color_value($color), ENT_QUOTES, 'UTF-8');
            echo '<div class="color-item" style="--row-color: ' . $backgroundColor . ';"><span class="label">Color ' . $index . '</span><span class="value">' . $safeColor . '</span></div>';
            $index++;
        }
        ?>
    </div>
</main>


</body>
</html>



