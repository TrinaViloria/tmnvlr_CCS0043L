<?php
$names = [
    'trina marielle viloria',
    'kurt hienrich tarcena',
    'maryclaire jashley dela cruz',
    'jovs francis caburao',
    'mark benedict castro',
    'andrew de jesus',
    'ivan frondarina',
    'tine sarzuelo',
    'ann raye esquivias',
    'fiona rivas',
    'sam kenneth nieves',
    'mathew macalino',
    'joshua de leon',
    'sabrina carpenter',
    'taylor swift',
    'olivia rodrigo',
    'louis partridge',
    'Rachel Mcadams',
    'IU',
    'Beebadoobee'
];


function esc($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}


function uppercase_first_char($name)
{
    return ucfirst($name);
}


function replace_vowels_with_at($name)
{
    return preg_replace('/[aeiou]/i', '@', $name);
}


function position_of_a($name)
{
    $pos = stripos($name, 'a');
    return $pos === false ? 'N/A' : $pos + 1;
}


function reverse_name($name)
{
    return strrev($name);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP String Functions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kreon:wght@400;600&family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="page">
    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Number of characters</th>
                    <th>Uppercase first character</th>
                    <th>Replace vowels with @</th>
                    <th>Check position of character 'a'</th>
                    <th>Reverse name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($names as $name): ?>
                    <?php
                        $length = strlen($name);
                        $upper = uppercase_first_char($name);
                        $replaced = replace_vowels_with_at($name);
                        $posA = position_of_a($name);
                        $reversed = reverse_name($name);
                    ?>
                    <tr>
                        <td><?php echo esc($name); ?></td>
                        <td><?php echo esc($length); ?></td>
                        <td><?php echo esc($upper); ?></td>
                        <td><?php echo esc($replaced); ?></td>
                        <td><?php echo esc($posA); ?></td>
                        <td><?php echo esc($reversed); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>