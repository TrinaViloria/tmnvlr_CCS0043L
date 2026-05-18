<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Volume of Shapes</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
function volume_cube($s){ 
    return $s*$s*$s; 
    }
function volume_rect_prism($l,$w,$h){ 
    return $l*$w*$h; 
    }
function volume_cylinder($r,$h){ 
    return pi()*$r*$r*$h; 
    }
function volume_pyramid($base_area,$h){ 
    return ($base_area*$h)/3; 
    }
function volume_cone($r,$h){ 
    return (pi()*$r*$r*$h)/3; 
    }
function volume_sphere($r){ 
    return (4/3)*pi()*pow($r,3); 
    }

// sample data
$samples = [
    ['shape'=>'Cube','values'=>['s'=>5],'formula'=>'V = s^3','answer'=>volume_cube(5)],
    ['shape'=>'Rectangular Prism','values'=>['l'=>5,'w'=>4,'h'=>3],'formula'=>'V = l × w × h','answer'=>volume_rect_prism(5,4,3)],
    ['shape'=>'Cylinder','values'=>['r'=>3,'h'=>7],'formula'=>'V = π r^2 h','answer'=>volume_cylinder(3,7)],
    ['shape'=>'Pyramid','values'=>['base_side'=>6,'h'=>9],'formula'=>'V = (1/3) × base_area × h','answer'=>volume_pyramid(pow(6,2),9)],
    ['shape'=>'Cone','values'=>['r'=>3,'h'=>9],'formula'=>'V = (1/3) π r^2 h','answer'=>volume_cone(3,9)],
    ['shape'=>'Sphere','values'=>['r'=>4],'formula'=>'V = (4/3) π r^3','answer'=>volume_sphere(4)],
];

?>

<table>
	<thead>
		<tr><th class="table-title" colspan="3">Volume of Shapes</th></tr>
		<tr><th>Values</th><th>Formula</th><th>Answer</th></tr>
	</thead>
	<tbody>
	<?php foreach($samples as $samp): ?>
		<tr>
			<td><?php $parts=[]; foreach($samp['values'] as $k=>$v) $parts[] = "$k = $v"; echo htmlspecialchars(implode(', ',$parts)); ?></td>
			<td class="formula"><?= htmlspecialchars($samp['formula']) ?></td>
			<td><span class="answer-badge"><?= is_float($samp['answer']) ? number_format($samp['answer'],2) : $samp['answer'] ?></span></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

</body>
</html>

