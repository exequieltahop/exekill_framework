<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? "Title"; ?></title>
    <!-- bs -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <?php
        require __DIR__.'/route/web.php';
    ?>
</body>
</html>