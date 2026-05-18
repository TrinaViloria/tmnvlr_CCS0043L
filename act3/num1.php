 <?php

$profiles = [
    ["name" => "Sabrina Carpenter", "image" => "https://media.glamour.com/photos/674de951e3207eff7c778ed4/master/w_1920,c_limit/GettyImages-2177695508.jpg", "age" => 27, "birthday" => "May 11, 1999", "contact" => "09171234567"],
    ["name" => "Olivia Rodrigo", "image" => "https://i.scdn.co/image/ab6761610000e5ebe654806251e2661def1f4e65", "age" => 23, "birthday" => "February 20, 2003", "contact" => "09182345678"],
    ["name" => "Justin Bieber", "image" => "https://cdn.britannica.com/68/226968-050-C2FF98B9/Canadian-singer-Justin-Bieber-2021.jpg", "age" => 32, "birthday" => "March 1, 1994", "contact" => "09193456789"],
    ["name" => "SZA", "image" => "https://ntvb.tmsimg.com/assets/assets/1027990_v9_bc.jpg", "age" => 36, "birthday" => "November 8, 1989", "contact" => "09204567890"],
    ["name" => "Ariana Grande", "image" => "https://static.wikia.nocookie.net/disney/images/9/96/Ariana_Grande_at_the_2020_Grammy_Awards.jpg/revision/latest?cb=20210527173655", "age" => 32, "birthday" => "June 26, 1993", "contact" => "09215678901"],
    ["name" => "Bruno Mars", "image" => "https://naras.a.bigcontent.io/v1/static/bruno-mars_MI0004141313-MN0001032082", "age" => 40, "birthday" => "October 8, 1985", "contact" => "09226789012"],
    ["name" => "Chris Brown", "image" => "https://hitmkr-prod.imgix.net/custom/3998/chris-brown.png?lossless=1&fm=pjpg&fit=crop&crop=faces,entropy&q=100,ch=Width,", "age" => 37, "birthday" => "May 5, 1989", "contact" => "09237890123"],
    ["name" => "Taylor Swift", "image" => "https://static.wikia.nocookie.net/disney/images/c/c0/Taylor_Swift.jpg/revision/latest?cb=20231016171955", "age" => 36, "birthday" => "December 13, 1989", "contact" => "09248901234"],
    ["name" => "Kendall Jenner", "image" => "https://static.wikia.nocookie.net/kourtney-kardashian/images/9/96/KendallJenner.jpg/revision/latest?cb=20241103123029", "age" => 30, "birthday" => "November 3, 1995", "contact" => "09259012345"],
    ["name" => "Louis Partridge", "image" => "https://i0.wp.com/coolamericamag.com/wp-content/uploads/2021/11/1-opening.-LOUISPARTRIDGE_0294.jpg?ssl=1", "age" => 22, "birthday" => "June 3, 2003", "contact" => "09260123456"]
];

uasort($profiles, function($a, $b) {
    return strcmp($a['name'], $b['name']);
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorted Student Profiles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }
        .table-wrap {
            width: 100%;
            max-width: 1200px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border: 2px solid #999;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #999;
        }
        th {
            background-color: #fdb5e3;
            color: #333;
            font-weight: bold;
            text-align: center;
            font-size: 13px;
        }
        tbody tr {
            background-color: #ffffff;
        }
        tr:last-child td {
            border-bottom: 1px solid #999;
        }
        img {
            border-radius: 0;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }
        .center-text {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th class="center-text" scope="col">No</th>
                <th class="center-text" scope="col">Name</th>
                <th class="center-text" scope="col">Image</th>
                <th class="center-text" scope="col">Age</th>
                <th class="center-text" scope="col">Birthday</th>
                <th class="center-text" scope="col">Contact Number</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $counter = 1;
            foreach ($profiles as $profile): 
            ?>
                <tr>
                    <td class="center-text"><strong><?= $counter++; ?></strong></td>
                    <td><?= htmlspecialchars($profile['name']); ?></td>
                    <td class="center-text"><img src="<?= $profile['image']; ?>" alt="<?= htmlspecialchars($profile['name']); ?>" width="50" height="50"></td>
                    <td><?= $profile['age']; ?></td>
                    <td><?= $profile['birthday']; ?></td>
                    <td><?= $profile['contact']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>

