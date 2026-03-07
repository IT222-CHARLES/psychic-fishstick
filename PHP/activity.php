<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTIVITY</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <?php sum(5,10) ?>

    <h1>POSITIVE AND NEGATIVE</h1>
    
    <?php 
    echo checkPN(5);
    echo '<br>';
    echo checkPN(-5);
    ?>
</body>
</html>