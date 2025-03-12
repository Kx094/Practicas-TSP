<?php $output = $_GET["output"] ?? "Prueba a convertir el video que quieras" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor</title>
</head>

<body>
    <?php include "./views/nav.php"; ?>

    <div class="content">

        <?= '<p style="color:green">' . $output . '</p>'; ?>

        <h1>Conversor</h1>

        <?= $conversor ?>
    </div>

    <?php include "./views/footer.php"; ?>
</body>

</html>