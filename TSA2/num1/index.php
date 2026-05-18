<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Fruits Directory</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
	<?php
	$fruits = [
		[
			'name' => 'Apple',
			'image' => 'https://www.paperandtea.com/cdn/shop/articles/Apfel_7ebe153a-a4ac-473a-9217-658894dfc968.jpg?v=1765535477&width=1500',
			'description' => 'A crunchy, sweet-tart fruit commonly eaten fresh or in desserts.',
			'facts' => 'Many varieties; rich in fiber and vitamin C.'
		],
		[
			'name' => 'Banana',
			'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPn_wTMOslXrSDNxBhWoE2JEUPbZnhQzmytg&s',
			'description' => 'A soft, sweet fruit with a creamy texture, great for snacks and smoothies.',
			'facts' => 'High in potassium; often eaten ripe or used in baking.'
		],
		[
			'name' => 'Cherry',
			'image' => 'https://saberhealth.com/wp-content/uploads/2024/10/a-bunch-cherries.jpg',
			'description' => 'Small, juicy stone fruit with a bright red color and tart-sweet flavor.',
			'facts' => 'Used in pies and preserves; contains antioxidants.'
		],
		[
			'name' => 'Mango',
			'image' => 'https://substackcdn.com/image/fetch/$s_!pam7!,f_auto,q_auto:good,fl_progressive:steep/https%3A%2F%2Fsubstack-post-media.s3.amazonaws.com%2Fpublic%2Fimages%2F562844dc-6f4e-4d8d-b2df-55a8f29ad5b7_1280x840.png',
			'description' => 'A tropical fruit with sweet, aromatic flesh and a large flat pit.',
			'facts' => 'High in vitamin A and C; popular in salsas and smoothies.'
		],
		[
			'name' => 'Orange',
			'image' => 'https://cdn.britannica.com/24/174524-050-A851D3F2/Oranges.jpg',
			'description' => 'A citrus fruit known for its juicy segments and refreshing tang.',
			'facts' => 'Excellent source of vitamin C; used for juice and zest.'
		],
		[
			'name' => 'Pineapple',
			'image' => 'https://heritagefinefoods.co.uk/wp-content/uploads/2021/07/phoenix-han-ZS_RypKo9sk-unsplash-scaled-1.jpg',
			'description' => 'A tropical fruit with sweet-tart flesh and a spiky exterior.',
			'facts' => 'Contains bromelain, an enzyme that can tenderize meat.'
		],
		[
			'name' => 'Grapes',
			'image' => 'https://grapaes.com/wp-content/uploads/2024/09/035Kar_FD_00713-scaled.jpg',
			'description' => 'Small, juicy fruits that grow in clusters; used fresh or for wine.',
			'facts' => 'Come in many varieties; contain resveratrol and other antioxidants.'
		],
		[
			'name' => 'Strawberry',
			'image' => 'https://clv.h-cdn.co/assets/15/22/2048x2048/square-1432664914-strawberry-facts1.jpg',
			'description' => 'A bright red, fragrant fruit with a sweet and slightly tart flavor.',
			'facts' => 'High in vitamin C and used widely in desserts.'
		],
		[
			'name' => 'Kiwi',
			'image' => 'https://assets.clevelandclinic.org/transform/9294e4ed-ab23-4f36-9225-6630ff9ddb67/Kiwi-527995150-770x533-1_jpg',
			'description' => 'A small brown fruit with bright green flesh and tiny edible seeds.',
			'facts' => 'Very high in vitamin C and dietary fiber.'
		],
	];

	usort($fruits, function($a, $b) {
		return strcasecmp($a['name'], $b['name']);
	});
	?>

	<table class="fruit-table">
		<thead>
		<tr>
			<th class="table-title" colspan="4">My Fruits</th>
		</tr>
		<tr>
			<th>Image</th>
			<th>Name</th>
			<th>Description</th>
			<th>Facts</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($fruits as $fruit): ?>
			<tr>
				<td><img src="<?php echo $fruit['image']; ?>" alt="<?php echo htmlspecialchars($fruit['name']); ?>" class="fruit-img"></td>
				<td><?php echo htmlspecialchars($fruit['name']); ?></td>
				<td><?php echo htmlspecialchars($fruit['description']); ?></td>
				<td><?php echo htmlspecialchars($fruit['facts']); ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

</div>
</body>
</html>

