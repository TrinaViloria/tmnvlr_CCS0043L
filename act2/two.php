<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Two-Digit Decimal Combinations</title>
<style>
    body{
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #f8cede, #d97f7f);
        text-align: center;
        padding: 40px;
    }
    .container{
        background: white;
        padding: 30px;
        width: 700px;
        margin: auto;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    h2{
        color: #333;
    }
    .output{
        margin-top: 20px;
        text-align: left;
        font-size: 18px;
        line-height: 1.8;
        word-wrap: break-word;
    }
</style>
</head>
<body>

<div class="container">
    <h2>All Possible Two-Digit Decimal Combinations</h2>

    <div class="output">
        <?php
        $i = 0;

        while($i <= 99){

            if($i < 10){
                echo "0$i";
            }
            else{
                echo $i;
            }

            if($i < 99){
                echo ", ";
            }
            else{
                echo ",";
            }

            $i++;
        }
        ?>
    </div>
</div>

</body>
</html>
