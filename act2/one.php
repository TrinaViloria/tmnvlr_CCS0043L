<?php

class ConversionEngine {

    public function convert($value, $ratio) {
        return $value * $ratio;
    }

    public function format($num) {
        return is_int($num) ? $num : rtrim(rtrim(number_format($num, 6, '.', ''), '0'), '.');
    }
}

$engine = new ConversionEngine();

$sections = [
    "METRIC CONVERSIONS" => [
        ["unit" => "centimetre", "abbr" => "cm", "ratio" => 10,   "target" => "millimetres", "t_abbr" => "mm"],
        ["unit" => "decimetre",  "abbr" => "dm", "ratio" => 10,   "target" => "centimetres", "t_abbr" => "cm"],
        ["unit" => "metre",      "abbr" => "m",  "ratio" => 100,  "target" => "centimetres", "t_abbr" => "cm"],
        ["unit" => "kilometre",  "abbr" => "km", "ratio" => 1000, "target" => "metres",      "t_abbr" => "m"],
    ],
    "IMPERIAL CONVERSIONS" => [
        ["unit" => "foot",  "abbr" => "ft", "ratio" => 12,   "target" => "inches", "t_abbr" => "in"],
        ["unit" => "yard",  "abbr" => "yd", "ratio" => 3,    "target" => "feet",   "t_abbr" => "ft"],
        ["unit" => "chain", "abbr" => "ch", "ratio" => 22,   "target" => "yards",  "t_abbr" => "yd"],
        ["unit" => "mile",  "abbr" => "mi", "ratio" => 1760, "target" => "yards",  "t_abbr" => "yd"],
    ],
    "METRIC -> IMPERIAL CONVERSIONS" => [
        ["unit" => "millimetre", "abbr" => "mm", "ratio" => 0.03937,  "target" => "inches", "t_abbr" => "in"],
        ["unit" => "centimetre", "abbr" => "cm", "ratio" => 0.39370,  "target" => "inches", "t_abbr" => "in"],
        ["unit" => "metre",      "abbr" => "m",  "ratio" => 39.37008, "target" => "inches", "t_abbr" => "in"],
        ["unit" => "kilometre",  "abbr" => "km", "ratio" => 0.62137,  "target" => "miles",  "t_abbr" => "mi"],
    ],
    "IMPERIAL -> METRIC CONVERSIONS" => [
        ["unit" => "inch", "abbr" => "in", "ratio" => 2.54,     "target" => "centimetres", "t_abbr" => "cm"],
        ["unit" => "foot", "abbr" => "ft", "ratio" => 30.48,    "target" => "centimetres", "t_abbr" => "cm"],
        ["unit" => "yard", "abbr" => "yd", "ratio" => 0.9144,   "target" => "metres",      "t_abbr" => "m"],
        ["unit" => "mile", "abbr" => "mi", "ratio" => 1.609344, "target" => "kilometres",  "t_abbr" => "km"],
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Measure Conversion Chart</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; max-width: 800px; margin: 20px auto; line-height: 1.2; }
        .header-top { display: flex; justify-content: space-between; font-weight: bold; margin-bottom: 10px; }
        h1 { color: #2e5a88; text-transform: uppercase; border-bottom: 1px solid #ccc; padding-bottom: 5px; font-size: 22px; }
        
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; table-layout: fixed; border: 1.5px solid #000; }
        th { background-color: #fac0e7; border: 1px solid #000; padding: 6px; font-weight: bold; text-align: center; font-size: 15px; }
        td { border: 1px solid #888; padding: 5px 10px; font-size: 13.5px; }
        
        .col-label { width: 25%; }
        .col-eq { width: 5%; text-align: center; font-weight: bold; }
        .col-res { width: 20%; }

        footer { text-align: center; margin-top: 30px; font-size: 12px; }
        .footer-brand { font-weight: bold; font-size: 18px; display: block; margin-top: 5px; color: #000; }
    </style>
</head>
<body>

<h1>Measure Conversion Chart</h1>

<?php foreach ($sections as $title => $rows): ?>
    <table>
        <thead>
            <tr><th colspan="6"><?php echo $title; ?></th></tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): 
                $calcValue = $engine->convert(1, $row['ratio']);
                $displayValue = $engine->format($calcValue);
            ?>
            <tr>
                <td class="col-label">1 <?php echo $row['unit']; ?></td>
                <td class="col-eq">=</td>
                <td class="col-res"><?php echo $displayValue . " " . $row['target']; ?></td>
                
                <td class="col-label">1 <?php echo $row['abbr']; ?></td>
                <td class="col-eq">=</td>
                <td class="col-res"><?php echo $displayValue . " " . $row['t_abbr']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endforeach; ?>


</body>
</html>
