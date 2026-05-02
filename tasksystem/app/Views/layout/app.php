<?php $config = require __DIR__ . '/../../Config/Config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= $config['app_url'] ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $config['app_url'] ?>/assets/css/sweetalert2.min.css">
</head>
<body>
    <?php require $contentView; ?>
</body>
</html>
<script src="<?= $config['app_url'] ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= $config['app_url'] ?>/assets/js/sweetalert2.all.min.js"></script>
<script src="<?= $config['app_url'] ?>/assets/js/AlertService.js"></script>
<script src="<?= $config['app_url'] ?>/assets/vendor/jquery/jquery.min.js"></script>
<?php 
require_once __DIR__ . '/../../Core/Flash.php';
Flash::display(); 
?>