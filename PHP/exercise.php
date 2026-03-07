<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise</title>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <h1><?php writemsg(); ?></h1>

    <?php include 'array.php'; ?>
    <?php include 'loop.php'; ?>

    <br>
    <?php
    familyName("JOHN", '1998');
    familyName("CARLO", '2002');
    ?>

    <br>
    <?php
    setHeigh(150);
    setHeigh();
    setHeigh(80);
    ?>
</body>
</html>